<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Major_model extends CI_Model {
    public function get_id_by_name($name){
        $sql = "select majo_Id from edu_major where majo_Name = $name";
        $this -> db -> query($sql) -> row();
    }
}
