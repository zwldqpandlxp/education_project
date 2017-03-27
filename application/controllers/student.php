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
            $this -> session -> set_userdata('student', $student);
            if($student){
                $courses = $this -> course_model -> get_course_by_student($student -> stud_Id);
                $homework = $this -> student_model -> get_homework_by_sid($student -> stud_Id);
                $exam = $this -> student_model -> get_exam_by_student($student -> stud_Id);
                $flag = false;
                foreach($homework as $key => $value){
                    $result = $this -> student_model -> get_flag_by_hid($value -> home_Id);
                    if($result -> home_flag == 1){
                        $flag = true;
                    }
                }
                $this->load->view('index',array(
                    'courses' => $courses,
                    'homework' => $homework,
                    'exam' => $exam,
                    'flag' => $flag
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
        $student = $this -> session -> userdata('student');
        $res = $this->course_model->get_course($student -> stud_Id, 1);
        $this->load->view('lesson', array(
            'res' => $res
        ));
    }
    public function lessoned(){
        $student = $this -> session -> userdata('student');
        $res = $this->course_model->get_course($student -> stud_Id, 0);
        $this->load->view('lessoned', array(
            'res' => $res
        ));
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
        $student = $this -> session -> userdata('student');
        $course = $this->student_model->get_course();
        $selected = $this->student_model->get_course_by_sid($student->stud_Id);
        $Hash = array();
        foreach($selected as $key => $value){
            if(!isset($Hash[$value -> cour_Id])){
                $Hash[$value -> cour_Id] = $value;
            }
        }
        $res = array();
        foreach($course as $key => $value){
            if(isset($Hash[$value -> cour_Id])){
                $res[$value -> cour_Id] = $Hash[$value -> cour_Id];
            }
        }
        $this->load->view('select_course', array(
            'course' => $course,
            'res' => $res
        ));
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
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $major_name = $this->input->post('major');
        $sex = $this->input->post('sex');
        $loginID = $this -> session -> userdata('logindata');
        $student = $this -> session -> userdata('student');
        $major_id = $this -> major_model -> get_id_by_name($major_name);
        if($student){
            $rows = $this->student_model->update_information($student->stud_Id, $major_id->majo_Id, $name, $sex, $email);
            if($rows){
                redirect('student/index');
            }else{
                redirect('student/introduce');
            }
        }else{
            $rows = $this->student_model->save_information($loginID->user_Id, $major_id->majo_Id, $name, $sex, $email);
            if($rows){
                redirect('student/index');
            }else{
                redirect('student/introduce');
            }
        }
    }
    public function exam(){
        $this->load->view('exam');
    }
    public function do_select(){
        $id = $this->input->get('id');
        $student = $this -> session -> userdata('student');
        $teach = $this->student_model->get_teach_course_by_id($id);
        $row = $this->student_model->save_course_in_select_course($teach->teac_Id, $teach->cour_Id, $student->stud_Id);
        if($row){
            redirect('student/select_course');
        }else{
            echo "failed";
        }
    }
    public function del_select(){
        $id = $this->input->get('id');
        $row = $this->student_model->del_course_in_select_course($id);
        if($row){
            redirect('student/select_course');
        }else{
            echo "failed";
        }
    }
    public function do_homework(){
        $id = $this->input->get('id');
        $student = $this -> session -> userdata('student');
        $homework = $this -> student_model -> get_homework_by_id($student -> stud_Id, $id);
        $this->load->view('do_homework',array(
            'homework' => $homework
        ));
    }
    public function homework_submit(){
        $id = $this->input->get('id');
        $content = $this->input->post('content');
        $student = $this -> session -> userdata('student');
        $row = $this -> student_model -> save_do_home($id, $student -> stud_Id, $content);
        if($row){
            $this->load->view('problem_status');
        }else{
            echo "failed";
        }
    }
    public function do_exam(){
        $id = $this->input->get('id');
        $student = $this -> session -> userdata('student');
        $exam = $this -> student_model -> get_exam_by_id($student -> stud_Id, $id);
        $this->load->view('do_exam',array(
            'exam' => $exam
        ));
    }
    public function exam_submit(){
        $id = $this->input->get('id');
        $content = $this->input->post('content');
        $student = $this -> session -> userdata('student');
        $row = $this -> student_model -> save_do_exam($id, $student -> stud_Id, $content);
        if($row){
            $this->load->view('problem_status');
        }else{
            echo "failed";
        }
    }
    public function recommend(){                 //推荐模块
        $student = $this -> session -> userdata('student');
        $lessons = $this -> select_course_model -> get_lesson_by_sid($student -> stud_Id);
        $lessons_hash = array();
        foreach($lessons as $value){
            $lessons_hash[$value -> cour_Id] = 1;
        }
        $teachers = array();
        foreach($lessons as $value){
            $t_by_course = $this -> student_model -> get_teacher_by_course($value -> cour_Id);
            $teachers[] = $t_by_course->teac_Id;
        }
        $res = array();
        $count = 0;
        foreach($teachers as $tid){
            $courses = $this -> student_model -> get_lesson_by_tid($tid);
            foreach ($courses as $value){
                if(!isset($lessons_hash[$value -> cour_Id])){
                    $course = $this -> student_model -> get_course_by_cid($value -> cour_Id);
                    $res[] = $course;
                    ++$count;
                }
            }
        }
        $this->load->view('recommend',array(
            'res' => $res,
            'count' => $count
        ));
    }
    public function course_test(){
        $cid = $this -> input -> get('id');
        $video = $this -> student_model -> get_file_by_cid($cid);
        $this -> load -> view('course_test',array(
            'video' => $video
        ));
    }
}
