<?php

class Category extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ware_model','ware');
        $this->load->model('ware_details_model','ware_details');
        $this->load->model('ware_category_model','ware_category');
        $this->load->helper('url_helper');
    }
    public function index($slug){
        $category = $this->ware_category->get_record_by_slug($slug);

        $id = $category['id'];

        $wares = $this->ware->get_list_by_category_id($id);

        $data['title'] = $category['name'].' árucikkek';
        $data['items'] = $wares;

        $this->render_page('category/list',$data);
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