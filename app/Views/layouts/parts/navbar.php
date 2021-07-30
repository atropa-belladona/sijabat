   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-dark shadow shadow-sm">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
       <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="<?= route_to('home'); ?>" class="nav-link">Home</a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="#" class="nav-link">Contact</a>
       </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">

       <!-- Messages Dropdown Menu -->
       <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#">
           <i class="far fa-comments"></i>
           <span class="badge badge-danger navbar-badge">3</span>
         </a>
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           <a href="#" class="dropdown-item">
             <!-- Message Start -->
             <div class="media">
               <img src="<?= base_url(); ?>/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
               <div class="media-body">
                 <h3 class="dropdown-item-title">
                   Brad Diesel
                   <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                 </h3>
                 <p class="text-sm">Call me whenever you can...</p>
                 <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
               </div>
             </div>
             <!-- Message End -->
           </a>
           <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item">
             <!-- Message Start -->
             <div class="media">
               <img src="<?= base_url(); ?>/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
               <div class="media-body">
                 <h3 class="dropdown-item-title">
                   John Pierce
                   <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                 </h3>
                 <p class="text-sm">I got your message bro</p>
                 <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
               </div>
             </div>
             <!-- Message End -->
           </a>
           <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item">
             <!-- Message Start -->
             <div class="media">
               <img src="<?= base_url(); ?>/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
               <div class="media-body">
                 <h3 class="dropdown-item-title">
                   Nora Silvester
                   <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                 </h3>
                 <p class="text-sm">The subject goes here</p>
                 <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
               </div>
             </div>
             <!-- Message End -->
           </a>
           <div class="dropdown-divider"></div>
           <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
         </div>
       </li>

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
           <img class="img-profile rounded-circle" src="<?= base_url(); ?>/img/user2-160x160.jpg">
           <span class="mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold">John Doe</span>
         </a>
         <!-- Dropdown - User Information -->
         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
           <a class="dropdown-item" href="#">
             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
             Profile
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