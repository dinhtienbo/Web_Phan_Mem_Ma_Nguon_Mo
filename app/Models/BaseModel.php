<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    //Kết nối
    //Tên bảng
    var $table = '';
    //Khóa chính
    var $key = 'id';

    //Oder mặc định (VD: $order = array('id','desc))
    var $order = '';

    //Các field select mặc định khi get_list(VD: $select ='id,name')
    var $select = '';

    /**
     * Thêm row mới
     * $data :dữ liệu cần thêm
     */

    function create($data = array())
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        if ($builder->insert($data))
            return true;
        else return false;
    }

    /**
     * Lấy danh sách
     */
    function getList()
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->get()->getResult();
    }

    /**
     * Hàm tìm theo id
     */
    function getById($id)
    {
        $db = \Config\Database::connect();
        return $this->db->table($this->table)->where('id',$id)->get()->getRow();
    }
    /**
     * Hàm sửa 
     */
    function edit($id,$data = array())
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table)->where('id', $id)->update($data);
    }
     /**
     * Hàm xóa 
     */
    function deleteDB($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table)->delete(['id' => $id]);
    }

    /**
     * Tìm kiếm
     */
}
