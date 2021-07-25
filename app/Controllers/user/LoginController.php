<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
	public function login()
	{
		
        $data=null;
        $data = $this ->loadUserLayout($data,"Đăng nhập - Đăng ký","user/pages/login","","");
		return view('user\main',$data);
	}
}
