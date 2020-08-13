<div class="card__container__box">
<div class="row ">
	<div class="col-lg-4 card__templates">
				<a href="#" class="card border-0  shadow-lg bg-success">
					<div class="card-body d-flex align-items-end flex-column text-right">
						<h5>Transactions</h5>
							<div class="row">
									<i class="fas fa-truck col-sm-3" aria-hidden="true" style="font-size:35px;"></i>
									<p class="w-75 col-sm-9">Look inside to view past transactions of the company</p>
							</div>
					</div>
				</a>
			</div>
            <div class="col-lg-4 card__templates">
				<a href="#" class="card border-0  shadow-lg bg-primary">
					<div class="card-body d-flex align-items-end flex-column text-right">
						<h5>Appointments</h5>
							<div class="row">
									<i class="fas fa-truck col-sm-3" aria-hidden="true" style="font-size:35px;"></i>
									<p class="w-75 col-sm-9">Look inside to view past transactions of the company</p>
							</div>
					</div>
				</a>
			</div>
            <div class="col-lg-4 card__templates">
				<a href="#" class="card border-0  shadow-lg bg-warning">
					<div class="card-body d-flex align-items-end flex-column text-right">
						<h5>Feedbacks</h5>
							<div class="row">
									<i class="fas fa-truck col-sm-3" aria-hidden="true" style="font-size:35px;"></i>
									<p class="w-75 col-sm-9">Look inside to view past transactions of the company</p>
							</div>
					</div>
				</a>
			</div>
        </div>

		
		<div class="container mt-5">
			

				<table class="table table-hover table-striped text-center">
				  <thead class="thead-dark">
				    <tr>
				      
					  <th scope="col">Client Name</th>
					  <th scope="col">Email</th>
					 
					  <th scope="col">Subject</th>
					  <th scope="col">Options</th>
				      
				    </tr>
				  </thead>
				
						 
					<tbody>
						<?php  foreach($response as $result ) { ?>
						<tr>
								<td><?php echo ucfirst($result->firstName).' '.ucfirst($result->lastName);?></td>
								<td><?php echo $result->email;?></td>
								<td><?php echo $result->subject;?></td>
								<td class="row"><a href="<?php echo base_url('view/'.$result->appointment_id);?>" class="btn btn-secondary mr-2 ">Read</a><a href="<?php echo base_url('delete/'.$result->appointment_id);?>" class="btn btn-danger "><i class="fas fa-trash-o"></i></a></td>
							</tr>
						<?php }  ?>
						</tbody>
				
			</table>
			<div class="text-center">
				<?php echo $this->pagination->create_links();?>
			</div>
		</div>
				
	</div>
		

</div>