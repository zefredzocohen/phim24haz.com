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

    /**
     * Them row moi
     * $data : du lieu ma ta can them
     */
    function create($data = array()) {
//        $id = $this->db->insert($this->table, $data);
        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
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

    /**
     * Xoa row tu id
     * $id : gia tri cua khoa chinh
     */
    function delete($id) {
        if (!$id) {
            return FALSE;
        }
        //neu la so
        if (is_numeric($id)) {
            $where = array($this->key => $id);
        } else {
            //$id = 1,2,3...
            $where = $this->key . " IN (" . $id . ") ";
        }
        $this->del_rule($where);

        return TRUE;
    }

    /**
     * Xoa row tu dieu kien
     * $where : mang dieu kien de xoa
     */
    function del_rule($where) {
        if (!$where) {
            return FALSE;
        }

        $this->db->where($where);
        $this->db->delete($this->table);

        return TRUE;
    }

    /**
     * Th?c hi?n câu l?nh query
     * $sql : cau lenh sql
     */
    function query($sql) {
        $rows = $this->db->query($sql);
        return $rows->result;
    }

    /**
     * Lay thong tin cua row tu id
     * $id : id can lay thong tin
     * $field : cot du lieu ma can lay
     */
    function get_info($id, $field = '') {
        if (!$id) {
            return FALSE;
        }

        $where = array();
        $where[$this->key] = $id;

        return $this->get_info_rule($where, $field);
    }

    /**
     * Lay thong tin cua row tu dieu kien
     * $where: M?ng ?i?u ki?n
     * $field: C?t mu?n l?y d? li?u
     */
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
     * Lay tong so
     */
    function get_total($input = array()) {
        $this->get_list_set_input($input);

        $query = $this->db->get($this->table);

        return $query->num_rows();
    }

    /**
     * Lay tong so
     * $field: cot muon tinh tong
     */
    function get_sum($field, $where = array()) {
        $this->db->select_sum($field); //tinh rong
        $this->db->where($where); //dieu kien
        $this->db->from($this->table);

        $row = $this->db->get()->row();
        foreach ($row as $f => $v) {
            $sum = $v;
        }
        return $sum;
    }

    /**
     * Lay 1 row
     */
    function get_row($input = array(), $join = array()) {
        $this->get_list_set_input($input);
        if ($join)
            ;
        if (count($join) > 0) {
            foreach ($join as $key => $value) {
                $tmp = explode('::', $value);
                if (count($tmp) == 2)
                    $this->db->join($key, $key . '.' . $tmp[0] . '=' . $this->table . '.' . $tmp[1]);
            }
        }
        $query = $this->db->get($this->table);

        return $query->row();
    }

    /**
     * Lay danh sach
     * $input : mang cac du lieu dau vao
     */
    function get_list($input = array(), $join = array()) {

        //xu ly ca du lieu dau vao
        $this->get_list_set_input($input);
        if (count($join) > 0) {
            foreach ($join as $key => $value) {
                $tmp = explode('::', $value);
                if (count($tmp) == 2)
                    $this->db->join($key, $key . '.' . $tmp[0] . '=' . $this->table . '.' . $tmp[1]);
            }
        }
        //thuc hien truy van du lieu
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * Gan cac thuoc tinh trong input khi lay danh sach
     * $input : mang du lieu dau vao
     */
    protected function get_list_set_input($input = array()) {

        // Thêm ?i?u ki?n cho câu truy v?n truy?n qua bi?n $input['where']
        //(vi du: $input['where'] = array('email' => 'hocphp@gmail.com'))
        if ((isset($input['where'])) && $input['where']) {
            $this->db->where($input['where']);
        }

        //tim kiem like
        // $input['like'] = array('name' => 'abc');
        if ((isset($input['like'])) && $input['like']) {
            $this->db->like($input['like'][0], $input['like'][1]);
        }

        if ((isset($input['or_like'])) && $input['or_like']) {
            $this->db->like($input['or_like'][0], $input['or_like'][1]);
        }

        // Thêm s?p x?p d? li?u thông qua bi?n $input['order']
        //(ví d? $input['order'] = array('id','DESC'))
        if (isset($input['order'][0]) && isset($input['order'][1])) {
            $this->db->order_by($input['order'][0], $input['order'][1]);
        } else {
            //m?c ??nh s? s?p x?p theo id gi?m d?n
            $order = ($this->order == '') ? array($this->table . '.' . $this->key, 'desc') : $this->order;
            $this->db->order_by($order[0], $order[1], 'none');
        }

        // Thêm ?i?u ki?n limit cho câu truy v?n thông qua bi?n $input['limit']
        //(ví d? $input['limit'] = array('10' ,'0'))
        if (isset($input['limit'][0]) && isset($input['limit'][1])) {
            $this->db->limit($input['limit'][0], $input['limit'][1]);
        }
    }

    /**
     * ki?m tra s? t?n t?i c?a d? li?u theo 1 ?i?u ki?n nào ?ó
     * $where : mang du lieu dieu kien
     */
    function check_exists($where = array()) {
//        $this->db->where($where);
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        //thuc hien cau truy van lay du lieu
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>