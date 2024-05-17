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
            <?php $this->load->view('Templates/userNavbar') ?>
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
                                                    <th>Book Name</th>
                                                    <th>ISBN </th>
                                                    <th>Issued Date</th>
                                                    <th>Return Date</th>
                                                    <th>Fine in(USD)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $count = 0;
                                                foreach($issuedBook as $book) : 
                                                $count++ ?>
                                                <tr class="odd gradeX">
                                                    <td class="center"><?= $count ?></td>
                                                    <td class="center"><?= $book['bookName'] ?></td>
                                                    <td class="center"><?= $book['accessionNumber'] ?></td>
                                                    <td class="center"><?= $book['issuesDate'] ?></td>
                                                    <td class="center">
                                                    <?php if($book['returnDate'] == NULL){ ?>
                                                        <span style="color:red">
                                                        <?= 'Not Returned Yet' ?>
                                                        </span>
                                                    <?php } else {
                                                        echo $book['returnDate'];
                                                    } ?>
                                                    </td>
                                                    <td class="center"><?= $book['fine'] ?></td>
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