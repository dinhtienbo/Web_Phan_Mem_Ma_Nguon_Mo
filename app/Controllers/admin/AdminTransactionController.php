<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;

class AdminTransactionController extends BaseController
{
	public function index()
	{
		$data=null;
		$dataLayout=[];
        $data = $this ->loadMastLayout($data,"Trang quản lý giao dịch","admin/pages/list-transaction",$dataLayout,[],[]);
		return view('admin/main',$data);
	}
}
