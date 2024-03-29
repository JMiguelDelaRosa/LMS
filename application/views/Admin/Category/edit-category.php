<div class="content-wrap">
         <div class="content-wrapper">
      <div class="container">
         <div class="row pad-botm">
            <div class="col-md-12">
               <h4 class="header-line">Edit category</h4>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     Category Info
                  </div>
                  <div class="panel-body">
                     <?php foreach($category_info as $info) : ?>
                     <form role="form" method="post">
                        <div class="form-group">
                           <label>Category Name</label>
                           <input class="form-control" type="text" name="category" value="<?= $info['CategoryName'] ?>" required />
                        </div>
                        <div class="form-group">
                           <label>Status</label>
                           <?php 
                           if($info['Status'] == 1)
                           {  ?>
                           <div class="radio">
                              <label>
                              <input type="radio" name="status" id="status" value="1" checked="checked">Active
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                              <input type="radio" name="status" id="status" value="0">Inactive
                              </label>
                           </div>
                           <?php }else{ ?>
                           <div class="radio">
                              <label>
                              <input type="radio" name="status" id="status" value="0" checked="checked">Inactive
                              </label>
                           </div>
                           <div class="radio">
                              <label>
                              <input type="radio" name="status" id="status" value="1">Active
                              </label>
                              </div
                           </div>
                           <?php } ?>
                           <button type="submit" name="submit" class="btn btn-info">Update</button>
                     </form>
                     <?php endforeach ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>