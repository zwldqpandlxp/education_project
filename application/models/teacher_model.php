<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model{
    public function getallclass(){
        $sql="select c.cour_Name, t.teac_Name, c.cour_Credit from edu_course c, edu_select_course s, edu_teacher t where c.cour_Id=s.cour_Id and s.teac_Id=t.teac_Id";
        return $this->db->query($sql)->result();
    }
}