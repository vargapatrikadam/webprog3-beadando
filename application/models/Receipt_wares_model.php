<?php
class Receipt_wares_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_list(){
        $query = $this->db->get('receipt_wares');
        $result = $query->result_array();
        return $result;
    }
    public function get_record($id){
        $query = $this->db->get_where(
            'receipt_wares',
            array(
                'id' => $id
            )
            );
        $result_record = $query->row_array();
        return $result_record;
    }
    public function get_record_by_ware_id($ware_id){
        $query = $this->db->get_where(
            'receipt_wares',
            array(
                'ware_id' => $ware_id
            )
            );
        $result_record = $query->row_array();
        return $result_record;
    }
    public function add($receipt_id, $ware_id){
        $data = array(
            'receipt_id' => $receipt_id,
            'ware_id' => $ware_id
        );
        
        return $this->db->insert('receipt_wares', $data);
    }
    public function delete($id){
        return $this->db->delete('receipt_wares',array('id' => $id));
    }
    public function get_wares_by_receipt_id($receipt_id){
        $this->db->select('ware.id, ware.name, ware.price, ware.slug');
        $this->db->from('ware');
        $this->db->join('receipt_wares', 'receipt_wares.ware_id = ware.id');
        $this->db->where('receipt_wares.receipt_id',$receipt_id);

        $query = $this->db->get();

        $data = $query->result_array();

        return $data;
    }
}