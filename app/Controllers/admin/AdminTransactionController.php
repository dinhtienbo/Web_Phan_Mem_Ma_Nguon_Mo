<?php

namespace App\Controllers\admin;
use App\Models\TransactionModelModel;
use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\OrderModel;


class AdminTransactionController extends BaseController
{
	private $transaction;
	private $orders;
	public function __construct()
    {
        parent::__construct();
		$this->orders = new OrderModel();
        $this->transaction= new TransactionModel();
        $this->transaction->protect(false);
    }

	public function index()
	{
		$data=null;
		$dataLayout['list'] = json_decode(json_encode($this->transaction->getList()), True); //Chuyển object thành mảng
        $data = $this ->loadMastLayout($data,"Trang quản lý giao dịch","admin/pages/transaction/list-transaction",$dataLayout,[],[]);
		return view('admin/main',$data);
	}

	public function View($id)
	{
		$data=null;
		$dataLayout['orders']=json_decode(json_encode( $this->orders->getAllId($id)), True);
		
        $data = $this ->loadMastLayout($data,"Trang quản lý đơn hàng","admin/pages/list-order",$dataLayout,[],[]);
		return view('admin/main',$data);
	
	}

	public function Delete($id)
    {
        $this->transaction->delete($id);
		$this->order->deleteTransaction($id);
        return redirect("admin/List-Transaction");
    }
}
