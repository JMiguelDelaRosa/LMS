<div class="content-wrap">
         <div class="content-wrapper">
         <div class="container">
            <div class="row pad-botm">
               <div class="col-md-12">
                  <h4 class="header-line">Edit Book</h4>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                  <div class="panel panel-info">
                     <div class="panel-heading">
                        Book Info
                     </div>
                     <div class="panel-body">
                        <form role="form" method="post">
                           <div class="form-group">

                           </div>
                           <div class="form-group">
                              <label>Book Name<span style="color:red;">*</span></label>
                              <input class="form-control" type="text" name="bookname" value="<?php echo $info['BookName'] ?>" required />
                           </div>
                           <div class="form-group">
                              <label> Category<span style="color:red;">*</span></label>
                              <select class="form-control" name="category" required="required">
                                 <!-- <option value=""></option> -->
                                 <?php foreach($category as $cat) : ?>
                                 <option value="<?= $cat['id'] ?>"><?= $cat['CategoryName'] ?></option>
                                 <?php endforeach ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label> Author<span style="color:red;">*</span></label>
                              <select class="form-control" name="author" required="required">
                                 <!-- <option value=""></option> -->
                                 <?php foreach($author as $authorName) : ?>
                                 <option value="<?= $authorName['id'] ?>"><?= $authorName['AuthorName'] ?></option>
                                 <?php endforeach ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label>ISBN Number<span style="color:red;">*</span></label>
                              <input class="form-control" type="text" name="isbn" value="<?php echo $info['ISBNNumber'] ?>"  required="required" />
                              <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
                           </div>
                           <div class="form-group">
                              <label>Price in USD<span style="color:red;">*</span></label>
                              <input class="form-control" type="text" name="price" value="<?php echo $info['BookPrice'] ?>"   required="required" />
                           </div>
                           
                           <button type="submit" name="update" class="btn btn-info">Update </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>