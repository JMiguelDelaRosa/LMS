<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookDetails_controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('BookDetails_model');
        $this->load->library('form_validation');
        $this->load->helper('date');
    }
	public function index()
	{
		$this->load->view('Admin/dashboard');
	}
    public function issue_book()
    {
        $data['title'] = 'Issue Book';
        date_default_timezone_set("Asia/Manila");
        $dateToday = date('Y-m-d H:i:s', time());
        
        if (strlen($this->session->userdata('alogin')) == 0) {
            redirect('');
        }else{
        $this->form_validation->set_rules('studentid', 'Student Id', 'required');
        $this->form_validation->set_rules('bookid', 'Book Id', 'required');

        if($this->form_validation->run() == false) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/topbar_login');
            $this->load->view('Admin/BookDetail/issue-book', $data);
            $this->load->view('Templates/footer');
        } else 
        {
            $bookData = [
                'BookId' => $this->input->post('bookid'),
                'StudentID' => $this->input->post('studentid'),
                'IssuesDate' => $dateToday
            ];
            $this->db->insert('tblissuedbookdetails', $bookData);
            $rows = $this->db->affected_rows();
            if ($rows > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    <strong> Book </strong> has been added Successfully!</div>');
              } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                  Failed to add Book!</div>');
              }
            redirect('BookDetails_controller/manage_issued_books');
        }
        }
    }
    public function manage_issued_books()
    {
        $data['title'] = 'Manage Issued Book';
        if (strlen($this->session->userdata('alogin')) == 0) {
            redirect('');
        }else{
        $data['issuedBooks'] = $this->BookDetails_model->issuedBook()->result_array();

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/topbar_login');
        $this->load->view('Admin/BookDetail/manage-issued-books', $data);
        $this->load->view('Templates/footer');
        }
    }
    public function edit_issued_book()
    {
        $data['title'] = 'Manage Issued Book';
        date_default_timezone_set("Asia/Manila");
        $dateToday = date('Y-m-d H:i:s', time());

        if (strlen($this->session->userdata('alogin')) == 0) {
            redirect('');
        }else{

            $id = $this->input->get('id');
            $data['info'] = $this->BookDetails_model->issuedBookById($id);
            if($this->input->post())
            {
                $fine = $this->input->post('fine');
                $this->db->where(['id' => $id])->update('tblissuedbookdetails', ['fine' => $fine, 'ReturnDate' => $dateToday, 'ReturnStatus' => 1]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Update Successful! </div>');
                redirect('BookDetails_controller/manage_issued_books');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed to Update!</div>');
            }
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/topbar_login');
            $this->load->view('Admin/BookDetail/edit-issued-book', $data);
            $this->load->view('Templates/footer');
        }
    }
    public function checkStudent() {
        $studentid = strtoupper($this->input->post("studentid"));

        $studentDetails = $this->BookDetails_model->getStudentDetails($studentid);

        if (!empty($studentDetails)) {
            foreach ($studentDetails as $result) {
                if ($result->Status == 0) {
                    echo "<span style='color:red'> Student ID Blocked </span>" . "<br />";
                    echo "<b>Student Name-</b>" . $result->FullName;
                    echo "<script>$('#submit').prop('disabled',true);</script>";
                } else {
                    echo htmlentities($result->FullName);
                    echo "<script>$('#submit').prop('disabled',false);</script>";
                }
            }
        } else {
            echo "<span style='color:red'> Invalid Student Id. Please Enter Valid Student id.</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    }
    
}