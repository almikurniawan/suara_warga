<?php

namespace App\Controllers;

use App\Controllers\BaseController;
class Pencarian extends BaseController
{
    public function index()
    {
        return view('frontend/pencarian');
    }

    public function list()
    {
        $nik = $this->request->getGet('nik');
        $data = $this->db->query("SELECT
                                        * 
                                    FROM
                                        aduan
                                        left join ref_status on status_id = aduan_status where aduan_nik='".$nik."' order by aduan_created_at desc")->getResultArray();
        return view('frontend/pencarian_result',[
            'data'=> $data
        ]);
    }

    public function detail($id)
    {
        $data['aduan'] = $this->db->table("aduan")->join("ref_status","status_id=aduan_status")->where(['aduan_id'=> $id])->get()->getRowArray();
        if(empty($data['aduan'])){
            return redirect()->to(base_url("pencarian"));
        }
        $data['histori'] = $this->db->query("select *, case when history_status = 3 then (SELECT string_agg(dinas_nama, '<br/>') FROM aduan_disposisi left join ref_dinas on dinas_id = aduan_disposisi.aduan_dis_dinas_id where aduan_dis_aduan_id=".$id.") else '' end as dinas from aduan_history where history_aduan_id=".$id." order by history_status asc")->getResultArray();
        return view('frontend/pencarian_detail', $data);
    }
}
