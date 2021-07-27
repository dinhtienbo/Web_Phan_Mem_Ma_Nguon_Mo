<?php

namespace App\Service\user;
use App\Service\BaseService;
use App\Models\UserModel;
Use App\Common\ResultUtils;
use Exception;

class UserService extends BaseService
{

    private $users;

	public function __construct()
    {
        parent::__construct();
        $this->users = new UserModel();
        $this->users->protect(false);
    }
	
    // Lấy tất cả user
    public function getAllUser()
    {
        return $this->users->findAll();
    }

    //Thêm người dùng
    public function addUser($requestData)
    {
        $validate = $this->validateAddUser($requestData);

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
            $this->users->save($dataSave);
            return[
                'status'=>ResultUtils::STATUS_CODE_OK,
                'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
                'messages'=>['success'=>'Thành công'],
            ];
        }catch(Exception $e){
            return[
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'messages'=>['success'=>$e->getMessage()],
            ];
        }
    }

    private function validateAddUser($requestData)
    {

        $rule=[
            //Kiểm tra email, không trùng email
            'email' => 'valid_email|is_unique[user.email]',
            'name' => 'max_length[100]',
            //Mật khẩu từ 6 đến 30
            'password' => 'max_length[30]|min_length[6]',
            //Kiểm tra mật khẩu
            'password_confirm' => 'matches[password]',
        ];

        $message =[
            'email'=>[
                'valid_email' => 'Tài khoản {field}{value} không đúng định dạng!',
                'is_unique' => 'Email đã được đăng ký vui lòng nhập email khác!'
            ],

            'name'=>[
                'max_length' => 'Tên quá dài, vui lòng nhập {param} ký tự!',  
            ],

            'password'=>[
                'max_length' => 'Password quá dài, vui lòng nhập {param} ký tự!',
                'min_length' => 'Password quá ngắn, vui lòng nhập {param} ký tự!',
            ],

            'password_confirm'=>[
                'matches' => 'Mật khẩu không khớp, vui lòng kiểm tra lại!',
            ],
        ];

        $this -> validation->setRules($rule,$message);
        $this -> validation->withRequest($requestData)->run();

        return $this -> validation;
    }

    /**
     * Lấy user bởi id
     */
    public function getUserByID($idUser)
    {
        return $this->users->where('id',$idUser)->first();
    }


    public function check($requestData)
	{
		$validate = $this->validateLogin($requestData);

		if($validate ->getErrors()){
            return[
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'messages'=>$validate ->getErrors(),
            ];
        }
        
        //User
        $params = $requestData->getPost();
        $user = $this->users->where('email',$params['email'])->first();

        if(!$user){
            return[
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'messages'=>['noExist'=>'Email chưa được đăng ký!'],
            ];
        }

        if(md5($params['password'])!= $user['password']){
            return[
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'messages'=>['wrongPass'=>'Mật khẩu không đúng!'],
            ];
        }

        $session = session();
        unset($user['password']);
        $session ->set('login_user',$user);

        return[
            'status'=>ResultUtils::STATUS_CODE_OK,
            'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
            'messages'=>null,
        ];

	}


	private function validateLogin($requestData)
    {
        $rule = [
			'email' => 'valid_email',
            'password' => 'max_length[30]|min_length[6]',
        ];
        $message = [
            'email' => [
                'valid_email' => 'Tài khoản {filed} {value} không đúng định dạng!',
            ],

            'password' => [
                'max_length' => 'Mật khẩu quá dài, vui lòng nhập chỉ từ {param} ký tự!',
				'min_length' => 'Mật khẩu không được ít hơn {param} ký tự!',
            ],


        ];

        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
