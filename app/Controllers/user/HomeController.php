<?php

namespace App\Controllers\user;
use App\Models\ProductModel;
use App\Controllers\BaseController;


class HomeController extends BaseController
{

	private $product;

	public function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
        $this->product->protect(false);
    }

	public function index()
	{
		
        $data=null;
		$newProducts = json_decode(json_encode($this->product->getNewProduct()), True);
		$buyProducts = json_decode(json_encode($this->product->getTopBuyProduct()), True);
		$viewProducts = json_decode(json_encode($this->product->getTopViewProduct()), True);

		$dataLayout=[
			'newProducts'=>$newProducts,
			'buyProducts'=>$buyProducts,
			'viewProducts'=>$viewProducts,

		];
        $data = $this ->loadUserLayout($data,"Trang chủ","user/pages/index",'user/layout/left-menu',"user/layout/slide",$dataLayout);
		return view('user\main',$data);
	}
}
