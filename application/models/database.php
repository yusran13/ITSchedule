<?php
class Database extends CI_Model {
	
	function getAllUser()
	{
		$query = $this->db->get('tb_user');
		return $query->result();
	}

	function readUser($id)
	{
		$query = $this->db->query('SELECT * FROM `tb_user` WHERE id_user ='.$id);
		return $query->result();
	}


	function auth($username, $encrypt)
	{
		$this->db->where('login', $username);
		$this->db->where('password', $encrypt);

		$query = $this->db->get('tb_user');

		if($query->num_rows() == 1){
			
			return $query->result();
		}

		else { return FALSE; }
	}

}
?>