<div class="container text-center my-5">
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
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addGlossaryModal"><i class="fa fa-plus mr-2"></i>CREATE GLOSSARY</a>
        
    </div>  
<h1>GlOSSARY MANAGEMENT</h1>
    <table class="table table-hover text-center" id="exampleGlossary">
        <thead class="table-info">
            <tr>
                    <th scope="col">TERM</th>
                    <th scope="col">DEFINITION</th>	
                    <th scope="col">UPDATED</th>				 
                    <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>
         <?php  foreach($all_glossary as $glossary) :?>
            <tr>
                <td><?php echo $glossary->glossary_term;?></td>
                <td><?php echo $glossary->glossary_meaning;?></td>
                <td><a href="<?php echo base_url('fetch_glossary');?>/<?php echo $glossary->glossary_ID;?>" class="btn btn-secondary"><i class="fas fa-pen"></i></a></td>
                <td><a onclick="return confirm('Removing Definition. Proceed?')" href="<?php echo base_url('delete_glossary')?>/<?php echo $glossary->glossary_ID?>" class="btn btn-danger"><i class="fa fa-minus"></i></a></td>
            </tr>
             <?php endforeach; ?>
        </tbody>
    </table>



</div>

 <div class=" modal fade" id="addGlossaryModal" tabindex="-1" role="dialog" aria-labelledby="addGlossaryModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

                 <h4 class="modal-title mx-auto" id="addAccountModalLAbel">GLOSSARY FORM</h4>   
            </div>
            
              <hr>
             <div class="modal-body">
                 <div class="container">
                        <?php echo form_open('create_glossary');?>

                        
                            <div class="form-group ">
                                <label for="firstname">TERM* </label>
                                <input type="text" class="form-control" name="glossary_term" required>
                            </div>
                            <div class="form-group ">
                                <label for="message">DEFINITION*</label>
                                 <textarea name="glossary_meaning"  class="form-control" rows="3" required></textarea>
                            </div>

                        <div class="text-center">
                           <button  type="submit" class="btn btn-md btn-danger mt-3" >ADD GLOSSARY </button>
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