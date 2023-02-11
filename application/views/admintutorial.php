<?php  if(isset($tutorial)) {  ?>


<?php  if(isset($error)){ print_r($error); }  ?>


<?php echo form_open_multipart('Tutorial/addtut');?>
<fieldset>
	<legend class="text-center text-info">Add New Tutorial</legend>

	<div class="form-group">
	<label>Enter Ttitle</label>
	<input type="text" name="title" class="form-control" placeholder="Enter Tutorial headline" required>
	
    </div>

    <div class="form-group">
	<label>category</label>
	<select  class="form-control" name="tutcate" required>
		<option selected>select category</option>
		<?php
		    if(isset($cal))
		    {
		    	foreach ($cal as $value) {
		    ?>
            <option value="<?php  echo $value->title; ?>"><?php   echo $value->title;  ?></option>
		    <?php
		                                 }
		    }
		?>
	</select>
	
    </div>

    <div class="form-group">
    	<label>Description</label>
    	<textarea class="form-control" rows="2" name="des" required>
    		
    	</textarea>
    </div>

<input type="file" name="userfile" class="form-control" required />

<br /><br />

<input type="submit" value="upload" class="btn btn-outline-info" />



</fieldset>


</form>




<?php   }  ?>


<?php  if(isset($posts)) { ?>

    <h1 class="text-info" style="font-size: 20px;">Posts Information</h1>
	<table class="table table-responsive table-hover table-striped">
		<tr>
			<th>Author</th>
			<th>Title</th>
			<th>Category</th>
			<th>Content</th>
			<th>Filename</th>
			<th>Posted date</th>
			<th>Remove</th>
			<th>Edit</th>
		</tr>
        <?php foreach ($posts as $value) {  ?>
            
            <tr>
            	<td><?php echo $value->user_id;  ?></td>
            	<td><?php echo $value->title;  ?></td>
            	<td><?php echo $value->category;  ?></td>
            	<td><?php echo $value->content;  ?></td>

            	<td><?php echo $value->filename;  ?></td>

            	<td><?php echo $value->created_at;  ?></td>
            	<td><a href="<?php echo base_url();?>Tutorial/delete?id= <?php echo $value->id; ?>" class="btn btn-outline-info">Delete</a></td>
            	<td><a href="<?php echo base_url();?>Tutorial/edit?id= <?php echo $value->id; ?>" class="btn btn-outline-info">Edit</a></td>

            </tr>



        <?php 
           } 
        ?>

	</table>
<?php
} 
?>



<?php  if(isset($postedit)){

       foreach ($postedit as $value) {  ?>

       

<?php echo form_open_multipart('Tutorial/postupdate');?>
<fieldset>
	<legend class="text-center text-info">Update Post Tutorial</legend>

	<div class="form-group">
	<label>Enter Ttitle</label>
	<input type="text" name="title" class="form-control" placeholder="Enter Tutorial headline" value="<?php echo $value->title;  ?>" required>
	
    </div>
    <input type="hidden" name="oldfile" value="<?php  echo $value->filename;  ?>">
    <input type="hidden" name="id" value="<?php  echo $value->id;?>" >
    <input type="hidden" name="user_id" value="<?php echo $value->user_id; ?>">

    <div class="form-group">
	<label>category</label>

	
    <select  class="form-control" name="tutcate" required>
		<?php
		    if(isset($cal))
		    {
		    	foreach ($cal as $val) {

		    	if($val->title == $value->category)
		    	{
		    ?>

            <option value="<?php  echo $val->title; ?>" selected><?php   echo $val->title;  ?></option>
        <?php }
        else
        { ?>
        	<option value="<?php  echo $val->title; ?>"><?php  echo $val->title; ?></option>
		    <?php
	    	}
		    	}
		    }
		?>
	</select>
	
    </div>

    <div class="form-group">
    	<label>Description</label>
    	<input type="text" name="des" class="form-control" value="<?php  echo $value->content;  ?>">
    </div>


 <strong>Filename : <?php echo $value->filename; ?></strong>

<input type="file" name="userfile" size="20" class="form-control" />

<br /><br />

<input type="submit" value="update" class="btn btn-outline-info" />



</fieldset>


</form>






<?php } }  ?>