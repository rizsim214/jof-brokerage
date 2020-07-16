<div class="col-md-4"></div>
    <div class="col-md-4 mx-auto my-5 p-4 " id="login-box">
       <h1 class="text-center">Login Account</h1> 
       <?php echo form_open('signIn');?>
            <div class="form-group">
                <label for="email">E-mail Account*</label>
                <input type="email" class="form-control" id="accountEmail" name="email" placeholder="Email Account" required> 
                <div class="invalid-feedback"><?php echo form_error('email');?></div>
            </div>
            <div class="form-group">
                <label for="password">Password*</label>
                <input type="password" class="form-control" id="accountPass" name="password" placeholder="Password" required> 
                <div class="invalid-feedback"><?php echo form_error('password');?></div>
            </div>
             <div class="checkbox">
                <label><input type="checkbox" value="" unchecked> Remember me</label>
            </div>
         <div class="mx-auto my-2 text-center ">
           <button class="btn btn-md btn-outline-success" type="submit" role="button" name="login">Login</button>
         </div>
       <?php echo form_close();?>

       <p id="home-tag">Dont have an account yet? <a href="#">Request for an Appointment</a></p>
    </div>
<div class="col-md-4"></div>

