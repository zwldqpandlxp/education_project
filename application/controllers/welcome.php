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
}