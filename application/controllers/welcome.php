 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_modol');
    }
 	public function login(){
		$this->load->view('login');
	}
    public function index(){
        $this->load->view('index');
    }

    public function t_index()
    {
        $this->load->view('t_index');
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
    public function reg(){
        $this->load->view('reg');
    }
    public  function do_reg(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        if(strlen($username) == 10){
            $row = $this->user_modol->save($username, $password, 1);
        }else{
            $row = $this->user_modol->save($username, $password, 2);
        }
        if($row>0){
            redirect('welcome/login');
        }else{
            redirect('welcome/reg');
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
    public function introduce(){
        $this->load->view('introduce');
    }
    public function chart(){
        $this->load->view('chart');
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
    public function dot_itro(){
        $username=$this->input->post('username');
        $email=$this->input->post('email');
        $gender=$this->input->post('gender');
        $dec=$this->input->post('mor');
        $this->load->model('user_modol');
        $result=$this->user_modol->get_decid_by_mor($dec);
        if(strstr($email,'@')){
            $row=$this->user_modol->set_itro($username,$email,$gender,$result);
            if($row>0){
                redirect('welcome/t_index');
            }else{
                $this->load->view('t_introduce');
            }
        }else{
            $this->load->view('t_introduce');
        }
    }

    public function view_evaluation()
    {
        $this->load->view('view_evaluation');
    }
    public function t_view_evaluation()
    {
        $this->load->view('t_view_evaluation');
    }
}


