<div class="content-wrapper">
    <div class="container">
    <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">User Password Recovery</h4>
        </div>
    </div>
    <!--LOGIN PANEL START-->           
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
            <div class="panel panel-info">
                <div class="panel-heading">
                LOGIN FORM
                </div>
                <div class="panel-body">
                <?= $this->session->flashdata('message') ?>
                <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
                <?php echo form_open('User_controller/forgotPass'); ?>
                    <div class="form-group">
                        <label>Enter Reg Email id</label>
                        <input class="form-control" type="email" name="email" required autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label>Enter Reg Mobile No</label>
                        <input class="form-control" type="text" name="mobile" required autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="newpassword" required autocomplete="off"  />
                    </div>
                    <div class="form-group">
                        <label>ConfirmPassword</label>
                        <input class="form-control" type="password" name="confirmpassword" required autocomplete="off"  />
                    </div>
                    <div class="form-group">
                        <label>Verification code : </label>
                        <input type="text" name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />
                        <img src="<?= base_url('User_controller/captcha'); ?>" alt="Captcha Image">
                    </div>
                    <button type="submit" name="change" class="btn btn-info">Change Password</button> | <a href="<?= base_url('User_controller/index') ?>">Login</a>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!---LOGIN PABNEL END-->            
    </div>
</div>