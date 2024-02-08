<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('BookDetails_model');
        $this->load->model('Student_model');
        $this->load->helper('form'); 
        $this->load->database();
        $this->load->library('session');
    }
    public function index() 
    {   
        $data['title'] = 'Library Management System';
        
        $this->form_validation->set_rules('emailid', 'EmailId', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
       
        if ($this->form_validation->run() == false) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/topbar', $data);
            $this->load->view('User/Userlogin');
            $this->load->view('Templates/footer');
          } else {
            
            $this->userLogin();
          }
    }
    public function userDashboard()
    {
        $data['title'] = 'Library Management System';
        
        $loginEmail = $this->session->userdata('login');

        if (strlen($this->session->userdata('login')) == 0) {
            redirect('');
        } else {
            $result = $this->User_model->getUsername($this->session->userdata('login'));
            $user = $this->User_model->getUserById($result['StudentId']);

            if ($user) {
                $data['user'] = $user;
                $studentId = $data['user']['StudentId'];
                
                $issuedBooks = $this->BookDetails_model->getBookDetails();

                $studentIds = array();

                $matchingStudentInfo = array_filter($issuedBooks, function($book) use ($studentId) {
                    return $book['StudentID'] == $studentId;
                });
                $data['countedBook'] = count($matchingStudentInfo);
                

                $returnStatus = array_filter($issuedBooks, function($book) use ($studentId) {
                    return $book['StudentID'] == $studentId && $book['ReturnStatus'] == 0;
                });

                $data['unreturnedBook'] = count($returnStatus);

                $this->load->view('Templates/header', $data);
                $this->load->view('Templates/topbar_user');
                $this->load->view('User/Dashboard', $data); 
                $this->load->view('Templates/footer');
            } else {
                redirect('');
            }
        }
    }
    public function userLogin()
    {
        $this->load->helper('url');
        
        $captchaValue = $this->input->post('vercode');
        $email = $this->input->post('emailid');
        $password = $this->input->post('password');

        if ($captchaValue != $this->session->userdata('vercode') || $this->session->userdata('vercode') == '')
        {
            $this->session->set_flashdata('message', 'Incorrect verification code');
            redirect('');
        } 
        else
        {
            $result = $this->User_model->getUsername($email);
            
            if(!empty($result))
            {
                if(password_verify($password, $result['Password']))
                {
                    $this->session->set_userdata('login', $email);
                    redirect('User_controller/userDashboard');
                }
                else
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Incorrect Password! </div>');
                    redirect('User_controller/index');
                }
            }
        }
    }
    public function profile()
    {
        $data['title'] = 'Student Profile';

        $loginEmail = $this->session->userdata('login');

        if (empty($loginEmail)) {
            redirect('');
        } else {
            $result = $this->User_model->getUsername($loginEmail);

            if (!empty($result)) {
                $studentId = $result['StudentId'];

                $data['studentInfo'] = $this->Student_model->getStudentById($studentId);
                if($this->input->post())
                {
                    $info = array(
                        'FullName' => $this->input->post('fullname'),
                        'MobileNumber' => $this->input->post('mobileno')
                    );
                    $this->db->where(['EmailId' => $loginEmail])->update('tblstudents', $info);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Update Successful! </div>');
                    redirect('User_controller/userDashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed to Update!</div>');
                }

                $this->load->view('Templates/header', $data);
                $this->load->view('Templates/topbar_user');
                $this->load->view('User/Profile', $data); 
                $this->load->view('Templates/footer');
            } else {
                redirect('');
            }
        }
    }
    public function issuedBooks()
    {
        $data['title'] = 'Managed Issued Books';
        $loginEmail = $this->session->userdata('login');

        if (strlen($loginEmail) == 0) {
            redirect('');
        } else {
            $issuedStudentBook = $this->BookDetails_model->issuedBook()->result_array();
            
            $filteredStudent = array_filter($this->Student_model->getStudent()->result_array(), function ($student) use ($loginEmail) {
                return $student['EmailId'] == $loginEmail;
            });
            $student = reset($filteredStudent);
            $studentId = $student['StudentId'];
            
            $data['issuedBook'] = array_filter($issuedStudentBook, function ($book) use ($studentId) {
                return $book['StudentID'] == $studentId;
            });
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/topbar_user');
            $this->load->view('User/Issuedbook', $data); 
            $this->load->view('Templates/footer');
        }
    }
    public function logout()
    {
        $this->load->library('session');

        $this->session->sess_destroy();

        redirect('');
    }
    public function changePass()
    {
        $data['title'] = 'Change Password';

        if (strlen($this->session->userdata('login')) == 0) {
            redirect('');
        } else {
            $this->form_validation->set_rules('password', 'Current Password', 'required');
            $this->form_validation->set_rules('newpassword', 'New Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|min_length[6]');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('Templates/header', $data);
                $this->load->view('Templates/topbar_user');
                $this->load->view('User/Changepass');
                $this->load->view('Templates/footer');
            } else {
                $password = $this->input->post('password');
                $newPassword = $this->input->post('newpassword');
                $email = $this->session->userdata('login');

                $result = $this->User_model->getUsername($email);

                if ($result && password_verify($password, $result['Password'])) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $this->User_model->updatePassword($email, $hashedPassword);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password changed successfully! </div>');
                    redirect('User_controller/changePass');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Incorrect current password! </div>');
                    redirect('User_controller/changePass');
                }
            }
        }
    }
    public function forgotPass()
    {
        $data['title'] = 'Forgot Password';

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('newpassword', 'New Password', 'required');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[newpassword]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/topbar');
            $this->load->view('User/Forgotpass');
            $this->load->view('Templates/footer');
        } else {
            $email = $this->input->post('email');
            $mobile = $this->input->post('mobile');
            $newPass = $this->input->post('newpassword');

            // Call the verifyEmail function to check if email and mobile match
            $result = $this->User_model->verifyEmail($email, $mobile);

            if ($result->num_rows() > 0) {
                // Email and mobile match found, update the password
                $this->User_model->updateStudentPassword($email, $newPass);
                echo "Password updated successfully.";
            } else {
                // No match found, display an error message
                echo "Invalid email or mobile.";
            }
        }
    }
    public function signUp()
    {
        $data['title'] = 'Sign Up';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('mobileno', 'Mobile Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Templates/topbar', $data);
            $this->load->view('User/Signup');
            $this->load->view('Templates/footer');
        } else {
            $latestStudentId = $this->db->select_max('StudentId')->get('tblstudents')->row()->StudentId;

            $numericPart = (int) substr($latestStudentId, 3);
            $newNumericPart = $numericPart + 1;

            $newStudentId = 'SID' . sprintf('%03d', $newNumericPart);

            $data = array(
                'StudentId' => $newStudentId,
                'FullName' => $this->input->post('fullname'),
                'MobileNumber' => $this->input->post('mobileno'),
                'EmailId' => $this->input->post('email'),
                'Status' => '1',
                'Password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            $this->db->insert('tblstudents', $data);
            $rows = $this->db->affected_rows();

            if ($rows > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    An <strong> Account </strong> has been Created Successfully!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Failed to Create New Account!</div>');
            }
            redirect('User_controller/signUp');
        }
    }

    public function captcha()
    {
        $this->load->library('session');

        // Code for captcha generation
        $text = rand(10000, 99999);
        $this->session->set_userdata('vercode', $text);
        $height = 25;
        $width = 65;
    
        $image_p = imagecreate($width, $height);
        $black = imagecolorallocate($image_p, 0, 0, 0);
        $white = imagecolorallocate($image_p, 255, 255, 255);
        $font_size = 14;
    
        imagestring($image_p, $font_size, 5, 5, $text, $white);
    
        // Send the appropriate header and output the image
        header('Content-Type: image/jpeg');
        imagejpeg($image_p, null, 80);
    
        // Free up memory
        imagedestroy($image_p);
    }
}