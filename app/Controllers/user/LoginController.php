<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;
use Exception;
use App\Models\AdminModel;
use App\Models\UserModel;
Use App\Common\ResultUtils;


class LoginController extends BaseController
{
    
    private $users;
    private $admins;

    public function __construct()
	{
        parent::__construct();
        $this->admins = new AdminModel();
        $this->admins->protect(false);

        $this->users = new UserModel();
        $this->users->protect(false);
	}


	public function login()
	{
		$session =session();
        if($session->has('loginAdmin')){
            return redirect('admin');
        }
        $session =session();
        if($session->has('login')){
            return redirect('');
        }

        $data=null;
        $data = $this ->loadUserLayout($data,"Đăng nhập - Đăng ký","user/pages/login","","");
		return view('user\main',$data);
	}

	public function checklogin()
	{
        $resul = $this->checkUser($this->request);
       
        $data=null;
        if($resul['status']==ResultUtils::STATUS_CODE_OK)
        {
            return redirect('/');
        }
        else if($resul['status']==null)
        {
            return redirect('admin');
        }
        else 
        {
            return redirect('login')->with($resul['messageCode'],$resul['messages']);
        }
	}

    public function checkUser($requestData)
    {
        //Check dữ liệu vào
        // $validate = $this->Check($requestData);
        // if($validate ->getErrors()){
        //     return[
        //         'status'=>ResultUtils::STATUS_CODE_ERR,
        //         'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
        //         'messages'=>$validate ->getErrors(),
        //     ];
        // }

        $params=$requestData->getPost();
        $dataUser =json_decode(json_encode( $this->users->getEmail($params['email'])), True);
        $dataAdmin =json_decode(json_encode( $this->admins->getEmail($params['email'])), True);
        if(!$dataUser && !$dataAdmin)
        {
            return[
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'messages'=>['noExist'=>'Email chưa được đăng ký!'],
            ];
        }
        if($dataUser)
            if(md5($params['password'])!= $dataUser['password']){
                return[
                    'status'=>ResultUtils::STATUS_CODE_ERR,
                    'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                    'messages'=>['wrongPass'=>'Mật khẩu không đúng!'],
                ];
            }
            else{
                $session = session();
                unset($dataUser['password']);
                $session ->set('login',$dataUser);
            }

        //Admin
        if($dataAdmin)
            if(md5($params['password'])!= $dataAdmin['password']){
                return[
                    'status'=>ResultUtils::STATUS_CODE_ERR,
                    'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                    'messages'=>['wrongPass'=>'Mật khẩu không đúng!'],
                ];
            }
            else{
                $session = session();
                unset($dataAdmin['password']);
                $session ->set('loginAdmin',$dataAdmin);

                return[
                    'status'=>null,
                    'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
                    'messages'=>null,
                ];
            }    

        return[
            'status'=>ResultUtils::STATUS_CODE_OK,
            'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
            'messages'=>null,
        ];
    }


    public function checkAdmin($requestData)
    {

        $params=$requestData->getPost();
        $dataAdmin =json_decode(json_encode( $this->admins->getEmail($params['email'])), True);
        if(!$dataAdmin)
        {
            return[
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'messages'=>['noExist'=>'Email chưa được đăng ký!'],
            ];
        }
        if(md5($params['password'])!= $dataAdmin['password']){
            return[
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'messages'=>['wrongPass'=>'Mật khẩu không đúng!'],
            ];
        }

        $session = session();
        unset($dataAdmin['password']);
        $session ->set('login_user',$dataAdmin);

        return[
            'status'=>ResultUtils::STATUS_CODE_OK,
            'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
            'messages'=>null,
        ];
    }


    private function Check($requestData)
    {
        $rule = [
            'email' => '|valid_email|',
            'password' => 'max_length[30]|min_length[6]',
        ];
        $message = [
            'email' => [
                'valid_email'=>'Không giống định dạng email!',
            ],

            'password' => [
                'max_length' => 'Password quá dài, vui lòng nhập {param} ký tự!',
                'min_length' => 'Password quá ngắn, vui lòng nhập {param} ký tự!',
            ],

            
        ];

        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

	
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect('login');
    }

    public function registration()
    {
        $requestData=$this->request;
        if ($this->request->getMethod() == 'post') {
            $result=$this->ActionCreate($requestData,$this->users,'create');
            return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
        }
    }

    public function ActionCreate($requestData, $model1,$string)
    {
        $validate = $this->CheckReg($requestData);
        if($validate ->getErrors()){
            return[
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'messages'=>$validate ->getErrors(),
            ];
        }
        $dataSave=$requestData->getPost();
        unset($dataSave['password_confirm']);
        $dataSave['password']=md5($dataSave['password']);
        try{
            $model1->$string($dataSave);
            return[
                'status'=>ResultUtils::STATUS_CODE_OK,
                'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
                'messages'=>['success'=>'Thành công!'],
            ];
        }catch(Exception $e){
            return[
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'messages'=>['success'=>$e->getMessage()],
            ];
        }
    }

    private function CheckReg($requestData)
    {
        $rule = [
            'email' => 'is_unique[admin.email]|max_length[100]|valid_email|is_unique[user.email]',
            'name' => 'max_length[100]',
            'password' => 'max_length[30]|min_length[6]',
            'password_confirm' => 'matches[password]'
        ];
        $message = [
            'email' => [
                'valid_email'=>'Không giống định dạng email!',
                'max_length' => 'Tên quá dài, vui lòng nhập {param} ký tự!',
                'is_unique' => 'Email này đã được đăng ký vui lòng nhập email khác!'
            ],

            'name' => [
                'max_length' => 'Tên quá dài, vui lòng nhập {param} ký tự!',
            ],

            'password' => [
                'max_length' => 'Password quá dài, vui lòng nhập {param} ký tự!',
                'min_length' => 'Password quá ngắn, vui lòng nhập {param} ký tự!',
            ],

            'password_confirm' => [
                'matches' => 'Mật khẩu không khớp, vui lòng kiểm tra lại!',
            ],
        ];

        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
    
}
