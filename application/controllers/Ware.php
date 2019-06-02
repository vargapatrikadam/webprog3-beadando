<?php

class Ware extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ware_model','ware');
        $this->load->model('ware_details_model','ware_details');
        $this->load->model('ware_category_model','ware_category');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    public function index(){
        $wares = $this->ware->get_list();

        $data['items'] = $wares;

        $categories = $this->ware_category->get_list();
        $data['categories'] = $categories;

        $this->render_page('ware/list',$data);
     }
    public function show($slug = null){
        if($slug == null){
            show_404();
        }

        $item = $this->ware->get_record_by_slug($slug);

        if(empty($item) || $item == null){
            show_404();
        }
        $data['item'] = $item;
        
        $this->render_page('ware/show',$data);
    }
    //TODO: valószinűleg ha hibás a feltöltés, errort kellene írnunk valahol valahogyan
    //https://www.cloudways.com/blog/codeigniter-upload-file-image/
    public function upload($slug = null){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload',$config);
        if($this->upload->do_upload()){
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $this->ware_details->modify($slug, $config['upload_path'].$file_name);
        }
        else{
            $error = array('error' => $this->upload->display_errors());
        }
        redirect('ware/'.$slug);
    }
    public function delete($id = null){
        $this->ware->delete($id);
        redirect($_SERVER['HTTP_REFERER']);
    }
}