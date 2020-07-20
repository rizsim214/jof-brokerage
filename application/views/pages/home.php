
<!-- FLASH DATA FOR ON SCREEN NOTIFICATION -->
	<div class="container-fluid  ">
				<div class=" text-center">
						<?php if($this->session->flashdata('success')){ ?>
							<div class="alert alert-success my-auto" id="alert" role="alert">
								<?php echo $this->session->flashdata('success'); ?>
							</div>
						<?php } ?>
				</div>
	</div>

<div class="container-fluid my-2" id="body-container" >
	
		<div id="MagicCarousel" class="carousel carousel-fade " data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#MagicCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#MagicCarousel" data-slide-to="1"></li>
			<li data-target="#MagicCarousel" data-slide-to="2"></li>
			<li data-target="#MagicCarousel" data-slide-to="3"></li>
			<li data-target="#MagicCarousel" data-slide-to="4"></li>
			<li data-target="#MagicCarousel" data-slide-to="5"></li>
		</ol>
		
			<div class="carousel-inner" role="listbox" id="magicCarouselBox">
				
				<div class="carousel-item active" data-intereval="3000">
					<img class=" d-block w-100 " src="<?php echo base_url();?>assets/img/shipping7.jpg" id="background-image" alt="First Slide">
						
						<div class="container" id="appointmentLabelBox1">
							<div class="carousel-caption">
								<div class=" text-center container " id="text_qoute">
									<h2 id="home-tag1">Request Appointment</h2>
									<p id="home-tag2">Connect with us to discuss business</p>
									<!-- <a href="#" class="bnt btn btn-secondary mx-auto" role="buton"><i class="fas fa-handshake-o" style="font-size:30px;"></i></a> -->
									<buttom type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#appointmentModal" id="appointmentButton" ><i class="fas fa-handshake-o" id="appointmentIcon"></i></buttom>
								</div>	
							</div>
						</div>
					
				</div>
				<div class="carousel-item" data-intereval="3000">
					<img class="d-block w-100" src="<?php echo base_url();?>assets/img/shipping2.png"  id="background-image" alt="Second Slide">
						<div class="container" id="appointmentLabelBox1">
							<div class="carousel-caption">
								<div class=" text-center container " id="text_qoute">
									<h2 id="home-tag1">Request for an Appointment</h2>
									<p id="home-tag2">Connect with us to discuss business</p>
									<!-- <a href="#" class="bnt btn btn-secondary mx-auto" role="buton"><i class="fas fa-handshake-o" style="font-size:30px;"></i></a> -->
									<buttom type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#appointmentModal" id="appointmentButton" ><i class="fas fa-handshake-o" id="appointmentIcon"></i></buttom>
								</div>		
							</div>
						</div>
				</div>
				<div class="carousel-item" data-intereval="3000">
					<img class="d-block w-100" src="<?php echo base_url();?>assets/img/shipping7.jpg"  id="background-image" alt="Third Slide">
						<div class="container" id="appointmentLabelBox1">
							<div class="carousel-caption">
								<div class=" text-center container " id="text_qoute">
									<h2 id="home-tag1">Request for an Appointment</h2>
									<p id="home-tag2">Connect with us to discuss business</p>
									<!-- <a href="#" class="bnt btn btn-secondary mx-auto" role="buton"><i class="fas fa-handshake-o" style="font-size:30px;"></i></a> -->
									<buttom type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#appointmentModal" id="appointmentButton" ><i class="fas fa-handshake-o" id="appointmentIcon"></i></buttom>
								</div>		
							</div>
						</div>
				</div>
				<div class="carousel-item" data-intereval="3000">
					<img class="d-block w-100" src="<?php echo base_url();?>assets/img/shipping5.jpg" id="background-image" alt="Fourth Slide">
					<div class="container" id="appointmentLabelBox1">
							<div class="carousel-caption">
								<div class=" text-center container " id="text_qoute">
									<h2 id="home-tag1">Request for an Appointment</h2>
									<p id="home-tag2">Connect with us to discuss business</p>
									<!-- <a href="#" class="bnt btn btn-secondary mx-auto" role="buton"><i class="fas fa-handshake-o" style="font-size:30px;"></i></a> -->
									<buttom type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#appointmentModal" id="appointmentButton" ><i class="fas fa-handshake-o" id="appointmentIcon"></i></buttom>
								</div>		
							</div>
						</div>
				</div>
				<div class="carousel-item" data-intereval="3000">
					<img class="d-block w-100"  src="<?php echo base_url();?>assets/img/shipping5.jpg" id="background-image" alt="Fifth Slide">
						<div class="container" id="appointmentLabelBox1">
							<div class="carousel-caption">
								<div class=" text-center container " id="text_qoute">
									<h2 id="home-tag1">Request for an Appointment</h2>
									<p id="home-tag2">Connect with us to discuss business</p>
									<!-- <a href="#" class="bnt btn btn-secondary mx-auto" role="buton"><i class="fas fa-handshake-o" style="font-size:30px;"></i></a> -->
									<buttom type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#appointmentModal" id="appointmentButton" ><i class="fas fa-handshake-o" id="appointmentIcon"></i></buttom>
								</div>		
							</div>
						</div>
				</div>
				<div class="carousel-item" data-intereval="3000">
					<img class="d-block w-100" src="<?php echo base_url();?>assets/img/shipping7.jpg" id="background-image" alt="Sixth Slide">
					<div class="container" id="appointmentLabelBox1">
							<div class="carousel-caption">
								<div class=" text-center container " id="text_qoute">
									<h2 id="home-tag1">Request for an Appointment</h2>
									<p id="home-tag2">Connect with us to discuss business</p>
									<!-- <a href="#" class="bnt btn btn-secondary mx-auto" role="buton"><i class="fas fa-handshake-o" style="font-size:30px;"></i></a> -->
									<buttom type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#appointmentModal" id="appointmentButton" ><i class="fas fa-handshake-o" id="appointmentIcon"></i></buttom>
								</div>		
							</div>
						</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#MagicCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
				<span class="sr-only">Previous</span>
			</a>


			<a class="carousel-control-next" href="#MagicCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	
		


	<div class="container col-md-10 mx-auto " id="media-container" >
	<h3 class="text-center" id="home-tag">Client Reviews</h3>
	<hr>
		<div class="media">
    		<div class="media-left col-sm-1 ">
     		 <img src="<?php echo base_url();?>assets/img/logo.png" class="media-object" style="width:80px">
   			</div>
			<div class="media-body col-md-9">
				<h5 class="media heading" id="home-tag">*Name of Commentor Here*</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					</p>
			</div>
			<div class="media-right col-sm-2 ">
     		 <h5>*Insert Bootstrap Star rating*</h5>
   			</div>
	 	</div>
	<hr>
			<div class="media">
    		<div class="media-left col-sm-1 ">
     		 <img src="<?php echo base_url();?>assets/img/shipping1.jpg" class="media-object" style="width:80px">
   			</div>
			<div class="media-body col-md-9">
				<h5 class="media heading" id="home-tag">*Name of Commentor Here*</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					</p>
			</div>
			<div class="media-right col-sm-2 ">
     		 <h5>*Insert Bootstrap Star rating*</h5>
   			</div>
	 	</div>
	<hr>
		<hr>
			<div class="media">
    		<div class="media-left col-sm-1 ">
     		 <img src="<?php echo base_url();?>assets/img/shipping1.jpg" class="media-object" style="width:80px">
   			</div>
			<div class="media-body col-md-9">
				<h5 class="media heading" id="home-tag">*Name of Commentor Here*</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					</p>
			</div>
				<div class="media-right col-sm-2 ">
				<h5>*Insert Bootstrap Star rating*</h5>
				</div>
			 </div>
		<hr>
			<div class="media">
    		<div class="media-left col-sm-1 ">
     		 <img src="<?php echo base_url();?>assets/img/shipping1.jpg" class="media-object" style="width:80px">
   			</div>
			<div class="media-body col-md-9">
				<h5 class="media heading" id="home-tag">*Name of Commentor Here*</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					</p>
			</div>
				<div class="media-right col-sm-2 ">
				<h5>*Insert Bootstrap Star rating*</h5>
				</div>
	 	</div>
	<hr>

	</div>

