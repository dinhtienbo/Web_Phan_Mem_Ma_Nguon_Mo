<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;
Use App\Common\ResultUtils;
use Exception;
use App\Models\AdminModel;
use App\Service\user\UserService;

class LoginController extends BaseController
{
    /**
	 * @var Service;
	 */

	private $service;
    private $users;

    public function __construct()
	{
		$this->service = new UserService();
	}


	public function login()
	{
		
        $data=null;
        $data = $this ->loadUserLayout($data,"Đăng nhập - Đăng ký","user/pages/login","","");
		return view('user\main',$data);
	}

	public function checklogin()
	{
        $resul = $this->service->check($this->request);
       
        $data=null;
        if($resul['status']==ResultUtils::STATUS_CODE_OK)
        {
            return redirect('/');
        }
        else 
        {
            return redirect('login')->with($resul['messageCode'],$resul['messages']);
        }
	}

	
}
