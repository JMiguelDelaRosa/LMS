<body class="boxed-fancy">
    <div class="boxed-inner">
      <!-- loader Start -->
      <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body">
            </div>
        </div>      
      </div>
      <!-- loader END -->
      <span class="screen-darken"></span>
        <main class="main-content">
            <?php $this->load->view('Templates/navbar') ?>
            <div class="container-fluid content-inner pb-0">
                <div class="d-flex justify-content-center ">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between flex-wrap">
                                <div class="header-title">
                                    <h4 class="card-title mb-2">Books List</h4>
                                    <p class="mb-0">
                                        This section is the list of Books Registered in the Library 
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Table Start -->
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th style="text-align: center;">Book Name</th>
                                                    <th style="text-align: center;">Category</th>
                                                    <th style="text-align: center;">Author</th>
                                                    <th style="text-align: center;">ISBN</th>
                                                    <th style="text-align: center;">Price</th>
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($book as $books) : ?>                 
                                                    <tr class="odd gradeX">
                                                    <td class="center"><?= $books['id'] ?></td>
                                                    <td class="center"><?= $books['bookName'] ?></td>
                                                    <td class="center"><?= $books['categoryName'] ?></td>
                                                    <td class="center"><?= $books['authorName'] ?></td>
                                                    <td class="center"><?= $books['isbnNumber'] ?></td>
                                                    <td class="center"><?= $books['bookPrice'] ?></td>
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
                                <!-- Table End -->
                            </div>
                            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                            <script src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>
                            <script>
                            new DataTable('#dataTable');
                            </script>
                        </div>
                    </div>
                </div>
            </div>
       </main>
      <!-- Wrapper End-->
    </div>
</body>