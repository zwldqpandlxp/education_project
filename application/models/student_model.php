<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {
    public function get_stu_by_user_id($user_id){
        $sql = "select * from edu_student where user_Id=$user_id";
        return $this -> db -> query($sql) -> row();
    }
    public function save_information($user_id, $major_id, $name, $sex, $email){
        $sql = "insert into edu_student VALUES (null, $major_id, '$name', $sex, '$email', $user_id)";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function update_information($student_id ,$major_id, $name, $sex, $email){
        $sql = "UPDATE edu_student SET stud_Email = '$email', majo_Id = '$major_id', stud_Name = '$name', stud_Sex = $sex  WHERE stud_Id = '$student_id'";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_tid_by_tname($name){
        $sql="select teac_Id from edu_teacher where teac_Name = '$name'";
        return $this->db->query($sql)->row();
    }
    public function get_homework_by_sid($sid){
        $sql="select * from edu_select_course sc, edu_homework h where h.teac_Id = sc.teac_Id and sc.stud_Id = $sid and sc.cour_Id = h.cour_Id";
        return $this->db->query($sql)->result();
    }
    public function get_homework_by_id($sid, $id){
        $sql="select * from edu_select_course sc, edu_homework h where h.teac_Id = sc.teac_Id and sc.stud_Id = $sid and sc.cour_Id = h.cour_Id and h.home_Id=$id";
        return $this->db->query($sql)->row();
    }
    public function get_course(){
        $sql="select * from edu_teach_course tc, edu_course c, edu_teacher t where tc.teac_Id = t.teac_Id and tc.cour_Id = c.cour_Id";
        return $this->db->query($sql)->result();
    }
    public function get_course_by_sid($sid){
        $sql="select * from edu_select_course sc where sc.stud_Id = $sid";
        return $this->db->query($sql)->result();
    }
    public function del_course_in_select_course($id){
        $sql="DELETE FROM edu_select_course WHERE seco_Id = $id";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function save_course_in_select_course($tid, $cid, $sid){
        $sql="insert into edu_select_course VALUES (null, $sid, $cid, $tid, 0, 1)";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_teach_course_by_id($id){
        $sql="select * from edu_teach_course tc where tc.teco_Id = $id";
        return $this->db->query($sql)->row();
    }
    public function get_exam_by_student($sid){
        $sql="select * from edu_select_course sc, edu_exam e where sc.stud_Id = $sid and e.teac_Id = sc.teac_Id and e.cour_Id = sc.stud_Id";
        return $this->db->query($sql)->result();
    }
    public function save_do_home($sid, $id, $content){
        $sql="insert into edu_do_work VALUES (null,$sid, $id, '$content')";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_exam_by_id($sid, $id){
        $sql="select * from edu_exam e, edu_exam_content ec, edu_select_course se where e.exam_Id=ec.exam_Id and e.exam_Id=$id and se.stud_Id=$sid and se.teac_Id=e.teac_Id and se.cour_Id=e.cour_Id";
        return $this->db->query($sql)->result();
    }
    public function save_do_exam($sid, $id, $content){
        $sql="insert into edu_do_exam VALUES (null,$id, $sid, '$content')";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_teacher_by_course($cid){
        $sql="select * from edu_teach_course where cour_Id = $cid";
        return $this -> db -> query($sql) -> row();
    }
    public function get_all_teachers(){
        $sql="select * from edu_teacher";
        return $this -> db -> query($sql) -> result();
    }
    public function get_lesson_by_tid($tid){
        $sql="select * from edu_teach_course tc where tc.teac_Id = $tid";
        return $this -> db -> query($sql) -> result();
    }
    public function get_course_by_cid($cid){
        $sql="select * from edu_course c where c.cour_Id = $cid";
        return $this -> db -> query($sql) -> row();
    }
}
