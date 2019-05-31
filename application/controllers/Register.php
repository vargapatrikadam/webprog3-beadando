<?php
class Register extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');

    }
    public function index()
    {
        $this->form_validation->set_rules('first_name', 'Keresztnév','trim|required');

        $this->form_validation->set_rules('last_name', 'Vezetéknév','trim|required');

        $this->form_validation->set_rules('username','Felhasználónév','trim|required|is_unique[users.username]');

        $this->form_validation->set_rules('email','Email','trim|valid_email|required|is_unique[users.email]');

        $this->form_validation->set_rules('password','Jelszó','trim|min_length[8]|max_length[20]|required');

        $this->form_validation->set_rules('confirm_password','Jelszó újra','trim|matches[password]|required');

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        $data = array();
        if($this->form_validation->run()===FALSE)
        {
            $this->load->helper('form');
            $this->render_page('register/index',$data);
        }
        else
        {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
 
            $additional_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name
            );
 
            if($this->ion_auth->register($username,$password,$email,$additional_data))
            {
                $_SESSION['auth_message'] = 'Sikeres regisztráció!';
                $this->session->mark_as_flash('auth_message');
                redirect('auth/login');
            }
            else
            {
                $_SESSION['auth_message'] = $this->ion_auth->errors();
                $this->session->mark_as_flash('auth_message');
                redirect('register');
            }
        }
    }
}