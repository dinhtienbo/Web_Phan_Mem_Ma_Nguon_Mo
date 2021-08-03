<?php
namespace App\Models;
use App\Models\BaseModel;

class CategoryModel extends BaseModel
{
    var $table='catalog';

    
    public function getListCategory()
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->orderBy('id','DESC')->get()->getResult();
    }

    public function getListCategoryCha($id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->where('parent_id',$id)->get()->getResult();
    }

    public function metaKey($metaKey)
    {
            $db = \Config\Database::connect();
            return $this->db->table($this->table)->join('product','product.catalog_id=catalog.id')->like('catalog.meta_key',$metaKey)->get()->getResult();
    }

}
?>