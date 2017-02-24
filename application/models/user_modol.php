 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_modol extends CI_Model {

	public function save($usename,$password)
	{
		$this->db->insert('user',array(
			'name'=>$usename,
			'pass'=>$password
		));
		return $this->db->affected_rows();
	}
	
}
