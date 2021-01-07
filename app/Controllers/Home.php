<?php

namespace App\Controllers;

use App\Controllers\BaseController;
class Home extends BaseController
{
    public function index()
    {
        return view('frontend/home');
    }
    public function success($id)
    {
		$data = $this->db->table('aduan')->select('*')->getWhere(['aduan_id' => $id])->getRowArray();
        return view('frontend/success');
    }
}
