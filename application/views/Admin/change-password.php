
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">User Change Password</h4>
            </div>
        </div>
                   
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                    Change Password
                    </div>
                    <div class="panel-body">
                    
                    
                    <?= $this->session->flashdata('message') ?>
                    <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
                    <?php echo form_open('admin/change_password'); ?>
                        <div class="form-group">
                            <label>Current Password</label>
                            <input class="form-control" type="password" name="current_password" autocomplete="off" required  />
                        </div>
                        <div class="form-group">
                            <label>Enter New Password</label>
                            <input class="form-control" type="password" name="new_password" autocomplete="off" required  />
                        </div>
                        <div class="form-group">
                            <label>Confirm Password </label>
                            <input class="form-control"  type="password" name="confirm_password" autocomplete="off" required  />
                        </div>
                        <button type="submit" value="Change Password" class="btn btn-info">Change </button> 
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>