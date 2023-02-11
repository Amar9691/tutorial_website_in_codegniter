<?php

class Cate extends CI_Model
{ 

    public function __construct()
    {
           
       parent::__construct();
       
       $this->load->database();
   
    }


    public function usermessage()
    {

       $result  = $this->db->get('message');

       return $result->result();

    }
    public function delmessage($data)
    {
         

      $result = $this->db->delete('message',$data);

      if($result)
      {
      	  return true;
      }
      else
      {
      	  return false;
      }


    }


    public function subscribe()
    {
       $result  = $this->db->get('customer');

       return $result->result();

    }

    public function subdel($data)
    {
         

      $result = $this->db->delete('customer',$data);

      if($result)
      {
      	  return true;
      }
      else
      {
      	  return false;
      }


    }


    public function add($data)
    {
         $result = $this->db->insert('category',$data);

         if($result)
         {
           return true;
         }
         else
         {
            return false;
         }
    }


    public function all()
    {
            
            $result = $this->db->get('category');

            return $result->result();


    }

    public function del($data)
    {
            $result = $this->db->delete('category',$data);

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

