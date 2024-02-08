<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function getUsername($username)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('UserName', $username);

        $query = $this->db->get()->row_array();
        return $query;
    }
    public function updatePassword($username, $newPassword)
    {
        $this->db->where('Username', $username);
        $this->db->update('admin', array('Password' => $newPassword));
    }
}
