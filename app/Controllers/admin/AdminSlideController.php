<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;

class AdminSlideController extends BaseController
{
	public function index()
	{
		$data=null;
		$dataLayout=[];
        $data = $this ->loadMastLayout($data,"Trang quản lý slide","admin/pages/slide",$dataLayout,[],[]);
		return view('admin/main',$data);
	}
}
