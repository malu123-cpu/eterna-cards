<!--  Header End -->
      <?php include 'Header.php';
?>
<div class="body-wrapper-inner" style="margin-top:0; padding-top=0;">
        <div class="container-fluid pt-10">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-8">
              <div class="card w-100">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Sales Overview</h4>
                      <p class="card-subtitle">
                        Ample admin Vs Pixel admin
                      </p>
                    </div>
                    <div class="ms-auto">
                      <ul class="list-unstyled mb-0">
                        <li class="list-inline-item text-primary">
                          <span class="round-8 text-bg-primary rounded-circle me-1 d-inline-block"></span>
                          Ample
                        </li>
                        <li class="list-inline-item text-info">
                          <span class="round-8 text-bg-info rounded-circle me-1 d-inline-block"></span>
                          Pixel Admin
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div id="sales-overview" class="mt-4 mx-n6"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card overflow-hidden">
                <div class="card-body pb-0">
                  <div class="d-flex align-items-start">
                    <div>
                      <h4 class="card-title">Weekly Stats</h4>
                      <p class="card-subtitle">Average sales</p>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a href="javascript:void(0)" class="text-muted" id="year1-dropdown" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots fs-7"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="year1-dropdown">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 pb-3 d-flex align-items-center">
                    <span class="btn btn-primary rounded-circle round-48 hstack justify-content-center">
                      <i class="ti ti-shopping-cart fs-6"></i>
                    </span>
                    <div class="ms-3">
                      <h5 class="mb-0 fw-bolder fs-4">Top Sales</h5>
                      <span class="text-muted fs-3">Johnathan Doe</span>
                    </div>
                    <div class="ms-auto">
                      <span class="badge bg-secondary-subtle text-muted">+68%</span>
                    </div>
                  </div>
                  <div class="py-3 d-flex align-items-center">
                    <span class="btn btn-warning rounded-circle round-48 hstack justify-content-center">
                      <i class="ti ti-star fs-6"></i>
                    </span>
                    <div class="ms-3">
                      <h5 class="mb-0 fw-bolder fs-4">Best Seller</h5>
                      <span class="text-muted fs-3">MaterialPro Admin</span>
                    </div>
                    <div class="ms-auto">
                      <span class="badge bg-secondary-subtle text-muted">+68%</span>
                    </div>
                  </div>
                  <div class="py-3 d-flex align-items-center">
                    <span class="btn btn-success rounded-circle round-48 hstack justify-content-center">
                      <i class="ti ti-message-dots fs-6"></i>
                    </span>
                    <div class="ms-3">
                      <h5 class="mb-0 fw-bolder fs-4">Most Commented</h5>
                      <span class="text-muted fs-3">Ample Admin</span>
                    </div>
                    <div class="ms-auto">
                      <span class="badge bg-secondary-subtle text-muted">+68%</span>
                    </div>
                  </div>
                  <div class="pt-3 mb-7 d-flex align-items-center">
                    <span class="btn btn-secondary rounded-circle round-48 hstack justify-content-center">
                      <i class="ti ti-diamond fs-6"></i>
</span>
                   <!-- <div class="ms-3">
                      <h5 class="mb-0 fw-bolder fs-4">Next Delivery</h5>
                      <span class="text-muted fs-3"><?= $nextDeliveryDate ?></span>-->

                      <span class="text-muted fs-3">Sunil Joshi</span>
                    </div>
                    <div class="ms-auto">
                      <span class="badge bg-secondary-subtle text-muted">+15%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Recent Comments</h4>
                </div>
                <div class="comment-widgets scrollable mb-2 common-widget" style="height: 465px" data-simplebar="">
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row border-bottom p-3 gap-3">
                    <div>
                      <span><img src="assets/images/profile/user-3.jpg" class="rounded-circle" alt="user"
                          width="50" /></span>
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="fw-medium">James Anderson</h6>
                      <p class="mb-1 fs-2 text-muted">
                        Lorem Ipsum is simply dummy text of the printing and
                        type etting industry
                      </p>
                      <div class="comment-footer mt-2">
                        <div class="d-flex align-items-center">
                          <span class="
                              badge
                              bg-info-subtle
                              text-info
                              
                            ">Pending</span>
                          <span class="action-icons">
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-edit fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-check fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-heart fs-5"></i></a>
                          </span>
                        </div>
                        <span class="
                            text-muted
                            ms-auto
                            fw-normal
                            fs-2
                            d-block
                            mt-2
                            text-end
                          ">April 14, 2025</span>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row border-bottom active p-3 gap-3">
                    <div>
                      <span><img src="assets/images/profile/user-5.jpg" class="rounded-circle" alt="user"
                          width="50" /></span>
                    </div>
                    <div class="comment-text active w-100">
                      <h6 class="fw-medium">Michael Jorden</h6>
                      <p class="mb-1 fs-2 text-muted">
                        Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </p>
                      <div class="comment-footer mt-2">
                        <div class="d-flex align-items-center">
                          <span class="
                              badge
                              bg-success-subtle
                              text-success
                              
                            ">Approved</span>
                          <span class="action-icons active">
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-edit fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-circle-x fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-heart text-danger fs-5"></i></a>
                          </span>
                        </div>
                        <span class="
                            text-muted
                            ms-auto
                            fw-normal
                            fs-2
                            text-end
                            mt-2
                            d-block
                          ">April 14, 2025</span>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row border-bottom p-3 gap-3">
                    <div>
                      <span><img src="assets/images/profile/user-6.jpg" class="rounded-circle" alt="user"
                          width="50" /></span>
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="fw-medium">Johnathan Doeting</h6>
                      <p class="mb-1 fs-2 text-muted">
                        Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </p>
                      <div class="comment-footer mt-2">
                        <div class="d-flex align-items-center">
<span class="
                              badge
                              bg-danger-subtle
                              text-danger
                              
                            ">Rejected</span>
                          <span class="action-icons">
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-edit fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-check fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-heart fs-5"></i></a>
                          </span>
                        </div>
                        <span class="
                            text-muted
                            ms-auto
                            fw-normal
                            fs-2
                            d-block
                            mt-2
                            text-end
                          ">April 14, 2025</span>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row p-3 gap-3">
                    <div>
                      <span><img src="assets/images/profile/user-4.jpg" class="rounded-circle" alt="user"
                          width="50" /></span>
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="fw-medium">James Anderson</h6>
                      <p class="mb-1 fs-2 text-muted">
                        Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </p>
                      <div class="comment-footer mt-2">
                        <div class="d-flex align-items-center">
                          <span class="
                              badge
                              bg-info-subtle
                              text-info
                              
                            ">Pending</span>
                          <span class="action-icons">
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-edit fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-check fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-heart fs-5"></i></a>
                          </span>
                        </div>
                        <span class="
                            text-muted
                            ms-auto
                            fw-normal
                            fs-2
                            d-block
                            text-end
                            mt-2
                          ">April 14, 2025</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
         
        </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
<?php include 'Footer.php';
?>
