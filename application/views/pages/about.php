<div class="container-fluid " >
<div class="card-deck card__container__box" >
  <div class="card ">
    <img class="card-img mx-auto" src="<?php echo base_url();?>assets/img/about.jpg" alt="About Us">
    <div class="card-body">
      <hr>
           <h5 class="card-title">"About Us"</h5>
      <hr>
           <p class="card-text">We aspire to become a key logistics partner to clients in the Philippines and the neighboring countries. We strive to consistently provide high-quality freight-forwarding and courier services,
                          meet our clients’ needs and supply chain requirements, and, in doing so, achieve overall financial sustainability for our company. 
                          In all areas of our operations, we adhere to the company’s core value of providing quality service with care.</p>
    </div>
     <div class="card-footer text-center">
               <a href="#" class="btn btn-danger"><i class="fas fa-magnet mr-2"></i>Read More</a>
     </div>
  </div>
  <div class="card ">
      <img class="card-img mx-auto" src="<?php echo base_url();?>assets/img/about2.png" alt="Mission" >
    <div class="card-body">
      <hr>   
           <h5 class="card-title">"Mission"</h5>
       <hr>
           <p class="card-text">We aspire to become a key logistics partner to clients in the Philippines and the neighboring countries. We strive to consistently provide high-quality freight-forwarding and courier services,
                          meet our clients’ needs and supply chain requirements, and, in doing so, achieve overall financial sustainability for our company. 
                          In all areas of our operations, we adhere to the company’s core value of providing quality service with care.</p>
    </div>
    <div class="card-footer text-center">
           <a href="#" class="btn btn-danger"><i class="fas fa-magnet mr-2"></i>Read More</a>
    </div>
  </div>
  <div class="card ">
    <img class="card-img mx-auto" src="<?php echo base_url();?>assets/img/about3.png" alt="Vision"> 
    <div class="card-body">
      <hr>
           <h5 class="card-title">"Vision"</h5>
       <hr>
           <p class="card-text">We aspire to become a key logistics partner to clients in the Philippines and the neighboring countries. We strive to consistently provide high-quality freight-forwarding and courier services,
                          meet our clients’ needs and supply chain requirements, and, in doing so, achieve overall financial sustainability for our company. 
                          In all areas of our operations, we adhere to the company’s core value of providing quality service with care.</p>
     </div>
    <div class="card-footer text-center">
      <a href="#" class="btn btn-danger"><i class="fas fa-magnet mr-2"></i>Read More</a>
    </div>
  </div>
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