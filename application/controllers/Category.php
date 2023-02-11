<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	
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




  public function add()
  {

      $this->load->view('adminpage',['addcate'=>'addcate']);

  }

  public function addcategory()
  {
       
       $this->load->model('Cate');

       $data = array('title'=>$this->input->post('title'));


       $result  = $this->Cate->add($data);

       if($result == true)
       {
          $this->session->set_flashdata('message','Category added successsfully');
          return redirect('Category/add');

       }
       else
       {
          $this->session->set_flashdata('message','Category added successsfully');
          return redirect('Category/add');
       }

  }

  public function allcate()
  {
      $this->load->model('Cate');

      $result = $this->Cate->all();

      if($result)
      {

          $this->load->view('adminpage',['cateall'=>$result]);

      }
      else
      {
           $this->session->set_flashdata('message','record not found');

           return redirect('Admin/index');
      }
  }

  public function delete()
  {
      $data =  array('id'=>$this->input->get('id'));

      $this->load->model('Cate');

      $result = $this->Cate->del($data);

      if($result == true)
      {
         $this->session->set_flashdata('message','deleted successsfully');

         return redirect('Category/allcate');
         

      }
      else
      {
        $this->session->set_flashdata('message','Error ohh!   ');

         return redirect('Category/allcate');
      }




  }

 
   
}
