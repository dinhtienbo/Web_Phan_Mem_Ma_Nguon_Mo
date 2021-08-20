<?php
namespace App\Models;
use App\Models\BaseModel;

class TransactionModel extends BaseModel
{
    var $table='transaction';


    public function getUserId($id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->where('user_id',$id)->get()->getResult();
    }
}
?>