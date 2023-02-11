<?php   include('header.php')  ?>
<section id="register">
<div class="container shadow ">
 


 <div class="row mt-4">


  <div class="col-sm-3">
    
  </div>

   <div class="col-sm-6 p-4">
    <form action="<?php echo base_url();  ?>Welcome/register" method="post" enctype="multipart/form-data">
    <fieldset>
     <legend class="text-center text-info"><i class="fa fa-address-book"></i> New Registration</legend>
      <div class="form-group">
        <label class="text-info"><i class="fa fa-user"></i> Name</label>
        <input type="text" name="name" placeholder=" Your Name " class="form-control" pattern="[a-z A-Z]{3,}" required>
        
      </div>
      
      <div class="form-group">
        
      <label class="text-info"><i class="fa fa-envelope-o"></i> Email</label>
      <input type="email" name="email" placeholder=" Email " class="form-control" required>
        
      </div>

      <div class="form-group">
        
      <label class="text-info"><i class="fa fa-phone"></i> Phone Number</label>
      <input type="text" name="phone" placeholder=" 10 digit number " pattern="[0-9]{10}" min=
      "6000000000" max="9999999999" class="form-control" required>
        
      </div>

      <div class="form-group">
        <label class="text-info"><i class="fa fa-key"></i> Password</label>
        <input type="password" name="password" placeholder=" Your Password " class="form-control" required>
        
      </div>

       <div class="form-group">
        <label class="text-info"><i class="fa fa-key"></i> Confirm Password</label>
        <input type="password" name="confirmpassword" placeholder=" Your Password " class="form-control" required>
        
      </div>

      <input type="submit" name="submit" class="btn btn-outline-info" value="Submit">
      <input type="reset" name="reset" class="btn btn-outline-danger" value="Reset">

    </fieldset>
      
    </form>
    
   </div>
   
 </div>
 


</div>
</section>



<?php    include('footer.php')  ?>
