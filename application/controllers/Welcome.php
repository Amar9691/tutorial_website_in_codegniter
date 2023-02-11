<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{

		 parent::__construct();
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
    
    public function test()
    {
        $this->load->view('test');
    }

	public function login()
	{
		$this->load->view('login');
	}

	public function signup()
	{
		$this->load->view('signup');
	}

	public function amarcontact70987654321()
	{
		$this->load->view('adminlogin');
	}

    public function subscribe()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run()  == true)
        {  


             $this->load->model('Subscribe');


             $result = $this->Subscribe->check();

             foreach($result as $row){
               
              if(strtolower($row->email) === strtolower($this->input->post('email'))){

                    
                        $this->session->set_flashdata('message','Email already In use please use other');                     

            	        return redirect('http://www.code.in');

            	        exit();


              }
 


             }


                  
            $data = array('email'=>$this->input->post('email'));




       	    $result = $this->Subscribe->sub($data);


            if($result == true)
            {           
            	        $this->session->set_flashdata('message','You have subscribed successfully');                     

            	        return redirect('http://www.code.in');

            }
            else
            {
                  	    $this->session->set_flashdata('message','email id already used');
                  	    $this->load->view('welcome_message');

            }
        
        }
        else
        {
        	            $this->session->set_flashdata('message','somethings went wrong please try later');                     

            	        return redirect('http://www.code.in');

        }
       
        	         
     
        
     }
	



    public function message()
    {
         
        $this->form_validation->set_rules('name','your name','required|min_length[3]');
        $this->form_validation->set_rules('email','your email','required|trim|valid_email');
        $this->form_validation->set_rules('message','message','required|min_length[10]');

        if($this->form_validation->run() == true)
        {
        	if($this->input->post('submit'))
        	{
                 
                $data = array(
                         'name'=>$this->input->post('name'),
                         'user_id'=>$this->input->post('email'),
                         'subject'=>$this->input->post('subject'),
                         'message'=>$this->input->post('message'),


                        );

                $this->load->model('Subscribe');

                $result  = $this->Subscribe->usermessage($data);

                if($result)
                {
                	$this->session->set_flashdata('message','Your Query has been submitted successfully');

                	return redirect('http://www.code.in');
                }


        	}
        }
        else
        {
        	$this->session->set_flashdata('message',validation_errors());

            return redirect('http://www.code.in');
        }






    }

    public function register()
    {
             $this->form_validation->set_rules('email','Email ','required|min_length[3]|trim|valid_email');
           
             $this->form_validation->set_rules('password','Password','required|min_length[8]|alpha_numeric');
             $this->form_validation->set_rules('confirmpassword','confirm password','required|min_length[8]|matches[password]');


             if($this->form_validation->run() == true)
             {   

                 $this->load->model('Subscribe');

                 $query = $this->Subscribe->emailcheck();

                 foreach ($query as $value) {
                  
                     if(strtolower($value->email) === strtolower($this->input->post('email'))){

                    
                  $this->session->set_flashdata('message','Email already In use please use other');                     

                  return redirect('http://www.code.in');

                   exit();


                   }
 

                 }

                 $data = array(  
                                 'name'=>$this->input->post('name'),
                                 'email'=>$this->input->post('email'),
                                 'phone'=>$this->input->post('phone'),
                                 'password'=>do_hash($this->input->post('password'),'md5'),

                              );
                 $result = $this->Subscribe->reg($data);

                 if($result == true)
                 {
                      

                      $this->session->set_flashdata('message','Your account has been successfully created');
                       $this->session->set_userdata('userid',$this->input->post('email'));    

                      return redirect('User/index');                   


                 }
                 else
                 {
                    $this->session->set_flashdata('message','Something went wrong');

                      return redirect('http://www.code.in/');      

                 }






             }
             else
             {
                $this->session->set_flashdata('message',validation_errors());
                return redirect('http://www.code.in/');

             }



    }

    public function log()
    {

        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() == true)
        {
            $email = $this->input->post('email');
            $password = do_hash($this->input->post('password'),'md5');
             
            $this->load->model('Subscribe');

            $result = $this->Subscribe->userlogin($email,$password);
                        
       
           

            if($result == true)
            {

               $this->session->set_flashdata('status','Your are logged');
               $this->session->set_userdata('userid',$email);
               $this->session->set_userdata('role','user');

                

               return redirect('User/gettutorial');
            }
            else
            {
            
               $this->session->set_flashdata('message','invalid username or password');
               return redirect('Welcome/login');
            }



        }
        else
        {

           $this->session->set_flashdata('message',validation_errors());
           return redirect('http://www.code.in/index.php/Welcome/login');
        }

  }



    public function adminlog()
    {

        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() == true)
        {
            $email = $this->input->post('email');
            $password = do_hash($this->input->post('password'),'md5');
             
            $this->load->model('Subscribe');

            $result = $this->Subscribe->adminlogin($email,$password);

            if($result == true)
            {

               $this->session->set_flashdata('status','Your are logged');
               $this->session->set_userdata('userid',$email);
               $this->session->set_userdata('role','admin');


               return redirect('Admin/index');
            }
            else
            {
            
               $this->session->set_flashdata('message','invalid username or password');
               return redirect('Welcome/amarcontact70987654321');
            }



        }
        else
        {

           $this->session->set_flashdata('message',validation_errors());
           return redirect('http://www.code.in/index.php/Welcome/login');
        }

  }




}
