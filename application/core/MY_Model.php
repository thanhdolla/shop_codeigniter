<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Model extends CI_Model {

    // Ten table
    var $table = '';
    // Key chinh cua table
    var $key = '';
    // Order mac dinh (VD: $order = array('id', 'desc))
    var $order = '';
    // Cac field select mac dinh khi get_list (VD: $select = 'id, name')
    var $select = '';
    var $stt = '';

    /**
     * Them row moi
     * $data : du lieu ma ta can them
     */
    function create($data = array()) {
        if ($this->db->insert($this->table, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Cap nhat row tu id
     * $id : khoa chinh cua bang can sua
     * $data : mang du lieu can sua
     */
    function update($id, $data) {
        if (!$id) {
            return FALSE;
        }

        $where = array();
        $where[$this->key] = $id;
        $this->update_rule($where, $data);

        return TRUE;
    }

    /**
     * Cap nhat row tu dieu kien
     * $where : dieu kien
     * $data : mang du lieu can cap nhat
     */
    function update_rule($where, $data) {
        if (!$where) {
            return FALSE;
        }

        $this->db->where($where);
        $this->db->update($this->table, $data);

        return TRUE;
    }

    function delete($id) {

        if (!$id) {
            return FALSE;
        }
        if (is_numeric($id)) {
            $where = array($this->key => $id);
        } else {
            //$id = 1,2,3...
            $where = $this->key . " IN (" . $id . ") ";
        }
        $this->delete_rule($where);
        return true;
    }

    function delete_rule($where) {
        if (!$where) {
            return false;
        }
        $this->db->where($where);
        $this->db->delete($this->table);
        return true;
    }

    function query($sql) {
        $rows = $this->db->query($sql);
        return $rows->result;
    }

    function get_info($id, $field = ' ') {//$field cot du lieu can lay thong tin
        if (!$id) {// khong truyen gi vao field thi mac dinh lay ra tat ca cac cot trong bang 
            return false;
        }
        $where = array();
        $where[$this->key] = $id;

        return $this->get_info_rule($where, $field);
    }

    function get_info_rule($where = array(), $field = '') {
        if ($field) {
            $this->db->select($field);
        }
        $this->db->where($where);
        $query = $this->db->get($this->table);
        if ($query->num_rows()) {
            return $query->row();
        }
        return FALSE;
    }

    /**
     * Lay 1 row
     */
    function get_row($input = array()) {
        $this->get_list_set_input($input);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    /**
     * Lay danh sach
     * $input : mang cac du lieu dau vao
     */
    function get_list($input = array()) {
        //xu ly ca du lieu dau vao
        $this->get_list_set_input($input);
        //thuc hien truy van du lieu
        $query = $this->db->get($this->table);
        //echo $this->db->last_query();
        return $query->result();
    }

    function get_total($input = array()) {
        $this->get_list_set_input($input);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    function get_list_set_input($input = array()) {
        //them dk cho cau truy van
        if ((isset($input['where'])) && $input['where']) {
            $this->db->where($input['where']);
        }
        //neu muon tin kiem theo like
        if ((isset($input['like'])) && $input['like']) {
            $this->db->like($input['like'][0], $input['like'][1]); //mang tryen vao 2 tham so
        }

        // Thêm sắp xếp dữ liệu thông qua biến $input['order'] 
        //(ví dụ $input['order'] = array('id','DESC'))
        if (isset($input['order'][0]) && isset($input['order'][1])) {
            $this->db->order_by($input['order'][0], $input['order'][1]);
        } else {
            //mặc định sẽ sắp xếp theo id giảm dần 
            $order = ($this->order == '') ? array($this->table . '.' . $this->key, 'desc') : $this->order;
            $this->db->order_by($order[0], $order[1]);
        }

        // Thêm điều kiện limit cho câu truy vấn thông qua biến $input['limit'] 
        //(ví dụ $input['limit'] = array('10' ,'0')) 
        if (isset($input['limit'][0]) && isset($input['limit'][1])) {
            $this->db->limit($input['limit'][0], $input['limit'][1]);
        }
    }

    function get_sum($field, $where = array()) {//tinh tong so
        $this->db->select_sum($field); //tinh tong
        $this->db->where($where); //dieu kien
        $this->db->from($this->table);

        $row = $this->db->get()->row();
        foreach ($row as $f => $v) {
            $sum = $v;
        }
        return $sum;
    }

    function check_exist($where = array()) {
        $this->db->where($where);
        //lay du lieu
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return FALSE;
        }
    }

}

?>