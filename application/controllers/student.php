<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('user_modol');
        $this -> load -> model('student_model');
        $this -> load -> model('course_model');
    }

    public function index(){                    //后期需要移除
        $loginID = $this -> session -> userdata('logindata');
//        $course = $
        if($loginID -> user_Power == 1){
            $student = $this -> student_model -> get_stu_by_user_id($loginID -> user_Id);
            $this -> session -> set_userdata('student', $student);
            $courses = $this -> course_model -> get_course_by_student($student -> stud_Id);
            $this->load->view('index',array(
                'courses' => $courses,
            ));
        }
    }
    public function reg(){
        $this->load->view('reg');
    }
    public function introduce(){
        $this->load->view('introduce');
    }
    public function lesson(){
        $this->load->view('lesson');
    }
    public function lessoned(){
        $this->load->view('lessoned');
    }
    public function evaluate()
    {
        $student = $this -> session -> userdata('student');
        $teachers = $this -> course_model -> get_teacher_by_student($student -> stud_Id);
        $this->load->view('evaluate',array(
            'teachers' => $teachers
        ));
    }
    public function evaluate_index()
    {
        $this->load->view('evaluate_index');
    }
    public function select_course()
    {
        $this->load->view('select_course');
    }
    public function eva_index()
    {
        $this->load->view('eva_index');
    }
    public function view_evaluate()
    {
        $this->load->view('view_evaluate');
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
}
