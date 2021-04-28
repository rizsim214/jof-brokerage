<div class="container text-center mt-5">
    <?php if($this->session->flashdata('error')) {?>
                 <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                       <?php echo $this->session->flashdata('error');?>
                            </div>
                              <?php } elseif($this->session->flashdata('success')) {?>
                                 <div class="alert alert-success mt-5 col-md-8 mx-auto " role="alert">
                                    <?php echo $this->session->flashdata('success');?>
                                         </div>
                         <?php }?>
    <div class="row mx-auto">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addPredefinedQuestionModal"><i class="fa fa-plus mr-2"></i>CREATE Question</a>
        
    </div>  
<h1>QUESTION MANAGEMENT</h1>
    <table class="table table-hover text-center" id="exampleGlossary">
        <thead class="table-info">
            <tr>
                    <th scope="col">QUESTION</th>
                    <th scope="col">DATE CREATED</th>	
                    <th scope="col">UPDATE</th>				 
                    <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>
         
            <tr>
                <?php  foreach($predef_questions as $question) :?>
            <tr>
                <td><?php echo $question->question_content;?></td>
                <td><?php echo $question->date_created;?></td>
                <td><a href="<?php echo base_url('fetch_question');?>/<?php echo $question->question_ID;?>" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                <td><a onclick="return confirm('Removing Predefined Question. Proceed?')" href="<?php echo base_url('delete_question')?>/<?php echo $question->question_ID?>" class="btn btn-danger"><i class="fa fa-minus"></i></a></td>
            </tr>
             <?php endforeach; ?>
            </tr>
             
        </tbody>
    </table>



</div>

 <div class=" modal fade" id="addPredefinedQuestionModal" tabindex="-1" role="dialog" aria-labelledby="addPredefinedQuestionModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

                 <h4 class="modal-title mx-auto" id="addAccountModalLAbel">ADD QUESTION FORM</h4>   
            </div>
            
              <hr>
             <div class="modal-body">
                 <div class="container">
                        <?php echo form_open('create_question');?>

                        
                            <div class="form-group ">
                                <label for="question">Predefined Question </label>
                                <input type="text" class="form-control" name="question" placeholder="Input Question" required >
                                <small class=" col-md-8 mx-auto">Add question to choose from by the client in the contact us page</small>
                            </div>
                            

                        <div class="text-center">
                           <button  type="submit" class="btn btn-md btn-danger mt-3" >ADD Question </button>
                        </div>
                        <?php echo form_close();?>
                 </div> 
             </div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
          </div>
      </div>
    </div> 