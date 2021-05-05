<div class="container-fluid contactPage_container">
<div class="col-md-8 mx-auto">
 <?php if($this->session->flashdata('error')) {?>
            <div class="alert alert-danger" role="alert">
               <?php echo $this->session->flashdata('error');?>
            </div>
         <?php } else if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success" role="alert">
               <?php echo $this->session->flashdata('success');?>
            </div>
         <?php }?>
         </div>
    <div class="card__container__box col-md-8 mx-auto" id="contact_us">
                     <?php echo form_open('set_appointment');?>
                     <h1 class="text-center text-black ">CONTACT US</h1>
                     <p class="text-center col-md-8 mx-auto" style="color:grey;">Our company is always available for contact. It might take several minutes to receive a reply from us but we will surely notify you. rest assured  </p>
                        <div class="row mt-2">
                              <div class="form-group col-md-6">
                                    <label for="firstname">First Name*</label>
                                    <input type="text" class="form-control" name="firstName" placeholder="">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="lastName">Last Name*</label>
                                    <input type="text" class="form-control" name="lastName" placeholder="">
                                 </div>
                              </div>
                              
                              <div class="row">
                                 
                                 <div class="form-group col-md-6">
                                    <label for="email">Email Address*</label>
                                    <input type="email" class="form-control" name="email" placeholder="">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="contact">Contact Info*</label>
                                    <input type="number" maxlength="11"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" name="contact" placeholder="">
                                 </div>
                              </div>
                              
                              <div class="form-group">
                                 <h4 class="ml-2">How May We Be Of Service To You?</h4>
                                 <?php 
                                    $i = 0;
                                 foreach($predef_questions as $question) : 
                                    
                                 ?>
                                 <div class="form-check ml-5">
                                       <input class="form-check-input" type="radio" value="<?= $question->question_content;?>" name="message" id="flexRadioDefault2">
                                       <label class="form-check-label" for="flexRadioDefault2">
                                          <h5><?= $question->question_content;?></h5>
                                       </label>
                                       </div>
                                      <?php 
                                       if(++$i == 5) break;
                                    endforeach;?>
                              </div>
                              <div class="text-center">
                              <input type="submit" class="btn btn-md btn-primary btn-lg" value="submit">
                              </div>
                        </div>
               <?php echo form_close();?>
                  


    </div>
    <hr>
      <div class="copyright text-center mb-2 ">Copyright: JOF CUSTOMS BROKERAGE 2020</div>
</div>
