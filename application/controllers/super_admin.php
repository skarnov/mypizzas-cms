<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Super_Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL)
        {
            redirect('auth', 'refresh');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('auth');
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['all_order'] = $this->super_admin_model->select_due_order();
        $data['dashboard'] = $this->load->view('super_admin/dashboard', $data, true);       
        $this->load->view('super_admin/master', $data);
    }
    
    public function add_admin() 
    {
        $data = array();
        $data['title'] = 'Add Admin';
        $data['dashboard'] = $this->load->view('super_admin/add_admin', $data, true);
        $this->load->view('super_admin/master', $data);
    }

    public function save_admin()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Password Did Not Match';
            $data['dashboard'] = $this->load->view('super_admin/add_admin', $data, true);
            $this->load->view('super_admin/master', $data);
        } 
        else 
        {
            $this->super_admin_model->save_admin_info($data);
            $sdata = array();
            $sdata['save_admin'] = 'Admin Saved';
            $this->session->set_userdata($sdata);
            redirect('super_admin/add_admin');
        }
    }

    public function manage_admin()
    {
        $data = array();
        $data['title'] = 'Manage Admin';
        $data['all_admin'] = $this->super_admin_model->select_all_admin();
        $data['dashboard'] = $this->load->view('super_admin/manage_admin', $data, true);
        $this->load->view('super_admin/master', $data);
    }

    public function deactive_admin($admin_id) 
    {
        $this->super_admin_model->deactive_admin_by_id($admin_id);
        redirect('super_admin/manage_admin');
    }

    public function active_admin($admin_id)
    {
        $this->super_admin_model->active_admin_by_id($admin_id);
        redirect('super_admin/manage_admin');
    }

    public function edit_admin($admin_id) 
    {
        $data = array();
        $data['title'] = 'Edit Admin';
        $data['admin_info'] = $this->super_admin_model->select_admin_by_id($admin_id);
        $data['dashboard'] = $this->load->view('super_admin/edit_admin', $data, true);
        $this->load->view('super_admin/master', $data);
    }

    public function update_admin()
    {
        $sdata = array();
        $sdata['edit_admin'] = 'Update Admin Information Successfully';
        $this->session->set_userdata($sdata);
        $this->super_admin_model->update_admin_info();
        redirect('super_admin/manage_admin');
    }

    public function delete_admin($admin_id) 
    {
        $this->super_admin_model->delete_admin_by_id($admin_id);
        redirect('super_admin/manage_admin');
    }
    
    public function add_image() 
    {
        $data = array();
        $data['title'] = 'Add Image';
        $data['dashboard'] = $this->load->view('super_admin/add_image', $data, true);
        $this->load->view('super_admin/master', $data);
    }
    
    public function save_image()
    {
        $data=array();
        /**START IMAGE UPLOAD**/
        $config['upload_path'] = 'media_library/image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10240';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $error = '';
        $fdata = array();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image'))
        {
            $error = $this->upload->display_errors();
            echo $error;
            exit();
        } 
        else 
        {
            $fdata = $this->upload->data();
            $index = 'image';
            $data[$index] = $config['upload_path'] . $fdata['file_name'];
        }
        /**END IMAGE UPLOAD**/
        $this->super_admin_model->save_image_info($data);
        $sdata = array();
        $sdata['save_image'] = 'Image Saved';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_image');
    }
    
    public function manage_image()
    {
        $data = array();
        $data['title'] = 'Manage Image';
        $data['all_image'] = $this->super_admin_model->select_all_image();
        $data['dashboard'] = $this->load->view('super_admin/manage_image', $data, true);
        $this->load->view('super_admin/master', $data);
    }
    
    public function delete_image($image_id) 
    {
        $this->super_admin_model->delete_image_by_id($image_id);
        redirect('super_admin/manage_image');
    }
    
    public function add_menu() 
    {
        $data = array();
        $data['title'] = 'Add Menu';
        $data['all_image'] = $this->super_admin_model->select_all_image();
        $data['dashboard'] = $this->load->view('super_admin/add_menu', $data, true);
        $this->load->view('super_admin/master', $data);
    }
    
    public function save_menu()
    {
        $this->super_admin_model->save_menu_info();
        $sdata = array();
        $sdata['save_menu'] = 'Menu Saved';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_menu');
    }
    
    public function manage_menu()
    {
        $data = array();
        $data['title'] = 'Manage Menu';
        $data['all_menu'] = $this->super_admin_model->select_all_menu();
        $data['dashboard'] = $this->load->view('super_admin/manage_menu', $data, true);
        $this->load->view('super_admin/master', $data);
    }
    
    public function edit_menu($menu_id) 
    {
        $data = array();
        $data['title'] = 'Edit Menu';
        $data['all_image'] = $this->super_admin_model->select_all_image();
        $data['menu_info'] = $this->super_admin_model->select_menu_by_id($menu_id);
        $data['dashboard'] = $this->load->view('super_admin/edit_menu', $data, true);
        $this->load->view('super_admin/master', $data);
    }

    public function update_menu() 
    {
        $sdata = array();
        $sdata['edit_menu'] = 'Update Menu Information Successfully';
        $this->session->set_userdata($sdata);
        $this->super_admin_model->update_menu_info();
        redirect('super_admin/manage_menu');
    }

    public function delete_menu($menu_id) 
    {
        $this->super_admin_model->delete_menu_by_id($menu_id);
        redirect('super_admin/manage_menu');
    }
    
    public function manage_order()
    {
        $data = array();
        $data['title'] = 'Manage Order';
        $data['all_order'] = $this->super_admin_model->select_all_order();
        $data['dashboard'] = $this->load->view('super_admin/manage_order', $data, true);
        $this->load->view('super_admin/master', $data);
    }
    
    public function edit_order($order_id) 
    {
        $data = array();
        $data['title'] = 'Edit Order';
        $data['order_info'] = $this->super_admin_model->select_order_by_id($order_id);
        $data['dashboard'] = $this->load->view('super_admin/edit_order', $data, true);
        $this->load->view('super_admin/master', $data);
    }

    public function update_order() 
    {
        $sdata = array();
        $sdata['edit_order'] = 'Update Order Information Successfully';
        $this->session->set_userdata($sdata);
        $this->super_admin_model->update_order_info();
        redirect('super_admin/manage_order');
    }

    public function delete_order($order_id) 
    {
        $this->super_admin_model->delete_order_by_id($order_id);
        redirect('super_admin/manage_order');
    }
    
    public function manage_customer()
    {
        $data = array();
        $data['title'] = 'Manage Customer';
        $data['all_customer'] = $this->super_admin_model->select_all_customer();
        $data['dashboard'] = $this->load->view('super_admin/manage_customer', $data, true);
        $this->load->view('super_admin/master', $data);
    }
    
    public function edit_customer($customer_id) 
    {
        $data = array();
        $data['title'] = 'Edit Customer';
        $data['customer_info'] = $this->super_admin_model->select_customer_by_id($customer_id);
        $data['dashboard'] = $this->load->view('super_admin/edit_customer', $data, true);
        $this->load->view('super_admin/master', $data);
    }

    public function update_customer() 
    {
        $sdata = array();
        $sdata['edit_customer'] = 'Update Customer Information Successfully';
        $this->session->set_userdata($sdata);
        $this->super_admin_model->update_customer_info();
        redirect('super_admin/manage_customer');
    }

    public function delete_customer($customer_id) 
    {
        $this->super_admin_model->delete_customer_by_id($customer_id);
        redirect('super_admin/manage_customer');
    }
}