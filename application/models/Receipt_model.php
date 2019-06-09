<?php
class Receipt_model extends CI_Model {
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
    public function add(){
        $data = array(
            'users_id' => $this->ion_auth->get_user_id(),
            'postal_code' => $this->input->post('postal_code'),
            'city' => $this->input->post('city'),
            'street' => $this->input->post('street'),
            'street_number' => $this->input->post('street_number'),
            'date' => time()
        );

        $this->db->insert('receipt', $data);

        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    public function delete($id){
        return $this->db->delete('receipt',array('id' => $id));
    }

    public function get_user_receipts(){

        $this->db->select('id, date, postal_code, city, street, street_number');
        $this->db->from('receipt');
        $this->db->where('users_id',$this->ion_auth->get_user_id());

        $query = $this->db->get();

        $data = $query->result_array();

        return $data;
    }
}