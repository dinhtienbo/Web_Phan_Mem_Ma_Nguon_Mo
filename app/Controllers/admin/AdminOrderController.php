<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;

class AdminOrderController extends BaseController
{
	public function index()
	{
		$data=null;
		$dataLayout=[];
        $data = $this ->loadMastLayout($data,"Trang quản lý đơn hàng","admin/pages/list-order",$dataLayout,[],[]);
		return view('admin/main',$data);
	}
}
