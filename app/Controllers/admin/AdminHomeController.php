<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;

class AdminHomeController extends BaseController
{
	public function index()
	{
		$data=[];
		$dataLayout = [];
        $data = $this ->loadMastLayout($data,"Trang quản lý","admin/pages/index",$dataLayout,[],[]);
		return view('admin/main',$data);
	}

}
