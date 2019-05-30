<?php
class Ware_details_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_list(){
        $query = $this->db->get('receipt');
        $result = $query->result_array();
        return $result;
    }
    public function get_record($id){
        $query = $this->db->get_where(
            'receipt',
            array(
                'id' => $id
            )
            );
        $result_record = $query->row_array();
        return $result_record;
    }
    public function get_record_by_user_id($user_id){
        $query = $this->db->get_where(
            'receipt',
            array(
                'user_id' => $user_id
            )
            );
        $result_record = $query->row_array();
        return $result_record;
    }
    public function add($user_id){
        $data = array(
            'user_id' => $user_id,
            'date' => time()
        );
        
        return $this->db->insert('receipt', $data);
    }
    public function delete($id){
        return $this->db->delete('receipt',array('id' => $id));
    }
}