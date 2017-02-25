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
}
