<div class="container my-5">
 <?php if($this->session->flashdata('error')) {?>
                 <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                       <?php echo $this->session->flashdata('error');?>
                            </div>
                              <?php } elseif($this->session->flashdata('success')) {?>
                                 <div class="alert alert-success mt-5 col-md-8 mx-auto " role="alert">
                                    <?php echo $this->session->flashdata('success');?>
                                         </div>
                         <?php }?>
				<table class="table table-bordered table-hover text-center" id="exampleAppointment">
				  <thead class="table-info">
				
	            	<h1 class="text-center mb-2">Messages</h1>
                            
                                <tr>
                                <th scope="col">Client Name</th>
                                <th scope="col">Email</th>					 
                                
                                <th scope="col">Status</th>
                                <th scope="col">Date Posted</th>
                                <th scope="col">Options</th>
                                </tr>
                            </thead> 
                                <tbody>
                                    <?php  foreach($response as $result ) { ?>
                                    <tr>
                                            <td><?php echo ucfirst($result->firstname).' '.ucfirst($result->lastname);?></td>
                                            <td><?php echo $result->email;?></td>
                                           
                                            <td><?php echo $result->appointment_status;?></td>
                                            <td><?php echo $result->date_posted;?></td>
                                            <td><a href="<?php echo base_url('view_message');?>/<?php echo $result->appointment_ID;?>" class="btn btn-secondary mr-2 "><i class="fas fa-pencil-square"></i></i></a><a onclick="return confirm('Are you sure you want to delete this message?')" href="<?php echo base_url('delete_appointment');?>/<?php echo $result->appointment_ID?>" class="btn btn-danger "><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                    <?php }  ?>
                                    </tbody>
                            
			    </table>
                           
		</div>
	</div>