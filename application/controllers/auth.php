<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id != NULL)
        {
            redirect('super_admin', 'refresh');
        }
    }
    
    public function index()
    {      
        $this->load->view('super_admin/login');
    }
    
    public function check_admin_login()
    {
        $data = array();
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[250]');
        if($this->form_validation->run() == False)
        {
            $this->load->view('super_admin/login');
        }
        else
        {
            $this->load->model("auth_model");
            $result = $this->auth_model->admin_login_check($data);
            $sdata = array();
            if ($result)
            {
                $sdata['admin_id'] = $result->admin_id;
                $sdata['admin_name'] = $result->admin_name;
                $this->session->set_userdata($sdata);
                redirect('super_admin');
            } 
            else
            {
                $sdata['exception'] = 'Your Login Information Invalid!';
                $this->session->set_userdata($sdata);
                redirect('auth');
            }
        }
    }
}