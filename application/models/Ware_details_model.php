<?php
class Ware_details_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_list(){
        $query = $this->db->get('ware_details');
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
    public function get_record_by_ware_id($ware_id){
        $query = $this->db->get_where(
            'ware',
            array(
                'ware_id' => $ware_id
            )
            );
        $result_record = $query->row_array();
        return $result_record;
    }
    //TODO: itt valami nem oké
    public function get_record_by_slug($slug){
        $this->db->select('ware.id, ware.name, ware.ware_category_id, ware.slug, ware_details.description, ware.price');
        $this->db->from('ware');
        $this->db->join('ware_details','ware.id = ware_details.ware_id');
        $this->db->where('ware.slug',$slug);

        $query = $this->db->get();

        $data = $query->row_array();
        return $data;
    }
}