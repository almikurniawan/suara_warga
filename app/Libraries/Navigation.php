<?php

namespace App\Libraries;

class Navigation
{
    public function __construct()
    {
        $this->db 		= \Config\Database::connect();
        $this->session 	= \Config\Services::session();
    }

    public function menu()
    {
        $data['menu'] = $this->gen_menu();
        return view('template/menu', $data);
    }

    private function gen_menu()
    {
        $menu = '';
        $list_menu = $this->list_menu();
        foreach ($list_menu as $key => $value) {
            if($this->cek_akses($value['controller'])){
                if (isset($value['child'])) {
                    $menu .= '<li class="nav-item dropdown"><a class="nav-link pl-0 dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="' . $value['icon'] . '"></i> ' . $value['label'] . ' </a><div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                    foreach ($value['child'] as $k => $v) {
                        $menu .= '<a class="dropdown-item" href="' . base_url($v['controller']) . '">' . $v['label'] . ' </a>';
                    }
                    $menu .= '</div></li>';
                } else {
                    $menu .= '<li class="nav-item"><a class="nav-link pl-0" href="' . base_url($value['controller']) . '"><i class="' . $value['icon'] . '"></i> ' . $value['label'] . ' </a></li>';
                }
            }
        }
        // $menu .= '<li><a class="nav-link pl-0" href="' . base_url("login/logout") . '"><i class="k-icon k-i-logout"></i> Logout </a></li>';

        return $menu;
    }

    public function cek_akses($controller)
    {
        return true;
        $data_ref_modul = $this->db->query("SELECT
                                            ref_modul_akses_label
                                        FROM
                                            ref_modul_akses
                                        WHERE
                                            lower(ref_modul_akses_label) = '".trim(strtolower($controller))."'")->getRowArray();
        if(!empty($data_ref_modul)){
            $user   = $this->session->get('user');
            $data_modul = $this->db->query("SELECT
                                                ref_modul_akses_label
                                            FROM
                                                ref_modul_akses
                                            WHERE
                                                ref_modul_akses_group_id IN (
                                            SELECT
                                                ref_user_akses_group_id
                                            FROM
                                                ref_user_akses
                                            WHERE
                                                ref_user_akses_user_id = ".$user['user_id'].")
                                                and lower(ref_modul_akses_label) = '".trim(strtolower($controller))."'")->getRowArray();
            if(!empty($data_modul)){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }

    private function list_menu()
    {
        $list_menu = array(
            array(
                'label'         => 'TIM PF',
                'controller'    => 'admin/aduan',
                'icon'          => 'fa-home',
            ),
            array(
                'label'         => 'Ketua TIM',
                'controller'    => 'admin/ketuaTim',
                'icon'          => 'fa-home',
            ),
            // array(
            //     'label'         => 'Eksekusi',
            //     'controller'    => 'admin/aduanDinas',
            //     'icon'          => 'fa-home',
            // ),
            // array(
            //     'label'         => 'Selesai',
            //     'controller'    => 'admin/aduanDinas',
            //     'icon'          => 'fa-home',
            // ),
            array(
                'label'         => 'Dinas',
                'controller'    => 'admin/EksekusiDinas',
                'icon'          => 'fa-home',
            ),
            array(
                'label'         => 'Data Master',
                'controller'    => '#master',
                'icon'          => 'fa-home',
                'child'         => array(
                    array(
                        'label'     => 'Karyawan',
                        'controller' => 'admin/karyawan',
                        'icon'          => 'fa-home',
                    ),
                    array(
                        'label'     => 'Dinas',
                        'controller' => 'admin/dinas',
                        'icon'          => 'fa-home',
                    ),
                )
            ),
            array(
                'label'         => 'Hak Akses',
                'controller'    => '#akses',
                'icon'          => 'fa-home',
                'child'         => array(
                    array(
                        'label'     => 'Group Akses',
                        'controller' => 'admin/aksesGroup',
                    ),
                    array(
                        'label'     => 'Modul Akses',
                        'controller' => 'admin/aksesModul',
                    ),
                    array(
                        'label'     => 'User Akses',
                        'controller' => 'admin/aksesUser',
                    ),
                )
            ),
        );

        $user = $this->session->get('user');
        if($user['user_type']==1){
            $list_menu = array(
                array(
                    'label'         => 'Dashboard',
                    'controller'    => 'admin/aduan',
                    'icon'          => 'fa-home',
                ),
            );
        }else if($user['user_type']==2){
            $list_menu = array(
                array(
                    'label'         => 'Dashboard',
                    'controller'    => 'admin/ketuaTim',
                    'icon'          => 'fa-home',
                ),
            );
        }else if($user['user_type']==3){
            $list_menu = array(
                array(
                    'label'         => 'Dashboard',
                    'controller'    => 'admin/EksekusiDinas',
                    'icon'          => 'fa-home',
                ),
            );
        }else if($user['user_type']==5){
            $list_menu = array(
                array(
                    'label'         => 'TIM PF',
                    'controller'    => 'admin/aduan',
                    'icon'          => 'fa-home',
                ),
                array(
                    'label'         => 'Ketua TIM',
                    'controller'    => 'admin/ketuaTim',
                    'icon'          => 'fa-home',
                ),
                // array(
                //     'label'         => 'Eksekusi',
                //     'controller'    => 'admin/aduanDinas',
                //     'icon'          => 'fa-home',
                // ),
                // array(
                //     'label'         => 'Selesai',
                //     'controller'    => 'admin/aduanDinas',
                //     'icon'          => 'fa-home',
                // ),
                array(
                    'label'         => 'Dinas',
                    'controller'    => 'admin/EksekusiDinas',
                    'icon'          => 'fa-home',
                ),
                array(
                    'label'         => 'Data Master',
                    'controller'    => '#master',
                    'icon'          => 'fa-home',
                    'child'         => array(
                        array(
                            'label'     => 'Karyawan',
                            'controller' => 'admin/karyawan',
                            'icon'          => 'fa-home',
                        ),
                        array(
                            'label'     => 'Dinas',
                            'controller' => 'admin/dinas',
                            'icon'          => 'fa-home',
                        ),
                    )
                ),
                array(
                    'label'         => 'Hak Akses',
                    'controller'    => '#akses',
                    'icon'          => 'fa-home',
                    'child'         => array(
                        array(
                            'label'     => 'Group Akses',
                            'controller' => 'admin/aksesGroup',
                        ),
                        array(
                            'label'     => 'Modul Akses',
                            'controller' => 'admin/aksesModul',
                        ),
                        array(
                            'label'     => 'User Akses',
                            'controller' => 'admin/aksesUser',
                        ),
                    )
                ),
            );
        }

        return $list_menu;
    }
}
