<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;

class CartController extends BaseController
{
	public function cart()
	{
		
        $data=null;
        $data = $this ->loadUserLayout($data,"Giỏ hàng","user/pages/cart","","");
		return view('user\main',$data);
	}
}
