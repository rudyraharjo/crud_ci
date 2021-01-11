<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	function getUser($username, $password)
  	{
	    $this->db->where('email', $username);
	    $this->db->where('password', $password);
	    $query = $this->db->get('ms_user');
	    return $query->result();
  	}

  	function getMenu($id_group_menu)
  	{
	    $this->db->where('id', $id_group_menu);
	    $query = $this->db->get('group_menu');
	    return $query->result();
  	}

  	function checkEmail($email)
    {
      $this->db->where('email',$email);
      $query = $this->db->get('ms_user_staff');

      return $query->row();
    }

    
    function postUpdateuser($user_id,$data)
    {
      $this->db->set($data);
      $this->db->where('uid',$user_id);
      $this->db->update('ms_user_staff');
      return $this->db->affected_rows();
	}
	
	function checkRole($id)
	{
		$this->db->where('id', $id);
	    $query = $this->db->get('ms_role');
	    return $query->row();	
	}


}

