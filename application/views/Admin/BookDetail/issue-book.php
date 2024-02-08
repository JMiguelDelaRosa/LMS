<div class="content-wrap">
    <div class="content-wrapper">
        <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issue a New Book</h4>
            </div>
        </div>
        <?= $this->session->flashdata('message') ?>
        <div class="row">
            <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
                <div class="panel panel-info">
                    <div class="panel-heading">
                    Issue a New Book
                    </div>
                    <div class="panel-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Student id<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="studentid" id="studentid" onBlur="getstudent()" autocomplete="off"  required />
                        </div>
                        <div class="form-group">
                            <span id="get_student_name" style="font-size:16px;"></span> 
                        </div>
                        <div class="form-group">
                            <label>ISBN Number or Book Title<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="bookid" id="bookid" onBlur="getbook()"  required="required" />
                        </div>
                        <!-- <div class="form-group">
                            <select  class="form-control" name="bookdetails" id="get_book_name" readonly>
                            </select>
                        </div> -->
                        <button type="submit" name="issue" id="submit" class="btn btn-info">Issue Book </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // function for get student name
    function getstudent() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "<?= base_url('BookDetails_controller/checkStudent') ?>",
    data:'studentid='+$("#studentid").val(),
    type: "POST",
    success:function(data){
    $("#get_student_name").html(data);
    $("#loaderIcon").hide();
    },
    error:function (){}
    });
    }
    
</script> 