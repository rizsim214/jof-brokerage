
<div class="container mx-auto my-2">

 <?php if($this->session->flashdata('error')) {?>
                 <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                       <?php echo $this->session->flashdata('error');?>
                            </div>
                              <?php } elseif($this->session->flashdata('success')) {?>
                                 <div class="alert alert-success mt-5 col-md-8 mx-auto " role="alert">
                                    <?php echo $this->session->flashdata('success');?>
                                         </div>
                         <?php }?>
                         <table class="table  table-hover text-center">
				  <thead class="table-info">
	            	<h1 class="text-center mb-2">Feedback Manager</h1>             
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Message</th>					 
                                <th scope="col">Ratings</th>
                                <th scope="col">Status</th>
                                <th scope="col">Post</th>
                                <th scope="col">Delete</th>
                                
                                </tr>
                            </thead> 
                                <tbody>
                                    <?php  foreach($all_feedbacks as $feedback) :?>
                                    <tr>
                                            <td><?php echo ucwords($feedback->first_name).' '. ucfirst($feedback->last_name);?></td>
                                            <td><?php echo ucwords($feedback->message);?></td>
                                            <td><?php echo $feedback->rating;?></td>
                                            <td><?php echo $feedback->feedback_status;?></td>
                                            <td><a onclick="return confirm('Posting Feedback. Proceed?')" href="<?php echo base_url('post_feedback')?>/<?php echo $feedback->feedback_ID?>" class="btn btn-success"><i class="fa fa-search-plus"></i></a></td>
                                            <td><a onclick="return confirm('Removing Feedback. Proceed?')" href="<?php echo base_url('delete_feedback')?>/<?php echo $feedback->feedback_ID?>" class="btn btn-danger"><i class="fa fa-minus"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                            
			    </table>
    
            <div class="pagination fa-pull-right">
            <?php echo $this->pagination->create_links();?>
            </div>
</div>
