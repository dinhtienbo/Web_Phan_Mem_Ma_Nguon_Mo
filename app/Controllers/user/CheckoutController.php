<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;

class CheckoutController extends BaseController
{
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
}
