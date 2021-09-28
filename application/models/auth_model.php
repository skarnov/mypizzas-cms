<?php

class Auth_model extends CI_Model {
    
    public function admin_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email', $data['email']);
        $this->db->where('admin_password', ($data['password']));
        $this->db->where('admin_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}