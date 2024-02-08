<div class="content-wrap">
    <div class="content-wrapper">
        <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Author</h4>
            </div>
        </div>
        <?= $this->session->flashdata('message') ?>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                <div class="panel panel-info">
                    <div class="panel-heading">
                    Author Info
                    </div>
                    <div class="panel-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Author Name</label>
                            <input class="form-control" type="text" name="author" autocomplete="off"  required />
                        </div>
                        <button type="submit" name="create" class="btn btn-info">Add </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>