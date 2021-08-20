<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\OrderModel;

class AccountController extends BaseController
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

        $session =session();
        $user = array_values(session('login'));
        
        $dataLayout['transactions']=json_decode(json_encode($this->transaction->getUserId($user['0'])), True);;
        $data=null;
        $data = $this ->loadUserLayout($data,"Tài khoản","user/pages/account","","",$dataLayout);
		return view('user\main',$data);
	}

    public function view($id)
    {
        $dataLayout['items']=json_decode(json_encode( $this->orders->getAllId($id)), True);
        $data=null;
       
        $data = $this ->loadUserLayout($data,"Tài khoản","user/pages/viewtransaction","","",$dataLayout);
		return view('user\main',$data);
    }
}