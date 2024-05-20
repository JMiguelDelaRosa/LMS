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
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between flex-wrap">
                                <div class="header-title">
                                    <h4 class="card-title mb-2">Issue Book</h4>
                                    <p class="mb-0">
                                        This section is for the Issuance of Book to Students
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Student ID<span style="color:red;">*</span></label>
                                    <input class="form-control" type="text" name="studentid" id="studentid" onBlur="getstudent()" autocomplete="off"  required />
                                </div>
                                <div class="form-group">
                                    <span id="get_student_name" style="font-size:16px;"></span> 
                                </div>
                                <div class="form-group">
                                    <label>Accession Number<span style="color:red;">*</span></label>
                                    <input class="form-control" type="text" name="accession" id="accession" onBlur="getaccession()" required="required" />
                                </div>
                                <div class="form-group">
                                    <span id="get_book_accession" style="font-size:16px;"></span> 
                                </div>
                                <div class="form-group">
                                    <label>Day/s of Issuance<span style="color:red;">*</span></label>
                                    <input class="form-control" type="text" name="issued" id="issued" onBlur="getstudent()" autocomplete="off" style="width:150px"  required />
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
       </main>
      <!-- Wrapper End-->
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
    
    function getaccession() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?= base_url('BookDetails_controller/checkAccession') ?>",
            data: 'accession=' + $("#accession").val(),
            type: "POST",
            success: function(data) {
                $("#get_book_accession").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {
                $("#loaderIcon").hide();
            }
        });
    }
    
    </script> 
</body>