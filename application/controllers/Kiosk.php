<?php
defined('BASEPATH') OR exit ('No direct scripts allowed');

class Kiosk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('BookDetails_model');
        $this->load->model('Kiosk_model');
    }

    public function GetBorrowedBook($bookID)
    {
        $data = $this->Kiosk_model->getIssuedBookInfo($bookID);

        if($data == NULL){
            $json_data = array(
                'accession' => null,
                'bookName' => null,
                'authorName' => null,
                'categoryName' => null,
                'issuesDate' => null,
                'expectedReturnDate' => null,
                'fullName' => null,
                'emailID' => null,
                'mobileNumber' => null
            );
        } else {
            $json_data = array(
                'accessionNumber' => $data['accessionNumber'],
                'bookName' => $data['bookName'],
                'authorName' => $data['authorName'],
                'categoryName' => $data['categoryName'],
                'issuesDate' => $data['issuesDate'],
                'expectedReturnDate' => $data['expectedReturnDate'],
                'fullName' => $data['fullName'],
                'emailID' => $data['emailID'],
                'mobileNumber' => $data['mobileNumber']
            );
        }
        
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($json_data));
    }

    public function ReturnBorrowedBook()
    {
        $json_data = file_get_contents('php://input');
        $response = json_decode($json_data, true);

        $nonExistingCodes = [];
        $existingNotIssued = [];
        $validCodes = [];

        foreach ($response['codes'] as $code) {
            $book = $this->db->get_where('tblbooks', ['isbnNumber' => $code])->row_array();
            
            if (!$book) {
                $nonExistingCodes[] = $code;
            } elseif ($book['bookStatus'] == 1) {
                $existingNotIssued[] = $code;
            } elseif ($book['bookStatus'] == 0) {
                $validCodes[] = $code;
            }
        }

        if (!empty($nonExistingCodes) || !empty($existingNotIssued)) {
            $details = array_merge($nonExistingCodes, $existingNotIssued);
            $response = [
                "message" => "Failed",
                "details" => $details
            ];
        } elseif (!empty($validCodes)) {
            foreach ($validCodes as $codes) {
                $returnStatus = [
                    "returnStatus" => 1,
                    "fine" => 2
                ];

                $id = $this->db->get_where('tblbooks', ['isbnNumber' => $codes])->row_array();
                $this->db->where('bookID', $id['id'])->update('tblissuedbookdetails', $returnStatus);

                $bookStatus = [
                    "bookStatus" => 1
                ];
                $this->db->where('isbnNumber', $codes)->update('tblbooks', $bookStatus);
            }

            if ($this->db->affected_rows() > 0) {
                $response = [
                    "message" => "Success",
                    "details" => ""
                ];
            }
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($response));
    }

    public function info(){
        $data = $this->Kiosk_model->getBookInfo();
        print_r(json_encode($data));
    }
}