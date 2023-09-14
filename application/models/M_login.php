<?php  
class M_login extends CI_Model{ 
	function cek_login($select,$table,$where){
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
	//select $select from $table where $where
	//select 'id' from tb_admin where username = 'field_username' AND password = md5('field_password')
		return $this->db->get();
	}
}
//end of file M_login.php
//location application\model