<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;

class ProductController extends BaseController
{
	public function product()
	{	
        $data=null;
        $data = $this ->loadUserLayout($data,"Danh sách sản phẩm","user/pages/product","user/layout/left-menu","user/layout/slide");
		return view('user\main',$data);
	}
}
