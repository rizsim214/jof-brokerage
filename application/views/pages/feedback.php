<div class="container-fluid">
    <div class="card__container__box">
        <div class=" text-center col-xl-8 mx-auto fb_container">
         <!-- ERROR HANDLER -->
          <?php if($this->session->flashdata('error')) {?>
            <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                 <?php echo $this->session->flashdata('error');?>
             </div>
                 <?php }?>
            
         <!-- CONTENT -->

         <?php foreach($all_feedback as $feedback) : ?>
            <div class="my-4" id="fb_comments" >
                    <h3><?php echo ucwords($feedback->first_name).' '.ucfirst($feedback->last_name);?></h3>
                    <h5 style="color:red">"<?php echo ucwords($feedback->message);?>"</h5>
            </div>
            <?php endforeach; ?>
            
                     <div class="pagination mx-auto">
                                <?php echo $this->pagination->create_links();?>
                            </div>
          </div>
      </div>      
       <hr>
        <div class="copyright text-center mb-2">Copyright: JOF CUSTOMS BROKERAGE 2020</div> 
</div>
