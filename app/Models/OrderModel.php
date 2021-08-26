<?php
namespace App\Models;
use App\Models\BaseModel;

class OrderModel extends BaseModel
{
    var $table='order';

    public function deleteTransaction($id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->where('transaction_id',$id)->delete();
    }

    public function getAll()
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->join('product','product.id=order.product_id')
        ->join('transaction','transaction.id=order.transaction_id')
        ->get()->getResult();
    }

    public function getAllId($id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->join('product','product.id=order.product_id')
        ->join('transaction','transaction.id=order.transaction_id')->where('transaction_id',$id)
        ->get()->getResult();
    }

    //update
    public function updateStatus($id,$data)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->where('id',$id)->update($data);
    }

    public function search($id,$name)
    {
        $db = \Config\Database::connect();
        $sql1=[];
        $sql2=[];
        $sql3=[];
        $sql4=[];
        if($id>0 && $id!='')
            $sql1= $this->db->table($this->table)->where('id',$id)->get()->getResult();
        if($name!='')
            $sql2= $this->db->table($this->table)->like('user_name',$name)->get()->getResult();
        
        $sql = array_merge($sql1,$sql2);//Gộp 2 lệnh sql
        return $sql;
    }

}
?>