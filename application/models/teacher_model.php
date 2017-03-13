<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model{
    public function getallclass(){
        $sql="select c.cour_Name, t.teac_Name, c.cour_Credit,p.pict_Url,c.cour_Id from edu_course c, edu_select_course s, edu_teacher t,edu_picture p where c.cour_Id=s.cour_Id and s.teac_Id=t.teac_Id and p.pict_Id=c.pict_Id";
        return $this->db->query($sql)->result();
    }
    public function get_lesson_by_ti($user_id){
       //$sql="select c.cour_Name,  c.cour_Credit,p.pict_Url,c.cour_Id from edu_picture p, edu_course c, edu_select_course s, edu_teacher t,edu_teach_course l where p.pict_Id=c.pict_Id and c.cour_Id=s.cour_Id and s.teac_Id=t.teac_Id and t.user_Id= $user_id";
        $sql="select c.cour_Name,c.cour_Credit,p.pict_Url,c.cour_Id from edu_picture p,edu_course c,edu_teach_course s where c.pict_Id=p.pict_Id and s.cour_Id=c.cour_Id and s.teac_Id=$user_id";
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
        $sql="select s.* ,u.user_Name,e.cour_Name from edu_course e,edu_select_course c,edu_student s,edu_user u where c.teac_Id= $tea_id and c.stud_Id = s.stud_Id and u.user_Id=s.user_Id and e.cour_Id=c.cour_Id";
        return $this->db->query($sql)->result();
    }
    public function save_test_by_tea_id($user_id,$name,$content,$data,$course_id,$start){
        $this->db->insert('edu_homework',array(
            'home_Id'=>null,
            'home_Name'=>$name,
            'home_Content'=>$content,
            'home_Start'=>$start,
            'home_End'=>$data,
            'teac_Id'=>$user_id,
            'cour_Id'=>$course_id
        ));
        return $this->db->affected_rows();
    }
    public function get_stu_id_by_user_name($name){
        $sql="select s.stud_Id from edu_student s,edu_user u where s.user_Id=u.user_Id and u.user_Name = $name";
        return $this->db->query($sql)->row();
    }
    public function add_stu_to_tea($stu_id,$tea_id,$cour_id){
        $this->db->insert('edu_select_course',array(
            'seco_Id'=> null,
            'stud_Id'=>$stu_id,
            'cour_Id'=>$cour_id,
            'teac_Id'=>$tea_id,
        ));
        return $this->db->affected_rows();
    }
    public function get_stu_id_by_user_id($user_id){
        $sql="select user_Id from edu_user where user_Name = $user_id";
        return $this->db->query($sql)->row();
    }
    public function get_stu_or_not($stu_id,$cour_id,$tea_id){
        $sql="select * from edu_select_course where stud_Id = '$stu_id'and cour_Id = '$cour_id' and teac_Id = '$tea_id'";
        return $this->db->query($sql)->row();
    }
    public function del_stu($stu_name){
        $sql="delete e.* from edu_select_course e,edu_student s where s.stud_Id=e.stud_Id and s.stud_Name = '$stu_name'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function save_file($path,$file_name,$class_id,$class_name){
        $this->db->insert('edu_file',array(
            'file_Id'=> null,
            'file_Url'=>$path,
            'file_Type'=>$class_name,
            'cour_Id'=>$class_id,
            'file_Name'=>$file_name
        ));
        return $this->db->affected_rows();
    }
    public function get_vido_by_cour_id($cour_Id){
        $sql="select * from edu_file where cour_Id=$cour_Id";
        return $this->db->query($sql)->result();
    }
    public function get_home_by_home_id($home_id){
        $sql="select * from edu_homework where home_Id=$home_id";
        return $this->db->query($sql)->row();
    }
    public function save_couser($class,$time,$xf,$ms){
        $this->db->insert('edu_course',array(
            'cour_Id'=> null,
            'cour_Name'=>$class,
            'cour_Credit'=>$xf,
            'cour_Class'=>$time,
            'cour_Desc'=>$ms,
            'pict_Id'=>2
        ));
        return $this->db->affected_rows();
    }
    public function save_atrr($test,$time,$gread,$stu,$teac_Id){
        $this->db->insert('edu_evaluate_student',array(
            'evst_Id'=> null,
            'stud_Id'=>$stu,
            'evst_Attitude'=>$test,
            'evst_Examination'=>$gread,
            'evst_Status'=>$time,
            'teac_Id'=>$teac_Id
        ));
        return $this->db->affected_rows();
    }
    public function get_exam_by_teac($teac_id){
        $sql="select e.*,c.cour_Name from edu_exam e,edu_course c where e.teac_Id = $teac_id and c.cour_Id=e.cour_Id";
        return $this->db->query($sql)->result();
    }
    public function save_add_exam($exam_name,$cour_id,$teac_id,$time){
        $this->db->insert('edu_exam',array(
            'exam_Id'=> null,
            'exam_Name'=>$exam_name,
            'cour_Id'=>$cour_id,
            'teac_Id'=>$teac_id,
            'exam_Time'=>$time
        ));
        return $this->db->affected_rows();
    }
    public function get_exam($exam_name,$teac_id,$cour_id){
        $sql="select * from edu_exam where exam_Name= '$exam_name' and teac_Id = $teac_id and cour_Id = $cour_id";
        return $this->db->query($sql)->row();
    }
    public function save_ti($cour_id,$content){
        $this->db->insert('edu_exam_content',array(
            'exco_Id'=> null,
            'exam_Id'=>$cour_id,
            'exco_Content'=>$content
        ));
        return $this->db->affected_rows();
    }
    public function get_exam_by_exam_id($exam_id){
        $sql="select * from edu_exam_content where exam_Id = $exam_id";
        return $this->db->query($sql)->result();
    }
    public function del_exam_con_by_exam_id($exam){
        $sql="delete from edu_exam_content where exam_Id = $exam";
        echo $sql;
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function del_exam_by_exam_id($exam){
        $sql="delete from edu_exam where exam_Id = $exam";
        echo $sql;
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function get_exam_con_by_exam_id($exam_id){
        $sql="select e.*,d.* from edu_exam_content e,edu_do_exam d where e.exam_Id = $exam_id and d.exam_Id = $exam_id";
        return $this->db->query($sql)->result();
    }
    public function t_change_exam($exam_id){
        $sql="select * from edu_do_exam where exam_Id = $exam_id";
        return $this->db->query($sql)->result();
    }
    public function get_stu_arr_by_stu($teac_id,$name){
        $sql="select * from edu_evaluate_student where stud_Id = $name and teac_Id=$teac_id";
        return $this->db->query($sql)->row();
    }
    public function save_gread($totle_gread,$teac_id,$course_id,$name){
        $sql="update edu_select_course set seco_Grade = $totle_gread where stud_Id=$name and teac_Id = $teac_id and cour_Id=$course_id";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function get_stu_by_tea_id_cour($teac_id,$course){
        $sql="select s.* ,u.user_Name,e.cour_Name from edu_course e,edu_select_course c,edu_student s,edu_user u where c.cour_Id=$course and c.teac_Id= $teac_id and c.stud_Id = s.stud_Id and u.user_Id=s.user_Id and e.cour_Id=c.cour_Id";
        return $this->db->query($sql)->result();
    }
    public function get_home_con_by_home_id($home){
        $sql="select w.*,d.dowo_Content from edu_do_work d,edu_homework w where d.home_Id = w.home_Id and d.home_Id = $home";
        return $this->db->query($sql)->result();
    }
    public function save_gread_test($stu,$teac_id,$gread){
        $sql="update edu_evaluate_student set evst_Examination=$gread where stud_Id=$stu and teac_Id=$teac_id";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function get_user_id_by_user($user){
        $sql="select * from edu_user where user_Name = $user";
        return $this->db->query($sql)->row();
    }
    public function save_tea($username,$email,$gender,$result,$jibie,$user_id){
            $this->db->insert('edu_teacher',array(
                'teac_Id'=> null,
                'user_Id'=>$user_id,
                'dept_Id'=>$result,
                'teac_Title'=>$jibie,
                'teac_Email'=>$email,
                'teac_Sex'=>$gender,
                'teac_Name'=>$username
            ));
            return $this->db->affected_rows();
    }
    public function save_couser_lianjie($cour_id,$teac_id){
        $this->db->insert('edu_teach_course',array(
            'teco_Id'=> null,
            'teac_Id'=>$teac_id,
            'cour_Id'=>$cour_id
        ));
        return $this->db->affected_rows();
    }

}



















