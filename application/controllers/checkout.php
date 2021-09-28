<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) 
        {
            redirect('customer', 'refresh');
        }
        $grand_total = $this->session->userdata('grand_total');
        if ($grand_total == NULL) 
        {
            redirect('cart/show_cart', 'refresh');
        }
    }
    
    public function index() 
    {                        
        $this->restaurant_model->save_order_info();
        $this->cart->destroy();
        redirect('customer/my_order');
    }
}