<div class="container-fluid">
    <div class="card__container__box">
        <div class=" text-center col-xl-10 mx-auto fb_container">
         <!-- ERROR HANDLER -->
          <?php if($this->session->flashdata('error')) {?>
            <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                 <?php echo $this->session->flashdata('error');?>
             </div>
                 <?php }?>
            
         <!-- CONTENT -->

         <?php foreach($all_feedback as $feedback) : ?>
                <?php if($feedback->feedback_status == '1') { ?>
                    <div class="my-5" id="fb_comments" >
                            <h3><?php echo ucwords($feedback->first_name).' '.ucfirst($feedback->last_name);?></h3>
                            <h5 style="color:red">"<?php echo ucfirst($feedback->message);?>"</h5>
                            <!-- <small class="fa-pull-left">Date Posted:<?php echo ($feedback->date_posted);?></small> -->
                    </div>
                <?php }elseif($feedback->feedback_status == '0'){ ?>
                        <h3 class="text-center">No feedbacks to show...</h3>
                <?php } ?>
            <?php endforeach; ?>
            
                     <div class="pagination mx-auto">
                                <?php echo $this->pagination->create_links();?>
                            </div>
          </div>
      </div>      
       <hr class="fixed-bottom mb-5">
        <div class="copyright text-center mb-2 fixed-bottom">Copyright: JOF CUSTOMS BROKERAGE 2020</div> 
</div>
