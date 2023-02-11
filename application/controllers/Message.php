<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	
	public function __construct()
	{

		 parent::__construct();

         if(!$this->session->userdata('userid'))
         { 
             return redirect('http://www.code.in/index.php/Welcome/login');
         }
            if($this->session->userdata('role') != "admin")
         {
              return redirect('http://www.code.in/index.php/User/gettutorial');
         }
	}

  public function getmessage()
  {
      $this->load->model('Cate');

      $result = $this->Cate->usermessage();

      if($result)
      {

        $this->load->view('adminpage',['mess'=>$result]);
      }
      else
      {
          $this->session->set_flashdata('message','record not found');
          return redirect('Admin/index');
      }
  }
  

  public function delete()
  {
        $data =  array('id' => $this->input->get('id'));

       $this->load->model('Cate');

      $result = $this->Cate->delmessage($data);

      if($result)
      {
            $this->session->set_flashdata('message','message removed successfully');
            return redirect('Message/getmessage');
        
      }
      else
      {
          $this->session->set_flashdata('message','record not found');
          return redirect('Message/getmessage');
      }

  }


  public function sub()
  {
      $this->load->model('Cate');

      $result = $this->Cate->subscribe();

      if($result)
      {

        $this->load->view('adminpage',['sub'=>$result]);
      }
      else
      {
          $this->session->set_flashdata('message','record not found');
          return redirect('Admin/index');
      }
    
  }


  public function subdelete()
  {
       $data =  array('id' => $this->input->get('id'));

       $this->load->model('Cate');

       $result = $this->Cate->subdel($data);

       if($result)
       {
            $this->session->set_flashdata('message','message removed successfully');
            return redirect('Message/sub');
        
       }
       else
       {
          $this->session->set_flashdata('message','record not found');
          return redirect('Message/sub');
       }

  }

  public function comment()
  {

        $this->load->model('Tut');

        $result = $this->Tut->getcomment();

        if($result)
        {

          $this->load->view('adminpage',['comment'=>$result]);
        }

  }

  public function commentdel()
  {
       $data =  array('id' => $this->input->get('id'));

       $this->load->model('Tut');

       $result = $this->Tut->delcomment($data);

       if($result == true)
       {
            $this->session->set_flashdata('message','comment removed successfully');
            return redirect('Message/comment');
        
       }
       else
       {
          $this->session->set_flashdata('message','record not found');
          return redirect('Message/comment');
       }


  }

  public function reply()
  {

        $this->load->model('Tut');

        $result = $this->Tut->getreply();

        if($result)
        {

          $this->load->view('adminpage',['reply'=>$result]);
        }

  }

  public function replydel()
  {
       $data =  array('id' => $this->input->get('id'));

       $this->load->model('Tut');

       $result = $this->Tut->delreply($data);

       if($result == true)
       {
            $this->session->set_flashdata('message','comment removed successfully');
            return redirect('Message/reply');
        
       }
       else
       {
          $this->session->set_flashdata('message','record not found');
          return redirect('Message/reply');
       }


  }
 
   
}
