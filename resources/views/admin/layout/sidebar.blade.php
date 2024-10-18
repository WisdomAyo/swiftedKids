 <!-- Sidebar Start -->
 <aside class="left-sidebar with-vertical">
    <div>
      <!-- ---------------------------------- -->
      <!-- Start Vertical Layout Sidebar -->
      <!-- ---------------------------------- -->
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="/" class="text-nowrap logo-img d-flex align-items-center gap-6">
          <b class="logo-icon">
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <img src="../assets/admin/images/logo.png" alt="homepage" class="dark-logo" width="100" height="50"/>
            <!-- Light Logo icon -->
            {{-- <img src="../assets/images/logos/logo-light-icon.svg" alt="homepage" class="light-logo" /> --}}
          </b>
          <!--End Logo icon -->
          <!-- Logo text -->

        </a>
      </div>

      <nav class="sidebar-nav scroll-sidebar" data-simplebar>
        <ul id="sidebarnav">

          <!-- User Profile-->
          <li class="pt-3">
            <!-- User Profile-->
            <div class="user-profile d-flex  dropdown mt-3">
              <div class="user-pic">
                <img src="../assets/images/profile/user-1.jpg" alt="users" class="rounded-circle" width="40" />
              </div>
              <div class="user-content hide-menu ms-2">
                <a href="javascript:void(0)" class="" id="Userdd" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <h5 class="mb-0 user-name fw-medium d-flex ">
                    {{ Auth::user()->name}}
                    <iconify-icon icon="solar:alt-arrow-down-outline" class="ms-2"></iconify-icon>
                  </h5>
                  <span class="op-5 text-muted">{{ Auth::user()->email}}<span>
                </a>

              </div>
            </div>
            <!-- End User Profile-->
          </li>

          <!-- ---------------------------------- -->
          <!-- Home -->
          <!-- ---------------------------------- -->
          <li class="nav-small-cap">
            <iconify-icon icon="solar:menu-dots-bold" class="nav-small-cap-icon fs-4"></iconify-icon>
            <span class="hide-menu">Personal</span>
          </li>
          <!-- ---------------------------------- -->
          <!-- Dashboard -->
          <!-- ---------------------------------- -->








          <li class="sidebar-item">
            <a class="sidebar-link" href="">
              <iconify-icon icon="solar:buildings-2-linear" class="fs-5"></iconify-icon>
              <span class="hide-menu">Teachers</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="">
              <iconify-icon icon="solar:basketball-linear" class="fs-5"></iconify-icon>
              <span class="hide-menu">Students</span>
            </a>
          </li>



          <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="{{route('admin.subject.index')}}" aria-expanded="false">
              <span class="d-flex">
                <iconify-icon icon="solar:pie-chart-3-line-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Subject</span>
            </a>
            <ul aria-expanded="true" class="collapse first-level">
              <li class="sidebar-item">
                <a href="../main/blog-posts.html" class="sidebar-link sublink">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="sidebar-icon"></i>
                  </div>
                  <span class="hide-menu"> Posts </span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="../main/blog-detail.html" class="sidebar-link sublink">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="sidebar-icon"></i>
                  </div>
                  <span class="hide-menu"> Details </span>
                </a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
              <span class="d-flex">
                <iconify-icon icon="solar:smart-speaker-minimalistic-line-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Setting</span>
            </a>
            <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                <a href="../main/eco-shop.html" class="sidebar-link sublink">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="sidebar-icon"></i>
                  </div>
                  <span class="hide-menu"> Shop </span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="../main/eco-shop-detail.html" class="sidebar-link sublink">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="sidebar-icon"></i>
                  </div>
                  <span class="hide-menu"> Details </span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="../main/eco-product-list.html" class="sidebar-link sublink">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="sidebar-icon"></i>
                  </div>
                  <span class="hide-menu"> List </span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="../main/eco-checkout.html" class="sidebar-link sublink">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="sidebar-icon"></i>
                  </div>
                  <span class="hide-menu"> Checkout </span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="../main/eco-add-product.html" class="sidebar-link sublink">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="sidebar-icon"></i>
                  </div>
                  <span class="hide-menu"> Add Product </span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="../main/eco-edit-product.html" class="sidebar-link sublink">
                  <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="sidebar-icon"></i>
                  </div>
                  <span class="hide-menu"> Edit Product </span>
                </a>
              </li>
            </ul>
          </li>


       </ul>
      </nav>

    </div>
  </aside>
  <!--  Sidebar End -->
