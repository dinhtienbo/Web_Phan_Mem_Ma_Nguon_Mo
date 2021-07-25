<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;

class ProductDetailController extends BaseController
{
	public function productdetail()
	{	
        $data=null;
        $data = $this ->loadUserLayout($data,"Chi tiết sản phẩm","user/pages/product-detail","user/layout/left-menu","");
		return view('user\main',$data);
	}
}
