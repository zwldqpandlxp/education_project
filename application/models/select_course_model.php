<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Select_course_model extends CI_Model {
    public function get_tid_by_sid($stud_id){
        $sql = "select teac_Id from edu_select_course where stud_Id = $stud_id";
        return $this -> db -> query($sql) -> result();
    }
    public function get_lesson_by_sid($stud_id){
        $sql = "select * from edu_select_course where stud_Id = $stud_id";
        return $this -> db -> query($sql) -> result();
    }
}
