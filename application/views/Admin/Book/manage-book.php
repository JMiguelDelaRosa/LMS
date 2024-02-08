<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Books</h4>
            </div>
            <div class="row">
                <div class="col-md-6">
                <?= $this->session->flashdata('message') ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Books Listing
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Book Name</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Price</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($book as $books) : ?>                 
                                <tr class="odd gradeX">
                                <td class="center"><?= $books['id'] ?></td>
                                <td class="center"><?= $books['BookName'] ?></td>
                                <td class="center"><?= $books['CategoryName'] ?></td>
                                <td class="center"><?= $books['AuthorName'] ?></td>
                                <td class="center"><?= $books['ISBNNumber'] ?></td>
                                <td class="center"><?= $books['BookPrice'] ?></td>
                                <td class="center">
                                    <a href="<?= base_url('Book_controller/edit_book?id=' . $books['id']) ?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                    <a href="<?= base_url('Book_controller/delete_book?id=' . $books['id']) ?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
</div>