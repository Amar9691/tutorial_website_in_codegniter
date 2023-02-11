<?php   include('header.php')  ?>
<div class="jumbotron">

<div class="row" style="margin-top: -50px;">



   <div class="col-sm-3">
    <?php if(isset($active)){ ?>
     <h2 class="text-info" style="font-size: 20px;"><?php echo $active; ?> Lectures</h2>
    <?php } ?>
   
     <ul class="list-group">

	 <?php  if(isset($tutorial)){
                     foreach ($tutorial as $value) { ?>
   
            <li class="list-group-item"><a style="font-size: 10px;" href="<?php echo base_url(); ?>User/gevideo?id=<?php echo $value->id; ?>&title=<?php echo $value->category; ?>" class="list-group-item-action "><?php echo $value->title; ?></a></li>

     <?php }} ?>
		

   </ul>
</div>
	

	<div class="col-sm-7">

    <?php  if(isset($signle)) { ?>
        <!--start of card--->
        <div class="card mt-4">
         
         <div class="card-header">
           <h1 class="text-secondary text-center"><?php echo $signle;  ?></h1>

           <p class="text-center"><strong class="text-center">Welcome into <?php echo $signle;  ?> Lecture series. </strong></p>
            <p class="text-center"><strong class="text-center">We hope, You will enjoy this series. Please keep watch every tutorial to yourself strong.</strong></p>
         </div>

          
        </div>
        	
      <!--End of card -->


    <?php  } ?>


     <?php  include('post.php')  ?>
	   
   
   </div>


	<div class="col-sm-2">
	   <h2 class="text-info" style="font-size: 20px;"> Course</h2>
 	    <ul class="list-group">

	 		<?php if(isset($category)){
	 			  foreach ($category as $value) {
	 			  ?>
                  <li class="list-group-item"><a style="font-size: 15px;" href="<?php echo base_url(); ?>User/gettutorial?title=<?php echo $value->title; ?>" class="list-group-item-action btn btn-block" ><?php echo $value->title; ?></a></li>
	 			  <?php
	 			  }
	 		} ?>
	 		
	 	</ul>
	 </nav>

	</div>
</div>







</div>



<?php    include('footer.php')  ?>
