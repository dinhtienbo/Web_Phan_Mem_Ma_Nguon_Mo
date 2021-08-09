<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;
use App\Models\OderModel;
use CodeIgniter\I18n\Time;
use App\Models\OrderModel;
use App\Models\TransactionModel;


class CheckoutController extends BaseController
{

	private $order;
    private $transaction;
	public function __construct()
    {
        parent::__construct();
        $this->order = new OrderModel();
        $this->transaction = new TransactionModel();
     
    }

	public function checkout()
	{
		
        $data=null;
		$total = 0;
		$items = array_values(session('cart'));
		foreach($items as $item)
		{
			$total+=($item['price']*$item['qty']);
		}
		$dataLayout['items'] = array_values(session('cart'));
		$dataLayout['total'] = $total;
        $data = $this ->loadUserLayout($data,"Thủ tục thanh toán","user/pages/checkout","","",$dataLayout);
		return view('user\main',$data);
	}

	public function thanhtoan()
	{
		$total = 0;
		$items = array_values(session('cart'));
		foreach($items as $item)
		{
			$total+=($item['price']*$item['qty']);
		}
		$session = session();
		$user = $session->get('login');
		
		
		$time = new Time('now', 'Asia/Ho_Chi_Minh');
        $time = $time->format('Y-m-d H:i:s');

		if($user){
			$data = array(
				'status'   => 0, //trang thai chua thanh toan
				'user_id'  => $user['id'], //id thanh vien mua hang neu da dang nhap
				'user_email'    => $user['email'],
				'user_name'     => $user['name'],
				'user_phone'    => $user['phone'],
				'message'       => '', //ghi chú khi mua hàng
				'amount'        => $total,//tong so tien can thanh toan
				'payment'       => $this->request->getPost('payment'), //cổng thanh toán,
				'created' => $time,

			);
		}
		else
			$data = array(
				'status'   => 0, //trang thai chua thanh toan
				'user_id'  => "", //id thanh vien mua hang neu da dang nhap
				'user_email'    => $this->request->getPost('email'),
				'user_name'     => $this->request->getPost('name'),
				'user_phone'    => $this->request->getPost('phone'),
				'message'       => $this->request->getPost('message'), //ghi chú khi mua hàng
				'amount'        => $total,//tong so tien can thanh toan
				'payment'       => $this->request->getPost('payment'), //cổng thanh toán,
				'created' => $time,

			);
		$this->transaction->create($data);
		//Lấy id transaction vừa tạo
		$transaction_id =$this->transaction->insertID();
		foreach($items as $item)
		{
			$dataoOder = array(
				'transaction_id' =>$transaction_id,
				'product_id' =>$item['id'],
				'qty' =>$item['qty'],
				'amount'=>$item['qty']*$item['price'],
				'status' =>0,
			);
			$this->order->create($dataoOder);
		}
		$session->remove('cart');
		return redirect('/');
	}
}
