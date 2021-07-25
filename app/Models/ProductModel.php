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
            $sql2= $this->db->table($this->table)->where('name',$name)->get()->getResult();
        if($catalog_id!=''&& $catalog_id>0)
            $sql3= $this->db->table($this->table)->where('catalog_id',$catalog_id)->get()->getResult();
        $sql = array_merge($sql1,$sql2,$sql3);//Gộp 2 lệnh sql
        return $sql;
    }
}
