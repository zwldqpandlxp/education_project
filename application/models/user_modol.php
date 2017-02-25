 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_modol extends CI_Model {

	public function save($username,$password,$len)
	{
		$this->db->insert('edu_user',array(
			'user_Name'=>$username,
			'user_Pwd'=>$password,
			'user_Power'=>$len
		));
		return $this->db->affected_rows();
	}
	public function get_by_name_name($name){
		$query= $this->db->get_where('edu_user',array(
				'user_Name'=>$name
		));
		return $query->row();
	}
	public function get_by_name_pwd($name,$pwd){
		$query= $this->db->get_where('edu_user',array(
				'user_Name'=>$name,
				'user_Pwd'=>$pwd
		));
		return $query->row();
	}
	public function set_itro($username,$email,$gender,$result){
		$this->db->insert('edu_student',array(
				'stud_Name'=>$username,
				'stud_email'=>$email,
				'stud'=>$gender,
				'majo_Id'=>$result
		));
		return $this->db->affected_rows();
	}
	public function get_morid_by_mor($mor){
		$sql="select dept_Id from edu_department where majo_Name = $mor";
		return $this->db->query($sql)->result();
	}
	public function get_decid_by_dec($dec){
		$sql="select majo_Id from edu_major where majo_Name = $dec";
		return $this->db->query($sql)->result();
	}
}
