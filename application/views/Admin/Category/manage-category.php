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
                    <div class="col-md-9 col-lg-9">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between flex-wrap">
                                <div class="header-title">
                                    <h4 class="card-title mb-2">Categories</h4>
                                    <p class="mb-0">
                                        This section is the Categories of the books in the Library
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Table Start -->
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="datatable">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category</th>
                                                    <th style="text-align: center;">Status</th>
                                                    <th style="text-align: center;">Creation Date</th>
                                                    <th style="text-align: center;">Updation Date</th>
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $counter = 1;
                                                    foreach($category as $cat) : ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo $counter++ ?></td>
                                                        <td class="center"><?php echo $cat['categoryName'] ?></td>
                                                        <td class="center" style="text-align: center;">
                                                            <?php if($cat['status'] == 1){ ?>
                                                            <a href="#" class="btn btn-success btn-xs">Active</a>
                                                            <?php } else {?>
                                                            <a href="#" class="btn btn-danger btn-xs">Inactive</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="center" style="text-align: center;"><?php echo $cat['creationDate'] ?></td>
                                                        <td class="center" style="text-align: center;"><?php echo $cat['updationDate'] ?></td>
                                                        <td class="center" style="text-align: center;">
                                                        <a href="<?= base_url('Category_controller/edit_category?id=' . $cat['id']) ?>">
                                                            <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                                                        </a>
                                                        <a href="<?= base_url('Category_controller/delete_category?id=' . $cat['id']) ?>" onclick="return confirm('Are you sure you want to delete?');">
                                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                                        </a></td>
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
                            new DataTable('#datatable');
                            </script>
                        </div>
                    </div>
                </div>
            </div>
       </main>
      <!-- Wrapper End-->
    </div>
</body>