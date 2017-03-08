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
        $stu_id=$this->input->get('stu');
        $this->load->view('t_view_evaluation',array(
            'stu_id'=>$stu_id
        ));
    }
    public function t_view_e(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $time=$this->input->post('time');
        $gread=$this->input->post('gread');
        $test=$this->input->post('test');
        $stu_id=$this->input->post('stu');
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $row=$this->teacher_model->save_atrr($test,$time,$gread,$stu_id,$teac_id->teac_Id);
        if($row>0){
            redirect('teacher/t_view_evaluation');
        }
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
    public function del_stu(){
        $stu_name=$this->input->get('name');
        $this->load->model('teacher_model');
        $row=$this->teacher_model->del_stu($stu_name);
        if($row>0){
            redirect('teacher/t_stu_information');
        }else{
            echo 'erro';
        }
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
        $home_id=$this->input->get('course');
        $this->load->model('teacher_model');
        $result=$this->teacher_model->get_home_by_home_id($home_id);
        $this->load->view('t_see_test',array(
            'result'=>$result
        ));
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
        $home_id=$this->input->get('home');
        $this->load->model('teacher_model');
        $result=$this->teacher_model->get_home_by_home_id($home_id);
        $this->load->view('t_change_test',array(
            'result'=>$result
        ));
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
        $class_name = $this->input->post('class');
        $file_name=$this->input->post('vdio');
        $this->load->model('teacher_model');
        $class_id=$this->teacher_model->get_couser_id_by_course($class_name);
        error_reporting(E_ALL ^ E_NOTICE);
        $filePath='assets/file/';
        if(!is_dir($filePath)){
            mkdir($filePath);
        }
        $type=array("txt","xlsx","mp4");
        in_array((strtolower(substr(strchr($_FILES['file']['name'],'.'),1))),$type);
        $filename=implode('.',$type);
        $filename=time();
        $filename=$filename.(strchr($_FILES['file']['name'],'.'));
        if(file_exists($filePath)){
            $bool=move_uploaded_file($_FILES['file']['tmp_name'],$filePath.$_FILES['file']['name']);
            if($bool){
                $row=$this->teacher_model->save_file($filePath.$_FILES['file']['name'],$file_name,$class_id->cour_Id,$class_name);
                if($row>0){
                    $str='上传成功';
                    $this->load->view('t_up_lesson1',array(
                        'str' => $str
                    ));
                }else{
                    echo 'erro';

                }
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
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $results=$this->teacher_model->get_stu_by_tea_id($teac_id->teac_Id);
        $this->load->view('t_choose_stu',array(
            'results'=> $results
        ));
    }
    public function t_class_controllar(){
        $this->load->view('t_class_controllar');
    }
    public function t_class_controllar1(){
        $this->load->view('t_class_controllar1');
    }
    public function video_begin(){
        $course_id=$this->input->get('course');
        $this->load->model('teacher_model');
        $results=$this->teacher_model->get_vido_by_cour_id($course_id);
        $this->load->view('t_course_test',array(
            'results'=>$results
        ));
    }
    public function t_gread(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $class=$this->input->post('class');
        $time=$this->input->post('time');
        $xf=$this->input->post('xf');
        $ms=$this->input->post('ms');
        $this->load->model('teacher_model');
        $results=$this->teacher_model->save_couser($class,$time,$xf,$ms,$user_id);
        if($results>0){
            redirect('teacher/t_class_controllar1');
        }
    }
    public function t_sor(){
        $this->load->view('t_sor');
    }
    public function t_exam(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $results=$this->teacher_model->get_exam_by_teac($teac_id->teac_Id);

    }
}















