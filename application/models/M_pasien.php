<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_pasien extends CI_Model {



    public function __construct()

    {
      parent::__construct();
    }

    function getData()  
    { 
      $query = $this->db->get("ms_pasien");
      return $query->result();
    }

    function save($data)
    {
      $this->db->insert('ms_pasien', $data);
      return $this->db->insert_id();

    }

    function postUpdate($datas,$id)
    {
      $this->db->set($datas);
      $this->db->where('ID',$id);
      $this->db->update('ms_pasien');
      return $this->db->affected_rows();
    }

    function checkData($id)
    {
      $this->db->where('ID',$id);
      $query = $this->db->get('ms_pasien');
      return $query->row();
    }

    function deleteData($id)
    {
      $this->db->where('ID',$id);
      $this->db->delete('ms_pasien');
      return $this->db->affected_rows();
    }






}



