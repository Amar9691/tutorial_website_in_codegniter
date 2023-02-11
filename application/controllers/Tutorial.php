<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends CI_Controller {

	
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

      $this->load->model('Cate');

      $result = $this->Cate->all();

      if($result)
      {

      
           $this->load->view('adminpage',['tutorial'=>'tutorial','cal'=>$result]);


      }
    
  }

  public function addtut()
  { 
  


               $data = array( 'user_id'=>$this->session->userdata('userid'),
                               'title'=>$this->input->post('title'),
                               'content'=>$this->input->post('des'),
                               'category'=>$this->input->post('tutcate'),
                               'filename'=>'a',
                               'created_at'=>date('Y-m-d'),
                      );

                 $config['upload_path']          = 'application/uploads/';
                 $config['allowed_types']        = '*';
                 $config['max_size']             = 1000000000;
                

                 $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        return redirect('Tutorial/add',['error'=>$error]);

                }
                else
                {

                        $dataa = $this->upload->data();
                        
                        $file_path = "http://www.code.in/application/uploads/".$dataa['raw_name'].$dataa['file_ext'];
                       
                        $data['filename'] = $file_path;
                       
                        $this->load->model('Tut');
                       
                        $result  = $this->Tut->addtu($data);
                        if($result == true)
                        {
                            $this->session->set_flashdata('message','added successfully');

                            return redirect('Tutorial/add');

                        }else
                        {

                            $this->session->set_flashdata('message','Error');

                            return   redirect('Tutorial/add');

                        }

                }



             /*   $config['upload_path']          = 'application/uploads/';
                $config['allowed_types']        = 'png|jpeg|jpg';
                $config['max_size']             = '0';
            

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('video'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        
                       
                }
                else
                {


                        $dataa = $this->upload->data();
                        $file_path = base_url("application/uploads/".$dataa['raw_name'].$dataa['file_ext']);
                        $data['filename'] = $file_path;
                        $this->load->model('Tut');
                        $result  = $this->Tut->addtu($data);
                        if($result == true)
                        {
                            $this->session->set_flashdata('message','added successfully');

                            return redirect('Tutorial/add');

                        }else
                        {

                            $this->session->set_flashdata('message','Error');

                            return   redirect('Tutorial/add');

                        }
           

                }*/







    
  }

  public function alltute()
  {

           $this->load->model('Tut');

           $result = $this->Tut->gettut();


           if($result)
           {

              $this->load->view('adminpage',['posts'=>$result]);
           }
           else
           { 

              $this->session->set_flashdata('message','Not record found');

              return redirect('Admin/index');
           }


  }

  public function delete()
  {
          $data = array('id'=>$this->input->get('id'));
              
          $this->load->model('Tut');

          $result = $this->Tut->del($data);

          if($result == true)
          {  
            $this->session->set_flashdata('message','deleted successfully');

            return redirect('Tutorial/alltute');

          }
          else
          {
            $this->session->set_flashdata('message','error');

             return redirect('Tutorial/alltute');
         }
          


  }

  public function edit()
  {
      $id = $this->input->get('id');

      $this->load->model('Tut');

      $result = $this->Tut->getforedit($id);
      $this->load->model('Cate');
      $res = $this->Cate->all();

      $this->load->view('adminpage',['postedit'=>$result,'cal'=>$res]);



  }

  public function postupdate()
  { 
     $id = $this->input->post('id');
      
      $data = array(
                    'user_id'=>$this->input->post('user_id'),
                    'title'=>$this->input->post('title'),
                    'content'=>$this->input->post('des'),
                    'filename'=>$this->input->post('oldfile'),
                    'category'=>$this->input->post('tutcate'),
                    'created_at'=>date('Y-m-d'),
                   );


        
                $config['upload_path']          = 'application/uploads/';
                $config['allowed_types']        = 'mp4|gif|jpg|png';
            

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('userfile'))
                {
                      $this->load->model('Tut');

                      $result = $this->Tut->uppost($id,$data);
                      if($result == true)
                      {
                         $this->session->set_flashdata('message','updated successfully');
                         return redirect('Tutorial/alltute');

                      }
                      else
                      {
                         $this->session->set_flashdata('message','error');
                         return redirect('Tutorial/alltute');

                      }

                }
                else
                {

                   
                        $dataa = $this->upload->data();
                        $file_path = base_url("application/uploads/".$dataa['raw_name'].$dataa['file_ext']);
                        $data['filename'] = $file_path;
                        $this->load->model('Tut');
                        $result  = $this->Tut->uppost($id,$data);
                        if($result == true)
                        {
                            $this->session->set_flashdata('message','updated successfully');

                            return redirect('Tutorial/alltute');

                        }else
                        {

                            $this->session->set_flashdata('message','Error');

                            return   redirect('Tutorial/alltute');

                        }


           

                }





     
    


  }

 
   
}
