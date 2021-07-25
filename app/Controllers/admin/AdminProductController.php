<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Common\ResultUtils;
use Exception;
use CodeIgniter\I18n\Time;
use DateTime;

class AdminProductController extends BaseController
{
    private $product;
    private $category;
    private $path = './public/upload/product/';

    public function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
        $this->product->protect(false);
        $this->category = new CategoryModel();
        $this->category->protect(false);
    }
    public function index()
    {
        $data = null;
        $dataLayout['product'] = $this->product->getList();

        //Lấy danh mục
        $catalogs = $this->category->getListCategoryCha(0);
        foreach ($catalogs as $row) {

            $subs = $this->category->getListCategoryCha($row->id);
            $row->subs = $subs;
        }
        $dataLayout['catalogs'] = $catalogs;

        //Phân trang
        // $data = [
        //     'product' => $this->product->paginate(5),
        //     'pager' => $this->product->pager,
        // ];


        $data = $this->loadMastLayout($data, "Trang quản lý sản phẩm", "admin/pages/product/list-product", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function Search()
    {
        $data = [];
        $requestData['id'] = $this->request->getPost('id');
        $requestData['name'] = $this->request->getPost('name');
        $requestData['catalog'] = $this->request->getPost('catalog');

        if ($this->request->getMethod() == 'post') {
            $dataLayout['product'] = $this->product->search($requestData['id'], $requestData['name'], $requestData['catalog']);
        } else
            $dataLayout = [];

        //Lấy danh mục
        $catalogs = $this->category->getListCategoryCha(0);
        foreach ($catalogs as $row) {

            $subs = $this->category->getListCategoryCha($row->id);
            $row->subs = $subs;
        }
        $dataLayout['catalogs'] = $catalogs;
        $data = $this->loadMastLayout($data, "Trang quản lý sản phẩm", "admin/pages/product/list-product", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function Addproduct()
    {
        $data = [];
        //Lấy danh mục
        $catalogs = $this->category->getListCategoryCha(0);
        foreach ($catalogs as $row) {

            $subs = $this->category->getListCategoryCha($row->id);
            $row->subs = $subs;
        }
        $dataLayout['catalogs'] = $catalogs;
        $data = $this->loadMastLayout($data, "Thêm sản phẩm", "admin/pages/product/add-product", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function Create()
    {
        if ($this->request->getMethod() == 'post') {

            $name        = $this->request->getPost('name');
            $catalog_id  = $this->request->getPost('catalog');
            $price       = $this->request->getPost('price');
            $price       = str_replace(',', '', $price);
            $discount = $this->request->getPost('discount');
            $discount = str_replace(',', '', $discount);

            //Ảnh
            //Avatar
            $image_link = '';
            $file = $this->request->getFile('image');
            if ($file->isValid()) {
                $newName = $file->getName();
                $file->move('./upload/product', $newName);
                $image_link = $newName;
            }
            //Multi
            $fileMulti = $this->request->getFiles();
            $image_list = array();
            foreach ($fileMulti['image_list'] as $row) {
                $newName = $row->getName();
                $row->move('./upload/product', $newName);
                $image_list[] = $newName;
            }
            //Nối chuỗi
            $str = implode (",", $image_list);
            $time = new Time('now','Asia/Ho_Chi_Minh');
            $time = $time->format('Y-m-d H:i:s');
           
            $requestData = [
                'name'       => $name,
                'catalog_id' => $catalog_id,
                'price'      => $this->request->getPost('price'),
                'image_link' => (string)$image_link,
                'image_list' => $str,
                'discount'   => $this->request->getPost('discount'),
                'warranty'   => $this->request->getPost('warranty'),
                'gifts'      => $this->request->getPost('gifts'),
                'site_title' => $this->request->getPost('site_title'),
                'meta_desc'  => $this->request->getPost('meta_desc'),
                'meta_key'   => $this->request->getPost('meta_key'),
                'content'    => $this->request->getPost('content'),
                'created' => $time

            ];

            $result = $this->ActionCreate($requestData, $this->product, 'create');
            return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
        }
    }

    //Hàm thêm
    public function ActionCreate($requestData, $model1, $string)
    {
        $requestData1=$this->request;
        $validate = $this->Check($requestData1);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors(),
            ];
        }
        $dataSave = $requestData;
        try {
            $model1->$string($dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Thành công!'],
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['success' => $e->getMessage()],
            ];
        }
    }

    //Hàm sửa
    public function ActionEdit($requestData, $model1, $string, $id)
    {
        $validate = $this->CheckEdit($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors(),
            ];
        }
        $dataSave = $requestData->getPost();
        try {
            $model1->$string($id, $dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Thành công!'],
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['success' => $e->getMessage()],
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
            'name' => 'is_unique[product.name]|max_length[100]',

            'price' => 'numeric',
            'discount' => 'numeric'
        ];
        $message = [
            'name' => [
                'max_length' => 'Tên sản phẩm quá dài, vui lòng nhập {param} ký tự!',
                'is_unique' => 'Tên sản phẩm đã tồn tại!'
            ],

            'price' => [
                'numeric' => 'Giá phải là số',
            ],

            'discount' => [
                'numeric' => 'Giảm giá phải là số',
            ],

        ];

        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    //Hàm Edit
    public function EditProduct($id)
    {
        $data = [];
        $dataLayout['product'] = json_decode(json_encode($this->product->getById($id)), True); //Chuyển object thành mảng

        if (count($dataLayout['product']) == 0)
            return redirect('error/404');
        $data = $this->loadMastLayout($data, "Sửa thông tin danh mục", "admin/pages/product/catalog/edit-product", $dataLayout, [], []);
        return view('admin/main', $data);
    }

    public function Edit($id)
    {
        $requestData = $this->request;
        if ($this->request->getMethod() == 'post') {
            $result = $this->ActionEdit($requestData, $this->product, 'edit', $id);

            return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
        }
    }

    public function Delete($id)
    {
        $data = json_decode(json_encode($this->product->getById($id)), True);
        $this->product->Delete($id);
        return redirect("admin/List-product");
    }
}
