<div class="content-wrapper">
   <div class="container">
      <div class="row pad-botm">
         <div class="col-md-12">
            <h4 class="header-line">USER LOGIN FORM</h4>
         </div>
      </div>
      <?= $this->session->flashdata('message') ?>
      <!--LOGIN PANEL START-->           
      <div class="row">
         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
            <div class="panel panel-info">
               <div class="panel-heading">
                  LOGIN FORM
               </div>
               <div class="panel-body">
                  <form role="form" method="post">
                     <div class="form-group">
                        <label>Enter Email id</label>
                        <input class="form-control" type="text" name="emailid" required autocomplete="off" />
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" required autocomplete="off"  />
                        <p class="help-block"><a href="<?= base_url('User_controller/forgotPass') ?>">Forgot Password</a></p>
                     </div>
                     <div class="form-group">
                        <label>Verification code : </label>
                        <input type="text" name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />
                        <img src="<?= base_url('User_controller/captcha'); ?>" alt="Captcha Image">
                     </div>
                     <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="<?= base_url('User_controller/signUp') ?>">Not Register Yet</a>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!---LOGIN PABNEL END-->            
   </div>
</div>