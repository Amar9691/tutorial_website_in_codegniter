<?php   include('header.php')  ?>
<?php 
             if($message = $this->session->flashdata('message'))

              {

?>
                  
                <div class="alert alert-info alert-dismissable">
                  <center><strong><?php  echo $message; ?></strong><button class="close" data-dismiss="alert">&times;</button></center>
                  
                </div>
<?php

              }
 ?>

<div class="container shadow">
<div id="slider" class="carousel slide  shadow-primary" data-ride="carousel">

 
  <ul class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
   
  </ul>


  <div class="carousel-inner" style="height: 550px;">
    <div class="carousel-item active">
      <img src="application/image/computer-1209641_1280.jpg" alt="info1" style="filter: blur(4px);"  width="1200" >
       <div class="carousel-caption bg-text">

        <h1>Lets Start Best Learning in  The world.</h1>
         <p>With Us.</p>

        
        </div>
    </div>
    <div class="carousel-item">
      <img src="application/image/startup-593327_1280.jpg" alt="info" style="filter: blur(4px);"  width="1200">
        <div class="carousel-caption bg-text">

        <h1>50+ Course from Top professionals of world.</h1>
         <p>start today it totally free.</p>

        
        </div>
    </div>
   
  </div>


   <a class="carousel-control-prev" href="#slider" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
   </a>
   <a class="carousel-control-next" href="#slider" data-slide="next">
    <span class="carousel-control-next-icon "></span>
   </a>

</div>

</div>

<section id="about" class="mt-2">
	<div class="container shadow p-4">
    
     <h3 class="text-info">About us</h3>

     <div class="row">

     <div class="col-sm-6">
    
     <strong>Our Story</strong>
     
     <p>
     	We are askblog.in company with goal of making learning simple. We believe that there is amazing technologies to be learned by online platforms on with working on real projects. We this thing we start this group in november 2020. Amar kumar are the founder of this group who develop this beautiful team to make learning esay.
     </p>     
     
     <strong>What service we offer</strong>
     
     <ul class="list-unstyled list-group" >
     	<li class="list-group-item"><button class="btn btn-block btn-outline-info">Online Tutorials</button></li>
     	<li class="list-group-item"><button class="btn btn-block btn-outline-info">Web development</button></li>
     	<li class="list-group-item"><button class="btn btn-block btn-outline-info">Security support</button></li>
     	<li class="list-group-item"><button class="btn btn-block btn-outline-info">Summer training</button></li>
        <li class="list-group-item"><button class="btn btn-block btn-outline-info">Live projects</button></li>
     
     

     </ul> 

     	
     </div>

      <div class="col-sm-6">
      	<strong>Meet Our Team</strong>
        <div class="jumbotron-fulid">
      	<img src="application/image/founder.jpg" class="rounded-circle" width="100" height="100">
       <br>
        <strong class="text-info">Amar kumar</strong><br>
        <strong class="text-info">Founder & C.E.O </strong><br>
        <strong class="text-info">Follow us</strong>
        <ul class="list-unstyled">
        	<li><a href="#" class="btn btn-outline-info "><i class="fa fa-linkedin"></i></a><a href="#" class="btn btn-outline-info ml-2"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-outline-info ml-2"><i class="fa fa-github"></i></a><a href="#" class="btn btn-outline-info ml-2"><i class="fa fa-whatsapp"></i></a></li>
        	
        </ul>


       

      
     	</div>
      </div>
     	
     	
     </div>



	 </div>

</section>

<section id="contact"  class="mt-2 ">
   <div class="container shadow  bg-dark">
	<div class="jumbotron  bg-dark">

	 <h2 class="text-center text-white">Contact Us</h2>
	  <div class="row">
	  	<div class="col-sm-6">
	  		  <form action="<?php echo base_url(); ?>Welcome/message"  method="POST" enctype="multipart/form-data">
	  	<fieldset>
	  		<legend class="text-white">Message Us</legend>

	  <div class="form-group">
	  	<label class="text-white">Name:</label>
	  	<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" >
	  </div>

    <?php  if($this->session->userdata('userid')) {  ?>

     
      <input type="hidden"  name="email" class="form-control" value="<?php echo $this->session->userdata('userid'); ?>">
    <?php
           
        }
        else
        {
    ?>
          <div class="form-group">
          <label class="text-white">Email:</label>
          <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
          </div>

    <?php  }  ?>
	 
	  
	   <div class="form-group">
	  	<label class="text-white">Subject:</label>
	  	<input type="text" name="subject" class="form-control" value="<?php echo set_value('subject'); ?>">
	   </div>

	    <div class="form-group">
	  	<label class="text-white">Message:</label>
        <textarea rows="2" name="message" class="form-control" >
      
        </textarea>
	   </div>

	      <input type="submit" name="submit" class="btn btn-outline-info" value="Submit">
	      <input type="reset" name="reset" class="btn btn-outline-danger" value="Reset">

	      </fieldset>
	  </form>
	  	</div>

	  	<div class="col-sm-6">
	 		<iframe height="450" width="460" title="antri , Madhya Pradesh" src="https://maps.google.com/maps?q=antri%20%2C%20Madhya%20Pradesh&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" aria-label="antri , Madhya Pradesh"></iframe>
	  		
	  	</div>
	  	
	  </div>

	

</div>
</div>

</section>





<?php    include('footer.php')  ?>
