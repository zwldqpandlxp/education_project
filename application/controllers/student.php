<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('user_modol');
        $this -> load -> model('student_model');
        $this -> load -> model('course_model');
        $this -> load -> model('major_model');
        $this -> load -> model('evaluate_teacher_model');
        $this -> load -> model('select_course_model');
    }

    public function index(){
        $loginID = $this -> session -> userdata('logindata');

        if($loginID -> user_Power == 1){
            $student = $this -> student_model -> get_stu_by_user_id($loginID -> user_Id);
            if($student){
                $this -> session -> set_userdata('student', $student);
                $courses = $this -> course_model -> get_course_by_student($student -> stud_Id);
                $this->load->view('index',array(
                    'courses' => $courses,
                ));
            }else{
                redirect('student/introduce');
            }
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
        $student = $this -> session -> userdata('student');
        $tid = $this->select_course_model->get_tid_by_sid($student -> stud_Id);
        $teacher = array();
        foreach($tid as $value){
            $teacher[$value -> teac_Id] = 1;
        }
        $evaluate = $this->evaluate_teacher_model->get_evaluate();
        $eval = array();
        foreach($evaluate as $value){
            if(isset($teacher[$value -> teac_Id])){
                $eval[] = $value;
            }
        }
        $res = array();
        $count = 0;
        foreach ($eval as $value){
            if(!isset($res[$value -> teac_Id])){
                ++$count;
                $res[$value -> teac_Id] = array();
                $res[$value -> teac_Id]['teac_Name'] = $value -> teac_Name;
                $res[$value -> teac_Id]['evte_Lesson'] = $value -> evte_Lesson;
                $res[$value -> teac_Id]['evte_Task'] = $value -> evte_Task;
                $res[$value -> teac_Id]['evte_Answer'] = $value -> evte_Answer;
                $res[$value -> teac_Id]['evte_Behaviour'] = $value -> evte_Behaviour;
                $res[$value -> teac_Id]['num'] = 1;
            }else{
                $res[$value -> teac_Id]['evte_Lesson'] += $value -> evte_Lesson;
                $res[$value -> teac_Id]['evte_Task'] += $value -> evte_Task;
                $res[$value -> teac_Id]['evte_Answer'] += $value -> evte_Answer;
                $res[$value -> teac_Id]['evte_Behaviour'] += $value -> evte_Behaviour;
                ++$res[$value -> teac_Id]['num'];
            }
        }
        $this->load->view('view_evaluate',array(
            'res' => $res,
            'count' => $count
        ));
    }
    public function do_evaluate(){
        $teacher = $this->input->get('teacher');
        $lesson = $this->input->get('lesson');
        $task = $this->input->get('task');
        $answer = $this->input->get('answer');
        $behaviour = $this->input->get('behaviour');
        $t_id = $this->student_model->get_tid_by_tname($teacher);
        $this->evaluate_teacher_model->save_evaluate($t_id->teac_Id, $lesson, $task, $answer, $behaviour);
        redirect('student/view_evaluate');
    }
    public function save_introduce(){
        $name = $this->input->post('username');
        $email = $this->input->post('email');
        $major_name = $this->input->post('major');
        $sex = $this->input->post('sex');
        $loginID = $this -> session -> userdata('logindata');
        $student = $this -> session -> userdata('student');
        $major_id = $this -> major_model -> get_id_by_name($major_name);
        if($student){
            $rows = $this->student_model->update_information($student->stud_ID, $major_id, $name, $sex, $email);
            if($rows){
                redirect('student/index');
            }else{
                redirect('student/introduce');
            }
        }else{
            $rows = $this->student_model->save_information($loginID->user_Id, $major_id, $name, $sex, $email);
            if($rows){
                redirect('student/index');
            }else{
                redirect('student/introduce');
            }
        }
    }
}
