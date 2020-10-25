
<div class="container mt-5">
  <?php if($this->session->flashdata('error')) {?>
                 <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                       <?php echo $this->session->flashdata('error');?>
                            </div>
                              <?php } elseif($this->session->flashdata('success')) {?>
                                 <div class="alert alert-success mt-5 col-md-8 mx-auto " role="alert">
                                    <?php echo $this->session->flashdata('success');?>
                                         </div>
                         <?php }?>
 <a href="#" class="btn btn-md btn-primary " data-toggle="modal" data-target="#addAccountModal"><i class="fas fa-plus-circle mr-2"></i>Add Account</a>
<div class="row">
           
        <div class="col-md-6">
       
        <h1 class="text-right mb-2 col-md-8" >Employees</h1>
        <table class="table table-bordered table-hover">

            <thead class="table-primary">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $employee) : ?>           
                <tr>
                    <td><?php echo ucfirst($employee->first_name).' '.ucfirst($employee->last_name);?></td>
                    <td><?php 
				      if($employee->user_role == '4'){
				      		echo "Admin";
				      }elseif($employee->user_role == '2'){
				      		echo "Processor";
				      }elseif($employee->user_role == '3'){
				      		echo "Accounting";
				      } ?></td>
                    <td><a href="#" class="btn btn-success mr-2"><i class="fas fa-glass"></i></a> <a onclick="return confirm('Are you sure you want to delete this account?')" href="<?php echo base_url('delete_user');?>/<?php echo $employee->user_ID;?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>
                    <?php endforeach;?>

            </tbody>
        </table>
                      
        </div>

        <div class="col-md-6">
       
        <h1 class="text-right mb-2 col-md-8">Consignees</h1>
        <table class="table table-bordered table-hover">
            <thead class="table-info">
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($clients as $client) {?>           
                <tr>
                    <td><?php echo ucfirst($client->first_name).' '.ucfirst($client->last_name);?></td>
                    <td><?php echo $client->company_name;?></td>
                    <td><a  href="<?php echo base_url('editAccount');?>/<?php echo $client->user_ID;?>" class="btn btn-success mr-2"><i class="fas fa-glass"></i></a>  <a onclick="return confirm('Are you sure you want to delete this account?')" href="<?php echo base_url('delete_user');?>/<?php echo $client->user_ID;?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
                    
                </div>
            </div>
        </div>
</div>
 <div class=" modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLAbel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

                 <h4 class="modal-title mx-auto" id="addAccountModalLAbel">Add User Account</h4>   
            </div>
              <small class="mx-auto mb-3">Company Name & Location are Optional for Employees ONLY</small>
              <hr>
             <div class="modal-body">
                 <div class="container">
                        <?php echo form_open('register');?>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name* </label>
                                <input type="text" class="form-control" name="firstname" >
                            </div>
                             <div class="form-group col-md-6">
                                <label for="lastname">Last Name* </label>
                                <input type="text" class="form-control" name="lastname">
                            </div>
                        </div>
                        <div class="row">
                        
                            <div class="form-group col-md-6">
                                <label for="company_name">Company Name </label>
                                <input type="text" class="form-control" name="company_name">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="company_location">Company Location </label>
                                <input type="text" class="form-control" name="company_location">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email* </label>
                                <input type="email" class="form-control" name="email">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="contact">Contact Info* </label>
                                <input type="text" class="form-control" name="contact">
                            </div>
                        </div>
                         <div class="row">
                            <div class="form-group col-md-6">
                                <label for="user_pass">Password* </label>
                                <input type="password" class="form-control" name="password">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="confirm_pass">Confirm Password* </label>
                                <input type="password" class="form-control" name="confirm">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <label for="user_role">Job Type</label>
                                    <select id="user_role"  name="user_role"  class="form-control">
                                        <option selected >--Select a role--</option>
                                        <option value="4">Administrator</option>
                                        <option value="3">Accounting</option>
                                        <option value="1">Consignee</option>
                                        <option value="2">Processor</option>
                                    </select>
                        <div class="text-center">
                           <button  type="submit" class="btn btn-md btn-danger mt-3" >Register</button>
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


