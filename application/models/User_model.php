<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getUsername($email)
    {
        $this->db->select('*');
        $this->db->from('tblstudents');
        $this->db->where('EmailId', $email);

        $query = $this->db->get()->row_array();
        return $query;
    }
    public function updatePassword($email, $newPassword)
    {
        $this->db->where('EmailId', $email);
        $this->db->update('tblstudents', array('Password' => $newPassword));
    }
    public function getUserById($studentId)
    {
        $this->db->select('*');
        $this->db->from('tblstudents'); 
        $this->db->where('StudentId', $studentId);
        $query = $this->db->get();
    
        return $query->row_array();
    }
    public function verifyEmail($email, $mobile)
    {
        $this->db->select('*');
        $this->db->from('tblstudents');
        $this->db->where('EmailId', $email);
        $this->db->where('MobileNumber', $mobile);

        $query = $this->db->get();
        return $query;
    }

    private function updateStudentPassword($email, $newPass)
    {
        $data = array('Password' => password_hash($newPass, PASSWORD_DEFAULT));
        $this->db->where('EmailId', $email);
        $this->db->update('tblstudents', $data);
    }
}
