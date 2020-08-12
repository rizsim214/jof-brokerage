

  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
         
         <div class="carousel-inner">
            <div class="carousel-item active">
                 <img src="<?php echo base_url()?>assets/img/shipping3.jpg" data-interval="5000" class="d-block w-100 position-fixed" alt="First Slide">
                    <div class="carousel-caption d-none d-md-block">
                       <h5 class="animate__bounceIn" style="animation-delay:1s; animation-duration:2s;">We <span>Handle</span> your <span>Needs</span></h5>
                           <p class="animate__slideInLeft" style="animation-delay:2s; animation-duration:1s;"> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>       
                              <a hfre="#" class="animate__bounceInRight" id="btn-mid" style="animation-delay:3s; animation-duration:2s;">Services Offered</a>
                                   
                 </div>
                 
               </div>
         
               <div class="carousel-item ">
                 <img src="<?php echo base_url()?>assets/img/shipping1.jpg" data-interval="5000" class="d-block w-100" alt="Second Slide">
                      <div class="carousel-caption d-none d-md-block">
                       <h5 class="animate__slideInDown" style="animation-delay:1s; animation-duration:2s;">We <span>Value</span> your <span>Trust</span></h5>
                           <p class="animate__slideInRight" style="animation-delay:2s; animation-duration:1s;"> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>       
                             <a hfre="#" class="animate__fadeInLeft" id="btn-mid" style="animation-delay:3s; animation-duration:2s;">Services Offered</a>
                                 
                 </div>
               </div>
             
            <div class="carousel-item ">
                 <img src="<?php echo base_url()?>assets/img/shipping7.jpg" data-interval="5000" class="d-block w-100" alt="Third Slide">
                      <div class="carousel-caption d-none d-md-block">
                       <h5 class="animate__fadeInUp" style="animation-delay:1s; animation-duration:2s;">We <span>Serve</span> with <span>Integrity</span></h5>
                           <p class="animate__slideInDown" style="animation-delay:2s; animation-duration:1s;"> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>       
                              <a hfre="#" class="animate__zoomIn" id="btn-mid" style="animation-delay:3s; animation-duration:2s;">Services Offered</a>
                                  
                      </div>
            </div>

             <div class="carousel-item ">
                 <img src="<?php echo base_url()?>assets/img/shipping2.png" data-interval="5000" class="d-block w-100" alt="Fourth Slide">
                    <div class="carousel-caption d-none d-md-block">
                       <h5 class="animate__bounceIn" style="animation-delay:1s; animation-duration:2s;">We <span>Handle</span> your <span>Needs</span></h5>
                           <p class="animate__slideInLeft" style="animation-delay:2s; animation-duration:1s;"> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>       
                              <a hfre="#" class="animate__bounceInRight" id="btn-mid" style="animation-delay:3s; animation-duration:2s;">Services Offered</a>
                                   
                 </div>
               </div>
               
             <div class="carousel-item ">
                 <img src="<?php echo base_url()?>assets/img/shipping5.jpg" data-interval="5000" class="d-block w-100" alt="Fifth Slide">
                      <div class="carousel-caption d-none d-md-block">
                       <h5 class="animate__slideInDown" style="animation-delay:1s; animation-duration:2s;">We <span>Value</span> your <span>Trust</span></h5>
                           <p class="animate__slideInRight" style="animation-delay:2s; animation-duration:1s;"> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>       
                             <a hfre="#" class="animate__fadeInLeft" id="btn-mid" style="animation-delay:3s; animation-duration:2s;">Services Offered</a>
                                 
                 </div>
               </div>

            <div class="carousel-item ">
                 <img src="<?php echo base_url()?>assets/img/shipping4.jpg" data-interval="5000" class="d-block w-100" alt="Sixth Slide">
                      <div class="carousel-caption d-none d-md-block">
                       <h5 class="animate__fadeInUp" style="animation-delay:1s; animation-duration:2s;">We <span>Serve</span> with <span>Integrity</span></h5>
                           <p class="animate__slideInDown" style="animation-delay:2s; animation-duration:1s;"> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>       
                              <a hfre="#" class="animate__zoomIn" id="btn-mid" style="animation-delay:3s; animation-duration:2s;">Services Offered</a>
                                  
                      </div>
            </div>
          </div>

          
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
          </a>
        </div>
        <?php echo form_open('Appointment');?>
        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
               <div class="modal-header ">
                   <h4 class="modal-title mx-auto " id="contactModalLable">Fill up the Fields with (*)</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
              <div class="modal-body">
              <div class="row">
                  <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstName" placeholder="First Name">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                     </div>
                  </div>
                  
                  <div class="row">
                     
                     <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="contact">Contact Info</label>
                        <input type="text" class="form-control" name="contact" placeholder="Contact">
                     </div>
                  </div>
                  
                  <div class="form-group">
                     <label for="subject">Subject</label>
                     <input type="text" class="form-control" name="subject" placeholder="Subject">
                  </div>
                  <div class="form-group">
                     <label for="message">Message</label>
                     <textarea name="message"  class="form-control" rows="3" required="required" ></textarea>
                  </div>
              </div>
              <div class="modal-footer">
              
                <button type="button" onclick="alert('Message Sent! Thank you for Contacting Us');" name="submit" class="btn btn-danger" data-dismiss="modal">Submit</button>
               
              </div>
          </div>
    </div>
    <?php echo form_close();?>
</div> 