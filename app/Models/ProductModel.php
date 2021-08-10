<?php
namespace App\Models;
use App\Models\BaseModel;

class ProductModel extends BaseModel
{
    var $table='product';

    public function search($id,$name,$catalog_id)
    {
        $db = \Config\Database::connect();
        $sql1=[];
        $sql2=[];
        $sql3=[];
        if($id>0 && $id!='')
            $sql1= $this->db->table($this->table)->where('id',$id)->get()->getResult();
        if($name!='')
            $sql2= $this->db->table($this->table)->like('name',$name)->get()->getResult();
        if($catalog_id!=''&& $catalog_id>0)
            $sql3= $this->db->table($this->table)->like('catalog_id',$catalog_id)->get()->getResult();
        $sql = array_merge($sql1,$sql2,$sql3);//Gộp 2 lệnh sql
        return $sql;
    }

    public function metaKey($metaKey)
    {
            $db = \Config\Database::connect();
            return $this->db->table($this->table)->like('meta_key',$metaKey)->get()->getRow();
    }

    public function getNewProduct()
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->orderBy('created','DESC')->get(6)->getResult();
    }

    public function getTopBuyProduct()
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->orderBy('buyed','DESC')->get(4)->getResult();
    }

    public function getTopViewProduct()
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->orderBy('view','DESC')->get(4)->getResult();
    }

    public function deleteCatalog($id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->where('catalog_id',$id)->delete();
    }

    public function addView($metaKey)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->set('view','view+1', false)->where('meta_key',$metaKey)->update();
    }

    public function addBuy($id,$qty)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->set('buyed',$qty, false)->where('id',$id)->update();
    }
}
