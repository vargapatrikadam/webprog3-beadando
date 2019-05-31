<?php

class Cart extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Cart_model','cart');
    }

    public function index(){
        $data['items'] = $this->cart->get_cart_items();
        
        $sum = 0;
        foreach($data['items'] as $item) {
            $sum += $item['price'];
        }

        $data['sum_price'] = $sum;

        $this->render_page('cart/list', $data);

    }
    public function add($slug){
        $this->cart->add_to_cart($slug);

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete($id){
        $this->cart->remove_from_cart($id);
        
        $this->index();
    }
}