<div class="content-wrap">
    <div class="content-wrapper">
    <div class="container">
    <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">Issued Book Details</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
            <div class="panel panel-info">
                <div class="panel-heading">
                Issued Book Details
                </div>
                <div class="panel-body">
                <form role="form" method="post">
                    <div class="form-group">
                        <label>Student Name :</label>
                        <?= $info['FullName'] ?>
                    </div>
                    <div class="form-group">
                        <label>Book Name :</label>
                        <?= $info['BookName'] ?>
                    </div>
                    <div class="form-group">
                        <label>ISBN :</label>
                        <?= $info['ISBNNumber'] ?>
                    </div>
                    <div class="form-group">
                        <label>Book Issued Date :</label>
                        <?= $info['IssuesDate'] ?>
                    </div>
                    <div class="form-group">
                        <label>Book Returned Date :</label>
                        <?= $info['ReturnDate'] ?>
                    </div>
                    <div class="form-group">
                        <label>Fine (in USD) :</label>
                        <input class="form-control" type="text" name="fine" id="fine"  required />
                    </div>
                    <button type="submit" name="return" id="submit" class="btn btn-info">Return Book </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>