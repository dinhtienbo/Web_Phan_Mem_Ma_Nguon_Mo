<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\ProductModel;

class AdminOrderController extends BaseController
{
	private $orders;
	private $products;

    public function __construct()
    {
        parent::__construct();
        $this->orders = new OrderModel();
        $this->orders->protect(false);

		$this->products = new ProductModel();
    }



	public function index()
	{
		$data=null;
		$dataLayout['orders']=json_decode(json_encode( $this->orders->getAll()), True);
        $data = $this ->loadMastLayout($data,"Trang quản lý đơn hàng","admin/pages/list-order",$dataLayout,[],[]);
		return view('admin/main',$data);
	}

	public function Search()
	{
		$data = [];
		$dataLayout=[];
		$dataLayout['orders'] = json_decode(json_encode($this->transaction->Search($this->request->getPost('id'),$this->request->getPost('user'))), True); //Chuyển object thành mảng

		$data = $this ->loadMastLayout($data,"Trang quản lý đơn hàng","admin/pages/list-order",$dataLayout,[],[]);
		return view('admin/main',$data);
	}
}
