<div class="container text-center mt-5">
    <div class="row mx-auto">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addFaqModal"><i class="fa fa-plus mr-2"></i>CREATE FAQ</a>
        
    </div>  
<h1>FAQ MANAGEMENT</h1>
    <table class="table table-hover text-center">
        <thead class="table-info">
            <tr>
                    <th scope="col">QUESTION</th>
                    <th scope="col">ANSWERS</th>	
                    <th scope="col">UPDATED</th>				 
                    <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>QUESTION</td>
                <td>ANSWER</td>
                <td>UPDATE</td>
                <td>DELETE</td>
            </tr>
        </tbody>
    </table>



</div>

 <div class=" modal fade" id="addFaqModal" tabindex="-1" role="dialog" aria-labelledby="addFaqModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

                 <h4 class="modal-title mx-auto" id="addAccountModalLAbel">FAQ FORM</h4>   
            </div>
            
              <hr>
             <div class="modal-body">
                 <div class="container">
                        <?php echo form_open('create_faq');?>

                        
                            <div class="form-group ">
                                <label for="firstname">QUESTION* </label>
                                <input type="text" class="form-control" name="faq_question" required>
                            </div>
                            <div class="form-group ">
                                <label for="message">ANSWER*</label>
                                 <textarea name="faq_answer"  class="form-control" rows="3" required></textarea>
                            </div>

                        <div class="text-center">
                           <button  type="submit" class="btn btn-md btn-danger mt-3" >ADD FAQ </button>
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