<?php


class Subscribe extends CI_Model
{ 

    public function __construct()
    {
           
       parent::__construct();
       
       $this->load->database();
   
    }

    public function check()
    {
          $query = $this->db->get('customer');


          return $query->result();



    }
    
    public function emailcheck()
    {
          $query = $this->db->get('users');


          return $query->result();



    }
       public function adminemailcheck()
    {
          $query = $this->db->get('admins');


          return $query->result();



    }
 
 
	
	
  
     public function sub($data)
     {
        
          
         $success =  $this->db->insert('customer',$data);
          
        
         if($success)
         {
             
            return true;
          
         }
         else
         {
            return false;
         }
         

          


     }




     public function usermessage($data)
     {

           $result =  $this->db->insert('message',$data);
         
           if($result)
           {
            return true;
           }
           else
           {
            return false;
           }

     }


     public function reg($data)
     {
            
          $result = $this->db->insert('users',$data);

          if($result)
          {
             return true;
          }
          else
          {
             return false;
          }
     }


     public function adminreg($data)
     {
            
          $result = $this->db->insert('admins',$data);

          if($result)
          {
             return true;
          }
          else
          {
             return false;
          }
     }

     
     public function userlogin($email,$password)
     {

  
           $result = $this->db->query("select * from users where email = '$email' and password = '$password'");

           
           if($result->num_rows() > 0)
           {
              return true;
           }
           else
           {
              return false;
           }

     }
   

       public function adminlogin($email,$password)
       {

  
            $result = $this->db->query("select * from admins where email = '$email' and password = '$password'");

           
           if($result->num_rows() > 0)
           {
              return true;
           }
           else
           {
              return false;
           }

      }




    public function adminlist()
    {
            
          $result = $this->db->get('admins');

           return $result->result();

    }

    public function admindelete($id)
    {
        $data = array('id'=>$id);
        $result  = $this->db->delete('admins',$data);

        if($result)
        {
          return true;
        }
        else
        {
          return false;
        }



    }

   public function getadmin($id)
   {
        $data =  array('email' =>$id);
        $result = $this->db->get('admins',$data);

        return $result->result();
   }

   public function adminupdate($data)
   {
        $result = $this->db->update('admins',$data);

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