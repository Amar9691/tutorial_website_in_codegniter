 <?php  if(isset($videoinfo)){  ?>
        
       <div class="card">
       
       <!--card header--> 
       <div class="card-header">
       <h2 class="text-info" style="font-size: 20px;"><?php echo $videoinfo->title;  ?></h2>
       <span style="color: gray;">Author: </span> <strong style="color: gray;"><?php echo $videoinfo->user_id; ?></strong>
       </div>

       <!--- End card header-->
   

       <!-- card body-->
       <div class="card-body">

         <video controls style="width: 100%;height: auto;" autoplay="1">
         
         <source src="<?php  echo $videoinfo->filename; ?>" type="video/mp4" >        
         
         </video>

         <div class="container">
         	<p><?php echo $videoinfo->content;  ?></p>
         	
         </div>
        	
        </div>

        <!---End card body-->

        <!-- start card footer--->
        
        <div class="card-footer">
         <form action="<?php echo base_url('Comment/addcomment');?>" method="POST" >
         <fieldset>
         <?php  if($this->session->userdata('userid')) { ?>
         <legend class="text-info" style="font-size: 20px;">Add Comment</legend>

          <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id');?>">
          <input type="hidden" name="post_id" value="<?php echo $videoinfo->id;?>">   

          <input type="hidden" name="title" value="<?php  echo $videoinfo->category; ?>">       

          <div class="input-group">           
          <textarea class="form-control" name="comment" required placeholder="Add Your valuable comment" rows="1">
          </textarea>
          <div class="input-group-prepend">  
          <input type="submit" name = "submit" class="btn btn-info" value="submit comment">
          </div>      
          </div>

          <?php } ?>
           </fieldset>                
          </form>
          <div class="container" style="overflow:auto;">
            
          <?php if(isset($re)){
                   foreach ($re as $comment) { 
          	          if($videoinfo->id == $comment->post_id){ ?>

                       <div class="user"><span class="fa fa-user text-muted">&nbsp;<?php  echo $comment->user_id; ?></span> &nbsp; <span class="time fa fa-calendar text-secondary"style="font-size:12px;">&nbsp;<?php echo $comment->create_at; ?></span>
                       </div>

                        <div style="font-size:12px;font-family: italic;"><?php echo $comment->comment; ?>
                            &nbsp;

           <?php  if($comment->user_id == $this->session->userid) { ?>
                   

            <a href="http://www.code.in/index.php/User/commentdel/<?php echo $comment->id; ?>/<?php echo $comment->post_id; ?>/<?php echo $active; ?>" class="text-danger">delete</a>

            <?php   }  ?>

                 </div>
                        <div style="font-size: 12px;font-family: italic;">
                        	
                        	 <div class="container ml-2">
                          	 <?php  
                                if(isset($commentreply)) {


                                	foreach ($commentreply as  $value) { 

                                      if($comment->id == $value->comment_id)
                                       { 
                               ?> 
                                       <div class="ml-2">
                                        reply from	<span class="fa fa-user"><?php echo $value->user_id;  ?></span>
                                        <strong class="text-info"><?php echo $value->reply;  ?></strong>
                                     
                                        <?php if($value->user_id == $this->session->userid) {?>
  <a href="http://www.code.in/index.php/User/replydel/<?php echo $value->id; ?>/<?php echo $value->comment_id; ?>/<?php echo $value->post_id; ?>/<?php echo $active; ?>" class="text-danger">delete</a>                                         <?php  } ?>

                                       </div>

                                        
                               <?php

                                } }  } ?>
                          	
                          </div>
                        	
                        </div>

                        <div class="reply-form">
                        	  <form action="<?php echo base_url('Comment/reply'); ?>" method="POST">
                                      <input type="hidden"  name="comment_id" value="<?php echo $comment->id; ?>">
                                      <input type="hidden" name="post_id" value="<?php echo $comment->post_id; ?>">
                                      <input type="hidden" name="post_title" value="<?php echo $videoinfo->category; ?>">
                                      <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('userid'); ?>">
                                      <div class="input-group">
                                      <input type="text" required name="reply" placeholder="enter your reply" class="form-control">
                                      <div class="input-group-append">
                                     	<input type="submit"  name="submit"  class="btn btn-info" value="reply">
                                      </div>
                                     
                                      </div>
                               </form>
                        	
                        </div>
                         


                       


          <?php  }}} ?>
          	
          </div><!--End of Container-->
         </div>   <!--End of card footer--->
        	
        </div>
        
<?php   }  ?>