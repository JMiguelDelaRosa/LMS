<div class="content-wrapper">
   <div class="container">
      <div class="row pad-botm">
         <div class="col-md-12">
            <h4 class="header-line">Manage Categories</h4>
         </div>
         <div class="row">
            
            <div class="col-md-6">
               <div class="alert" >
                  <?= $this->session->flashdata('message'); ?>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Categories Listing
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Category</th>
                              <th>Status</th>
                              <th>Creation Date</th>
                              <th>Updation Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($category as $cat) : ?>
                           <tr class="odd gradeX">
                              <td class="center"><?php echo $cat['id'] ?></td>
                              <td class="center"><?php echo $cat['CategoryName'] ?></td>
                              <td class="center">
                                 <?php if($cat['Status'] == 1){ ?>
                                 <a href="#" class="btn btn-success btn-xs">Active</a>
                                 <?php } else {?>
                                 <a href="#" class="btn btn-danger btn-xs">Inactive</a>
                                 <?php } ?>
                              </td>
                              <td class="center"><?php echo $cat['CreationDate'] ?></td>
                              <td class="center"><?php echo $cat['UpdationDate'] ?></td>
                              <td class="center">
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
            <!--End Advanced Tables -->
         </div>
      </div>
   </div>
</div>