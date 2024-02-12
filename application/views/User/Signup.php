<div class="content-wrapper">
   <div class="container">
      <div class="row pad-botm">
         <div class="col-md-12">
            <h4 class="header-line">User Signup</h4>
         </div>
      </div>
      <?= $this->session->flashdata('message') ?>
      <div class="row">
         <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-danger">
               <div class="panel-heading">
                  SINGUP FORM
               </div>
               <div class="panel-body">
                  <form name="signup" method="post">
                     <div class="form-group">
                        <label>Enter Full Name</label>
                        <input class="form-control" type="text" name="fullname" id="fullname" autocomplete="off" required />
                     </div>
                     <div class="form-group">
                        <label>Mobile Number :</label>
                        <input class="form-control" type="text" name="mobileno" id="username" maxlength="10" autocomplete="off" required />
                     </div>
                     <div class="form-group">
                        <label>Enter Email</label>
                        <input class="form-control" type="email" name="email" id="email" onBlur="checkAvailability()"  autocomplete="off" required  />
                        <span id="user-availability-status" style="font-size:12px;"></span> 
                     </div>
                     <div class="form-group">
                        <label>Enter Password</label>
                        <input class="form-control" type="password" name="password" id="password" autocomplete="off" required  />
                     </div>
                     <div class="form-group">
                        <label>Confirm Password </label>
                        <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
                     </div>
                     <div class="form-group">
                        <label>Verification code : </label>
                        <input type="text" name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />
                        <img src="<?= base_url('User_controller/captcha'); ?>" alt="Captcha Image">
                     </div>
                     <button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>