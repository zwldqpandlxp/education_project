<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller{
    public function t_index()
    {
        $this->load->model('teacher_model');
        $results=$this->teacher_model->getallclass();
        $this->load->view('t_index',array(
            'results'=>$results
        ));
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
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $results=$this->teacher_model->get_stu_by_tea_id($teac_id->teac_Id);
        $this->load->view('t_stu_information',array(
            'results'=>$results
        ));
    }
    public function add_stu(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $name=$this->input->post('name');
        $this->load->model('teacher_model');
        $row=$this->teacher_model->get_stu_by_stu_id($name);

    }

    public function t_introduce()
    {
        $this->load->view('t_introduce');
    }
    public function t_test(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $results=$this->teacher_model->get_homework_by_teacher_id($teac_id->teac_Id);
        $this->load->view('t_test',array(
            'results'=>$results
        ));
    }
    public function t_see_test(){
        $this->load->view('t_see_test');
    }
    public function t_add_test(){
        $this->load->view('t_add_test');
    }
    public function add_test(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $name=$this->input->post('name');
        $content=$this->input->post('content');
        $data=$this->input->post('data');
        $this->load->model('teacher_model');
        $course=$this->input->post('course');
        $course_id=$this->teacher_model->get_couser_id_by_course($course);
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $start=date("Y-m-d");
        $row=$this->teacher_model->save_test_by_tea_id($teac_id->teac_Id,$name,$content,$data,$course_id->cour_Id,$start);
        if($row){
            redirect('teacher/t_lesson');
        }
    }
    public function t_change_test(){
        $this->load->view('t_change_test');
    }
    public function t_lesson(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $results=$this->teacher_model->get_lesson_by_ti($user_id);
        $this->load->view('t_lesson',array(
            'results'=>$results
        ));
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