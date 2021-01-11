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
        $data['title']  = 'Aduan';

        return view('admin/aduan/list', $data);
    }

    public function grid()
    {
        $SQL = "select *, aduan_id as id from aduan";

        $action['detail']     = array(
            'link'          => 'admin/aduan/detail/'
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
        $data['id'] = $id;
        return view('admin/aduan/detail', $data);
    }

    private function resume($id)
    {
        $data_aduan = $this->db->query("select *, aduan_id as id, '<b>Nama</b> : '||aduan_nama||'<br/><b>Telp</b> : '||aduan_telp||'<br/><b>NIK</b> : '||aduan_nik as pelapor from aduan where aduan_id =  ".$id)->getRowArray();
        $data_foto = $this->db->table("aduan_file")->where(['aduan_file_aduan_id'=> $id])->Get()->getResultArray();
        $form = new Form();
        $resume = $form->set_resume(true)
            ->add('aduan_pesan', 'Aduan Pesan', 'textArea', false, $data_aduan['aduan_pesan'], 'style="width:100%;" ')
            ->add('aduan_nama', 'Nama', 'text', false, $data_aduan['aduan_nama'], 'style="width:100%;" ')
            ->add('aduan_telp', 'Telp', 'text', false, '<span style="cursor:pointer;" onclick="wa(\''.$data_aduan['aduan_telp'].'\')" class="badge badge-primary">'.$data_aduan['aduan_telp'].'</span>', 'style="width:100%;" ')
            ->add('aduan_nik', 'NIK', 'text', false, $data_aduan['aduan_nik'], 'style="width:100%;" ')
            ->add('aduan_created_at', 'Dilaporkan Pada', 'text', false, $data_aduan['aduan_created_at'], 'style="width:100%;" ')
            ->output();
        $foto = "";
        foreach ($data_foto as $key => $value) {
            $foto .= '<div class="row"><div class="col-12"><img src="'.base_url("uploads/".$value['aduan_file_url']).'" class="img-thumbnail" /></div></div>';
        }
        if($foto==""){
            $foto = "<center><p>Tidak ada foto yang di upload.</p></center>";
        }
        $title_foto = "<h3><b>Foto yang di upload</b></h3>";
        return $resume . $title_foto . $foto;
    }

    public function valid($aduan_id)
    {
        $data['title'] = "Validasi Aduan";
        $data['content'] = $this->form_valid($aduan_id);
        return view('admin/aduan/valid', $data);
    }

    public function form_valid($aduan_id)
    {
        $form = new Form();
        $form->set_submit_label("Validasi")
            ->set_submit_icon("k-icon k-i-check")
            ->add('aduan_valid_note', 'Catatan', 'textArea', true, '', 'style="width:100%;" rows="10"')
            ->add('aduan_valid_kewenangan', 'Kewenangan', 'radio', true, '', 'style="width:100%;" rows="10"',[
                'table' => 'ref_kewenangan',
                'id'    => 'ref_kew_id',
                'label' => 'ref_kew_label'
            ]);
        if($form->formVerified()){
            $form_data = array(
                'aduan_status'=> 2,
                'aduan_valid'=> true,
                'aduan_valid_at'=> date("Y-m-d H:i:s"),
                'aduan_valid_by'=> $this->user['user_id'],
                'aduan_valid_note'=> nl2br($this->request->getPost('aduan_valid_note')),
                'aduan_valid_kewenangan'=> $this->request->getPost('aduan_valid_kewenangan')
            );
            $this->db->table("aduan")->where(['aduan_id'=>$aduan_id])->update($form_data);
            $this->db->table("aduan_history")->where(['history_aduan_id'=> $aduan_id, 'history_status'=> 2])->update([
                'history_created_at'=> date("Y-m-d H:i:s")
            ]);
            die(forceRedirect(base_url('/admin/aduan/')));
        }else{
            return $form->output();
        }
    }

    public function form_disposisi($aduan_id)
    {
        $form = new Form();
        $form->set_submit_label("Disposisikan")
            ->set_submit_icon("k-icon k-i-arrow-right")
            ->add('aduan_disposisi_dinas_id', 'Dinas', 'select', true, '', 'style="width:100%;" ', array(
                'table' => 'ref_dinas',
                'id'    => 'dinas_id',
                'label' => 'dinas_nama'
            ));
        if($form->formVerified()){
            $this->db->table("aduan")->where(['aduan_id'=> $aduan_id])->update([
                'aduan_status'=> 2,
                'aduan_disposisi_dinas_id'=> $this->request->getGet('aduan_disposisi_dinas_id'),
                'aduan_valid'=> true,
                'aduan_valid_at'=> date("Y-m-d H:i:s"),
                'aduan_valid_by'=> $this->user['user_id']
            ]);
            $this->db->table("aduan_history")->where(['history_aduan_id'=> $aduan_id, 'history_status'=> 2])->update([
                'history_created_at'=> date("Y-m-d H:i:s")
            ]);
            die('<script>window.parent.gridReload(); window.parent.$("#dialog").data("kendoWindow").close();</script>');
        }else{
            return $form->output();
        }
    }

    public function reject($aduan_id)
    {
        $this->db->table("aduan")->where(['aduan_id'=> $aduan_id])->update([
            'aduan_status'=> 99,
            'aduan_invalid'=> true,
            'aduan_invalid_at'=> date("Y-m-d H:i:s"),
            'aduan_invalid_by'=> $this->user['user_id']
        ]);
        die('<script>window.parent.gridReload(); window.parent.$("#dialog").data("kendoWindow").close();</script>');
    }
}
