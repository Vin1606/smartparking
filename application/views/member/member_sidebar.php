 <!-- Page Wrapper -->
 <div id="wrapper">

     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <div class="sidebar-brand" style="text-transform: none; margin: 20px 0; display: flex; align-items: center;">
             <div class="sidebar-brand-icon">
                 <img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="" style="width: 80px; margin: 0 5px 0 0;">
             </div>
             <div class="sidebar-brand-text" style="font-size: 15px;">Markigital</div>
         </div>

         <!-- Divider -->
         <hr class="sidebar-divider mt-0 mb-3">

         <!-- Nav Item - Dashboard -->
         <div class="sidebar-heading">
             Member
         </div>

         <!-- Nav Item - Profile -->
         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('member/profile'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('member/profile'); ?>" style="padding: 10px 15px;">
                 <i class="fa-solid fa-fw fa-user-edit"></i>
                 <span>Profile</span>
             </a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider mt-3 mb-3">

         <!-- Nav Item - Dashboard -->
         <div class="sidebar-heading">
             Menu
         </div>

         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('member/index'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('member/index'); ?>" style="padding: 10px 15px;">
                 <i class="fa-fw fa-solid fa-house"></i>
                 <span>Home</span>
             </a>
         </li>

         <!-- Nav Item - Booking -->
         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('member/booking'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('member/booking'); ?>" style="padding: 10px 15px;">
                 <i class="fas fa-fw fa-solid fa-car"></i>
                 <span>Booking Parking</span>
             </a>
         </li>

         <!-- Nav Item - Booking History -->
         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('member/booking_detail'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('member/booking_detail'); ?>" style="padding: 10px 15px;">
                 <i class="fas fa-fw fa-solid fa-file-invoice"></i>
                 <span>Booking History</span>
             </a>
         </li>

         <!-- Nav Item - Booking History -->
         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('member/about'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('member/about'); ?>" style="padding: 10px 15px;">
                 <i class="fa-fw fa-solid fa-circle-info"></i>
                 <span>About Us</span>
             </a>
         </li>

         <!-- Nav Item - Logout -->
         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('auth/logout'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal" style="padding: 10px 15px;">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                 <span>Logout</span>
             </a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider my-0 mb-5">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>

     <!-- End of Sidebar -->