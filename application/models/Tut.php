<?php

class Tut extends CI_Model
{ 

    public function __construct()
    {
           
       parent::__construct();
       
       $this->load->database();
   
    }


    public function addtu($data)
    {
    	$result  = $this->db->insert('posts',$data);

    	if($result)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}

    }

    public function gettut()
    {
      $result = $this->db->get('posts');
      
      return $result->result();


    }


    public function del($data)
    {
        $result = $this->db->delete('posts',$data);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    public function getforedit($id)
    {
        $result = $this->db->where('id',$id)->get('posts');

        return $result->result();
    }

    public function uppost($id,$data)
    {

          $result = $this->db->where('id',$id)->update('posts',$data);

          if($result)
          {
            return true;
          }
          else
          {
            return false;
          }
    }

    public function getcomment()
    {
        $result = $this->db->get('comments');

        return $result->result();
    }

    public function delcomment($data)
    {
        $result = $this->db->delete('comments',$data);

        if($result)
        {
          return true;
        }
        else
        {
           return false;
        }

    }

    public function getreply()
    {
        $result = $this->db->get('reply');

        return $result->result();
    }

    public function delreply($data)
    {
        $result = $this->db->delete('reply',$data);

        if($result)
        {
          return true;
        }
        else
        {
           return false;
        }

    }




}

?>

