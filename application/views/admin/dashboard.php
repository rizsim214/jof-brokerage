<?php if($this->session->flashdata('error')) {?>
                 <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                       <?php echo $this->session->flashdata('error');?>
                            </div>
                              <?php } elseif($this->session->flashdata('success')) {?>
                                 <div class="alert alert-success mt-5 col-md-8 mx-auto " role="alert">
                                    <?php echo $this->session->flashdata('success');?>
                                         </div>
                         <?php }?>


 <div class="container my-5">
		<div class="row ">
			<div class="col-lg-4 card__templates">
						<a href="<?php echo base_url('transactions');?>" class="card border-0  shadow-lg bg-success">
							<div class="card-body d-flex align-items-end flex-column text-right">
								<h5>Transactions</h5>
									<div class="row">
											<h1 class="col-sm-3 mx-auto"><?= $count_transactions;?></h1>
											<p class="w-75 col-sm-9">View latest transactions processed by the company</p>
									</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 card__templates">
						<a href="<?php echo base_url('appointments');?>" class="card border-0  shadow-lg bg-dark">
							<div class="card-body d-flex align-items-end flex-column text-right">
								<h5>Messages</h5>
									<div class="row">
											<h1 class="col-sm-3 mx-auto"><?= $count_messages;?></h1>
											<p class="w-75 col-sm-9">View all messages sent to the company. </p>
									</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 card__templates">
						<a href="<?php echo base_url('admin_feedback');?>" class="card border-0  shadow-lg bg-danger">
							<div class="card-body d-flex align-items-end flex-column text-right">
								<h5>Feedbacks</h5>
									<div class="row">
											<h1 class="col-sm-3 mx-auto"><?= $count_feedbacks;?></h1>
											<p class="w-75 col-sm-9">View recent feedbacks posted by the clients to the company.</p>
									</div>
							</div>
						</a>
					</div>
			</div>

				<div class="text-center mt-5">
					<h1>Create Announcement Board for Company Announcements</h1>
				</div>
</div> 
		
