<?php
namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
Use App\Common\ResultUtils;
use Exception;

class AdminUserController extends BaseController
{
	private $users;

    public function __construct()
    {
        parent::__construct();
        $this->users = new UserModel();
        $this->users->protect(false);
    }

    public function index()
    {
        $data = [];
        $dataLayout['users'] = json_decode(json_encode($this->users->getList()), True); //Chuyển object thành mảng
        $data = $this->loadMastLayout($data, "Trang quản lý admin", "admin/pages/user/list-user", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function AddUser()
    {
        $data = [];
        $dataLayout = [];
        $data = $this->loadMastLayout($data, "Thêm admin", "admin/pages/user/add-user", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function Create()
    {
        $requestData=$this->request;
        if ($this->request->getMethod() == 'post') {
            $result=$this->ActionCreate($requestData,$this->users,'create');
            return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
        }
        
    }

    //Hàm thêm
    public function ActionCreate($requestData, $model1,$string)
    {
        $validate = $this->Check($requestData);
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

    //Hàm sửa
    public function ActionEdit($requestData, $model1,$string,$id)
    {
        $validate = $this->CheckEdit($requestData);
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
            $model1->$string($id,$dataSave);
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

    //Hàm kiểm tra
    private function Check($requestData)
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

    private function CheckEdit($requestData)
    {
        $rule = [
            'email' => 'max_length[100]|valid_email',
            'name' => 'max_length[100]',
            'password' => 'max_length[30]|min_length[6]',
            'password_confirm' => 'matches[password]'
        ];
        $message = [
            'email' => [
                'max_length' => 'Tên quá dài, vui lòng nhập {param} ký tự!',
                'valid_email'=>'Không giống định dạng email!',
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

    //Hàm Edit
    public function EditUser($id)
    {
        $data = [];
        $dataLayout['user'] = json_decode(json_encode($this->users->getById($id)), True); //Chuyển object thành mảng
        if(count( $dataLayout['user'])==0)
            return redirect('error/404');
        $data = $this->loadMastLayout($data, "Sửa thông tin admin", "admin/pages/user/edit-user", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function Edit($id)
    {
        $requestData=$this->request;
        if ($this->request->getMethod() == 'post') {
            $result=$this->ActionEdit($requestData,$this->users,'edit',$id);
            
            return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
        }
    }

    public function Delete($id)
    {
        $data=json_decode(json_encode($this->users->getById($id)), True);
        $this->users->Delete($id);
        return redirect("admin/List-User");
    }
}
