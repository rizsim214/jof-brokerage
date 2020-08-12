<div class="container-fluid">
    <div class="card__container__box">
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>
        <h1>HELLO FEEDBACK PAGE</h1>

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
