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
        $data['title']  = 'List Laporan Masuk';

        return view('admin/ketuatim/list', $data);
    }

    public function grid()
    {
        $SQL = "select *, aduan_id as id, substring(aduan_pesan from 0 for 50)||'...' as pesan from aduan";

        $grid = new Grid();
        return $grid->set_query($SQL,[
            ['aduan_status', 1, '=']
        ])
            ->set_sort(array('id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/ketuaTim/grid?datasource&" . get_query_string()),
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

    public function ditinjau()
    {
        $data['content']   = $this->gridDitinjau();
        $data['title']  = 'List Laporan Masuk';

        return view('admin/ketuatim/list', $data);
    }

    public function gridDitinjau()
    {
        $SQL = "select *, aduan_id as id, substring(aduan_pesan from 0 for 50)||'...' as pesan from aduan";

        $grid = new Grid();
        return $grid->set_query($SQL,[
            ['aduan_status', 2, '=']
        ])
            ->set_sort(array('id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/ketuaTim/gridDitinjau?datasource&" . get_query_string()),
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
                    'url_row_onclick'=> base_url("admin/ketuaTim/detail")
                )
            )->output();
    }

    public function selesai()
    {
        $data['content']   = $this->gridSelesai();
        $data['title']  = 'List Laporan Masuk';

        return view('admin/ketuatim/list', $data);
    }

    public function gridSelesai()
    {
        $SQL = "select *, aduan_id as id, substring(aduan_pesan from 0 for 50)||'...' as pesan from aduan";

        $grid = new Grid();
        return $grid->set_query($SQL,[
            ['aduan_status', 5, '=']
        ])
            ->set_sort(array('id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/ketuaTim/gridSelesai?datasource&" . get_query_string()),
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

    public function eksekusi()
    {
        $data['content']   = $this->gridEksekusi();
        $data['title']  = 'List Laporan Masuk';

        return view('admin/ketuatim/list', $data);
    }

    public function gridEksekusi()
    {
        $SQL = "select *, aduan_id as id, substring(aduan_pesan from 0 for 50)||'...' as pesan from aduan";

        $grid = new Grid();
        return $grid->set_query($SQL,[
            ['aduan_status', 4, '=']
        ])
            ->set_sort(array('id', 'desc'))
            ->configure(
                array(
                    'datasouce_url' => base_url("admin/ketuaTim/gridEksekusi?datasource&" . get_query_string()),
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

    public function fullbacket($id)
    {
        $data['title'] = "Full Baket";
        $data['content'] = $this->resumeFullbaket($id);
        $data['id'] = $id;
        return view('admin/ketuatim/validasi', $data);
    }

    private function resumeFullbaket($id)
    {
        $data_aduan = $this->db->query("select * from aduan where aduan_id =  ".$id)->getRowArray();
        $form = new Form();
        $resume = $form->set_resume(true)
            ->add('aduan_pesan', 'Pesan Aduan', 'textArea', false, $data_aduan['aduan_pesan'], 'style="width:100%;" ')
            ->add('aduan_nama', 'Nama Lengkap', 'text', false, $data_aduan['aduan_nama'], 'style="width:100%;" ')
            ->add('aduan_valid_judul', 'Judul', 'text', false, $data_aduan['aduan_valid_judul'], 'style="width:100%;" ')
            ->add('aduan_valid_note', 'Full Baket', 'textArea', false, $data_aduan['aduan_valid_note'], 'style="width:100%;" ')
            ->add('aduan_valid_kewenangan', 'Kewenangan', 'select', false, $data_aduan['aduan_valid_kewenangan'], 'style="width:100%;" ',[
                'table'=> 'ref_kewenangan',
                'id'=> 'ref_kew_id',
                'label'=> 'ref_kew_label'
            ]);
        if($data_aduan['aduan_valid_kewenangan']==1){
            $dinas = $this->db->query("SELECT aduan_dis_dinas_id FROM aduan_disposisi WHERE aduan_dis_aduan_id = ".$id)->getResultArray();
            $data_dinas = [];
            foreach ($dinas as $key => $value) {
                $data_dinas[] = $value['aduan_dis_dinas_id'];
            }
            $resume->add('dinas', 'Dinas yang berwenang', 'select_multiple', false, $data_dinas, 'style="width:100%;" ',[
                'table'=> 'ref_dinas',
                'id'=> 'dinas_id',
                'label'=> 'dinas_nama'
            ]);
        }
        $form
        ->add('aduan_valid_koordinasi', 'Koordinasi Dengan', 'text', false, $data_aduan['aduan_valid_koordinasi'], 'style="width:100%;" ')
        ->add('aduan_valid_jenis_bantuan', 'Jenis Bantuan', 'text', false, $data_aduan['aduan_valid_jenis_bantuan'], 'style="width:100%;" ');
        return $resume->output();
    }

    public function setujui($id)
    {
        $dataUpdate = array(
            'aduan_status'=> 3,
            'aduan_approved'=> true,
            'aduan_approved_by'=> $this->user['user_id'],
            'aduan_approved_at'=> date("Y-m-d H:i:s")
        );
        $this->db->table("aduan")->where(['aduan_id'=> $id])->update($dataUpdate);
        $this->db->table("aduan_history")->where(['history_aduan_id'=> $id, 'history_status'=> 3])->update([
            'history_created_at'=> date("Y-m-d H:i:s")
        ]);
        return redirect()->to(base_url("admin/ketuaTim"));
    }

    public function tolak($id)
    {
        $data['title'] = "Tolak";
        $data['content'] = $this->formTolak($id);
        $data['id'] = $id;
        
        return view('admin/ketuatim/tolak', $data);
    }

    public function formTolak($id)
    {
        $data_aduan = $this->db->query("select * from aduan where aduan_id =  ".$id)->getRowArray();
        $form = new Form();
        $form->add('aduan_rejected_note', 'Alasan', 'textArea', false, $data_aduan['aduan_rejected_note'], 'style="width:100%;" ');
        if($form->formVerified()){
            $dataUpdate = array(
                'aduan_status'=> 99,
                'aduan_rejected'=> true,
                'aduan_rejected_by'=> $this->user['user_id'],
                'aduan_rejected_at'=> date("Y-m-d H:i:s"),
                'aduan_rejected_note'=> $this->request->getPost('aduan_rejected_note')
            );
            $this->db->table("aduan")->where(['aduan_id'=> $id])->update($dataUpdate);
            die(forceRedirect(base_url('/admin/ketuaTim/')));
        }else{
            return $form->output();
        }
    }
}
