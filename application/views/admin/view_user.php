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
     
<!-- EMPLOYEE MODAL -->
     <div class=" modal fade" id="employeeModalOptions" tabindex="-1" role="dialog" aria-labelledby="employeeModalOptionsLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

                 <h4 class="modal-title mx-auto" id="addAccountModalLAbel">Employee</h4>   
            </div>
                  <small class="mx-auto mb-3">Company Name & Location are Optional for Employees ONLY</small>
              <hr>
             <div class="modal-body">
                 <div class="container">
                      <h1>OPTIONS</h1>
                 </div> 
             </div>
                    <div class="modal-footer mx-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
             </div>
          </div>
      </div>
    </div> 
<!-- CONSIGNEE MODAL -->
     <div class=" modal fade" id="consigneeModalOptions" tabindex="-1" role="dialog" aria-labelledby="consigneeModalOptionsLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

                 <h4 class="modal-title mx-auto" id="addAccountModalLAbel">Account Options</h4>   
            </div>
              <small class="mx-auto mb-3">Company Name & Location are Optional for Employees ONLY</small>
              <hr>
             <div class="modal-body">
                 <div class="container">
                      <h1>OPTIONS</h1>
                 </div> 
             </div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
          </div>
      </div>
    </div> 


