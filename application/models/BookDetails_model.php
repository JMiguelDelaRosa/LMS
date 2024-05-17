<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookDetails_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getBookDetails()
    {
        $this->db->select('*');
        $this->db->from('tblissuedbookdetails');

        $query = $this->db->get()->result_array();
        return $query;
    }
    public function returnBook()
    {
        $status = 1;
        $this->db->select('*');
        $this->db->from('tblissuedbookdetails');
        $this->db->where('returnStatus', $status);

        $query = $this->db->get()->result_array();
        return $query;
    }
    public function issuedBook()
    {
        $this->db->select('tblissuedbookdetails.id, tblstudents.fullName, tblbooks.bookName, tblbooks.isbnNumber, tblbooks.accessionNumber, tblissuedbookdetails.issuesDate, tblissuedbookdetails.expectedReturnDate, tblissuedbookdetails.returnDate, tblissuedbookdetails.studentID, tblissuedbookdetails.fine');
        $this->db->from('tblissuedbookdetails');
        $this->db->join('tblstudents', 'tblstudents.studentID = tblissuedbookdetails.studentID');
        $this->db->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.bookID');
        
        $query = $this->db->get();

        return $query;
    }
    public function issuedBookById($id)
    {
        $this->db->select('tblissuedbookdetails.id, tblstudents.fullName,tblbooks.accessionNumber, tblbooks.bookName, tblbooks.isbnNumber, tblissuedbookdetails.issuesDate, tblissuedbookdetails.returnDate');
        $this->db->from('tblissuedbookdetails');
        $this->db->join('tblstudents', 'tblstudents.studentID = tblissuedbookdetails.studentID');
        $this->db->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.bookID');
        
        $this->db->where('tblissuedbookdetails.id', $id);

        $query = $this->db->get()->row_array();

        return $query;
    }
    public function getStudentDetails($studentid) 
    {
        $sql = "SELECT fullName, Status FROM tblstudents WHERE studentID = ?";
        $query = $this->db->query($sql, array($studentid));
        return $query->result();
    }
}
