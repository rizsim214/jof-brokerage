<div class="container mt-5">
				<table class="table table-bordered table-hover text-center">
				  <thead class="table-info">
				
	            	<h1 class="text-center mb-2">Appointments</h1>
                            
                                <tr>
                                <th scope="col">Client Name</th>
                                <th scope="col">Email</th>					 
                                <th scope="col">Subject</th>
                                <th scope="col">Status</th>
                                <th scope="col">Options</th>
                                </tr>
                            </thead> 
                                <tbody>
                                    <?php  foreach($response as $result ) { ?>
                                    <tr>
                                            <td><?php echo ucfirst($result->firstname).' '.ucfirst($result->lastname);?></td>
                                            <td><?php echo $result->email;?></td>
                                            <td><?php echo $result->subject;?></td>
                                            <td><?php echo $result->appointment_status;?></td>
                                            <td><a href="<?php echo base_url('view/'.$result->appointment_ID);?>" class="btn btn-secondary mr-2 ">Read</a><a onclick="return confirm('Are you sure you want to delete this message?')" href="<?php echo base_url('delete_appointment');?>/<?php echo $result->appointment_ID?>" class="btn btn-danger "><i class="fas fa-trash-o"></i></a></td>
                                        </tr>
                                    <?php }  ?>
                                    </tbody>
                            
			    </table>
                            <div class="pagination fa-pull-right">
                                <?php echo $this->pagination->create_links();?>
                            </div>
		</div>
	</div>