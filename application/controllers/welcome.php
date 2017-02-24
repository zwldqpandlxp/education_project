 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

 	public function login(){
		$this->load->view('login');
	}
    public function index(){
        $this->load->view('index');
    }
    public function reg(){
        $this->load->view('reg');
    }
    public function check_name(){
        $name=$this->input->get('uname');
        $this->load->model('user_modol');
        $result=$this->user_modol->get_by_name_name($name);
        if($result){
            echo 'fail';
        }else{
            echo 'success';
        }
    }
    public  function do_reg(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->load->model('user_modol');
        $row=$this->user_modol->save($username,$password);
        if($row>0){
            redirect('welcome/login');

        }else{
            $this->load->view('reg');
        }
    }
}
