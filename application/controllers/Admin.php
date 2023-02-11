<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function __construct()
	{

		 parent::__construct();

         if(!$this->session->userdata('userid'))
         { 
             return redirect('http://www.code.in/index.php/Welcome/login');
         }
         if($this->session->userdata('role') !== "admin")
         {
              return redirect('http://www.code.in/index.php/User/gettutorial');
         }
	}

    public function index()
    {

        $this->session->set_flashdata('status','Your are logged');
        $this->load->view('adminpage');

    }

    public function logout()
    {
         
         $this->session->unset_userdata('userid');
         $this->session->unset_userdata('role');


         return redirect('http://www.code.in/');

    }

    public function addadminrequest()
    {
        ;

         $this->load->view('adminpage',['add'=>'add']);
    }

    public function register()
    {
            $this->form_validation->set_rules('email','Email ','required|min_length[3]|trim|valid_email');
           
            $this->form_validation->set_rules('password','Password','required|min_length[8]|alpha_numeric');
            $this->form_validation->set_rules('confirmpassword','confirm password','required|min_length[8]|matches[password]');


            if($this->form_validation->run() == true)
           {   

                 $this->load->model('Subscribe');

                 $query = $this->Subscribe->adminemailcheck();

                 foreach ($query as $value) {
                  
                     if(strtolower($value->email) === strtolower($this->input->post('email'))){

                    
                  $this->session->set_flashdata('message','Email already In use please use other');                     

                  return redirect('http://www.code.in/index.php/Admin/addadminrequest');

                   exit();


                   }
 

                 }

                 $data = array(  
                                 'name'=>$this->input->post('name'),
                                 'email'=>$this->input->post('email'),
                                 'phone'=>$this->input->post('phone'),
                                 'password'=>do_hash($this->input->post('password'),'md5'),

                              );
                 $result = $this->Subscribe->adminreg($data);

                 if($result == true)
                 {
                      

                      $this->session->set_flashdata('message','Your account has been successfully created');
                       $this->session->set_userdata('userid',$this->input->post('email'));    

                      return redirect('Admin/index');                   


                 }
                 else
                 {
                    $this->session->set_flashdata('message','Something went wrong');

                      return redirect('Admin/index');      

                 }






             }
             else
             {
                $this->session->set_flashdata('message',validation_errors());
                return redirect('Admin/index');

             }



    }

    public function admininfo()
    {

        $this->load->model('Subscribe');
        $result = $this->Subscribe->adminlist();
       
       
        $this->load->view('adminpage',['admin'=>$result]);


    }

    public function delete()
    {
       $id = $this->input->get('id');


       $this->load->model('Subscribe');
       $result = $this->Subscribe->admindelete($id);
       
       if($result == true)
       {
         $this->session->set_flashdata('message','admin removed successfully');
         return redirect('Admin/admininfo');
       }
       else
       {
         $this->session->set_flashdata('message','sorry Something went wrong and can not delete');
         return redirect('Admin/admininfo');

       }



 

    }
	
    public function edit()
    {
       $id = $this->input->get('id');

       if($this->session->userdata('userid') == $id)
       {

            $this->load->model('Subscribe');
            $result = $this->Subscribe->getadmin($id);
         
            if($result == true)
            {
         
             $this->load->view('adminpage',['edit'=>$result]);
            }
            else
            {
         $this->session->set_flashdata('message','sorry Something went wrong and can not delete');
         return redirect('Admin/admininfo');

            }
       }
       else
       {
             $this->session->set_flashdata('message','You are not authorizied to do this');
             return redirect('Admin/admininfo');

       }


       



 

    }

    public function update()
    {
        $oldpassword = $this->input->post('oldpassword');
        $password    = $this->input->post('password');

        if($oldpassword == do_hash($password ,'md5'))
        {
                 
             $data = array(
                             'id'=>$this->input->post('id'),
                             'name'=>$this->input->post('name'),
                             'email'=>$this->input->post('email'),
                             'password'=>$this->input->post('password'),
                              
                          );


             $this->load->model('Subscribe');

             $result = $this->Subscribe->adminupdate($data);

             if($result == true)
             {
                    $this->session->set_flashdata('message','updated successfully');
                    return redirect('Admin/admininfo');
             }
             else
             {
                  $this->session->set_flashdata('message','try again');
                  return redirect('Admin/admininfo');

             }

  
        }

    }
}
