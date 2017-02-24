 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_modol extends CI_Model {

	public function save($username,$password)
	{
		$this->db->insert('t_user',array(
			'username'=>$username,
			'password'=>$password
		));
		return $this->db->affected_rows();
	}
	public function get_by_name_name($name){
		$query= $this->db->get_where('t_user',array(
				'username'=>$name
		));
		return $query->row();
	}
}
