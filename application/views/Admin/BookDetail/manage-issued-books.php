<div class="content-wrapper">
         <div class="container">
            <div class="row pad-botm">
               <div class="col-md-12">
                  <h4 class="header-line">Manage Issued Books</h4>
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
                        Issued Books 
                     </div>
                     <div class="panel-body">
                        <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Book Name</th>
                                    <th>ISBN </th>
                                    <th>Issued Date</th>
                                    <th>Return Date</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php foreach($issuedBooks as $book) : ?>
                                 <tr class="odd gradeX">
                                    <td class="center"><?php echo $book['id'] ?></td>
                                    <td class="center"><?php echo $book['FullName'] ?></td>
                                    <td class="center"><?php echo $book['BookName'] ?></td>
                                    <td class="center"><?php echo $book['ISBNNumber'] ?></td>
                                    <td class="center"><?php echo $book['IssuesDate'] ?></td>
                                    <td class="center"><?php echo $book['ReturnDate'] ?></td>
                                    <!-- <td class="center"></td> -->
                                    <td class="center">
                                       <a href="<?= base_url('BookDetails_controller/edit_issued_book?id=' . $book['id']) ?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
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