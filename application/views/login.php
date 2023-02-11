<?php   include('header.php')  ?>
<section id="login" style="height: 450px;">
<div class="container shadow ">
 
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

 <div class="row mt-4">


  <div class="col-sm-3">
    
  </div>

   <div class="col-sm-6 p-4">
    <form action="<?php echo base_url(); ?>Welcome/log" method="post" enctype="multipart/form-data">
    <fieldset>
     <legend class="text-center text-info"><i class="fa fa-lock"></i> Login</legend>
      <div class="form-group">
        <label class="text-info"><i class="fa fa-user"></i> Username</label>
        <input type="email" name="email" placeholder=" Email or Phone " class="form-control" required>
        
      </div>

      <div class="form-group">
        <label class="text-info"><i class="fa fa-key"></i> Password</label>
        <input type="password" name="password" placeholder=" Your Password " class="form-control" required>
        
      </div>

      <input type="submit" name="submit" class="btn btn-outline-info" value="submit">

    </fieldset>
      
    </form>
    
   </div>
   
 </div>
 


</div>
</section>


<?php    include('footer.php')  ?>
