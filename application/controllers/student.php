<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_modol');
    }

    public function index(){                    //后期需要移除
        $this->load->view('index');
    }
    public function reg(){
        $this->load->view('reg');
    }
    public function introduce(){
        $this->load->view('introduce');
    }
    public function lesson(){
        $this->load->view('lesson');
    }
    public function evaluate()
    {
        $this->load->view('evaluate');
    }
    public function view_evaluate()
    {
        $this->load->view('view_evaluate');
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
}
