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
        $this->db->where('ReturnStatus', $status);

        $query = $this->db->get()->result_array();
        return $query;
    }
    public function issuedBook()
    {
        $this->db->select('tblissuedbookdetails.id, tblstudents.FullName, tblbooks.BookName, tblbooks.ISBNNumber, tblissuedbookdetails.IssuesDate, tblissuedbookdetails.ReturnDate, tblissuedbookdetails.StudentID, tblissuedbookdetails.fine');
        $this->db->from('tblissuedbookdetails');
        $this->db->join('tblstudents', 'tblstudents.StudentId = tblissuedbookdetails.StudentID');
        $this->db->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.BookId');
        
        $query = $this->db->get();

        return $query;
    }
    public function issuedBookById($id)
    {
        $this->db->select('tblissuedbookdetails.id, tblstudents.FullName, tblbooks.BookName, tblbooks.ISBNNumber, tblissuedbookdetails.IssuesDate, tblissuedbookdetails.ReturnDate');
        $this->db->from('tblissuedbookdetails');
        $this->db->join('tblstudents', 'tblstudents.StudentId = tblissuedbookdetails.StudentID');
        $this->db->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.BookId');
        
        $this->db->where('tblissuedbookdetails.id', $id);

        $query = $this->db->get()->row_array();

        return $query;
    }
    public function getStudentDetails($studentid) 
    {
        $sql = "SELECT FullName, Status FROM tblstudents WHERE StudentId = ?";
        $query = $this->db->query($sql, array($studentid));
        return $query->result();
    }
}
