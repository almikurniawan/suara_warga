<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function index()
    {
        return view('frontend/laporan');
    }

    public function lapor()
    {
        helper(['form', 'url']);
        $input = $this->validate([
            'nik'   => 'required|min_length[16]',
            'nama'  => 'required',
            'no_hp' => 'required|numeric|min_length[10]|max_length[14]',
            'laporan'=> 'required|min_length[5]'
        ]);
 
        if (!$input) {
            return view('frontend/laporan', [
                'validation' => $this->validator,
            ]);
        }else{
            //save
            $this->db->table("aduan")->insert(array(
                'aduan_nik'     => $this->request->getPost('nik'),
                'aduan_nama'    => $this->request->getPost('nama'),
                'aduan_telp'    => $this->request->getPost('no_hp'),
                'aduan_pesan'   => $this->request->getPost('laporan'),
                'aduan_status'  => 1,
                'aduan_created_at'=> date("Y-m-d H:i:s"),
                'aduan_date'    => date("Y-m-d")
            ));
            $id = $this->db->insertID();
            $file = $this->request->getFile('files');
            if ($file->getName() != '') {
                $ext = $file->getClientExtension();
                $name = $file->getName();
                $name = $file->getRandomName() . "." . $ext;
                if ($file->move('./uploads/', $name)) {
                    $this->db->table("aduan_file")->insert([
                        'aduan_file_aduan_id'=> $id,
                        'aduan_file_url' => $name
                    ]);
                }
            }
            $this->db->table("aduan_history")->insert([
                'history_aduan_id'=> $id,
                'history_status' => 1,
                'history_status_text' => 'Laporan Diterima CS',
                'history_created_at'=> date("Y-m-d H:i:s")
            ]);
            $this->db->table("aduan_history")->insert([
                'history_aduan_id'=> $id,
                'history_status' => 2,
                'history_status_text' => 'Proses validasi oleh tim',
            ]);
            $this->db->table("aduan_history")->insert([
                'history_aduan_id'=> $id,
                'history_status' => 3,
                'history_status_text' => 'Laporan valid',
            ]);
            $this->db->table("aduan_history")->insert([
                'history_aduan_id'=> $id,
                'history_status' => 4,
                'history_status_text' => 'Konfirmasi eksekusi',
            ]);
            return redirect()->to(base_url("home/success/".$id));
        }
    }
}
