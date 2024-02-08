<div class="content-wrapper">
   <div class="container">
      <div class="row pad-botm">
         <div class="col-md-12">
            <h4 class="header-line">Manage Authors</h4>
         </div>
         <div class="row">
            <div class="col-md-6">
               <?= $this->session->flashdata('message')?>      
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Authors Listing
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Author</th>
                              <th>Creation Date</th>
                              <th>Updation Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($author_info as $info) : ?>
                           <tr class="odd gradeX">
                              <td class="center"><?= $info['id'] ?></td>
                              <td class="center"><?= $info['AuthorName'] ?></td>
                              <td class="center"><?= $info['creationDate'] ?></td>
                              <td class="center"><?= $info['UpdationDate'] ?></td>
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
            <!--End Advanced Tables -->
         </div>
      </div>
   </div>
</div>