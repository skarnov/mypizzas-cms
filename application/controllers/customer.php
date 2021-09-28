<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Customer extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL)
        {
            redirect('restaurant/login', 'refresh');
        }
    }
    
    public function index()
    {
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Dashboard';
        $data['customer'] = $this->restaurant_model->select_customer_by_id($customer_id);
        $data['home'] = $this->load->view('frontend/dashboard', $data, true);
        $this->load->view('frontend/master', $data);
    }
    
    public function update_customer() 
    {
        $sdata = array();
        $sdata['update_customer'] = 'Update Customer Information Successfully';
        $this->session->set_userdata($sdata);
        $this->restaurant_model->update_customer_info();
        redirect('customer');
    }

    public function my_order()
    {
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Dashboard';
        $data['my_order'] = $this->restaurant_model->select_my_order($customer_id);
        $data['home'] = $this->load->view('frontend/my_order', $data, true);
        $this->load->view('frontend/master', $data);
    }

    public function order_history()
    {
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Dashboard';
        $data['order_history'] = $this->restaurant_model->select_order_history($customer_id);
        $data['home'] = $this->load->view('frontend/order_history', $data, true);
        $this->load->view('frontend/master', $data);
    }      
}