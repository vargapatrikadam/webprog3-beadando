<?php

class Ware extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ware_model','ware');
        $this->load->model('ware_details_model','ware_details');
        $this->load->model('ware_category_model','ware_category');
        $this->load->helper('url_helper');
    }
    public function index(){
        $wares = $this->ware->get_list();

        $data['title'] = 'Áruk listája';
        $data['items'] = $wares;

        $categories = $this->ware_category->get_list();
        $data['categories'] = $categories;

        $this->render_page('ware/list',$data);
     }
    public function show($slug = null){
        if($slug == null){
            show_404();
        }

        $item = $this->ware_details->get_record_by_slug($slug);

        if(empty($item) || $item == null){
            show_404();
        }
        $data['item'] = $item;
        
        $this->load->view('ware/show',$data);
    }
}