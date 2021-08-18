<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\OrderModel;

class AdminHomeController extends BaseController
{

	private $transaction;
	private $orders;
	private $users;
	private $products;
	public function __construct()
    {
        parent::__construct();
		$this->orders = new OrderModel();
        $this->transaction= new TransactionModel();
        $this->transaction->protect(false);

		$this->users = new UserModel();
		$this->products = new ProductModel();
    }

	public function index()
	{
		$data=[];
		$dataLayout = [];

		$dataLayout['transactions'] = json_decode(json_encode($this->transaction->getList()), True);
		$transaction = json_decode(json_encode($this->transaction->getList()), True);
		$totalAll = 0;
		$totalDay = 0;
		$totalMonth = 0;

		$date = getdate();
		foreach($transaction as $row)
		{
			$totalAll+=(float)$row['amount'];
			$mang = explode("-",$row['created']);
			if($mang['0']== (string)$date['year'])
				if($mang['1']==(string)$date['mon'])
				{
					$totalMonth+=(float)$row['amount'];
					$mangday = explode(" ",$mang['2']);
					if($mangday['0'] == (string)$date['mday'])
						$totalDay+=(float)$row['amount'];
				}
		}
		$dataLayout['totalAll'] = $totalAll;
		$dataLayout['totalDay'] = $totalDay;
		$dataLayout['totalMonth'] = $totalMonth;
		$dataLayout['products'] = json_decode(json_encode($this->products->getList()), True);
		$dataLayout['users'] = json_decode(json_encode($this->users->getList()), True);

        $data = $this ->loadMastLayout($data,"Trang quản lý","admin/pages/index",$dataLayout,[],[]);
		return view('admin/main',$data);
	}

}
