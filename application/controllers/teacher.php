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
        $jibie=$this->input->post('jibie');
        $dec=$this->input->post('mor');
        $this->load->model('user_modol');
        $this->load->model('teacher_model');
        $result=$this->user_modol->get($dec);
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        if(strstr($email,'@')){
            $row=$this->teacher_model->save_tea($username,$email,$gender,$result->dept_Id,$jibie,$user_id);
            if($row>0){
                redirect('teacherF/t_index');
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
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $start=date("Y-m-d");
        $row=$this->teacher_model->save_test_by_tea_id($teac_id->teac_Id,$name,$content,$data,$course,$start);
        $results=$this->teacher_model->get_lesson_by_ti($teac_id->teac_Id);
        if($row){
            redirect('teacher/t_lesson',array(
                'result'=>$results
            ));
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
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $results=$this->teacher_model->get_lesson_by_ti($teac_id->teac_Id);
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
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $course_id=$this->input->get('course');
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
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
        $row=$this->teacher_model->get_couser_id_by_course($class);
        if($row>0){
            $cour_id=$this->teacher_model->get_couser_id_by_course($class);
            $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
            $result=$this->teacher_model->save_couser_lianjie($cour_id->cour_Id,$teac_id->teac_Id);
            if($result){
                redirect('teacher/t_class_controllar1');
            }
        }else{
            $results=$this->teacher_model->save_couser($class,$time,$xf,$ms,$user_id);
            if($results>0){
                $cour_id=$this->teacher_model->get_couser_id_by_course($class);
                $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
                $result=$this->teacher_model->save_couser_lianjie($cour_id,$teac_id);
                if($result){
                    redirect('teacher/t_class_controllar1');
                }
            }
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
        if($results){
            $this->load->view('t_exam',array(
                'results'=>$results
            ));
        }
    }
    public function t_add_exam(){
        $this->load->view('t_add_exam');
    }
    public function t_add_exam1(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $exam_name=$this->input->post('name');
        $cour_name=$this->input->post('course');
        $time=$this->input->post('data');
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $cour_id=$this->teacher_model->get_couser_id_by_course($cour_name);
        $row=$this->teacher_model->save_add_exam($exam_name,$cour_id->cour_Id,$teac_id->teac_Id,$time);
        if($row>0){
            $result=$this->teacher_model->get_exam($exam_name,$teac_id->teac_Id,$cour_id->cour_Id);
            $this->load->view('t_add_ti',array(
                'result'=>$result
            ));
        }
    }
    public function t_add_ti(){
        $content=$this->input->post('content');
        $cour_id=$this->input->post('course');
        $this->load->model('teacher_model');
        $row=$this->teacher_model->save_ti($cour_id,$content);
        if($row){
            $this->load->view('t_add_t1',array(
                'result'=>$cour_id
            ));
        }
    }
    public function t_add_t1(){
        $content=$this->input->post('content');
        $cour_id=$this->input->post('course');
        $this->load->model('teacher_model');
        $row=$this->teacher_model->save_ti($cour_id,$content);
        if($row){
            $this->load->view('t_add_t1',array(
                'result'=>$cour_id
            ));
        }
    }
    public function check_exam(){
        $course=$this->input->get('course');
        $exam_id=$this->input->get('exam');
        $this->load->model('teacher_model');
        $resluts=$this->teacher_model->get_exam_by_exam_id($exam_id);
        if($resluts>0){
            $this->load->view('t_check_exam',array(
                'results'=>$resluts,
                'course'=>$course
        ));
        }
    }
    public function del_exam(){
        $exam=$this->input->get('exam');
        $this->load->model('teacher_model');
        $resluts=$this->teacher_model->del_exam_con_by_exam_id($exam);
        if($resluts>0){
            $row=$this->teacher_model->del_exam_by_exam_id($exam);
            if($row>0){
                redirect('teacher/t_exam');
            }
        }
    }
    public function t_change_exam(){
        $course=$this->input->get('course');
        $exam_id=$this->input->get('exam');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $course_id=$this->teacher_model->get_couser_id_by_course($course);
        $results=$this->teacher_model->get_stu_by_tea_id_cour($teac_id->teac_Id,$course_id->cour_Id);
        $this->load->view('t_change_exam',array(
            'results'=>$results,
            'exam'=>$exam_id,
            'course'=>$course
        ));
    }
    public function t_pigai(){
        $course=$this->input->get('course');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $name=$this->input->get('name');
        $exam_id=$this->input->get('exam');
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $stu_arr=$this->teacher_model->get_stu_arr_by_stu($teac_id->teac_Id,$name);
        echo $stu_arr->evst_Id;
        if(($stu_arr->evst_test)>0){
            $resluts=$this->teacher_model->get_exam_con_by_exam_id($exam_id);
            $this->load->view('t_pigai',array(
                'resluts'=>$resluts,
                'exam'=>$exam_id,
                'course'=>$course
            ));
        }else{
            echo '请先评价该学生';
        }

    }
    public function get_gread(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $gread=$this->input->post('gread');
        $name=$this->input->post('name');
        $course=$this->input->post('course');
        $this->load->model('teacher_model');
        $course_id=$this->teacher_model->get_couser_id_by_course($course);
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $stu_arr=$this->teacher_model->get_stu_arr_by_stu($teac_id->teac_Id,$name);
        $totle_gread=$gread*0.7+$stu_arr->evst_status*0.1+$stu_arr->evst_Attitude*0.1+$stu_arr->evst_Examination*0.1;
        $resluts=$this->teacher_model->save_gread($totle_gread,$teac_id->teac_Id,$course_id->cour_Id,$name);
        if($resluts>0){
           redirect('teacher/t_exam');
        }
    }
    public function t_pi_test(){
        $home=$this->input->get('home');
        $cour=$this->input->get('cour');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $results=$this->teacher_model->get_stu_by_tea_id_cour($teac_id->teac_Id,$cour);
        $this->load->view('t_pi_test',array(
            'results'=>$results,
            'home'=>$home
        ));
    }
    public function t_pg_test(){
        $home=$this->input->get('home');
        $stu=$this->input->get('name');
        $this->load->model('teacher_model');
        $results=$this->teacher_model->get_home_con_by_home_id($home);
        $this->load->view('t_pg_test',array(
            'results'=>$results,
            'stu'=>$stu
        ));
    }
    public function get_gread_test(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $stu=$this->input->post('name');
        $gread=$this->input->post('gread');
        $stu_arr=$this->teacher_model->get_stu_arr_by_stu($teac_id->teac_Id,$stu);
        if(($stu_arr->evst_Id)>0){
            $row=$this->teacher_model->save_gread_test($stu,$teac_id->teac_Id,$gread);
            if($row){
                $results=$this->teacher_model->get_homework_by_teacher_id($teac_id->teac_Id);
                $this->load->view('t_test',array(
                    'results'=>$results
                ));
            }else{
                echo '批改失败';
            }
        }else{
            echo '请先评价该学生';
        }
    }
}















