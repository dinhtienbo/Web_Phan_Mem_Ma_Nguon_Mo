<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;

class CheckoutController extends BaseController
{
	public function checkout()
	{
		
        $data=null;
        $data = $this ->loadUserLayout($data,"Thủ tục thanh toán","user/pages/checkout","","");
		return view('user\main',$data);
	}
}
