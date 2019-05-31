<?php

class Cart extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Cart_model','cart');
        $this->load->model('Receipt_model','receipt');
        $this->load->model('Receipt_wares_model','receipt_wares');

        $this->load->helper('form');
        $this->load->library('form_validation');
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
    public function load_checkout_page(){
        $data['items'] = $this->cart->get_cart_items();
        
        $sum = 0;
        foreach($data['items'] as $item) {
            $sum += $item['price'];
        }

        $data['sum_price'] = $sum;

        $this->render_page('cart/checkout_view',$data);
    }
    public function order(){
        $this->form_validation->set_rules('postal_code', 'Irányítószám','trim|required');
        $this->form_validation->set_rules('city', 'Város','trim|required');
        $this->form_validation->set_rules('street', 'Utca/út','trim|required');
        $this->form_validation->set_rules('street_number', 'Házszám','trim|required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        $data['items'] = $this->cart->get_cart_items();
        
        $sum = 0;
        foreach($data['items'] as $item) {
            $sum += $item['price'];
        }

        $data['sum_price'] = $sum;

        if($this->form_validation->run()===FALSE)
        {
            $this->render_page('cart/checkout_view',$data);
        }
        else
        {
            $receipt_id = $this->receipt->add();
            foreach($data['items'] as $item){
                $this->receipt_wares->add($receipt_id, $item['ware_id']);
            }
            $this->cart->empty_cart();

            $data['items'] = $this->cart->get_cart_items();

            $this->render_page('cart/list',$data);
        }
    }
}