<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_modol');
    }

    public function index(){
        $this->load->view('index');
    }
    public function reg(){
        $this->load->view('reg');
    }

    public function do_itro(){
        $username=$this->input->post('username');
        $email=$this->input->post('email');
        $gender=$this->input->post('gender');
        $mor=$this->input->post('mor');
        $this->load->model('user_modol');
        $result=$this->user_modol->get_morid_by_mor($mor);
        if(strstr($email,'@')){
            $row=$this->user_modol->set_itro($username,$email,$gender,$result);
            if($row>0){
                redirect('welcome/index');
            }else{
                $this->load->view('introduce');
            }
        }else{
            $this->load->view('introduce');
        }
    }

    public function view_evaluation()
    {
        $this->load->view('view_evaluation');
    }

}
