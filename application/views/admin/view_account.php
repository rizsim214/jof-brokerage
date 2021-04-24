<div class="container col-md-10 mx-auto">
    <div class="container mt-5">
    <?php foreach($view_account as $account): ?>
    
        <div class="row">
             <h2 class="text-dark"> Account update for: <h2 class="ml-1"><?= ucfirst($account->first_name)?> <?= ucfirst($account->last_name) ?></h2></h2>
             
             
        </div>
        <hr>
        <p> This Account was created on: <?= $account->date_registered; ?>  </p>
        
        <!-- <?= $dateStart; ?>  -->

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" name="firstName" value="<?=  $account->first_name?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control"  name="lastName" value="<?=  $account->last_name?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="firstName">Company Name</label>
                    <input type="text" class="form-control" name="firstName" value="<?=  $account->company_name?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Company Location</label>
                    <input type="text" class="form-control"  name="lastName" value="<?=  $account->company_location?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="firstName">Email Address</label>
                    <input type="text" class="form-control" name="firstName" value="<?=  $account->email_add?>" disabled>
                </div>
               <div class="form-group col-md-6">
                    <label for="firstName">Contact Information</label>
                    <input type="text" class="form-control" name="firstName" value="<?=  $account->contact_info?>" disabled>
                </div>
            </div>
            
            <div class="form-group " class="text-center">
                    <label for="firstName" >Company Position</label>
                    <input type="text" class="form-control" name="firstName" value="<?php 
                        if($account->user_role == '4'){
                                echo "Admin";
                        }elseif($account->user_role == '2'){
                                echo "Processor";
                        }elseif($account->user_role == '3'){
                                echo "Accounting";
                        } ?>" disabled>
                </div>
    </div>
    <?php endforeach;?>
    <div class="text-center">
         <a href="<?php echo base_url('user_accounts');?>" class="btn btn-secondary" style="font-size:18px;"><i class="fas fa-door-open"></i> Home</a>
    </div>
</div>