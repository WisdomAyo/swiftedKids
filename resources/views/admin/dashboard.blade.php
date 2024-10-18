@extends('admin.main')
@section('content')



<div class="body-wrapper">
    <div class="container-fluid">
      <!-- -------------------------------------------------------------- -->
      <!-- Breadcrumb -->
      <!-- -------------------------------------------------------------- -->
      <div class="position-relative mb-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h4>Dashboard 2</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a class="text-primary text-decoration-none" href="../main/index.html">Home
                  </a>
                </li>
                <li class="breadcrumb-item d-flex justify-content-center align-items-center ps-0">
                  <iconify-icon icon="tabler:chevron-right"></iconify-icon>
                </li>
                <li class="breadcrumb-item" aria-current="page">Dashboard 2</li>
              </ol>
            </nav>
          </div>
          <div>
            <div class="d-flex justify-content-end align-items-center">
              <div class="me-2">
                <div class="breadbar"></div>
              </div>
              <div>
                <small>LAST MONTH</small>
                <h4 class="text-primary mb-0">$58,256</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- -------------------------------------------------------------- -->
      <!-- Breadcrumb End -->
      <!-- -------------------------------------------------------------- -->

      <div class="row">
        <div class="col-lg-4">
          <!--  start Wallet Balance -->
          <div class="card card-hover w-100">
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <div>
                    <span>Wallet Balance</span>
                    <h4 class="mb-0">$3,567.53</h4>
                  </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                  <div>
                    <div id="wallet-balance" class="mt-3"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end Wallet Balance -->
        </div>
        <div class="col-lg-4">
          <!-- start Referral Earnings -->
          <div class="card card-hover w-100">
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <div>
                    <span>Referral Earnings</span>
                    <h4 class="mb-0">$769.08</h4>
                  </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                  <div id="referral-earnings" class="mt-3"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- end Referral Earnings -->
        </div>
        <div class="col-lg-4">
          <!-- start Estimated Sales -->
          <div class="card card-hover w-100">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div>
                  <span>Estimated Sales</span>
                  <h4 class="mb-0">5769</h4>
                </div>
                <div class="ms-auto">
                  <div id="estimated-sales"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- end Estimated Sales -->
        </div>
        <div class="col-12">
          <!--  start Realtime Visits -->
          <div class="card">
            <div class="card-body">
              <!-- title -->
              <div class="d-flex align-items-center">
                <div>
                  <h4 class="card-title">Realtime Visits</h4>
                  <p class="card-subtitle">Overview of Latest Month</p>
                </div>
                <div class="ms-auto">
                  <div class="dl">
                    <select class="form-select">
                      <option value="0" selected>Monthly</option>
                      <option value="1">Daily</option>
                      <option value="2">Weekly</option>
                      <option value="3">Yearly</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- title -->
              <div class="mt-4">
                <div id="real-time" class="h-250"></div>
              </div>
            </div>
            <div class="card-body border-top">
              <div class="row mt-2">
                <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                  <div class="d-flex align-items-center">
                    <div class="me-3">
                      <div data-label="20%" class="css-bar mb-0 css-bar-primary css-bar-50">
                        <iconify-icon icon="solar:magnifer-linear" class="text-info"></iconify-icon>
                      </div>
                    </div>
                    <div>
                      <h3 class="mb-0">50%</h3>
                      <span>Search Traffic</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                  <div class="d-flex align-items-center">
                    <div class="me-3">
                      <div data-label="20%" class="css-bar mb-0 css-bar-danger css-bar-30">
                        <iconify-icon icon="solar:link-linear" class="text-danger"></iconify-icon>
                      </div>
                    </div>
                    <div>
                      <h3 class="mb-0">30%</h3>
                      <span>Referal Traffic</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                  <div class="d-flex align-items-center">
                    <div class="me-3">
                      <div data-label="20%" class="css-bar mb-0 css-bar-success css-bar-10">
                        <iconify-icon icon="solar:lightbulb-outline" class="text-cyan"></iconify-icon>
                      </div>
                    </div>
                    <div>
                      <h3 class="mb-0">10%</h3>
                      <span>Social Media</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                  <div class="d-flex align-items-center">
                    <div class="me-3">
                      <div data-label="20%" class="css-bar mb-0 css-bar-purple css-bar-10">
                        <iconify-icon icon="solar:laptop-minimalistic-line-duotone" class="text-purple"></iconify-icon>
                      </div>
                    </div>
                    <div>
                      <h3 class="mb-0">10%</h3>
                      <span>Direct Media</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--  end Realtime Visits -->
        </div>
        <div class="col-lg-4 ">
          <!-- start Active Users -->
          <div class="card card-hover w-100">
            <div class="card-body">
              <h4 class="card-title">Active Users</h4>
              <div class="d-flex">
                <h2>
                  356
                  <small>
                    <iconify-icon icon="solar:arrow-up-outline" class="text-success"></iconify-icon>
                  </small>
                </h2>
                <span class="ms-auto">Users per minute</span>
              </div>
              <div class="mt-3 mb-4 d-flex justify-content-center">
                <div id="active-users"></div>
              </div>
              <h5 class="">Top Active Pages</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  /templates/matrix-admin/
                  <span class="badge badge-light rounded-pill">1</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  /panel/home.asp
                  <span class="badge bg-info rounded-pill">4</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  /demos/admin-t...e/index2.html
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  /templates/adminwrap-lite/
                  <span class="badge badge-light rounded-pill">14</span>
                </li>
              </ul>
            </div>
          </div>
          <!-- end Active Users -->
        </div>
        <div class="col-lg-4">
          <!-- start Device Visit -->
          <div class="card card-hover w-100">
            <div class="card-body">
              <h4 class="card-title">Device Visit</h4>
              <div id="device-visit" class="mt-4 d-flex justify-content-center"></div>
              <!-- row -->
              <div class="row mt-4 pt-4">
                <div class="col-4 border-right text-start">
                  <h4 class="mb-0">
                    60%<small>
                      <iconify-icon icon="solar:arrow-up-outline" class="text-success"></iconify-icon>
                    </small>
                  </h4>
                  Desktop
                </div>
                <div class="col-4 border-right text-center">
                  <h4 class="mb-0">
                    28%<small>
                      <iconify-icon icon="solar:arrow-down-outline" class="text-danger"></iconify-icon>
                    </small>
                  </h4>
                  Mobile
                </div>
                <div class="col-4 text-end">
                  <h4 class="mb-0">
                    12%<small><iconify-icon icon="solar:arrow-up-outline" class="text-success"></iconify-icon></small>
                  </h4>
                  Tablet
                </div>
              </div>
            </div>
          </div>
          <!-- end Device Visit -->
        </div>
        <div class="col-lg-4">
          <!-- start Visitors By Countries -->
          <div class="card card-hover w-100">
            <div class="card-body">
              <h4 class="card-title">Visitors By Countries</h4>
              <div id="visitfromworld" class="w-100 h-210"></div>
              <!-- row -->
              <div class="row mb-2 align-items-center ">
                <div class="col-3">India</div>
                <div class="col-7">
                  <div class="progress mt-1">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-2">28%</div>
              </div>
              <!-- row -->
              <div class="row mb-2  align-items-center ">
                <div class="col-3">UK</div>
                <div class="col-7">
                  <div class="progress mt-1">
                    <div class="progress-bar bg-cyan" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-2">21%</div>
              </div>
              <!-- row -->
              <div class="row mb-2  align-items-center ">
                <div class="col-3">USA</div>
                <div class="col-7">
                  <div class="progress mt-1">
                    <div class="progress-bar bg-purple" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-2">18%</div>
              </div>
              <!-- row -->
              <div class="row  align-items-center ">
                <div class="col-3">China</div>
                <div class="col-7">
                  <div class="progress mt-1">
                    <div class="progress-bar bg-orange" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-2">12%</div>
              </div>
            </div>
          </div>
          <!-- end Visitors By Countries -->
        </div>
        <div class="col-12">
          <!-- start Top Selling Products -->
          <div class="card">
            <div class="card-body">
              <!-- title -->
              <div class="d-md-flex align-items-center">
                <div>
                  <h4 class="card-title">Top Selling Products</h4>
                  <p class="card-subtitle">Overview of Top Selling Items</p>
                </div>
                <div class="ms-auto">
                  <div class="dl">
                    <select class="form-select">
                      <option value="0" selected>Monthly</option>
                      <option value="1">Daily</option>
                      <option value="2">Weekly</option>
                      <option value="3">Yearly</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- title -->
            </div>
            <div class="table-responsive">
              <table class="table v-middle no-wrap">
                <thead>
                  <!-- start row -->
                  <tr class="bg-light">
                    <th class="border-top-0">Products</th>
                    <th class="border-top-0">License</th>
                    <th class="border-top-0">Support Agent</th>
                    <th class="border-top-0">Technology</th>
                    <th class="border-top-0">Tickets</th>
                    <th class="border-top-0">Sales</th>
                    <th class="border-top-0">Earnings</th>
                  </tr>
                  <!-- end row -->
                </thead>
                <tbody>
                  <!-- start row -->
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="me-3">
                          <a class="btn btn-circle btn-info text-white">EA</a>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Elite Admin</h6>
                        </div>
                      </div>
                    </td>
                    <td>Single Use</td>
                    <td>John Doe</td>
                    <td>
                      <label class="badge bg-info-subtle text-info fw-medium rounded-pill">Angular</label>
                    </td>
                    <td>46</td>
                    <td>356</td>
                    <td>
                      <h6 class="mb-0">$2850.06</h6>
                    </td>
                  </tr>
                  <!-- end row -->
                  <!-- start row -->
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="me-3">
                          <a class="btn btn-circle btn-orange text-white">MA</a>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Monster Admin</h6>
                        </div>
                      </div>
                    </td>
                    <td>Single Use</td>
                    <td>Venessa Fern</td>
                    <td>
                      <label class="badge bg-warning-subtle text-warning fw-medium rounded-pill">Vue
                        Js</label>
                    </td>
                    <td>46</td>
                    <td>356</td>
                    <td>
                      <h6 class="mb-0">$2850.06</h6>
                    </td>
                  </tr>
                  <!-- end row -->
                  <!-- start row -->
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="me-3">
                          <a class="btn btn-circle btn-success text-white">MP</a>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Material Pro Admin</h6>
                        </div>
                      </div>
                    </td>
                    <td>Single Use</td>
                    <td>John Doe</td>
                    <td>
                      <label class="badge bg-success-subtle text-success fw-medium rounded-pill">Bootstrap</label>
                    </td>
                    <td>46</td>
                    <td>356</td>
                    <td>
                      <h6 class="mb-0">$2850.06</h6>
                    </td>
                  </tr>
                  <!-- end row -->
                  <!-- start row -->
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="me-3">
                          <a class="btn btn-circle btn-purple text-white">AA</a>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Ample Admin</h6>
                        </div>
                      </div>
                    </td>
                    <td>Single Use</td>
                    <td>John Doe</td>
                    <td>
                      <label class="badge bg-primary-subtle text-primary rounded-pill">React</label>
                    </td>
                    <td>46</td>
                    <td>356</td>
                    <td>
                      <h6 class="mb-0">$2850.06</h6>
                    </td>
                  </tr>
                  <!-- end row -->
                </tbody>
              </table>
            </div>
          </div>
          <!-- end Top Selling Products -->
        </div>
        <div class="col-lg-6">
          <!--  start Recent Comments -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Recent Comments</h4>
            </div>
            <div class="comment-widgets scrollable h-530" data-simplebar>
              <!-- Comment Row -->
              <div class="d-flex flex-row comment-row mt-0">
                <div class="px-2 py-0 ">
                  <img src="../assets/images/profile/user-3.jpg" alt="user" width="45" class="rounded-circle" />
                </div>
                <div class="comment-text w-100">
                  <h6 class="fw-medium mb-1">James Anderson</h6>
                  <span class="mb-2 d-block">Lorem Ipsum is simply dummy text of the printing and type setting
                    industry.
                  </span>
                  <div class="comment-footer d-md-flex align-items-center">
                    <span class="badge bg-primary rounded-pill">Pending</span>
                    <span class="action-icons d-flex">
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:gallery-edit-line-duotone" class="iconify-sm"></iconify-icon>
                      </a>
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:check-square-line-duotone" class="iconify-sm"></iconify-icon>
                      </a>
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:heart-linear" class="iconify-sm text-danger"></iconify-icon>
                      </a>
                    </span>
                    <div class="text-muted ms-auto mt-2 mt-md-0">April 14, 2024</div>
                  </div>
                </div>
              </div>
              <!-- Comment Row -->
              <div class="d-flex flex-row comment-row">
                <div class="px-2 py-0">
                  <img src="../assets/images/profile/user-5.jpg" alt="user" width="45" class="rounded-circle" />
                </div>
                <div class="comment-text active w-100">
                  <h6 class="fw-medium mb-1">Michael Jorden</h6>
                  <span class="mb-2 d-block">Lorem Ipsum is simply dummy text of the printing and type setting
                    industry.
                  </span>
                  <div class="comment-footer d-md-flex align-items-center">
                    <span class="badge bg-success rounded-pill">Approved</span>
                    <span class="action-icons d-flex">
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:gallery-edit-line-duotone" class="iconify-sm"></iconify-icon>
                      </a>
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:close-square-line-duotone" class="iconify-sm"></iconify-icon>
                      </a>
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:heart-linear" class="iconify-sm text-danger"></iconify-icon>
                      </a>
                    </span>
                    <div class="text-muted ms-auto mt-2 mt-md-0">April 14, 2024</div>
                  </div>
                </div>
              </div>
              <!-- Comment Row -->
              <div class="d-flex flex-row comment-row">
                <div class="px-2 py-0">
                  <img src="../assets/images/profile/user-6.jpg" alt="user" width="45" class="rounded-circle" />
                </div>
                <div class="comment-text w-100">
                  <h6 class="fw-medium mb-1">Johnathan Doeting</h6>
                  <span class="mb-2 d-block">Lorem Ipsum is simply dummy text of the printing and type setting
                    industry.
                  </span>
                  <div class="comment-footer d-md-flex align-items-center">
                    <span class="badge rounded-pill bg-danger">Rejected</span>
                    <span class="action-icons d-flex">
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:gallery-edit-line-duotone" class="iconify-sm"></iconify-icon>
                      </a>
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:check-square-line-duotone" class="iconify-sm"></iconify-icon>
                      </a>
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:heart-linear" class="iconify-sm text-danger"></iconify-icon>
                      </a>
                    </span>
                    <div class="text-muted ms-auto mt-2 mt-md-0">April 14, 2024</div>
                  </div>
                </div>
              </div>
              <!-- Comment Row -->
              <div class="d-flex flex-row comment-row">
                <div class="px-2 py-0">
                  <img src="../assets/images/profile/user-7.jpg" alt="user" width="45" class="rounded-circle" />
                </div>
                <div class="comment-text w-100">
                  <h6 class="fw-medium mb-1">James Anderson</h6>
                  <span class="mb-2 d-block">Lorem Ipsum is simply dummy text of the printing and type setting
                    industry.
                  </span>
                  <div class="comment-footer d-md-flex align-items-center">
                    <span class="badge rounded-pill bg-primary">Pending</span>
                    <span class="action-icons d-flex">
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:gallery-edit-line-duotone" class="iconify-sm"></iconify-icon>
                      </a>
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:check-square-line-duotone" class="iconify-sm"></iconify-icon>
                      </a>
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:heart-linear" class="iconify-sm text-danger"></iconify-icon>
                      </a>
                    </span>
                    <div class="text-muted ms-auto mt-2 mt-md-0">April 14, 2024</div>
                  </div>
                </div>
              </div>
              <!-- Comment Row -->
              <div class="d-flex flex-row comment-row">
                <div class="px-2 py-0">
                  <img src="../assets/images/profile/user-8.jpg" alt="user" width="45" class="rounded-circle" />
                </div>
                <div class="comment-text active w-100">
                  <h6 class="fw-medium mb-1">Michael Jorden</h6>
                  <span class="mb-2 d-block">Lorem Ipsum is simply dummy text of the printing and type setting
                    industry.
                  </span>
                  <div class="comment-footer d-md-flex align-items-center">
                    <span class="badge bg-success rounded-pill">Approved</span>
                    <span class="action-icons d-flex">
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:gallery-edit-line-duotone" class="iconify-sm"></iconify-icon>
                      </a>
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:close-square-line-duotone" class="iconify-sm"></iconify-icon>
                      </a>
                      <a href="javascript:void(0)" class="d-flex">
                        <iconify-icon icon="solar:heart-linear" class="iconify-sm text-danger"></iconify-icon>
                      </a>
                    </span>
                    <div class="text-muted ms-auto mt-2 mt-md-0">April 14, 2024</div>
                  </div>
                </div>
              </div>
              <!-- Comment Row -->
            </div>
          </div>
          <!-- end Recent Comments -->
        </div>
        <div class="col-lg-6">
          <!-- start Recent Chats -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Recent Chats</h4>
              <div class="chat-box scrollable position-relative w-100 h-450" data-simplebar>
                <!--chat Row -->
                <ul class="chat-list">
                  <!--chat Row -->
                  <li class="chat-item">
                    <div class="chat-img">
                      <img src="../assets/images/profile/user-3.jpg" alt="user" />
                    </div>
                    <div class="chat-content">
                      <h6 class="fw-medium">James Anderson</h6>
                      <div class="box bg-secondary-subtle rounded">
                        Lorem Ipsum is simply dummy text of the printing &amp; type setting
                        industry.
                      </div>
                    </div>
                    <div class="chat-time">10:56 am</div>
                  </li>
                  <!--chat Row -->
                  <li class="chat-item">
                    <div class="chat-img">
                      <img src="../assets/images/profile/user-6.jpg" alt="user" />
                    </div>
                    <div class="chat-content">
                      <h6 class="fw-medium">Bianca Doe</h6>
                      <div class="box bg-secondary-subtle">It’s Great opportunity to work.</div>
                    </div>
                    <div class="chat-time">10:57 am</div>
                  </li>
                  <!--chat Row -->
                  <li class="odd chat-item">
                    <div class="chat-content">
                      <div class="box bg-info rounded">I would love to join the team.</div>
                      <br />
                    </div>
                  </li>
                  <!--chat Row -->
                  <li class="odd chat-item">
                    <div class="chat-content">
                      <div class="box bg-info rounded">Whats budget of the new project.</div>
                      <br />
                    </div>
                    <div class="chat-time">10:59 am</div>
                  </li>
                  <!--chat Row -->
                  <li class="chat-item">
                    <div class="chat-img">
                      <img src="../assets/images/profile/user-5.jpg" alt="user" />
                    </div>
                    <div class="chat-content">
                      <h6 class="fw-medium">Angelina Rhodes</h6>
                      <div class="box bg-secondary-subtle rounded">Well we have good budget for the project</div>
                    </div>
                    <div class="chat-time">11:00 am</div>
                  </li>
                  <!--chat Row -->
                </ul>
              </div>
            </div>
            <div class="card-body border-top">
              <div class="row">
                <div class="col-9">
                  <div class="input-field mt-0 mb-0">
                    <input type="text" id="textarea1" placeholder="Type and enter" class="form-control border-0" />
                  </div>
                </div>
                <div class="col-3 d-flex justify-content-end">
                  <a class="btn-circle btn-lg btn-primary btn text-white" href="javascript:void(0)"><iconify-icon icon="solar:plain-3-line-duotone"></iconify-icon></a>
                </div>
              </div>
            </div>
          </div>
          <!-- end Recent Chats -->
        </div>
      </div>
    </div>
@endsection
