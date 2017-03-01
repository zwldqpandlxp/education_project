<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model{
    public function getallclass(){
        $sql="select c.cour_Name, t.teac_Name, c.cour_Credit from edu_course c, edu_select_course s, edu_teacher t where c.cour_Id=s.cour_Id and s.teac_Id=t.teac_Id";
        return $this->db->query($sql)->result();
    }
    public function get_lesson_by_ti($user_id){
        $sql="select c.cour_Name,  c.cour_Credit from edu_course c, edu_select_course s, edu_teacher t where c.cour_Id=s.cour_Id and s.teac_Id=t.teac_Id and t.user_Id= $user_id";
        return $this->db->query($sql)->result();
    }
    public function get_couser_id_by_course($course){
        $sql="select cour_Id from edu_course where cour_Name = '$course'";
        return $this->db->query($sql)->row();
    }
    public function get_teac_id_by_user_id($user_id){
        $sql="select teac_Id from edu_teacher where user_Id = $user_id";
        return $this->db->query($sql)->row();
    }
    public function get_homework_by_teacher_id($tea_id){
        $sql="select * from edu_homework where teac_Id= $tea_id";
        return $this->db->query($sql)->result();
    }
    public function get_stu_by_tea_id($tea_id){
        $sql="select s.* ,u.user_Name from edu_select_course c,edu_student s,edu_user u where c.teac_Id= $tea_id and c.stud_Id = s.stud_Id and u.user_Id=s.user_Id";
        return $this->db->query($sql)->result();
    }
    public function save_test_by_tea_id($user_id,$name,$content,$data,$course_id,$start){
        $this->db->insert('edu_homework',array(
            'home_Id'=>null,
            'home_Name'=>$name,
            'home_content'=>$content,
            'home_Start'=>$start,
            'home_End'=>$data,
            'teac_Id'=>$user_id,
            'cour_Id'=>$course_id
        ));
        return $this->db->affected_rows();
    }
    public function get_stu_by_stu_id($name){
        $sql="select stu_Id from edu_user where user_Name = $name";
        return $this->db->query($sql)->row();
    }
}