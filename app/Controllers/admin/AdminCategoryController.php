<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
Use App\Common\ResultUtils;
use Exception;

class AdminCategoryController extends BaseController
{
    private $category;

    public function __construct()
    {
        parent::__construct();
        $this->category = new CategoryModel();
        $this->category->protect(false);
    }

    public function index()
    {
        $data = [];
        $dataLayout['categoris'] = json_decode(json_encode($this->category->getListCategory()), True); //Chuyển object thành mảng
        $data = $this->loadMastLayout($data, "Trang quản lý danh mục", "admin/pages/catalog/list-category", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function AddCategory()
    {
        $data = [];
        $dataLayout['list'] = json_decode(json_encode($this->category->getListCategoryCha(0)), True);
        $data = $this->loadMastLayout($data, "Thêm danh mục", "admin/pages/catalog/add-category", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function Create()
    {
        $requestData=$this->request;
        if ($this->request->getMethod() == 'post') {
            $result=$this->ActionCreate($requestData,$this->category,'create');
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

    //Hàm kiểm tra Edit
    private function CheckEdit($requestData)
    {
        $rule = [
            'name' => 'max_length[100]',
          
            'parent_id' => 'numeric',
            'sort_order' => 'numeric'
        ];
        $message = [
            'name' => [
                'max_length' => 'Tên danh mục quá dài, vui lòng nhập {param} ký tự!',
            ],

            'parent_id' => [
                'numeric' => 'Parent_id phải là số nguyên',
            ],

            'sort_order' => [
                'numeric' => 'Thứ tự hiển thị phải là số nguyên',
            ],

        ];

        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    //Hàm kiểm tra add
    private function Check($requestData)
    {
        $rule = [
            'name' => 'is_unique[catalog.name]|max_length[100]',
          
            'parent_id' => 'numeric',
            'sort_order' => 'numeric'
        ];
        $message = [
            'name' => [
                'max_length' => 'Tên danh mục quá dài, vui lòng nhập {param} ký tự!',
                'is_unique' => 'Danh mục đã được đăng ký vui lòng nhập danh mục khác!'
            ],

            'parent_id' => [
                'numeric' => 'Parent_id phải là số nguyên',
            ],

            'sort_order' => [
                'numeric' => 'Thứ tự hiển thị phải là số nguyên',
            ],

        ];

        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    //Hàm Edit
    public function EditCategory($id)
    {
        $data = [];
        $dataLayout['category'] = json_decode(json_encode($this->category->getById($id)), True); //Chuyển object thành mảng
        $dataLayout['list'] = json_decode(json_encode($this->category->getListCategoryCha(0)), True);
        if(count( $dataLayout['category'])==0)
            return redirect('error/404');
        $data = $this->loadMastLayout($data, "Sửa thông tin danh mục", "admin/pages/catalog/edit-category", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function Edit($id)
    {
        $requestData=$this->request;
        if ($this->request->getMethod() == 'post') {
            $result=$this->ActionEdit($requestData,$this->category,'edit',$id);
            
            return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
        }
    }

    public function Delete($id)
    {
        $data=json_decode(json_encode($this->category->getById($id)), True);
        $this->category->Delete($id);
        return redirect("admin/List-Category");
    }
}
?>