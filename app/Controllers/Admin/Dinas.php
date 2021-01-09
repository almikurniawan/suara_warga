<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\SmartComponent\Grid;
use App\Libraries\SmartComponent\Form;

class Dinas extends BaseController
{
    public function index()
    {
        $data['grid']   = $this->grid();
        $data['search'] = $this->search();
        $data['title']  = 'Dinas';
        $data['url_delete'] = 'admin/dinas/delete';

        return view('global/list', $data);
    }

    public function grid()
    {
        $SQL = "SELECT
                    dinas_id as id,
                    *
                FROM
                ref_dinas";

        $action['edit']     = array(
            'link'          => 'admin/dinas/edit/'
        );
        // $action['delete']     = array(
        //     'jsf'          => '_delete'
        // );

        $grid = new Grid();
        return $grid->set_query($SQL, array(
            array('dinas_nama', $this->request->getGet('dinas_nama')),
            // array('kar_visible', 'true','is')
        ))
            ->set_sort(array('dinas_id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/dinas/grid?datasource&" . get_query_string()),
                    'grid_columns'  => array(
                        array(
                            'field' => 'dinas_nama',
                            'title' => 'Nama Dinas',
                        ),
                    ),
                    'action'    => $action,
                    'head_left' => array('add' => base_url('/admin/dinas/add')),
                    'toolbar'   => ['download']
                )
            )->output();
    }
    public function search()
    {
        $form = new Form();
        return $form->set_form_type('search')
            ->set_form_method('GET')
            ->set_submit_label('Cari')
            ->add('dinas_nama', 'Dinas', 'text', false, $this->request->getGet('dinas_nama'), 'style="width:100%;" ')
            ->output();
    }

    public function add()
    {
        $data['title']  = 'Tambah Dinas';
        $data['form']   = $this->form();
        $data['url_back'] = base_url('admin/dinas');
        return view('global/form', $data);
    }

    public function edit($id)
    {
        $data['title']  = 'Edit Dinas';
        $data['form']   = $this->form($id);
        $data['url_back'] = base_url('admin/dinas');

        return view('global/form', $data);
    }
    // public function delete()
    // {
    //     $id = $this->request->getPost('id');

    //     $this->db->table('dinas')->where(['dinas_id' => $id])->update(['kar_visible' => false]);
    //     return $this->response->setJSON(
    //         array(
    //             'status' => true,
    //             'message' => 'Success delete data'
    //         )
    //     );
    // }
    public function form($id = null)
    {
        if ($id != null) {
            $data = $this->db->table('ref_dinas')->select('*')->getWhere(['dinas_id' => $id])->getRowArray();
        }

        $form = new Form();
        $form->set_attribute_form('class="form-horizontal"')
            ->add('dinas_nama', 'Nama Dinas', 'text', true, !empty($data) ? $data['dinas_nama'] : '', 'style="width:100%;"');

        if ($form->formVerified()) {
            if ($id != null) {
                $dinas_update = array(
                    'dinas_nama'  => $this->request->getPost('dinas_nama'),
                    'dinas_created_at'    => 'now()',
                    'dinas_created_by'    => $this->user['user_id'],
                );
                $this->db->table('ref_dinas')->where('dinas_id', $id)->update($dinas_update);
                $this->session->setFlashdata('success', 'Sukses Edit Data');
                die(forceRedirect(base_url('/admin/dinas/edit/' . $id)));
            } else {
                $dinas_update = array(
                    'dinas_nama'  => $this->request->getPost('dinas_nama'),
                    'dinas_created_at'    => 'now()',
                    'dinas_created_by'    => $this->user['user_id'],
                );
                $this->db->table('ref_dinas')->insert($dinas_update);
                $id = $this->db->insertID();
                $this->session->setFlashdata('success', 'Registrasi Dinas = ' . strtoupper($this->request->getPost('dinas_nama')) . ' berhasil!');
                die(forceRedirect(base_url('/admin/dinas/edit/' . $id)));
            }
        } else {
            return $form->output();
        }
    }
}
