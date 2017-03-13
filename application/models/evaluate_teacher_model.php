<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evaluate_teacher_model extends CI_Model {
    public function save_evaluate($t_id, $lesson, $task, $answer, $behaviour){
        $sql = "insert into edu_evaluate_teacher VALUES (null, $t_id, $lesson, $task, $answer, $behaviour)";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_evaluate(){
        $sql = "select * from edu_evaluate_teacher, edu_teacher where edu_evaluate_teacher.teac_Id = edu_teacher.teac_Id";
        return $this -> db -> query($sql) -> result();
    }
}
