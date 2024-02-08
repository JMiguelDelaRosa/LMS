<div class="content-wrap">
    <div class="content-wrapper">
    <div class="container">
    <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">Add Author</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
            <div class="panel panel-info">
                <div class="panel-heading">
                Author Info
                </div>
                <div class="panel-body">
                <form role="form" method="post">
                    <div class="form-group">
                        <?php foreach ($author_info as $info) : ?>
                        <label>Author Name</label>
                        <input class="form-control" type="text" name="author" value="<?= $info['AuthorName'] ?>" required />
                        <?php endforeach ?>
                    </div>
                    <button type="submit" name="update" class="btn btn-info">Update </button>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>