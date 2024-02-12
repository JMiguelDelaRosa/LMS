<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Book_model');
        $this->load->model('BookDetails_model');
        $this->load->model('Student_model');
        $this->load->model('Author_model');
        $this->load->model('Category_model');
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }
	public function index()
	{
		$this->load->view('Admin/dashboard');
	}
    public function dashboard()
    {
        $data['title'] = 'Dashboard';

        if (strlen($this->session->userdata('alogin')) == 0) {
            redirect('');
        }else{

        $data['book'] = count($this->Book_model->getBook());
        $data['bookDetails'] = count($this->BookDetails_model->getBookDetails());
        $data['bookReturn'] = count($this->BookDetails_model->returnBook());
        $data['studentCount'] = count($this->Student_model->getStudent()->result_array());
        $data['authorCount'] = count($this->Author_model->getAuthor());
        $data['categoryCount'] = count($this->Category_model->getCategory());

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/topbar_login');
        $this->load->view('Admin/dashboard', $data);
        $this->load->view('Templates/footer');
        }
        
    }
    public function change_passwords()
    {
        $data['title'] = 'Change Password';

        if (strlen($this->session->userdata('alogin')) == 0) {
            redirect('');
        } else {
            
            if ($this->input->post('change')) {
                $password = $this->input->post('password');
                $newpassword = $this->input->post('newpassword');
            }
            

            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/topbar_login');
            $this->load->view('Admin/change-password', $data);
            $this->load->view('Templates/footer');
        }
    }
    public function change_password()
    {
        $data['title'] = 'Change Password';

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');

        // Check if user is logged in
        if (!$this->session->userdata('alogin')) {
            redirect('');
        }

        // Validate form input
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            // Load the change password view
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/topbar_login');
            $this->load->view('Admin/change-password');
            $this->load->view('Templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $username = $this->session->userdata('alogin');

            $result = $this->Admin_model->getUsername($username);

            if (password_verify($current_password, $result['Password'])) {
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $this->Admin_model->updatePassword($username, $hashed_new_password);

                // $this->session->set_flashdata('message', 'Password changed successfully');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password changed successfully! </div>');
                redirect('admin/change_password');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Incorrect current password! </div>');
                // $this->session->set_flashdata('message', 'Incorrect current password');
                redirect('admin/change_password');
            }
        }
    }
}
