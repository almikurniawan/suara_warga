<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\SmartComponent\Grid;
use App\Libraries\SmartComponent\Form;

class AksesUser extends BaseController
{
    public function index()
    {
        $data['grid']   = $this->grid();
        $data['search'] = $this->search();
        $data['title']  = 'User';

        return view('admin/aksesUser', $data);
    }

    public function grid()
    {
        $SQL = "SELECT
                    user_id AS ID,
                    user_name,
                    ref_type_user_label as type_user,
                    dinas_nama
                FROM
                    PUBLIC.USER 
                    left join ref_type_user on ref_type_user_id = user_type
                    left join ref_dinas on dinas_id = user_dinas_id";

        $action['edit']     = array(
            'link'          => 'admin/aksesUser/edit/'
        );
        $action['delete']     = array(
            'jsf'          => 'deleteUser'
        );

        $grid = new Grid();
        return $grid->set_query($SQL, array(
                array('user_name', $this->request->getGet('user'))
            ))
            ->set_sort(array('id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/aksesUser/grid?datasource&" . get_query_string()),
                    'grid_columns'  => array(
                        array(
                            'field' => 'user_name',
                            'title' => 'Nama User',
                        ),
                        array(
                            'field' => 'type_user',
                            'title' => 'Type User',
                        ),
                        array(
                            'field' => 'dinas_nama',
                            'title' => 'Dinas',
                        )
                    ),
                    'action'    => $action,
                )
            )
            ->set_toolbar(function($toolbar){
                $toolbar
                ->add('add', ['label'=>'Tambah User', 'url'=> base_url("admin/aksesUser/add")]);
            })
            ->output();
    }

    public function search()
    {
        $form = new Form();
        return $form->set_form_type('search')
            ->set_form_method('GET')
            ->set_submit_label('Cari')
            ->add('user', 'Username', 'text', false, $this->request->getGet('user'), 'style="width:100%;" ')
            ->output();
    }

    public function add()
    {
        $data['title']  = 'Tambah user';
        $data['form']   = $this->form();
        $data['url_back']= base_url("admin/aksesUser");
        return view('global/form', $data);
    }

    public function edit($id)
    {
        $data['title']  = 'Edit user';
        $data['form']   = $this->form($id);
        $data['url_back']= base_url("admin/aksesUser");
        return view('global/form', $data);
    }
    
    public function form($id = null)
    {
        $data = false;
        if ($id != null) {
            $data = $this->db->table('user')->getWhere(['user_id' => $id])->getRowArray();
        }

        $form = new Form();
        $form->set_attribute_form('class="form-horizontal"')
            ->add('user_name', 'Username', 'text', true, ($data) ? $data['user_name'] : '', 'style="width:100%;"')
            ->add('user_password', 'Password', 'password', false, '', 'style="width:100%;"')
            ->add('user_type', 'Type User', 'select', true, ($data) ? $data['user_type'] : 0, ' style="width:100%;"', array(
                'table' => 'ref_type_user',
                'id' => 'ref_type_user_id',
                'label' => 'ref_type_user_label',
            ))
            ->add('user_dinas_id', 'Dinas', 'select', false, ($data) ? $data['user_dinas_id'] : 0, ' style="width:100%;"', array(
                'table' => 'ref_dinas',
                'id' => 'dinas_id',
                'label' => 'dinas_nama',
            ));
        if ($form->formVerified()) {
            $data_insert = array(
                'user_name'=> $this->request->getPost('user_name'),
                'user_type'=> $this->request->getPost('user_type'),
            );
            if($this->request->getPost('user_password')!=''){
                $data_insert['user_password'] = sha1($this->request->getPost('user_password'));
            }
            if($this->request->getPost('user_dinas_id')!=''){
                $data_insert['user_dinas_id'] = $this->request->getPost('user_dinas_id');
            }
            if ($id != null) {
                $this->db->table('public.user')->where('user_id', $id)->update($data_insert);
                $this->db->table('ref_user_akses')->delete(['ref_user_akses_user_id' => $id]);
                $this->session->setFlashdata('success', 'Sukses Edit Data');
            } else {
                $this->db->table('public.user')->insert($data_insert);
                $id = $this->db->insertID();
                $this->session->setFlashdata('success', 'Sukses Insert Baru');
            }
            die(forceRedirect(base_url('/admin/aksesUser')));
        } else {
            return $form->output();
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $this->db->table("user")->where(['user_id'=>$id])->delete();
        return $this->response->setJSON(['status'=> true,'message'=>'Sukses delete user']);
    }
}
