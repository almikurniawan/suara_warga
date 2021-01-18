<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\SmartComponent\Grid;
use App\Libraries\SmartComponent\Form;

class EksekusiDinas extends BaseController
{
    public function index()
    {
        $data['grid']   = $this->grid();
        $data['search'] = '';
        $data['title']  = 'Aduan';

        return view('admin/eksekusidinas/list', $data);
    }

    public function grid()
    {
        $SQL = "select *, aduan_dis_dinas_id||'/'||aduan_id as id, substring(aduan_pesan from 0 for 50)||'...' as pesan from aduan inner join aduan_disposisi on aduan_dis_aduan_id = aduan_id";
        $action['detail']     = array(
            'link'          => 'admin/EksekusiDinas/detail/'
        );

        $filter = [
            ['aduan_status', 3, '=']
        ];
        if($this->user['user_dinas_id']!=''){
            $filter[] = [
                'aduan_dis_dinas_id', $this->user['user_dinas_id'], '='
            ];
        }

        $grid = new Grid();
        return $grid->set_query($SQL, $filter)
            ->set_sort(array('aduan_id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/EksekusiDinas/grid?datasource&" . get_query_string()),
                    'grid_columns'  => array(
                        array(
                            'field' => 'aduan_nama',
                            'title' => 'Pelapor',
                        ),
                        array(
                            'field' => 'aduan_telp',
                            'title' => 'Telp',
                        ),
                        array(
                            'field' => 'aduan_nik',
                            'title' => 'NIK',
                        ),
                        array(
                            'field' => 'pesan',
                            'title' => 'Pesan',
                        ),
                        array(
                            'field' => 'aduan_created_at',
                            'title' => 'Pada',
                            'format'=> 'datetime'
                        ),

                    ),
                    // 'action'    => $action,
                    'url_row_onclick'=> base_url("admin/EksekusiDinas/detail")
                )
            )->output();
    }
    public function status()
    {
        $id = $this->request->getPost('id');

        $this->db->table("aduan")->where(['aduan_id' => $id])->update(['aduan_status' => '4']);
        $this->db->table('aduan_history')->where(['history_aduan_id' => $id, 'history_status' => 4])->update(['history_created_at' => date("Y-m-d H:i:s")]);
        $dataUpdate = array(
            'aduan_dis_tindak_lanjut_is' => true,
            'aduan_dis_tindak_lanjut_by' => $this->user['user_id'],
            'aduan_dis_tindak_lanjut_at' => date("Y-m-d H:i:s")
        );
        $this->db->table("aduan")->where(['aduan_id' => $id])->update($dataUpdate);
        return $this->response->setJSON(
            array(
                'status' => true,
                'message' => 'Success'
            )
        );
    }
    public function detail($din_id, $id)
    {
        $data['title'] = "Detail Aduan";
        $data['content'] = $this->resume($din_id,$id);
        $data['din_id'] = $din_id;
        $data['id'] = $id;
        return view('admin/eksekusidinas/detail', $data);
    }

