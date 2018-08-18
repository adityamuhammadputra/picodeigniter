<?php
class M_login extends CI_Model
{
	function cek_user($data)
	{
		$query = $this->db->get_where('tbl_user',$data);
		return $query;
	}
	public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('tbl_user', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }


	
	 public function getUserInfo($id)
	    {
	        $q = $this->db->get_where('tbl_user', array('id' => $id), 1);  
	        if($this->db->affected_rows() > 0){
	            $row = $q->row();
	            return $row;
	        }else{
	            error_log('no user found getUserInfo('.$id.')');
	            return false;
	        }
	    }
}
?>