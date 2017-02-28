<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {
    public function get_stu_by_user_id($user_id){
        $sql = "select * from edu_student where user_Id=$user_id";
        return $this -> db -> query($sql) -> row();
    }
}
