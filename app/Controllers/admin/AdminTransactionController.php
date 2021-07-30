<?php

namespace App\Controllers\admin;
use App\Models\TransactionModelModel;
use App\Controllers\BaseController;
use App\Models\TransactionModel;

class AdminTransactionController extends BaseController
{
	private $transaction;
	public function __construct()
    {
        parent::__construct();
        $this->transaction= new TransactionModel();
        $this->transaction->protect(false);
    }

	public function index()
	{
		$data=null;
		$dataLayout['list'] = json_decode(json_encode($this->transaction->getList()), True); //Chuyển object thành mảng
        $data = $this ->loadMastLayout($data,"Trang quản lý giao dịch","admin/pages/list-transaction",$dataLayout,[],[]);
		return view('admin/main',$data);
	}
}
