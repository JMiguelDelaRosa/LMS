<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Student_model');
        $this->load->library('form_validation');
    }
	public function index()
	{
		$this->load->view('Admin/dashboard');
	}
    public function reg_student()
    {
        $data['title'] = 'Register Student';

        if (strlen($this->session->userdata('alogin')) == 0) {
            redirect('');
        }else{
        
        $data['studentInfo'] = $this->Student_model->getStudent()->result_array();
        
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/topbar_login');
        $this->load->view('Admin/Student/reg-student', $data);
        $this->load->view('Templates/footer');
        }
    }
    public function activateStudent()
    {
        $id = $this->input->get('id');
        $update = $this->db->where(['id' => $id])->update('tblstudents', ['Status' => 1]);
        if($update)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <strong> Student </strong> has been set as Active!</div>');
            redirect('Student_controller/reg_student');
        }
    }
    public function deActivateStudent()
    {
        $id = $this->input->get('id');
        $update = $this->db->where(['id' => $id])->update('tblstudents', ['Status' => 0]);
        if($update)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <strong> Student </strong> has been <strong> Blocked! </strong> </div>');
            redirect('Student_controller/reg_student');
        }
    }
}