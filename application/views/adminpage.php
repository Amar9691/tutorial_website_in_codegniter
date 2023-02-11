<?php   include('header.php')  ?>
<?php 
             if($message = $this->session->flashdata('message'))

              {

?>
            
        <div class="alert alert-info alert-dismissable">
                  <center><strong><?php  echo $message; ?></strong>
                  <button class="close" data-dismiss="alert">&times;</button>

                </center>
          </div>
<?php

              }
 ?>

<div class="jumbotron">

<div class="row">
	<div class="col-sm-3">
		<nav class="navbar navbar-dark ">
           
           <ul class="list-group">
           	<li class="list-group-item">Admin Panel</li>
           	<li class="list-group-item"><a href="<?php echo base_url();?>Admin/addadminrequest" class="btn btn-outline-info btn-block">Add admin</a></li>
           	<li class="list-group-item"><a href="<?php echo base_url();?>Admin/admininfo" class="btn btn-outline-info btn-block">View admins</a></li>
           	<li class="list-group-item"><a href="<?php echo base_url(); ?>Message/getmessage" class="btn btn-outline-info btn-block">View Message</a></li>
           	<li class="list-group-item"><a href="<?php echo base_url();?>Category/add" class="btn btn-outline-info btn-block">Add category</a></li>
           	<li class="list-group-item"><a href="<?php echo base_url();?>Category/allcate" class="btn btn-outline-info btn-block">View category</a></li>

           	<li class="list-group-item"><a href="<?php echo base_url(); ?>Tutorial/add" class="btn btn-outline-info btn-block">Add tutorial</a></li>
           	<li class="list-group-item"><a href="<?php echo base_url(); ?>Tutorial/alltute" class="btn btn-outline-info btn-block">View tutorials</a></li>
           	<li class="list-group-item"><a href="<?php echo base_url(); ?>Message/sub" class="btn btn-outline-info btn-block">subscriber list</a></li>

            <li class="list-group-item"><a href="<?php echo base_url(); ?>Message/comment" class="btn btn-outline-info btn-block">Users Comments</a></li>
            <li class="list-group-item"><a href="<?php echo base_url(); ?>Message/reply" class="btn btn-outline-info btn-block">Users Reply</a></li>



           
       
           </ul>

			
		</nav>
	</div>

    <div class="col-sm-9" style="border: 2px solid skyblue;">
		 
		  <?php  include('addadmin.php')   ?>
      <?php  include('message.php')    ?>
      <?php  include('category.php')   ?>
      <?php  include('admintutorial.php')  ?>
      <?php  include('comment.php') ?>


	</div>
	
</div>




</div>



</body>
</html>
