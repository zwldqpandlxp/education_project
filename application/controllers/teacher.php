<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller{
    public function t_index()
    {
        $this->load->view('t_index');
    }
    public function t_reg(){
        $this->load->view('t_reg');
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
    public function t_view_evaluation()
    {
        $this->load->view('t_view_evaluation');
    }

    public function t_stu_information()
    {
         $this->load->view('t_stu_information');
    }

    public function t_introduce()
    {
        $this->load->view('t_introduce');
    }
    public function t_test(){
        $this->load->view('t_test');
    }
    public function t_see_test(){
        $this->load->view('t_see_test');
    }
    public function t_add_test(){
        $this->load->view('t_add_test');
    }
    public function t_change_test(){
        $this->load->view('t_change_test');
    }
    public function t_lesson(){
        $this->load->view('t_lesson');
    }
    public function t_up_lesson(){
        $this->load->view('t_up_lesson');
    }
    public function t_up(){
        $filePath='assets/file/';
        if(!is_dir($filePath)){
            mkdir($filePath);
        }
        $type=array("txt","xlsx");
        in_array((strtolower(substr(strchr($_FILES['file']['name'],'.'),1))),$type);
        $filename=implode('.',$type);
        $filename=time();
        $filename=$filename.(strchr($_FILES['file']['name'],'.'));
        if(file_exists($filePath)){
            $bool=move_uploaded_file($_FILES['file']['tmp_name'],$filePath.$_FILES['file']['name']);
            if($bool){
                $str='上传成功';
                $this->load->view('t_up_lesson1',array(
                    'str' => $str
                ));
            }else{
                echo 'no';
            }
        }else{
            echo 'hehe';
        }
    }
    public function t_up_lesson1(){
        $this->load->view('t_up_lesson1');
    }
    public function t_choose_stu(){
        $this->load->view('t_choose_stu');
    }
    public function t_sor(){
        $this->load->view('t_sor');
    }
    public function t_insert_sor(){
        $this->load->view('t_insert_sor');
    }
}