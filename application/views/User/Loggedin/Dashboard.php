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
          <?php $this->load->view('Templates/userNavbar'); ?>
          <div class="conatiner-fluid content-inner pb-0">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                  <div class="row row-cols-1">
                      <div class="d-slider1 overflow-hidden ">
                        <ul  class="swiper-wrapper list-inline m-0 p-0 mb-2">
                            <li class="swiper-slide card card-slide">
                              <div class="card-body">
                                  <div class="progress-widget">
                                    <div id="circle-progress-01" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                                        <svg class="card-slie-arrow icon-24" width="24"  viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                        </svg>
                                    </div>
                                    <div class="progress-detail">
                                        <p  class="mb-2">Issued Book</p>
                                        <h4 class="counter"><?= $countedBook ?></h4>
                                    </div>
                                  </div>
                              </div>
                            </li>
                            <li class="swiper-slide card card-slide">
                              <div class="card-body">
                                  <div class="progress-widget">
                                    <div id="circle-progress-02" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                                        <svg class="card-slie-arrow icon-24" width="24"  viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                        </svg>
                                    </div>
                                    <div class="progress-detail">
                                        <p  class="mb-2">Unreturned Book</p>
                                        <h4 class="counter">
                                            <?php if($unreturnedBook == 0){
                                                echo '0';
                                            } 
                                            else
                                            {
                                                echo $unreturnedBook;
                                            }
                                            ?>
                                        </h4>
                                    </div>
                                  </div>
                              </div>
                            </li>
                        </ul>
                        <div class="swiper-button swiper-button-next"></div>
                        <div class="swiper-button swiper-button-prev"></div>
                      </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-12">
                  <div class="card overflow-hidden">
                      <div class="card-header d-flex justify-content-between flex-wrap">
                        <div class="header-title">
                            <h4 class="card-title mb-2">Library Management System</h4>
                            <p class="mb-0">
                              <svg class ="me-2 icon-24" width="24"  viewBox="0 0 24 24">
                                  <path fill="#3a57e8" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                              </svg>
                              15 new acquired this month
                            </p>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive mt-4">
                            <table id="basic-table" class="table table-striped mb-0" role="grid">
                              <thead>
                                  <tr>
                                    <th>COMPANIES</th>
                                    <th>CONTACTS</th>
                                    <th>ORDER</th>
                                    <th>COMPLETION</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                          <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="<?php echo base_url('assets/assets/images/shapes/01.png') ?>" alt="profile">
                                          <h6>Addidis Sportwear</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="iq-media-group iq-media-group-1">
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                          </a>
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                          </a>
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                          </a>
                                        </div>
                                    </td>
                                    <td>$14,000</td>
                                    <td>
                                        <div class="d-flex align-items-center mb-2">
                                          <h6>60%</h6>
                                        </div>
                                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 4px">
                                          <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                          <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="<?php echo base_url('assets/assets/images/shapes/05.png') ?>" alt="profile">
                                          <h6>Netflixer Platforms</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="iq-media-group iq-media-group-1">
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                          </a>
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                          </a>
                                        </div>
                                    </td>
                                    <td>$30,000</td>
                                    <td>
                                        <div class="d-flex align-items-center mb-2">
                                          <h6>25%</h6>
                                        </div>
                                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 4px">
                                          <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                          <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="<?php echo base_url('assets/assets/images/shapes/02.png') ?>" alt="profile">
                                          <h6>Shopifi Stores</h6>
                                        </div>
                                    </td>
                                    <td>                                 
                                        <div class="iq-media-group iq-media-group-1">
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                          </a>
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">TP</div>
                                          </a>
                                        </div>
                                    </td>
                                    <td>$8,500</td>
                                    <td>
                                        <div class="d-flex align-items-center mb-2">
                                          <h6>100%</h6>
                                        </div>
                                        <div class="progress bg-soft-success shadow-none w-100" style="height: 4px">
                                          <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                          <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="<?php echo base_url('assets/assets/images/shapes/03.png') ?>" alt="profile">
                                          <h6>Bootstrap Technologies</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="iq-media-group iq-media-group-1">
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                          </a>
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                          </a>
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                          </a>
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">TP</div>
                                          </a>
                                        </div>
                                    </td>
                                    <td>$20,500</td>
                                    <td>
                                        <div class="d-flex align-items-center mb-2">
                                          <h6>100%</h6>
                                        </div>
                                        <div class="progress bg-soft-success shadow-none w-100" style="height: 4px">
                                          <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                          <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="<?php echo base_url('assets/assets/images/shapes/04.png') ?>" alt="profile">
                                          <h6>Community First</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="iq-media-group iq-media-group-1">
                                          <a href="#" class="iq-media-1">
                                              <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                          </a>
                                        </div>
                                    </td>
                                    <td>$9,800</td>
                                    <td>
                                        <div class="d-flex align-items-center mb-2">
                                          <h6>75%</h6>
                                        </div>
                                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 4px">
                                          <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                  </tr>
                              </tbody>
                            </table>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
          
        </main>
      <!-- Wrapper End-->
    </div>
</body>