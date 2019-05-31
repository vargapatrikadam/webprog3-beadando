<?php
class Ware_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_list(){
        $this->db->select('ware.id, ware.name, ware.price, ware.slug, ware.ware_category_id, ware_details.picture, ware_details.description');
        $this->db->from('ware');
        $this->db->join('ware_details','ware.id = ware_details.id');

        $query = $this->db->get();

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
    public function get_list_by_category_id($id){
        $this->db->select('ware.id, ware.name, ware.price, ware.slug, ware.ware_category_id, ware_details.picture, ware_details.description');
        $this->db->from('ware');
        $this->db->join('ware_details','ware.id = ware_details.id');
        $this->db->where('ware_category_id',$id);

        $query = $this->db->get();

        $result = $query->result_array();
        return $result;
    }
}