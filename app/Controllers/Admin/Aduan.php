<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\SmartComponent\Grid;
use App\Libraries\SmartComponent\Form;

class Aduan extends BaseController
{
    public function index()
    {
        $data['content']   = $this->grid();
        $data['content_valid']   = $this->grid();
        $data['content_invalid']   = $this->grid();
        $data['title']  = 'Aduan';

        return view('admin/aduan/list', $data);
    }

    public function grid()
    {
        $SQL = "select *, aduan_id as id, '<b>Nama</b> : '||aduan_nama||'<br/><b>Telp</b> : '||aduan_telp||'<br/><b>NIK</b> : '||aduan_nik as pelapor from aduan";

        $action['detail']     = array(
            'jsf'          => 'detail'
        );

        $grid = new Grid();
        return $grid->set_query($SQL,[
            ['aduan_status', 1, '=']
        ])
            ->set_sort(array('id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/aduan/grid?datasource&" . get_query_string()),
                    'grid_columns'  => array(
                        array(
                            'field' => 'pelapor',
                            'title' => 'Pelapor',
                            'encoded'=> false
                        ),
                        array(
                            'field' => 'aduan_pesan',
                            'title' => 'Pesan',
                        ),
                        array(
                            'field' => 'aduan_created_at',
                            'title' => 'Pada',
                            'format'=> 'datetime'
                        ),

                    ),
                    'action'    => $action,
                )
            )->output();
    }

    private function search()
    {
        $form = new Form();
        return $form->set_form_type('search')
            ->set_form_method('GET')
            ->set_submit_label('Cari')
            ->add('kar_nama', 'Karyawan', 'text', false, $this->request->getGet('kar_nama'), 'style="width:100%;" ')
            ->output();
    }

    
    public function detail($id)
    {
        $data['title'] = "Detail Aduan";
        $data['content'] = $this->resume($id);
        return view('admin/aduan/detail', $data);
    }

    private function resume($id)
    {
        $data_aduan = $this->db->query("select *, aduan_id as id, '<b>Nama</b> : '||aduan_nama||'<br/><b>Telp</b> : '||aduan_telp||'<br/><b>NIK</b> : '||aduan_nik as pelapor from aduan where aduan_id =  ".$id)->getRowArray();
        $form = new Form();
        return $form->set_resume(true)
            ->add('aduan_pesan', 'Aduan Pesan', 'textArea', false, $data_aduan['aduan_pesan'], 'style="width:100%;" ')
            ->output();
    }
}
