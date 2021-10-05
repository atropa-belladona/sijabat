   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-dark shadow shadow-sm">
     <!-- Left navbar links -->
     <ul class="navbar-nav font-weight-bold text-white">
       <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="<?= route_to('home'); ?>" class="nav-link">Home</a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="#" class="nav-link">About</a>
       </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">

       <!-- Notifications Dropdown Menu -->
       <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#">
           <i class="far fa-bell"></i>
           <span class="badge badge-warning navbar-badge">15</span>
         </a>
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           <span class="dropdown-item dropdown-header">15 Notifications</span>
           <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item">
             <i class="fas fa-envelope mr-2"></i> 4 new messages
             <span class="float-right text-muted text-sm">3 mins</span>
           </a>
           <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item">
             <i class="fas fa-users mr-2"></i> 8 friend requests
             <span class="float-right text-muted text-sm">12 hours</span>
           </a>
           <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item">
             <i class="fas fa-file mr-2"></i> 3 new reports
             <span class="float-right text-muted text-sm">2 days</span>
           </a>
           <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
         </div>
       </li>


       <div class="topbar-divider d-none d-sm-block"></div>

       <li class="nav-item dropdown no-arrow">
         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <img class="img-profile rounded-circle" src="<?= base_url('img/profile/' . user()->profile_img); ?>">
           <span class="mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold"><?= (isset(user()->username)) ? user()->username : 'Guest' ?></span>
         </a>
         <!-- Dropdown - User Information -->
         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
           <a class="dropdown-item" href="#">
             <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
             Settings
           </a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="<?= route_to('logout'); ?>">
             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
             Logout
           </a>
         </div>
       </li>
     </ul>
   </nav>
   <!-- /.navbar -->