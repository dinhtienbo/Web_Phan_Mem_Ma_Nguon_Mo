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

    public function getShip($id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->set('status',1)->where('id',$id)->update();
    }

    public function getFinal($id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->set('status',2)->where('id',$id)->update();
    }



    public function search($id,$name,$hinhthuc,$trangthai)
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
        if($trangthai!='')
            $sql3= $this->db->table($this->table)->where('status',$trangthai)->get()->getResult();
        
        if($hinhthuc!='')
            $sql4= $this->db->table($this->table)->like('payment',$hinhthuc)->get()->getResult();
        
        $sql = array_merge($sql1,$sql2,$sql3,$sql4);//Gộp 2 lệnh sql
        return $sql;
    }

}
?>