    private function resume($din_id, $id)
    {
        $data_aduan = $this->db->query("select *, aduan_id as id, '<b>Nama</b> : '||aduan_nama||'<br/><b>Telp</b> : '||aduan_telp||'<br/><b>NIK</b> : '||aduan_nik as pelapor from aduan where aduan_id =  " . $id)->getRowArray();
        $data_foto = $this->db->table("aduan_file")->where(['aduan_file_aduan_id' => $id])->Get()->getResultArray();
        $form = new Form();
        $resume = $form->set_resume(true)
            ->add('aduan_pesan', 'Pesan Aduan', 'textArea', false, $data_aduan['aduan_pesan'], 'style="width:100%;" ')
            ->add('aduan_nama', 'Nama Lengkap', 'text', false, $data_aduan['aduan_nama'], 'style="width:100%;" ')
            ->add('aduan_telp', 'Nomor Telpon', 'text', false, '<span style="cursor:pointer;" onclick="wa(\'' . $data_aduan['aduan_telp'] . '\')" class="badge bg-info text-light">' . $data_aduan['aduan_telp'] . '</span>', 'style="width:100%;" ')
            ->add('aduan_nik', 'NIK', 'text', false, $data_aduan['aduan_nik'], 'style="width:100%;" ')
            ->add('aduan_created_at', 'Tanggal Laporan Masuk', 'text', false, $data_aduan['aduan_created_at'], 'style="width:100%;" ')
            ->output();
        $foto = "";
        foreach ($data_foto as $key => $value) {
            $foto .= '<div class="row"><div class="col-12"><img src="' . base_url("uploads/" . $value['aduan_file_url']) . '" class="img-thumbnail" /></div></div>';
        }
        if ($foto == "") {
            $foto = "<center><p>Tidak ada foto yang di upload.</p></center>";
        }
        $title_foto = "<h3><b>Foto yang di upload</b></h3>";
        return $resume . $title_foto . $foto;
    }

    public function proses($dinas_id, $aduan_id)
    {
        $this->db->table("aduan_disposisi")->where(['aduan_dis_aduan_id'=> $aduan_id, 'aduan_dis_dinas_id'=> $dinas_id])->update([
            'aduan_dis_eksekusi_is'=> true,
            'aduan_dis_eksekusi_at'=> date("Y-m-d H:i:s"),
            'aduan_dis_eksekusi_by'=> $this->user['user_id']
        ]);
        $this->db->table("aduan")->where(['aduan_id'=> $aduan_id])->update([
            'aduan_status'=> 4,
        ]);
        $this->db->table("aduan_history")->where(['history_aduan_id'=> $aduan_id ,'history_status'=> 4])->update([
            'history_created_at'=> date("Y-m-d H:i:s"),
            'history_created_by'=> $this->user['user_id']
        ]);
        
        return redirect()->to(base_url("admin/EksekusiDinas"));
    }

    public function eksekusi()
    {
        $data['grid']   = $this->gridEksekusi();
        $data['search'] = '';
        $data['title']  = 'Eksekusi';

        return view('admin/eksekusidinas/list', $data);
    }

    public function gridEksekusi()
    {
        $SQL = "select *, aduan_dis_dinas_id||'/'||aduan_id as id, substring(aduan_pesan from 0 for 50)||'...' as pesan from aduan inner join aduan_disposisi on aduan_dis_aduan_id = aduan_id";
        $action['detail']     = array(
            'link'          => 'admin/EksekusiDinas/detailTindakLanjut/'
        );

        $filter = [
            ['aduan_status', 4, '=']
        ];
        if($this->user['user_dinas_id']!=''){
            $filter[] = [
                'aduan_dis_dinas_id', $this->user['user_dinas_id'], '='
            ];
        }

        $grid = new Grid();
        return $grid->set_query($SQL, $filter)
            ->set_sort(array('aduan_id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/EksekusiDinas/gridEksekusi?datasource&" . get_query_string()),
                    'grid_columns'  => array(
                        array(
                            'field' => 'aduan_nama',
                            'title' => 'Pelapor',
                        ),
                        array(
                            'field' => 'aduan_telp',
                            'title' => 'Telp',
                        ),
                        array(
                            'field' => 'aduan_nik',
                            'title' => 'NIK',
                        ),
                        array(
                            'field' => 'pesan',
                            'title' => 'Pesan',
                        ),
                        array(
                            'field' => 'aduan_created_at',
                            'title' => 'Pada',
                            'format'=> 'datetime'
                        ),

                    ),
                    // 'action'    => $action,
                    'url_row_onclick'=> base_url("admin/EksekusiDinas/detailTindakLanjut/")
                )
            )->output();
    }

    public function detailTindakLanjut($din_id,$id)
    {
        $data['title'] = "Detail Aduan";
        $data['content'] = $this->resume($din_id,$id);
        $data['din_id'] = $din_id;
        $data['id'] = $id;
        return view('admin/eksekusidinas/detail_tindak_lanjut', $data);
    }

