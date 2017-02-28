<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model {
    public function get_course_by_student($student_id){
        $sql = "select * from edu_course c, edu_select_course sc where sc.stud_Id=$student_id and sc.cour_Id=c.cour_Id";
        return $this -> db -> query($sql) -> result();
    }
    public function get_teacher_by_student($student_id){
        $sql = "select teac_Name, t.teac_Id from edu_teacher t, edu_select_course sc where sc.stud_Id=$student_id and sc.teac_Id=t.teac_Id";
        return $this -> db -> query($sql) -> result();
    }
}
