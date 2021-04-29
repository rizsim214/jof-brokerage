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
                                        </div>
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


  

 
<!-- VIEW USERS -->
<div class="container-fluid mt-5 mb-5">
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

   

        <div class="col-lg-12 table text-center">
       
             <h1 class="text-center mb-2 ">Consignee Accounts</h1>
                <table class="table table-bordered table-hover" id="example1">
                    <thead class="table-info">
                        <tr>
                            
                            <th>Name</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Transactions</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach ($clients as $client) : ?>  
                        <?php if($client->active_status == "active") {?>
                           
                             <tr>
                            
                            <td><?= ucfirst($client->first_name).' '.ucfirst($client->last_name);?></td>
                            <td><?=$client->company_name;?></td>
                            <td><?= $client->register_status;?></td>
                            <td><a href="#" class="btn btn-info">View</a></td>
                            <td> <!-- Default dropleft button -->
                                    <div class="btn-group dropdown">
                                         <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-gear"></i> Options
                                                 </button>
                                                       <div class="dropdown-menu option_dropdown" >
                                                                <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" id="accept" href="<?= base_url('accept_registration');?>/<?=$client->user_ID;?>">Accept</a>
                                                                    <a onclick="return confirm('Are you sure you want to decline this account?')" class="dropdown-item" id="accept" href="<?= base_url('decline');?>/<?=$client->user_ID;?>">Decline</a>
                                                                    <a class="dropdown-item" id="accept" href="<?= base_url('editAccount');?>/<?=$client->user_ID;?>">Update</a>
                                                                    <a onclick="return confirm('Are you sure you want to delete this account?')" class="dropdown-item" id="accept" href="<?= base_url('delete_account');?>/<?=$client->user_ID;?>">Deactivate</a>
                                                                <div class="dropdown-divider"></div>
                                                         </div> 
                                                  </div>
                                            </td>
                                    
                        </tr>

                       <?php }?>
                       
                     

                        <?php endforeach;?>
                    </tbody>
                </table>

        </div>

        <div class="col-lg-12 table text-center">
       
             <h1 class="text-center mb-2 ">Consignee Accounts DELETED</h1>
                <table class="table table-bordered table-hover" id="example2">
                    <thead class="table-danger">
                        <tr>
                            
                            <th>Name</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Transactions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach ($clients as $client) : ?>  
                        <?php if($client->active_status == "inactive") {?>
                           
                             <tr>
                            
                            <td><?= ucfirst($client->first_name).' '.ucfirst($client->last_name);?></td>
                            <td><?=$client->company_name;?></td>
                            <td><?= $client->register_status;?></td>
                            <td><a href="#" class="btn btn-info">View</a></td>
                            <td> <!-- Default dropleft button -->
                                    <div class="btn-group dropdown">
                                         <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-gear"></i> Options
                                                 </button>
                                                       <div class="dropdown-menu option_dropdown" >
                                                                <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" id="accept" href="<?= base_url('accept_registration');?>/<?=$client->user_ID;?>">Accept</a>
                                                                    <a onclick="return confirm('Are you sure you want to decline this account?')" class="dropdown-item" id="accept" href="<?= base_url('decline');?>/<?=$client->user_ID;?>">Decline</a>
                                                                    <a class="dropdown-item" id="accept" href="<?= base_url('editAccount');?>/<?=$client->user_ID;?>">Update</a>
                                                                    <a onclick="return confirm('Are you sure you want to Activate this account Again?')" class="dropdown-item" id="accept" href="<?= base_url('activate_account');?>/<?=$client->user_ID;?>">Activate</a>
                                                                <div class="dropdown-divider"></div>
                                                         </div> 
                                                  </div>
                                            </td>
                                    
                        </tr>

                       <?php }?>
                       
                     

                        <?php endforeach;?>
                    </tbody>
                </table>

        </div>
    
</div>
