
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
                        <h4> 1.0 Lowest - 5.0 Highest</h4>
                        <h5> Extreme Unsatisfaction From Services</h5>
                        <h5> Moderate Unsatisfaction From Services</h5>
                        <h5> Average Satisfaction From Services</h5>
                        <h5> Moderate Satisfaction From Services</h5>
                        <h5> Extreme Satisfaction From Services</h5>

                     </div>
            </div>
            <div><h2>Average Rating : <?php echo number_format($average['rating'] , 2); ?> -
            
            <?php if($average['rating'] >= '1.0' && $average['rating'] <= '1.7'){
                echo "Extreme Unsatisfaction From Services";
            }elseif($average['rating'] >= '1.8' && $average['rating'] <= '2.5'){
                echo "Moderate Unsatisfaction From Services";
            }elseif($average['rating'] >= '2.6' && $average['rating'] <= '3.4'){
                echo "Average Unsatisfaction From Services";
            }elseif($average['rating'] >= '3.5' && $average['rating'] <= '4.2'){
                echo "Moderate Unsatisfaction From Services";
            }elseif($average['rating'] >= '4.3' && $average['rating'] <= '5.0'){
                echo "Extreme Unsatisfaction From Services";
            }
                ?></h2></div>

            
</div>
