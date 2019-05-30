<?php
class Ware_category_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_list(){
        $query = $this->db->get('ware_category');
        $result = $query->result_array();
        return $result;
    }
    public function get_record($id){
        $query = $this->db->get_where(
                'news',
                array(
                    'id' => $id
                )
                );
        $result_record = $query->row_array();
        return $result_record;
    }
}