<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
Use App\Common\ResultUtils;
use Exception;

class AdminController extends BaseController
{
    private $admins;

    public function __construct()
    {
        parent::__construct();
        $this->admins = new AdminModel();
        $this->admins->protect(false);
    }

    public function index()
    {
        $data = [];
        $dataLayout['admins'] = json_decode(json_encode($this->admins->getList()), True); //Chuyển object thành mảng
        $data = $this->loadMastLayout($data, "Trang quản lý admin", "admin/pages/list-admin", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function AddAdmin()
    {
        $data = [];
        $dataLayout = [];
        $data = $this->loadMastLayout($data, "Thêm admin", "admin/pages/add-admin", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function Create()
    {
        $requestData=$this->request;
        if ($this->request->getMethod() == 'post') {
            $result=$this->ActionCreate($requestData,$this->admins,'create');
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
        $dataSave['password']=password_hash($dataSave['password'],PASSWORD_BCRYPT);
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
        $dataSave['password']=password_hash($dataSave['password'],PASSWORD_BCRYPT);
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
            'username' => 'is_unique[admin.username]|max_length[100]',
            'name' => 'max_length[100]',
            'password' => 'max_length[30]|min_length[6]',
            'password_confirm' => 'matches[password]'
        ];
        $message = [
            'username' => [
                'max_length' => 'Tên quá dài, vui lòng nhập {param} ký tự!',
                'is_unique' => 'User đã được đăng ký vui lòng nhập email khác!'
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
            'username' => 'max_length[100]',
            'name' => 'max_length[100]',
            'password' => 'max_length[30]|min_length[6]',
            'password_confirm' => 'matches[password]'
        ];
        $message = [
            'username' => [
                'max_length' => 'Tên quá dài, vui lòng nhập {param} ký tự!',
                
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
    public function EditAdmin($id)
    {
        $data = [];
        $dataLayout['admins'] = json_decode(json_encode($this->admins->getById($id)), True); //Chuyển object thành mảng
        if(count( $dataLayout['admins'])==0)
            return redirect('error/404');
        $data = $this->loadMastLayout($data, "Sửa thông tin admin", "admin/pages/edit-admin", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function Edit($id)
    {
        $requestData=$this->request;
        if ($this->request->getMethod() == 'post') {
            $result=$this->ActionEdit($requestData,$this->admins,'edit',$id);
            
            return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
        }
    }

    public function Delete($id)
    {
        $data=json_decode(json_encode($this->admins->getById($id)), True);
        $this->admins->Delete($id);
        return redirect("admin/List-Admin");
    }
}
