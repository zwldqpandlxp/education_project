 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

 	public function login(){
		$this->load->view('login');
	}
    public function index(){
        $this->load->view('index');
    }
    public function check_name()
    {
        $name=$this->input->get('uname');
        $this->load->model('user_model');
        $result=$this->user_model->get_by_name_name($name);
        if($result){
            echo 'fail';
        }else{
            echo 'success';
        }
    }
    public function reg(){
        $this->load->view('reg');
    }
    public  function do_reg(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $len=0;
        if($username.strlen()==10){
            $len=1;
        }else{
            $len=2;
        }
        $this->load->model('user_modol');
        $row=$this->user_modol->save($username,$password,$len);
        if($row>0){
            redirect('welcome/login');
        }else{
            $this->load->view('reg');
        }
    }
    public function check_login()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->load->model('user_model');
        $result=$this->user_model->get_by_name_pwd($username,$password);
        if($result){
            $this->session->set_userdata('logindata',$result);
            $loginID = $this -> session -> userdata('logindata');
            $user_Power=$loginID->user_Power;
            if($user_Power==1){
                redirect('welcome/index');
            }else{
                redirect('welcome/t_index');
            }
        }else{
            echo"hahaha";
        }
    }
    public function t_reg(){
        $this->load->view('t_reg');
    }
}


