    public function buktiTindakLanjut($din_id, $id)
    {
        $data['title'] = "Form Eksekusi";
        $data['content'] = $this->form_eksekusi($din_id, $id);
        return view('admin/eksekusidinas/form', $data);
    }

    public function form_eksekusi($din_id, $id)
    {
        $form = new Form();
        $form->set_attribute_form('class="form-horizontal"')
            ->add('aduan_dis_tindak_lanjut_note', 'Catatan', 'textArea', true, '', 'style="width:100%;"')
            ->add('file', 'File Lampiran', 'file_multiple', false, '', 'style="width:100%;"');

        if ($form->formVerified()) {
            $aduan_disposisi = $this->db->table("aduan_disposisi")->where([
                'aduan_dis_aduan_id'=> $id,
                'aduan_dis_dinas_id'=> $din_id
            ])->get()->getRowArray();
            $files = $this->request->getFiles();
            foreach ($files['file'] as $key => $file) {
                if ($file->getName() != '') {
                    $name = $file->getRandomName();
                    if ($file->move('./uploads/', $name)) {
                        $this->db->table("tindak_lanjut_file")->insert([
                            'dis_file_dis_id' => $aduan_disposisi['aduan_dis_id'],
                            'dis_file_file' => $name,
                            'dis_file_created_by' => $this->user['user_id'],
                            'dis_file_created_at' => date("Y-m-d H:i:s")
                        ]);
                    }
                }
            }
            $data_update = array(
                'aduan_dis_tindak_lanjut_note'    => $this->request->getPost('aduan_dis_tindak_lanjut_note'),
            );
            $this->db->table('aduan_disposisi')->where(['aduan_dis_id'=> $aduan_disposisi['aduan_dis_id']])->update($data_update);
            $this->db->table('aduan')->where(['aduan_id'=> $id])->update([
                'aduan_status'=> 5,
            ]);
            $this->db->table('aduan_history')->where(['history_aduan_id'=> $id, 'history_status'=>5])->update([
                'history_created_at'=> date("Y-m-d H:i:s"),
                'history_created_by'=> $this->user['user_id']
            ]);
            
            $this->session->setFlashdata('success', 'Sukses Edit Data');
            die(forceRedirect(base_url('/admin/EksekusiDinas/')));
        } else {
            return $form->output();
        }
    }

    public function selesai()
    {
        $data['grid']   = $this->gridSelesai();
        $data['search'] = '';
        $data['title']  = 'Selesai';

        return view('admin/eksekusidinas/list', $data);
    }

    public function gridSelesai()
    {
        $SQL = "select *, aduan_dis_dinas_id||'/'||aduan_id as id, substring(aduan_pesan from 0 for 50)||'...' as pesan from aduan inner join aduan_disposisi on aduan_dis_aduan_id = aduan_id";

        $filter = [
            ['aduan_status', 5, '=']
        ];
        if($this->user['user_dinas_id']!=''){
            $filter[] = [
                'aduan_dis_dinas_id', $this->user['user_dinas_id'], '='
            ];
        }

        $grid = new Grid();
        return $grid->set_query($SQL, $filter)
            ->set_sort(array('aduan_id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/EksekusiDinas/gridSelesai?datasource&" . get_query_string()),
                    'grid_columns'  => array(
                        array(
                            'field' => 'aduan_nama',
                            'title' => 'Pelapor',
                        ),
                        array(
                            'field' => 'aduan_telp',
                            'title' => 'Telp',
                        ),
                        array(
                            'field' => 'aduan_nik',
                            'title' => 'NIK',
                        ),
                        array(
                            'field' => 'pesan',
                            'title' => 'Pesan',
                        ),
                        array(
                            'field' => 'aduan_created_at',
                            'title' => 'Pada',
                            'format'=> 'datetime'
                        ),

                    ),
                )
            )->output();
    }
}
