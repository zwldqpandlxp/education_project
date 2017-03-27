 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('user_modol');
    }

 	public function login(){
		$this->load->view('login');
	}

    public function check_name()
    {
        $name=$this->input->get('uname');
        $this->load->model('user_modol');
        $result=$this->user_modol->get_by_name_name($name);
        if($result){
            echo 'fail';
        }else{
            echo 'success';
        }
    }

    public function check_login()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->load->model('user_modol');
        $result=$this->user_modol->get_by_name_pwd($username,$password);
        if($result){
            $this->session->set_userdata('logindata',$result);
            $loginID = $this -> session -> userdata('logindata');
            $user_Power=$loginID->user_Power;
            if($user_Power==1){
                redirect('student/index');
            }else if($user_Power==2){
                redirect('teacher/t_index');
            }else{
                redirect('teacher/admin');
            }
        }else{
            redirect('welcome/login');
        }
    }

    public function do_reg(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->load->model('user_modol');
        $this->load->model('teacher_model');
        if(strlen($username) == 10){
            $row = $this->user_modol->save($username, $password, 1);
            if($row>0){
                redirect('welcome/login');
            }else{
                redirect('student/reg');
            }
        }else{
            $row = $this->user_modol->save($username, $password, 2);
            if($row>0){
                redirect('teacher/admin');
            }else{
                redirect('teacher/t_reg');
            }
        }

    }
}


