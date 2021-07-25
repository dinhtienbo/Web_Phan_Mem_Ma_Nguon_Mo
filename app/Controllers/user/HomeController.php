<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
		
        $data=null;
        $data = $this ->loadUserLayout($data,"Trang chủ","user/pages/index",'user/layout/left-menu',"user/layout/slide");
		return view('user\main',$data);
	}
}
