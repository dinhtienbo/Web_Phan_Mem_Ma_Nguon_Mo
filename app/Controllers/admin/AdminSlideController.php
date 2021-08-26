<?php

namespace App\Controllers\admin;
use App\Models\SlideModel;
use App\Controllers\BaseController;

class AdminSlideController extends BaseController
{
	private $slides;
   
    private $path = './public/upload/product/';

    public function __construct()
    {
        parent::__construct();
        $this->slides = new SlideModel();
        $this->slides->protect(false);
	}



	public function index()
	{
		$data = null;
		$dataLayout['list'] = json_decode(json_encode($this->slides->getList()), True); //Chuyển object thành mảng;
		$data = $this->loadMastLayout($data, "Trang quản lý slide", "admin/pages/slide/List-Silde", $dataLayout, [], []);
		return view('admin/main', $data);
	}

	public function Add()
	{
		$data = null;
		$dataLayout = [];
		$data = $this->loadMastLayout($data, "Trang thêm slide", "admin/pages/slide/Add-Slide", $dataLayout, [], []);
		return view('admin/main', $data);
	}

	public function Create()
	{

		if ($this->request->getMethod() == 'post') {

			
			$file = $this->request->getFile('image');
			if ($file->isValid()) {
				$newName = $file->getName();
                $file->move('./slide', $newName);
			}

			$requestData = [
                'name'       => $this->request->getPost('name'),
                'image_link' => (string) $file->getName(),
				'sort_order'=>$this->request->getPost('sort_order'),

            ];
			$this->slides->create($requestData);
			return redirect('admin/List-Slide/Add');
		}
	}


	public function Delete($id)
    {
        $data = json_decode(json_encode($this->slides->getById($id)), True);

        if ($data['image_link'] != '') {
            unlink('slide/' . $data['image_link']);
        }
       

        $this->slides->Delete($id);
        return redirect("admin/List-Slide");
    }
}
