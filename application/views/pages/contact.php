<div class="container-fluid">
    <div class="card__container__box col-md-8 mx-auto">

<?php if($this->session->flashdata('error')) {?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error');?>
    </div>
<?php } else if($this->session->flashdata('success')){ ?>
     <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success');?>
    </div>
<?php }?>
         <?php echo form_open('Appointment');?>
              <div class="row mt-2">
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

              <div class="text-center">
                <input type="submit" class="btn btn-md btn-danger my-auto" value="submit">
               </div>
              
    
     <?php echo form_close();?>
        


    </div>
</div>
