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
        $SQL = "select *, aduan_id as id, substring(aduan_pesan from 0 for 50)||'...' as pesan from aduan";

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
                    'url_row_onclick'=> base_url("admin/aduan/detail")
                )
            )->output();
    }

    public function ditinjau()
    {
        $data['content']   = $this->gridTinjau();
        $data['title']  = 'Aduan Ditinjau';
        return view('admin/aduan/list', $data);
    }

    public function gridTinjau()
    {
        $SQL = "select *, aduan_id as id from aduan";

        $grid = new Grid();
        return $grid->set_query($SQL,[
            ['aduan_status', 2, '=']
        ])
            ->set_sort(array('id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/aduan/gridTinjau?datasource&" . get_query_string()),
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
                )
            )->output();
    }

    public function eksekusi()
    {
        $data['content']   = $this->gridEksekusi();
        $data['title']  = 'Aduan Dieksekusi';
        return view('admin/aduan/list', $data);
    }

    public function gridEksekusi()
    {
        $SQL = "select *, aduan_id as id from aduan";

        $grid = new Grid();
        return $grid->set_query($SQL,[
            ['aduan_status', 4, '=']
        ])
            ->set_sort(array('id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/aduan/gridEksekusi?datasource&" . get_query_string()),
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
                )
            )->output();
    }

    public function selesai()
    {
        $data['content']   = $this->gridSelesai();
        $data['title']  = 'Aduan Selesai';
        return view('admin/aduan/list', $data);
    }

    public function gridSelesai()
    {
        $SQL = "select *, aduan_id as id from aduan";

        $grid = new Grid();
        return $grid->set_query($SQL,[
            ['aduan_status', 5, '=']
        ])
            ->set_sort(array('id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/aduan/gridSelesai?datasource&" . get_query_string()),
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
            ->add('aduan_pesan', 'Pesan Aduan', 'textArea', false, $data_aduan['aduan_pesan'], 'style="width:100%;" ')
            ->add('aduan_nama', 'Nama Lengkap', 'text', false, $data_aduan['aduan_nama'], 'style="width:100%;" ')
            ->add('aduan_telp', 'Nomor Telpon', 'text', false, '<span style="cursor:pointer;" onclick="wa(\''.$data_aduan['aduan_telp'].'\')" class="badge bg-info text-light">'.$data_aduan['aduan_telp'].'</span>', 'style="width:100%;" ')
            ->add('aduan_nik', 'NIK', 'text', false, $data_aduan['aduan_nik'], 'style="width:100%;" ')
            ->add('aduan_created_at', 'Tanggal Laporan Masuk', 'text', false, $data_aduan['aduan_created_at'], 'style="width:100%;" ')
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

    public function view($id)
    {
        $data['title'] = "Detail Aduan";
        $data['content'] = $this->resume($id);
        $data['id'] = $id;
        $data['url_back'] = ($this->request->getGet('step')==1 ? base_url("admin/aduan/valid/" . $id ) : base_url("admin/aduan/validStep2/" . $id ));
        return view('admin/aduan/view', $data);
    }

    public function valid($aduan_id)
    {
        $aduan = $this->db->table('aduan')->where(['aduan_id'=> $aduan_id])->get()->getRowArray();
        $data['content'] = $this->form_valid($aduan, $aduan_id);
        $data['tanggal'] = $aduan['aduan_created_at'];
        $data['aduan_id'] = $aduan_id;
        return view('admin/aduan/valid', $data);
    }

    public function form_valid($aduan, $aduan_id)
    {
        $form = new Form();
        $form->set_submit_label("Next")
            ->set_submit_icon("k-icon k-i-arrow-right")
            ->set_resume(true)
            ->add('aduan_pesan', 'Pesan', 'textArea', false, $aduan['aduan_pesan'], 'style="width:100%;" rows="10"')
            ->set_resume(false)
            ->add('aduan_valid_judul', 'Judul Aduan', 'text', true, '', 'style="width:100%;" rows="10"')
            ->add('aduan_valid_note', 'Catatan', 'textArea', true, '', 'style="width:100%;" rows="10"')
            ->add('aduan_valid_kewenangan', 'Kewenangan', 'radio', true, '', 'style="width:100%;" rows="10"',[
                'table' => 'ref_kewenangan',
                'id'    => 'ref_kew_id',
                'label' => 'ref_kew_label'
            ]);
        if($form->formVerified()){
            $form_data = array(
                'aduan_valid_note'=> nl2br($this->request->getPost('aduan_valid_note')),
                'aduan_valid_kewenangan'=> $this->request->getPost('aduan_valid_kewenangan'),
                'aduan_valid_judul'=> $this->request->getPost('aduan_valid_judul'),
            );
            $this->db->table("aduan")->where(['aduan_id'=>$aduan_id])->update($form_data);
            die(forceRedirect(base_url('/admin/aduan/validStep2/'.$aduan_id)));
        }else{
            return $form->output();
        }
    }

    public function validStep2($aduan_id)
    {
        $aduan = $this->db->table('aduan')->where(['aduan_id'=> $aduan_id])->get()->getRowArray();
        if($aduan['aduan_valid_kewenangan']>=2){
            $data['content'] = $this->form_valid_step2_provinsi($aduan, $aduan_id);
        }else{
            $data['content'] = $this->form_valid_step2($aduan, $aduan_id);
        }
        $data['tanggal'] = $aduan['aduan_created_at'];
        $data['aduan_id'] = $aduan_id;
        return view('admin/aduan/valid_step2', $data);
    }

    public function form_valid_step2($aduan, $aduan_id)
    {
        $form = new Form();
        $form->set_submit_label("Simpan")
            ->set_submit_icon("k-icon k-i-save")
            ->set_resume(true)
            ->add('aduan_pesan', 'Pesan', 'textArea', false, $aduan['aduan_pesan'], 'style="width:100%;" rows="10"')
            ->add('aduan_valid_kewenangan', 'Kewenangan', 'select', false, $aduan['aduan_valid_kewenangan'], 'style="width:100%;"',[
                'table'=> 'ref_kewenangan',
                'id'=> 'ref_kew_id',
                'label'=> 'ref_kew_label'
            ])
            ->set_resume(false)
            ->add('dinas', 'Dinas yang berwenang', 'select_multiple', true, [], 'style="width:100%;" ', array(
                'table' => 'ref_dinas',
                'id'    => 'dinas_id',
                'label' => 'dinas_nama'
            ))
            ->add('aduan_valid_koordinasi', 'Koordinasi Dengan', 'text', true, '', 'style="width:100%;" rows="10"')
            ->add('aduan_valid_jenis_bantuan', 'Jenis Eksekusi Bantuan', 'text', true, '', 'style="width:100%;" rows="10"');
        if($form->formVerified()){
            $this->db->table("aduan")->where(['aduan_id'=> $aduan_id])->update([
                'aduan_status'=> 2,
                'aduan_valid'=> true,
                'aduan_valid_at'=> date("Y-m-d H:i:s"),
                'aduan_valid_by'=> $this->user['user_id'],
                'aduan_valid_koordinasi'=> $this->request->getPost('aduan_valid_koordinasi'),
                'aduan_valid_jenis_bantuan'=> $this->request->getPost('aduan_valid_jenis_bantuan'),
            ]);
            $this->db->table("aduan_disposisi")->where(['aduan_dis_aduan_id'=> $aduan_id])->delete();
            $dinas = $this->request->getPost('dinas');

            foreach ($dinas as $key => $value) {
                $this->db->table("aduan_disposisi")->insert([
                    'aduan_dis_aduan_id'=> $aduan_id,
                    'aduan_dis_dinas_id'=> $value,
                ]);
            }
            $this->db->table("aduan_history")->where(['history_aduan_id'=> $aduan_id, 'history_status'=> 2])->update([
                'history_created_at'=> date("Y-m-d H:i:s")
            ]);
            die(forceRedirect(base_url('/admin/aduan/')));
        }else{
            return $form->output();
        }
    }

    public function form_valid_step2_provinsi($aduan, $aduan_id)
    {
        $form = new Form();
        $form->set_submit_label("Simpan")
            ->set_submit_icon("k-icon k-i-save")
            ->set_resume(true)
            ->add('aduan_pesan', 'Pesan', 'textArea', false, $aduan['aduan_pesan'], 'style="width:100%;" rows="10"')
            ->add('aduan_valid_kewenangan', 'Kewenangan', 'select', false, $aduan['aduan_valid_kewenangan'], 'style="width:100%;"',[
                'table'=> 'ref_kewenangan',
                'id'=> 'ref_kew_id',
                'label'=> 'ref_kew_label'
            ])
            ->set_resume(false)
            ->add('aduan_valid_koordinasi', 'Koordinasi Dengan', 'text', true, '', 'style="width:100%;" rows="10"')
            ->add('aduan_valid_jenis_bantuan', 'Jenis Eksekusi Bantuan', 'text', true, '', 'style="width:100%;" rows="10"');
        if($form->formVerified()){
            $this->db->table("aduan")->where(['aduan_id'=> $aduan_id])->update([
                'aduan_status'=> 2,
                'aduan_valid'=> true,
                'aduan_valid_at'=> date("Y-m-d H:i:s"),
                'aduan_valid_by'=> $this->user['user_id'],
                'aduan_valid_koordinasi'=> $this->request->getPost('aduan_valid_koordinasi'),
                'aduan_valid_jenis_bantuan'=> $this->request->getPost('aduan_valid_jenis_bantuan'),
            ]);
            $this->db->table("aduan_disposisi")->where(['aduan_dis_aduan_id'=> $aduan_id])->delete();
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
