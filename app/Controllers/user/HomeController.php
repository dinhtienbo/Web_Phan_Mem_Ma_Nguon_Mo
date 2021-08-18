<?php

namespace App\Controllers\user;
use App\Models\ProductModel;
use App\Controllers\BaseController;
use App\Models\CategoryModel;



class HomeController extends BaseController
{

	private $catalog;
	private $product;

	public function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
		$this->catalog = new CategoryModel();
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

	public function search()
	{
		$data=null;
		if($this->request->getMethod() == 'get')
			$dataLayout['products'] = json_decode(json_encode($this -> product->searchName($this->request->getGet('search'))), True);
        $data = $this ->loadUserLayout($data,"Danh sách sản phẩm","user/pages/product","user/layout/left-menu","user/layout/slide",$dataLayout);
		return view('user\main',$data);
		
	}
}
