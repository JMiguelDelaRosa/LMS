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
                                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th style="text-align: center;">Author</th>
                                                    <th style="text-align: center;">Creation Date</th>
                                                    <th style="text-align: center;">Updation Date</th>
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                   <?php foreach($author_info as $info) : ?>
                                                   <tr class="odd gradeX">
                                                      <td class="center"><?= $info['id'] ?></td>
                                                      <td class="center"><?= $info['authorName'] ?></td>
                                                      <td class="center"><?= $info['creationDate'] ?></td>
                                                      <td class="center"><?= $info['updationDate'] ?></td>
                                                      <td class="center">
                                                         <a href="<?= base_url('Author_controller/edit_author?id=' . $info['id']) ?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                                         <a href="<?= base_url('Author_controller/delete_author?id=' . $info['id']) ?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
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