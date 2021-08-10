<?php

namespace App\Controllers\user;
use App\Controllers\BaseController;
use App\Models\ProductModel;


class CartController extends BaseController
{

	private $product;
    private $path = 'upload/product/';

    public function __construct()
    {
        parent::__construct();
        $this->product = new ProductModel();
        $this->product->protect(false);
    }

	public function cart()
	{
		
        $data=null;
		$session = session();
		$dataLayout['items']=[];
		if($session->has('cart'))
			$dataLayout['items'] = array_values(session('cart'));
        $data = $this ->loadUserLayout($data,"Giỏ hàng","user/pages/cart","","",$dataLayout);
		return view('user\main',$data);
	}

	public function add($id)
	{
		$product = json_decode(json_encode($this->product->getById($id)), True);
		if($product['discount']>0){
			$price = $product['price'] - $product['discount'];
		}else{
			$price = $product['price'];
		}
		$item = array(
			'id' => $product['id'],
			'name' => $product['name'],
			'image' => $product['image_link'],
			'price' => $price,
			'qty' => 1,
		);
		$session = session();
		if($session->has('cart')){
			$index =$this->exists($id);
			$cart = array_values(session('cart'));
			if($index == -1)
			{
				array_push($cart,$item);
				$session->set('cart',$cart);
			}else{
				$cart[$index]['qty']++;
				$session->set('cart',$cart);
			}
			$session->set('cart',$cart);
		}else{
			$cart = array($item);
			$session->set('cart',$cart);
		}
		return redirect()->back();
	}

	public function minus($id)
	{
		$cart = array_values(session('cart'));
		for($i=0; $i <count($cart);$i++)
		{
			if($cart[$i]['id']==$id)
			{
				$cart[$i]['qty']--;
				if($cart[$i]['qty']==0){
				unset($cart[$i]);
				break;
				}
			}
		}
		$session= session();
		$session->set('cart',$cart);
		return redirect()->back();
	
	}


	public function remove($id)
	{
		$index = $this ->exists($id);
		$cart = array_values(session('cart'));
		unset($cart[$index]);
		$session= session();
		$session->set('cart',$cart);
		return redirect()->back();
	}

	public function upload()
	{
		$cart = array_values(session('cart'));
		for($i=0; $i <count($cart);$i++)
		{
			$cart[$i]['qty']=$_POST['quantity'][$i];
		}
		$session= session();
		$session->set('cart',$cart);
		return redirect()->back();
	}

	private function exists($id)
	{
		$items = array_values(session('cart'));
		for($i=0; $i <count($items);$i++)
		{
			if( $items[$i]['id']==$id){
				
				return $i;
			}
		}
		return -1;
	}
}
