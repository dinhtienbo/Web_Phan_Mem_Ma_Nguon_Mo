<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Service\user\UserService;

class AdminUserController extends BaseController
{
	/**
	 * @var Service;
	 */

	private $service;

	public function __construct()
	{
		$this->service = new UserService();
	}

	public function index()
	{
		$data=[];
		$dataLayout['users'] = $this->service->getAllUser();
        $data = $this ->loadMastLayout($data,"Trang quản lý nguời dùng","admin/pages/list-user",$dataLayout,[],[]);
		return view('admin/main',$data);
	}

	public function addUser()
	{
		$data=[];
		$dataLayout = [];
        $data = $this ->loadMastLayout($data,"Thêm người dùng","admin/pages/add-user",$dataLayout,[],[]);
		return view('admin/main',$data);
	}

	public function createUser()
	{
		$result = $this ->service -> addUser($this->request);
		return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
	}

	public function editUser($id)
	{
		$user = $this ->service -> getUserByID($id);
		if(!$user)
		{
			return redirect('error/404');
		}

		$data=[];
		$dataLayout['user']=$user;
        $data = $this ->loadMastLayout($data,"Sửa người dùng","admin/pages/edit-user",$dataLayout,[],[]);
		return view('admin/main',$data);
	}
}
