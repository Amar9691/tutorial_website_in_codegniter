<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

  
  public function __construct()
  {

     parent::__construct();

         if(!$this->session->userdata('userid'))
         { 
             return redirect('http://www.code.in/index.php/Welcome/login');
         }
  }

  public function addcomment()
  {
           $data  = array('user_id' => $this->session->userdata('userid'),
                           'post_id'=> $this->input->post('post_id'),
                           'comment'=> $this->input->post('comment'),
                           'create_at'=>date('Y-m-d'),
                           
                    );

           $this->load->model('Comments');

           $title = $this->input->post('title');
           $postid = $this->input->post('post_id');

           $result = $this->Comments->add($data);
           if($result == true)
           {
           $this->session->set_flashdata('message','comment added successfully');
           return redirect('User/gevideo?id='.$postid.'&title='.$title);
           }
           else
           {
           $this->session->set_flashdata('message','error in comment');
           return redirect('User/gevideo?id='.$postid.'&title='.$title);
           }
  }
  
  public function reply()
  {
            $data  = array('comment_id' => $this->input->post('comment_id'),
                           'post_id'=> $this->input->post('post_id'),
                           'user_id'=> $this->session->userdata('userid'),
                           'reply'=> $this->input->post('reply'),
                           'create_at'=>date('Y-m-d'),
                           
                    );

           $postid = $this->input->post('post_id');
           $title = $this->input->post('post_title');

           $this->load->model('Comments');

           $result = $this->Comments->addreply($data);
           if($result == true)
           {
           $this->session->set_flashdata('message','comment added successfully');
           return redirect('User/gevideo?id='.$postid.'&title='.$title);
           }
           else
           {
           $this->session->set_flashdata('message','error in comment');
           return redirect('User/index');
           }



  }

 
 
   
}
