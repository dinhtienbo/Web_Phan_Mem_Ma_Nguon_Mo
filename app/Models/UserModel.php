<?php

namespace App\Models;
use App\Models\BaseModel;

class UserModel extends BaseModel
{
    var $table='user';

    public function getEmail($email)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->where('email',$email)->get()->getRow();
    }
}
?>