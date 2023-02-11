<?php

class Usermodel extends CI_Model
{ 

    public function __construct()
    {
           
       parent::__construct();
       
       $this->load->database();
   
    }

    public function getcat()
    {
        $query = $this->db->get('category');

        return $query->result();
    }

    public function gettut($data)
    {
      
      $query = $this->db->where('category',$data)->get('posts');

      return $query->result();


    }


    public function getsingle($data)
    {
        $query = $this->db->where('category',$data)->get('posts');

        return $query->first_row();

    }

    public function getinfo($id)
    {
       $query = $this->db->where('id',$id)->get('posts');

       return $query->first_row();

    }

    
}

?>

