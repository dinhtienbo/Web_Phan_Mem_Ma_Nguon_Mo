<?php 
namespace App\Filters;

use App\Models\CategoryModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoryModelModel;


class UserFilter implements FilterInterface{

    private $category;

    public function before(RequestInterface $request, $arguments = null)
    {
        $session =session();
        $this->category = new CategoryModel();
        $catalogs = $this->category->getListCategoryCha(0);
        foreach ($catalogs as $row) {

            $subs = $this->category->getListCategoryCha($row->id);
            $row->subs = $subs;
        }
        $session ->set('menu',$catalogs);
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
?>