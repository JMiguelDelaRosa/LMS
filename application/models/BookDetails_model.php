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
    public function issuedBookDesc()
    {
        $this->db->select('tblissuedbookdetails.id, tblstudents.fullName, tblbooks.bookName, tblbooks.isbnNumber, tblbooks.accessionNumber, tblissuedbookdetails.issuesDate, tblissuedbookdetails.expectedReturnDate, tblissuedbookdetails.returnDate, tblissuedbookdetails.studentID, tblissuedbookdetails.fine');
        $this->db->from('tblissuedbookdetails');
        $this->db->join('tblstudents', 'tblstudents.studentID = tblissuedbookdetails.studentID');
        $this->db->join('tblbooks', 'tblbooks.id = tblissuedbookdetails.bookID');
        $this->db->order_by('tblissuedbookdetails.issuesDate', 'desc'); // Sort by issue date in ascending order
        
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
        $this->db->select('fullName, Status');
        $this->db->from('tblstudents');
        $this->db->where('studentID', $studentid);
        $query = $this->db->get();

        return $query->result();
    }
    public function getBookByAccession($accession)
    {
        $this->db->select('tblbooks.id, tblbooks.bookStatus, tblbooks.accessionNumber, tblbooks.bookName, tblissuedbookdetails.returnDate, tblissuedbookdetails.bookID');
        $this->db->from('tblbooks');
        $this->db->join('tblissuedbookdetails', 'tblbooks.id = tblissuedbookdetails.bookID', 'left');
        $this->db->where('tblbooks.accessionNumber', $accession);
        $this->db->order_by('tblissuedbookdetails.returnDate', 'ASC');
        $this->db->limit(1);

        $query = $this->db->get()->row_array();

        return $query;
    }



}
