<div class="container mt-5">
				<table class="table table-bordered table-hover text-center">
				  <thead class="table-info">
				 
				  	<h1 class="text-center mb-2">ACCOUNTING</h1>
				  
				    <tr>
					  <th scope="col">Transaction Number</th>
					  <th scope="col">Company Name</th>	
					  <th scope="col">Client Name</th>
					  <th scope="col">Broker/Processor</th>
					  <th scope="col">Transaction Status</th>
					  <!-- <th scope="col">Transaction Fee</th> -->
					  <th scope="col" colspan="2">Options</th>
                      
				    </tr>
				  </thead> 
					<tbody>
						<?php foreach($transactions as $transaction) :
							   $processor = getProcessor($transaction->processor_id);
							?> 
						<tr>
								 <td><?php echo $transaction->transaction_number;?></td>
								<td><?php echo $transaction->company_name;?></td>
								<td><?php echo ucfirst($transaction->first_name).' '.ucfirst($transaction->last_name);?></td>
								<td><?php echo empty($processor->first_name) ? 'waiting' : $processor->first_name . ' ' . $processor->last_name; ?></td>
								<td><?php echo $transaction->transaction_status;?></td> 
								<td><?php //echo $transaction->service_fee;?></td> 
                               
								<td ><a href="<?php echo base_url('view');?>" class="btn btn-secondary mr-2 "><i class="fas fa-street-view"></i></a><a href="<?php echo base_url('setPayment');?>" class="btn btn-success "><i class="fas fa-paypal"></i></a></td>
							</tr>
						 <?php endforeach;?>
						</tbody>
				
			</table>
			
		</div>
	</div>