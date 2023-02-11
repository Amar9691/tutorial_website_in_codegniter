<?php if(isset($mess))
{
?>
<h1 class="text-center text-info" style="font-size: 20px;">User messages</h1>
<table class="table table-responsive table-hover table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>User Email</th>
		<th>Subject</th>
		<th>Message</th>
		<th>Action</th>
	</tr>
    <?php foreach ($mess as $value) {  ?>
            
           <tr>
           	<td><?php echo $value->name; ?></td>
            <td><?php echo $value->user_id; ?></td>
           	<td><?php echo $value->subject; ?></td>
            <td><?php echo $value->message; ?></td>
            <td><a href="<?php echo base_url();  ?>/Message/delete?id=<?php echo $value->id; ?>" class="btn btn-outline-info">Delete Message</a></td>

           </tr>

   <?php
    } ?>




</table>





<?php
}  ?>

<?php if(isset($sub))
{
?>
<h1 class="text-center text-info" style="font-size: 20px;">Subscribe Customer</h1>
<table class="table table-responsive table-hover table-striped table-bordered">
  <tr>
   
    <th>User Email</th>
   
    <th>Action</th>
  </tr>
    <?php foreach ($sub as $value) {  ?>
            
           <tr>
            <td><?php echo $value->email; ?></td>
          
            <td><a href="<?php echo base_url();  ?>/Message/subdelete?id=<?php echo $value->id; ?>" class="btn btn-outline-info">Unsubscribe</a></td>

           </tr>

   <?php
    } ?>




</table>





<?php
}  ?>