<?php


class Comments extends CI_Model
{ 

    public function __construct()
    {
           
       parent::__construct();
       
       $this->load->database();
   
    }

    public function add($data)
    {

       $result = $this->db->insert('comments',$data);

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

    public function getreply($id)
    {
      $result = $this->db->where('post_id',$id)->get('reply');

      return $result->result();
    }

    public function addreply($data)
    { 
       $result = $this->db->insert('reply',$data);
       if($result)
       {
          return true;
       }
       else
       {
          return false;
       }

   }

   public function delusercomment($id)
   {
       $result = $this->db->where('id',$id)->delete('comments');

       if($result)
       {
        return true;
       }
       else
       {
         return false;
       }

   }

     public function deluserreply($id,$commentid,$postid)
   {
       $result = $this->db->where('id',$id)->where('post_id',$postid)->where('comment_id',$commentid)->delete('reply');

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