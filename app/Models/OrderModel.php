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
}
?>