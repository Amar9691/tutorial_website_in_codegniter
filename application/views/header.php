<!DOCTYPE html>
<html>
<head>
	<title>Askblogs</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


   <link rel="icon" href="http://www.code.in/application/image/amarlinux.png" type="image/png" sizes="32x32"> 

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





  
  <style type="text/css">
    
  .bg-text {
  
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0, 0.4); 
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 40%;
  left: 50%;
  bottom: 20%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}

  </style>


</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-info stickly-top shadow">

<div class="container">

	 <div class="navbar-brand p-2">
 	<strong style="font-variant: small-caps;letter-spacing: 2px;text-shadow: 1px 1px black;">Askblogs.in</strong>
 	
 </div>

 <div class="input-group col-sm-4">
   
    <input type="text" name="search" class="form-control" placeholder="Search for blogs">
    <div class="input-group-append">
     <button class="btn btn-dark">Search</button>
    </div>
 	
 </div>

  <div class="ml-auto">
  	<ul class="navbar-nav">
  	    <?php  if($this->session->userdata('userid'))  { ?>
              
             <li class="nav-item"><a href="http://www.code.in/index.php/Welcome/login" class="nav-link text-white" ><b>Hi.. <?php echo $this->session->userdata('userid');  ?></b></a></li>
             <li class="nav-item"><a href="<?php  echo base_url();  ?>User/logout" class="nav-link btn btn-outline-dark text-white" ><b>Sign Out</b></a></li>

        <?php  
             }
           else
           { ?>

      <li class="nav-item"><a href="http://www.code.in/index.php/Welcome/login" class="nav-link text-white" ><b>Login</b></a></li>
      <li class="nav-item"><a href="http://www.code.in/index.php/Welcome/signup" class="nav-link text-white"><b>Sign up</b></a></li>
        

           <?php   } ?>

 

  		
  	</ul>

  </div>
	
</div>

</nav>

<div class="container mt-2">
	<nav class="navbar navbar-expand-md">


  <?php  if($this->session->flashdata('status')){
  ?>
  <button class="btn btn-outline-info"> <?php  echo  $this->session->flashdata('status'); ?></button>
  <?php
  }  ?>

  
   <ul class="navbar-nav ml-auto">
                     

                            <li class="nav-item p-2">
                                <a class="nav-link shadow active" href="http://www.code.in">Home</a>
                            </li>
                             
                            <li class="nav-item p-2">
                                <a class="nav-link shadow " href="http://www.code.in/index.php/User/gettutorial">Tutorials</a>
                            </li>

                         
                           <li class="nav-item p-2">
                            	<div class="dropdown">



                                <a class="nav-link shadow dropdown-toggle " data-toggle="dropdown" href="#">Category</a>
                                <div class="dropdown-menu">
                                	<a href="http://www.code.in/index.php/User/gettutorial?title=PHP" class="dropdown-item">PHP</a>
                                	<a href="http://www.code.in/index.php/User/gettutorial?title=Ajax" class="dropdown-item">Ajax</a>
                                	<a href="http://www.code.in/index.php/User/gettutorial?title=JQuery" class="dropdown-item">JQuery</a>
                                	<a href="http://www.code.in/index.php/User/gettutorial?title=Laravel" class="dropdown-item">Laravel</a>

                                	
                                </div>
                                 </div>
                            </li>
                            
                             <li class="nav-item p-2">
                                <a class="nav-link  shadow" href="http://www.code.in/#contact">Contact us</a>
                            </li>
                            
                              <li class="nav-item p-2">
                                <a class="nav-link  shadow" href="http://www.code.in/#about">About us</a>
                            </li>
                            
                      </ul>
     </nav>
	
</div>