</div>


		<?php echo form_open('Appointment');?>
			<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title mx-auto" id="appointmentModalLabel">Set Appointment</h3>
							 <button type="button" class="close col-sm-2" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
									</button>							
						</div>
								<p class="text-center" id="minitext">We are very pleased to work with you</p>
									<div class="modal-body">
										<div class="row">
											<div class="form-group col-md-6 col-offset-3">
												<label for="senderFName" class="col-form-label">First Name*</label>
													<input type="text" class="form-control" name="firstName" id="senderFName" placeholder="First name" >								
											</div>	
											<div class="form-group col-md-6 col-offset-3">
												<label for="senderLName" class="col-form-label">Last Name*</label>
													<input type="text" class="form-control" name="lastName" id="senderLName" placeholder="Last name" >	
																				
											</div>
										</div>	
										<div class="row">
											<div class="form-group col-md">
												<label for="senderEmail" class="col-form-label">Email Address*</label>
													<input type="email" class="form-control" name="email" id="senderEmail" placeholder="Email" required >								
											</div>	
											<div class="form-group col-md">
												<label for="senderContact" class="col-form-label">Contact Info*</label>
													<input type="text" class="form-control" name="contact" id="senderContact" placeholder="Contact info" required >								
											</div>	
										</div>
											
										<div class="form-group">
											<label for="senderName" class="col-form-label">Message*</label>
												<textarea type="text" class="form-control" name="message" id="senderName" placeholder="content here..." required ></textarea>								
										</div>	
									</div>	
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-md btn-outline-danger" name="sendRequest" value="sendRequest">Send Now</button>
									
								</div>	
					</div>

				</div>

			</div>
		<?php echo form_close();?>
