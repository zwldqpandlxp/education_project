<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {
    public function get_stu_by_user_id($user_id){
        $sql = "select * from edu_student where user_Id=$user_id";
        return $this -> db -> query($sql) -> row();
    }
    public function save_information($user_id, $major_id, $name, $sex, $email){
        $sql = "insert into edu_student VALUES (null, $major_id, $name, $sex, $email, $user_id)";
        return $this -> db -> query($sql) -> affected_rows();
    }
    public function update_information($student_id ,$major_id, $name, $sex, $email){
        $sql = "UPDATE edu_student SET stud_Email = '$email', majo_Id = '$major_id', stud_Name = $name, stud_Sex = $sex  WHERE stud_Id = '$student_id'";
        return $this -> db -> query($sql) -> affected_rows();
    }
    public function get_tid_by_tname($name){
        $sql="select teac_Id from edu_teacher where teac_Name = '$name'";
        return $this->db->query($sql)->row();
    }
}
