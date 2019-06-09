<?php

class Userpanel extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('receipt_model','receipt');
        $this->load->model('receipt_wares_model','receipt_wares');
        $this->load->model('ion_auth_model','ion_auth_model');
        $this->load->helper('url_helper');
    }
    public function index(){
        $user_data = $this->ion_auth_model->get_user_data();
        $user_receipts = $this->receipt->get_user_receipts();

        foreach ($user_receipts as &$receipt){
            $receipt['items'] = $this->receipt_wares->get_wares_by_receipt_id($receipt['id']);
            $receipt['date'] = gmdate("F j, Y, H:i:s", $receipt['date']);
        }
        
        $data['title'] = 'Felhasználó adatai';
        $data['user_data'] = $user_data[0];
        $data['user_receipts'] = $user_receipts;

        $this->render_page('userpanel/index',$data);
     }
     public function exportCSV(){ 
        $filename = 'receipts.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; charset=utf-8");
        
        $user_receipts = $this->receipt_wares->get_all_receipts_for_user();

        foreach ($user_receipts as &$receipt){
            $receipt['date'] = gmdate("F j, Y, H:i:s", $receipt['date']);
        }

        $file = fopen('php://output', 'w');
      
        $header = array_map("utf8_decode", array("Áru név","Áru ár","Dátum","Irányítószám","Város","Utca","Házszám")); 
        fputcsv($file, $header,";");
        foreach ($user_receipts as $key=>$line){
            $line = array_map("utf8_decode", $line);
            fputcsv($file,$line, ";"); 
        }
        fclose($file);
        exit;
        redirect('user-panel');
       }
}