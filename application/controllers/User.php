<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function __construct()
	{

		 parent::__construct();

         if(!$this->session->userdata('userid'))
         { 
             return redirect('http://www.code.in/index.php/Welcome/login');
         }
	}

    public function index()
    {
        $this->load->model('Usermodel');

        $categories = $this->Usermodel->getcat();
        $this->session->set_flashdata('status','Your are logged');
        $this->load->view('userpage',['category'=>$categories]);

    }

    public function logout()
    {
         
         $this->session->unset_userdata('userid');
         $this->session->unset_userdata('role');

         return redirect('http://www.code.in/');

    }



    public function gettutorial()
    {  

         if($this->input->get('title'))
         {
            $data = $this->input->get('title');

            $active = $this->input->get('title');
         }
         else
         {
             $data = 'Laravel';

             $active = 'Laravel';

         }

        

        $this->load->model('Usermodel');
         
        $result = $this->Usermodel->gettut($data);

        $this->load->model('Usermodel');

        $categories = $this->Usermodel->getcat();

        $single  = $data;

        
       
        $this->load->view('userpage',['tutorial'=>$result,'category'=>$categories,'active'=>$active,'signle'=>$single]);





    }


    public function gevideo()
    {
         $id = $this->input->get('id');

         $this->load->model('Usermodel');

          $data =  $this->input->get('title');
          
         $res = $this->Usermodel->gettut($data);

         $result = $this->Usermodel->getinfo($id);

         $categories = $this->Usermodel->getcat(); 
                 
         $this->load->model('Comments');


         $comment = $this->Comments->getcomment();


         $reply = $this->Comments->getreply($id);
         
        
         $this->load->view('userpage',['videoinfo'=>$result,'category'=>$categories,'tutorial' => $res,'re'=>$comment,'commentreply'=>$reply,'active'=>$data]);
            

    }

    public function commentdel($id,$postid,$status)
    {
           $this->load->model('Comments');

           $result = $this->Comments->delusercomment($id);

           if($result == true)
           {    
                $this->session->set_userdata('message','comment removed');
                return redirect('http://www.code.in/index.php/User/gevideo?id='.$postid.'&title='.$status);
           }
           if($result == false)
           {
                $this->session->set_userdata('message','comment can not removed at this time');
                return redirect('http://www.code.in/index.php/User/gevideo?id='.$postid.'&title='.$status);
           }


    }


    public function replydel($id,$commentid,$postid,$status)
    {
           $this->load->model('Comments');

           $result = $this->Comments->deluserreply($id,$commentid,$postid);

           if($result == true)
           {    
                $this->session->set_userdata('message','comment removed');
                return redirect('http://www.code.in/index.php/User/gevideo?id='.$postid.'&title='.$status);
           }
           if($result == false)
           {
                $this->session->set_userdata('message','comment can not removed at this time');
                return redirect('http://www.code.in/index.php/User/gevideo?id='.$postid.'&title='.$status);
           }


    }


	
}
