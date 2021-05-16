
<div class="container mx-auto my-5">

 <?php if($this->session->flashdata('error')) {?>
                 <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                       <?php echo $this->session->flashdata('error');?>
                            </div>
                              <?php } elseif($this->session->flashdata('success')) {?>
                                 <div class="alert alert-success mt-5 col-md-8 mx-auto " role="alert">
                                    <?php echo $this->session->flashdata('success');?>
                                         </div>
                         <?php }?>

                         
              <table class="table  table-hover text-center" id="exampleFeedback">
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
                                            <!-- <td><?php echo $feedback->feedback_status;?></td> -->
                                            <td><?php if($feedback->feedback_status == 0){
                                                echo "Unposted";
                                            }else{
                                                echo "Posted";
                                            }?></td>
                                            <td><a href="<?php echo base_url('post_feedback')?>/<?php echo $feedback->feedback_ID?>" class="btn btn-secondary post_feedback" ><i class="fa fa-plus "></i></a></td>
                                            <td><a onclick="return confirm('Removing Feedback. Proceed?')" href="<?php echo base_url('delete_feedback')?>/<?php echo $feedback->feedback_ID?>" class="btn btn-danger"><i class="fa fa-minus"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                            <!--<?php echo base_url('post_feedback')?>/<?php echo $feedback->feedback_ID?>  -->
			    </table>
    
            <br>
            <div class="container col-md-10 mx-auto mb-5">
                    <h4>LEGEND:</h4>
                    
                      <div class="justify-left mt-3">
                     
                        <h5>1.0 - 1.9 Very Poor Quality Of Services</h5>
                        <h5>2.0 - 2.9 Poor Quality Of Services</h5>
                        <h5>3.0 - 3.9 Fair Quality Of Services</h5>
                        <h5>4.0 - 4.9 Good Quality Of Services</h5>
                        <h5>5.0       Excellent Quality Of Services</h5>

                     </div>
            </div>
                                          
            <div><h2 class="text-muted">Actual Rating: <?= number_format($average['rating'] , 2);?></h2></div>
            <div><h1 class="text-dark">Final Rating : <?php echo round($average['rating']); ?> -
            
            <?php if(round($average['rating']) >= '1.0' && round($average['rating']) <= '1.9'){
                echo "Very Poor Quality Of Services";
            }elseif(round($average['rating']) >= '2.0' && round($average['rating']) <= '2.9'){
                echo "Poor Quality Of Services";
            }elseif(round($average['rating']) >= '3.0' && round($average['rating']) <= '3.9'){
                echo "Fair Quality Of Services";
            }elseif(round($average['rating']) >= '4.0' && round($average['rating']) <= '4.9'){
                echo "Good Quality Of Services";
            }elseif(round($average['rating'])== '5.0'){
                echo "Excellent Quality Of Services";
            }
                ?></h1></div>
                

            
</div>
