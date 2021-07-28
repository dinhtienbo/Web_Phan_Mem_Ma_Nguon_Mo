<?php

namespace App\Controllers\user;
use App\Models\ProductModel;
use App\Controllers\BaseController;

class ProductDetailController extends BaseController
{

	private $product;
    private $path = 'upload/product/';

    public function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
        $this->product->protect(false);
    }


	public function productdetail($meta_key)
	{	
        $data=null;
		$products = json_decode(json_encode($this->product->metaKey($meta_key)), True);
        $list= explode(',',$products['image_list']);
        $dataLayout=array(
            'product'=>$products,
            'list'=>$list
        );
        $data = $this ->loadUserLayout($data,"Chi tiết sản phẩm","user/pages/product-detail","user/layout/left-menu","",$dataLayout);
		return view('user\main',$data);
	}
}
