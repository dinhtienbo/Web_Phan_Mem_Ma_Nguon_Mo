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
}
?>