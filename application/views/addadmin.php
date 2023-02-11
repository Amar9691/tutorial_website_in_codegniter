



<?php  if(isset($edit)){

       foreach ($edit as $value) {
       
?>

<div class="row ">
    <div class="col-sm-6 p-4">
    <form action="<?php echo base_url(); ?>Admin/update" method="post" enctype="multipart/form-data">
    <fieldset>
     <legend class="text-center text-info"><i class="fa fa-address-book"></i> Update </legend>
      <div class="form-group">
        <label class="text-info"><i class="fa fa-user"></i> Name</label>
        <input type="text" name="name" placeholder=" Your Name " class="form-control" pattern="[a-z A-Z]{3,}" required value="<?php echo $value->name; ?>">
        <input type="hidden" name="id" value="<?php echo $value->id; ?>">
        
      </div>
      
      <div class="form-group">
        
      <label class="text-info"><i class="fa fa-envelope-o"></i> Email</label>
      <input type="email" name="email" placeholder=" Email " class="form-control" required value="<?php echo $value->email; ?>">
        
      </div>

      <div class="form-group">
        
      <label class="text-info"><i class="fa fa-phone"></i> Phone Number</label>
      <input type="text" name="phone" placeholder=" 10 digit number " pattern="[0-9]{10}" min=
      "6000000000" max="9999999999" class="form-control" required value="<?php echo $value->phone; ?>">
        
      </div>

      <div class="form-group">
        <label class="text-info"><i class="fa fa-key"></i> Enter Password</label>
        <input type="password" name="password" placeholder=" Your Password " class="form-control" required>
        <input type="hidden" name="oldpassword" value="<?php echo $value->password; ?>">
        
      </div>

 
      <input type="submit" name="submit" class="btn btn-outline-info" value="update">
      <input type="reset" name="reset" class="btn btn-outline-danger" value="Reset">

    </fieldset>
      
    </form>
    
   </div>
   
 </div>
 






<?php } }  ?>




























<?php  if(isset($add)){
?>

<div class="row ">
    <div class="col-sm-6 p-4">
    <form action="<?php echo base_url();  ?>Admin/register" method="post" enctype="multipart/form-data">
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
 






<?php  }  ?>

<?php  if(isset($admin)){
?>
  <h1 class="text-center" style="font-size: 20px;">Admins information</h1>


<table class="table table-responsive table-hover table-bordered col-sm-12">
  <tr class>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Block</th>
    <th>Edit information</th>



  </tr>
  <?php if(isset($admin)){

        foreach ($admin as  $value) {
          ?>
            <tr>
              <td><?php echo $value->name;  ?></td>
              <td><?php echo $value->email;  ?></td>
              <td><?php echo $value->phone;  ?></td>
              <td><a href="<?php echo base_url(); ?>Admin/delete?id=<?php echo $value->id; ?>" class="btn btn-outline-danger">Block Admin</a></td>
              <td><a href="<?php echo base_url(); ?>Admin/edit?id=<?php echo $value->email; ?>" class="btn btn-outline-info">Edit Admin</a></td>

            </tr>

          <?php
        }


  } ?>
  
</table>






<?php  }  ?>






