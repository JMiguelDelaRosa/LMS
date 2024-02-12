<div class="content-wrapper">
   <div class="container">
      <div class="row pad-botm">
         <div class="col-md-12">
            <h4 class="header-line">Manage Reg Students</h4>
         </div>
      </div>
      <?= $this->session->flashdata('message') ?>
      <div class="row">
         <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Reg Students
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Student ID</th>
                              <th>Student Name</th>
                              <th>Email id </th>
                              <th>Mobile Number</th>
                              <th>Reg Date</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($studentInfo as $info) : ?>          
                           <tr class="odd gradeX">
                              <td class="center"><?= $info['id'] ?></td>
                              <td class="center"><?= $info['StudentId'] ?></td>
                              <td class="center"><?= $info['FullName'] ?></td>
                              <td class="center"><?= $info['EmailId'] ?></td>
                              <td class="center"><?= $info['MobileNumber'] ?></td>
                              <td class="center"><?= $info['RegDate'] ?></td>
                              <td class="center">
                                 <?php
                                 if($info['Status'] == 1)
                                 {
                                    echo 'Active';
                                 } else {
                                    echo 'Blocked';
                                 }
                                 ?>
                              </td>
                              <td class="center">
                                 <?php if($info['Status'] == 0){?>
                                 <a href="<?= base_url('Student_controller/activateStudent?id=' . $info['id']) ?>" onclick="return confirm('Are you sure you want to active this student?');""><button class="btn btn-primary"> Active</button> 
                                 <?php } else { ?>
                                 <a href="<?= base_url('Student_controller/deActivateStudent?id=' . $info['id']) ?>" onclick="return confirm('Are you sure you want to block this student?');"" >  <button class="btn btn-danger"> Inactive</button>
                                 <?php } ?>
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