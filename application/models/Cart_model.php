<?php
class Cart_model extends CI_Model {
    public function __constuct(){
        $this->load->database();
    }

    public function get_cart_items(){
        $this->db->select('cart.id, cart.ware_id, cart.users_id, ware.name, ware.slug, ware.price, ware_details.picture');
        $this->db->from('cart');
        $this->db->join('ware','ware.id = cart.ware_id');
        $this->db->join('ware_details','ware.id = ware_details.ware_id');
        $this->db->where('cart.users_id', $this->ion_auth->get_user_id());

        $query = $this->db->get();

        $data = $query->result_array();

        return $data;
    }

    public function add_to_cart($slug){
        $query = $this->db->get_where(
            'ware',
            array(
                'slug' => $slug
            )
            );
        $result_record = $query->row_array();

        $data = array(
            'users_id' => $this->ion_auth->get_user_id(),
            'ware_id' => $result_record['id']
        );
        
        return $this->db->insert('cart',$data);
    }

    public function remove_from_cart($id){
        return $this->db->delete('cart',array('id'=>$id));
    }

    public function empty_cart(){
        return $this->db->delete('cart', array('users_id'=> $this->ion_auth->get_user_id()));
    }
}