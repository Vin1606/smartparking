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
             Admin
         </div>

         <!-- Nav Item - Profile -->
         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('user/profile'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('user/profile'); ?>" style="padding: 10px 15px;">
                 <i class="fa-solid fa-fw fa-user-edit"></i>
                 <span>Profile</span>
             </a>
         </li>

         <!-- Nav Item - Profile -->
         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('user/view_users'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('user/view_users'); ?>" style="padding: 10px 15px;">
                 <i class="fa-fw fa-solid fa-users"></i>
                 <span>View User Member</span>
             </a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider mt-3 mb-3">

         <!-- Nav Item - Dashboard -->
         <div class="sidebar-heading">
             Menu
         </div>

         <!-- Nav Item - Home -->
         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('user/dashboard'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('user/dashboard'); ?>" style="padding: 10px 15px;">
                 <i class="fa-fw fa-solid fa-chart-simple"></i>
                 <span>Dashboard</span>
             </a>
         </li>

         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('user/index'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('user/index'); ?>" style="padding: 10px 15px;">
                 <i class="fa-fw fa-solid fa-house"></i>
                 <span>Home</span>
             </a>
         </li>

         <!-- Nav Item - Booking -->
         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('user/booking'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('user/booking'); ?>" style="padding: 10px 15px;">
                 <i class="fas fa-fw fa-solid fa-car"></i>
                 <span>Booking Parking</span>
             </a>
         </li>

         <!-- Nav Item - Booking History -->
         <li class="nav-item <?= (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == parse_url(base_url('user/booking_detail'), PHP_URL_PATH)) ? 'active' : '' ?>" style="margin-bottom: 0;">
             <a class="nav-link" href="<?= base_url('user/booking_detail'); ?>" style="padding: 10px 15px;">
                 <i class="fas fa-fw fa-solid fa-file-invoice"></i>
                 <span>Booking History</span>
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