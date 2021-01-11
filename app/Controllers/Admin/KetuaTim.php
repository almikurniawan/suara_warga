<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\SmartComponent\Grid;
use App\Libraries\SmartComponent\Form;

class KetuaTim extends BaseController
{
    public function index()
    {
        $data['content']   = $this->grid();
        $data['title']  = 'Aduan Ditinjau';

        return view('admin/ketuatim/list', $data);
    }

    public function grid()
    {
        $SQL = "select *, aduan_id as id from aduan";

        $action['detail']     = array(
            'link'          => 'admin/ketuatim/detail/'
        );

        $grid = new Grid();
        return $grid->set_query($SQL,[
            ['aduan_status', 2, '=']
        ])
            ->set_sort(array('id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/ketuatim/grid?datasource&" . get_query_string()),
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
        return view('admin/ketuatim/detail', $data);
    }

    private function resume($id)
    {
        $data_aduan = $this->db->query("select *, aduan_id as id, '<b>Nama</b> : '||aduan_nama||'<br/><b>Telp</b> : '||aduan_telp||'<br/><b>NIK</b> : '||aduan_nik as pelapor from aduan where aduan_id =  ".$id)->getRowArray();
        $data_foto = $this->db->table("aduan_file")->where(['aduan_file_aduan_id'=> $id])->Get()->getResultArray();
        $form = new Form();
        $resume = $form->set_resume(true)
            ->add('aduan_pesan', 'Aduan Pesan', 'textArea', false, $data_aduan['aduan_pesan'], 'style="width:100%;" ')
            ->add('aduan_nama', 'Nama', 'text', false, $data_aduan['aduan_nama'], 'style="width:100%;" ')
            ->add('aduan_telp', 'Telp', 'text', false, $data_aduan['aduan_telp'], 'style="width:100%;" ')
            ->add('aduan_nik', 'NIK', 'text', false, $data_aduan['aduan_nik'], 'style="width:100%;" ')
            ->add('aduan_created_at', 'Dilaporkan Pada', 'text', false, $data_aduan['aduan_created_at'], 'style="width:100%;" ')
            ->add('aduan_valid_note', 'Keterangan TIM', 'textArea', false, $data_aduan['aduan_valid_note'], 'style="width:100%;" ')
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

    public function disposisi($aduan_id)
    {
        $data['title'] = "Disposisi Aduan";
        $data['content'] = $this->form_disposisi($aduan_id);
        return view('admin/ketuatim/disposisi', $data);
    }

    public function form_disposisi($aduan_id)
    {
        $form = new Form();
        $form->set_submit_label("Disposisikan")
            ->set_submit_icon("k-icon k-i-arrow-right")
            ->add('dinas', 'Dinas', 'select_multiple', true, [], 'style="width:100%;" ', array(
                'table' => 'ref_dinas',
                'id'    => 'dinas_id',
                'label' => 'dinas_nama'
            ));
        if($form->formVerified()){
            $dinas = $this->request->getPost('dinas');
            $this->db->table("aduan")->where(['aduan_id'=> $aduan_id])->update([
                'aduan_status'=> 3,
                'aduan_valid'=> true,
                'aduan_valid_at'=> date("Y-m-d H:i:s"),
                'aduan_valid_by'=> $this->user['user_id']
            ]);
            $this->db->table("aduan_disposisi")->where(['aduan_dis_aduan_id'=> $aduan_id])->delete();
            foreach ($dinas as $key => $value) {
                $this->db->table("aduan_disposisi")->insert([
                    'aduan_dis_aduan_id'=> $aduan_id,
                    'aduan_dis_dinas_id'=> $value,
                ]);
            }
            $this->db->table("aduan_history")->where(['history_aduan_id'=> $aduan_id, 'history_status'=> 3])->update([
                'history_created_at'=> date("Y-m-d H:i:s"),
            ]);
            die(forceRedirect(base_url('/admin/ketuatim/')));
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
