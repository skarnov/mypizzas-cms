<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function add_to_cart($product_id)
    {
        $product_info = $this->super_admin_model->select_menu_by_id($product_id);           
        $data = array(
            'id' => $product_info->product_id,
            'image' => $product_info->product_image,
            'name' => $product_info->product_name,
            'qty' => 1,
            'price' =>$product_info->product_price
        );
        $this->cart->insert($data);
        $this->load->view('frontend/totalCart');
    }
    
    public function show_cart()
    {
        $data = array();
        $data['title'] = 'Shoping Cart';
        $data['home'] = $this->load->view('frontend/show_cart', $data, true);
        $this->load->view('frontend/master', $data);
    }
   
    public function update_cart()
    {
        $qty = $this->input->post('product_quantity', true);
        $rowid = $this->input->post('rowid', true);
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }
    
    public function remove($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => '0'
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }
}