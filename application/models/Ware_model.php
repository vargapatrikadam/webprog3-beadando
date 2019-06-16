<?php
class Ware_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_list(){
        $this->db->select('ware.id, ware.name, ware.price, ware.slug, ware.ware_category_id, ware_details.picture, ware_details.description, ware_category.name AS category_name');
        $this->db->from('ware');
        $this->db->join('ware_details','ware.id = ware_details.ware_id');
        $this->db->join('ware_category','ware.ware_category_id = ware_category.id');
        $this->db->order_by('id', 'ASC');

        $query = $this->db->get();

        $result = $query->result_array();
        return $result;
    }
    public function get_record($id){
        $this->db->select('ware.id, ware.name, ware.price, ware.slug, ware.ware_category_id, ware_details.picture, ware_details.description');
        $this->db->from('ware');
        $this->db->join('ware_details','ware.id = ware_details.ware_id');
        $this->db->where('ware.id',$id);
        $query = $this->db->get();

        $result_record = $query->row_array();
        return $result_record;
    }
    public function get_record_by_slug($slug){
        $this->db->select('ware.id, ware.name, ware.price, ware.slug, ware.ware_category_id, ware_details.picture, ware_details.description');
        $this->db->from('ware');
        $this->db->join('ware_details','ware.id = ware_details.ware_id');
        $this->db->where('ware.slug',$slug);
        $query = $this->db->get();

        $result_record = $query->row_array();

        return $result_record;
    }
    public function get_list_by_category_id($id){
        $this->db->select('ware.id, ware.name, ware.price, ware.slug, ware.ware_category_id, ware_details.picture, ware_details.description');
        $this->db->from('ware');
        $this->db->join('ware_details','ware.id = ware_details.ware_id');
        $this->db->where('ware_category_id',$id);

        $query = $this->db->get();

        $result = $query->result_array();
        return $result;
    }
    public function add($new_row){
        $this->load->helper('url');
        $this->load->helper('text');

        
        $data = array(
            'name' => $new_row['name'],
            'price' => $new_row['price'],
            'slug' => url_title(
                        convert_accented_characters($new_row['name']),
                        'dash',
                        TRUE
                    ),
            'ware_category_id' => $new_row['ware_category_id']
        );

        //$query = $this->db->query('SELECT name FROM ware WHERE name = '.$data['name']);
        //$num_rows = $query->num_rows();

        $query = $this->db->get_where(
            'ware',
            array(
                'name' => $data['name']
            )
            );
        $num_rows = $query->num_rows();

        $query = $this->db->get_where(
            'ware',
            array(
                'slug' => $data['slug']
            )
            );
        $num_rows += $query->num_rows();

        $return_data = array();

        if($num_rows > 0){
            $return_data['exists'] = TRUE;
            $return_data['insert_id'] = -1;
        }
        else{
            $this->db->insert('ware', $data);
            $return_data['exists'] = FALSE;
            $return_data['insert_id'] = $this->db->insert_id();
        }
        return $return_data;
    }
    public function delete($id){
        return $this->db->delete('ware',array('id' => $id));
    }
}