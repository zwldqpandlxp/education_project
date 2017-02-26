 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
                redirect('welcome/index');
            }else{
                redirect('welcome/t_index');
            }
        }else{
            echo"hahaha";
        }
    }

    public function introduce(){
        $this->load->view('introduce');
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



}


