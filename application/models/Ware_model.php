<?php
class Ware_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_list(){
        $query = $this->db->get('ware');
        $result = $query->result_array();
        return $result;
    }
    public function get_record($id){
        $query = $this->db->get_where(
            'ware',
            array(
                'id' => $id
            )
            );
        $result_record = $query->row_array();
        return $result_record;
    }
    public function get_record_by_slug($slug){
        $query = $this->db->get_where(
            'ware',
            array(
                'slug' => $slug
            )
            );
        $result_record = $query->row_array();
        return $result_record;
    }
}