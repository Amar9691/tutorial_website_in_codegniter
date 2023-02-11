<?php if(isset($addcate))
{
?>
<h1 class="text-center text-info" style="font-size: 20px;">Add tutorial category</h1>

<form action="<?php  echo base_url(); ?>Category/addcategory" method="POST" enctype="multipart/form-data">
  <fieldset>
    
    <div class="form-group">
    <label>Enter title</label>
    <input type="text" name="title" class="form-control">
      
    </div>
    
     <input type="submit" name="submit" class="btn btn-outline-info" value="Add Category">

     <input type="reset" name="reset" class="btn btn-outline-danger" class="Reset">


    </fieldset>
</form>
    





<?php
}  ?>

<?php if(isset($cateall))
{
?>
<h1 class="text-center text-info" style="font-size: 20px;">Tutorial categories</h1>

<table class="table table-responsive table-hover table-striped table-bordered">
  <tr>
    <th>id</th>
    <th>title</th>
    <th>Remove</th>
   
 
  </tr>
    <?php foreach ($cateall as $value) {  ?>
            
           <tr>
            <td><?php echo $value->id; ?></td>
            <td><?php echo $value->title; ?></td>
             <td><a href="<?php echo base_url();  ?>/Category/delete?id=<?php echo $value->id; ?>" class="btn btn-outline-info">Delete</a></td>
       

           </tr>

   <?php
    } ?>




</table>


    





<?php
}  ?>