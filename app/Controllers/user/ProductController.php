<?php

namespace App\Controllers\user;
use App\Models\ProductModel;
use App\Controllers\BaseController;

class ProductController extends BaseController
{

	private $product;
    private $path = 'upload/product/';

    public function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
        $this->product->protect(false);
    }

	public function product()
	{	
        $data=null;
		$dataLayout['products'] = json_decode(json_encode($this->product->getList()), True);
        $data = $this ->loadUserLayout($data,"Danh sách sản phẩm","user/pages/product","user/layout/left-menu","user/layout/slide",$dataLayout);
		return view('user\main',$data);
	}
}
