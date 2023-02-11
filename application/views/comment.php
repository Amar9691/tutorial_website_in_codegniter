<?php  if(isset($comment)){ ?>
<table class="table table-responsive table-striped ">
	<tr>
		<th>User_id</th>
		<th>Post_id</th>
		<th>Comment</th>
		<th>Post date</th>
		<th>Action</th>
	</tr>
	<?php foreach ($comment as $value) {  ?>
       
        <tr>
        	<td><?php echo $value->user_id;  ?></td>
          	<td><?php echo $value->post_id;  ?></td>
        	<td><?php echo $value->comment;  ?></td>
        	<td><?php echo $value->create_at;  ?></td>
        	<td><a href="<?php echo base_url(); ?>Message/commentdel?id=<?php echo $value->id;  ?>" class="btn btn-outline-info">Delete</a></td>


        </tr>


	<?php }  ?>

</table>


<?php  }  ?>


<?php  if(isset($reply)){ ?>
<table class="table table-responsive table-striped ">
	<tr>
		<th>Comment_id</th>
		<th>User_id</th>
		<th>Post_id</th>
		<th>reply</th>
		<th>Post date</th>
		<th>Action</th>
	</tr>
	<?php foreach ($reply as $value) {  ?>
       
        <tr>
        	<td><?php echo $value->comment_id;  ?></td>
        	<td><?php echo $value->user_id;  ?></td>
          	<td><?php echo $value->post_id;  ?></td>
        	<td><?php echo $value->reply;  ?></td>
        	<td><?php echo $value->create_at;  ?></td>
        	<td><a href="<?php echo base_url(); ?>Message/replydel?id=<?php echo $value->id;  ?>" class="btn btn-outline-info">Delete</a></td>


        </tr>


	<?php }  ?>

</table>


<?php  }  ?>