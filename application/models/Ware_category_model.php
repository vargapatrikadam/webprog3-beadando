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
                'ware_category',
                array(
                    'id' => $id
                )
                );
        $result_record = $query->row_array();
        return $result_record;
    }
    public function get_record_by_slug($slug){
        $query = $this->db->get_where(
                'ware_category',
                array(
                    'slug' => $slug
                )
                );
        $result_record = $query->row_array();
        return $result_record;
    }
    public function get_record_by_name($name){
        $query = $this->db->get_where(
            'ware_category',
            array(
                'name' => $name
            )
            );
    $result = $query->row_array();
    return $result;
    }
    public function add($new_row){
        $this->load->helper('url');
        $this->load->helper('text');

        $data = array(
            'name' => $new_row['category'],
            'slug' => url_title(
                        convert_accented_characters($new_row['category']),
                        'dash',
                        TRUE
                    )
        );
        $this->db->insert('ware_category', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function delete($id){
        return $this->db->delete('ware_category',array('id' => $id));
    }
}