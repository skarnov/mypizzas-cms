<?php

class Super_admin_model extends CI_Model {
    
    public function save_admin_info()
    {
        $data = array();
        $data['admin_name'] = $this->input->post('name', true);
        $data['admin_email'] = $this->input->post('email', true);
        $data['admin_password'] = $this->input->post('password', true);
        $data['admin_status'] = $this->input->post('status', true);
        $this->db->insert('tbl_admin',$data);
    }
    
    public function select_all_admin()
    {
        $sql = "SELECT * FROM tbl_admin";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_due_order()
    {
        $sql = "SELECT * FROM tbl_order AS o, tbl_customer AS c WHERE o.order_status = '0' AND o.customer_id=c.customer_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function deactive_admin_by_id($admin_id)
    {
        $this->db->set('admin_status',0);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin');
    }
    
    public function active_admin_by_id($admin_id)
    {
        $this->db->set('admin_status',1);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin');
    }
    
    public function select_admin_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_admin_info()
    {
        $data=array();
        $data['admin_name'] = $this->input->post('name', true);
        $data['admin_email'] = $this->input->post('email', true);
        $data['admin_password'] = $this->input->post('password', true);
        $data['admin_status'] = $this->input->post('status', true);
        $admin_id=$this->input->post('admin_id',true);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin',$data);
    }
    
    public function delete_admin_by_id($admin_id)
    {
        $this->db->where('admin_id',$admin_id);
        $this->db->delete('tbl_admin');
    }
    
    public function save_image_info($data)
    {
        $this->db->insert('tbl_image',$data);
    }
    
    public function select_all_image()
    {
        $sql = "SELECT * FROM tbl_image";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_image_by_id($image_id)
    {
        $sql = "SELECT * FROM tbl_image WHERE image_id='$image_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->row()->image;        
        $file = "$result";
        !unlink($file);
        $this->db->where('image_id',$image_id);
        $this->db->delete('tbl_image');
    }
    
    public function save_menu_info()
    {
        $data = array();
        $data['product_name'] = $this->input->post('name', true);
        $data['product_code'] = $this->input->post('code', true);
        $data['product_image'] = $this->input->post('product_image', true);
        $data['product_price'] = $this->input->post('price', true);
        $data['product_description'] = $this->input->post('description', true);
        $data['special_product'] = $this->input->post('special', true);
        $this->db->insert('tbl_product',$data);
    }
    
    public function select_all_menu()
    {
        $sql = "SELECT * FROM tbl_product";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_menu_by_id($menu_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_id',$menu_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_menu_info()
    {
        $data=array();
        $data['product_name'] = $this->input->post('name', true);
        $data['product_code'] = $this->input->post('code', true);
        $data['product_image'] = $this->input->post('product_image', true);
        $data['product_price'] = $this->input->post('price', true);
        $data['product_description'] = $this->input->post('description', true);
        $data['special_product'] = $this->input->post('special', true);
        $menu_id=$this->input->post('product_id',true);
        $this->db->where('product_id',$menu_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function delete_menu_by_id($menu_id)
    {
        $this->db->where('product_id',$menu_id);
        $this->db->delete('tbl_product');
    }
    
    public function select_all_order()
    {
        $sql = "SELECT * FROM tbl_order AS o, tbl_customer AS c WHERE o.customer_id=c.customer_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_order_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('order_id',$order_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_order_info()
    {
        $data=array();
        $data['order_status'] = $this->input->post('status', true);
        $order_id=$this->input->post('order_id',true);
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_order',$data);
    }
    
    public function delete_order_by_id($order_id)
    {
        $this->db->where('order_id',$order_id);
        $this->db->delete('tbl_order');
    }
    
    public function select_all_customer()
    {
        $sql = "SELECT * FROM tbl_customer";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_customer_by_id($customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_customer_info()
    {
        $data=array();
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_gender'] = $this->input->post('customer_gender', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['customer_landmark'] = $this->input->post('customer_landmark', true);
        $data['customer_status'] = $this->input->post('customer_status', true);
        $customer_id=$this->input->post('customer_id',true);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$data);
    }
    
    public function delete_customer_by_id($customer_id)
    {
        $this->db->where('customer_id',$customer_id);
        $this->db->delete('tbl_customer');
    }
}