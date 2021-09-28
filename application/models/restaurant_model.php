<?php

class Restaurant_model extends CI_Model {
    
    public function select_special_menu()
    {
        $sql = "SELECT * FROM tbl_product";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function user_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_email',$data['customer_email']);
        $this->db->where('customer_password', $data['customer_password']);
	$this->db->where('customer_status',1);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function save_customer_info()
    {
        $data=array();
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['customer_landmark'] = $this->input->post('customer_landmark', true);
        $this->db->insert('tbl_customer',$data);
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
        $data['customer_password'] = $this->input->post('customer_password', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['customer_landmark'] = $this->input->post('customer_landmark', true);
        $customer_id=$this->input->post('customer_id',true);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$data);
    }
    
    public function select_my_order($customer_id)
    {
        $sql = "SELECT * FROM tbl_order AS o WHERE customer_id='$customer_id' AND order_status=0";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_order_history($customer_id)
    {
        $sql = "SELECT * FROM tbl_order AS o WHERE customer_id='$customer_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_order_info()
    {
        $data=array();
        $data['customer_id']=$this->session->userdata('customer_id', true);
        $data['invoice_date']= date('d-m-Y');
        $data['order_total']=$this->session->userdata('grand_total');
        $this->db->insert('tbl_order',$data);
        $order_id=$this->db->insert_id();
        $contents=$this->cart->contents();
        $oddata=array();
        foreach($contents as $values)
        {
           $oddata['order_id']=$order_id;
           $oddata['product_id']=$values['id'];
           $oddata['product_name']=$values['name'];
           $oddata['product_price']=$values['price'];
           $oddata['product_sales_quantity']=$values['qty'];
           $this->db->insert('tbl_order_details',$oddata);
        }
    }
}