    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= route_to('home') ?>" class="brand-link d-flex align-items-center">
        <img src="<?= base_url(); ?>/img/logo_unj.png" alt="SIJABAT Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weigh-bolder ml-4 text-lg" style="opacity: .8">SIJABAT</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= route_to('home'); ?>" class="nav-link <?= (isset($menu) and $menu == 'home') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <hr class="sidebar-divider">

            <?php if (in_groups('dosen')) : ?>
              <li class="nav-header">Profil</li>
              <li class="nav-item">
                <a href="<?= route_to('dosen-dokumen'); ?>" class="nav-link <?= (isset($menu) and $menu == 'dokumen-dosen') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-briefcase"></i>
                  <p>Dokumen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('dosen-rekap'); ?>" class="nav-link <?= (isset($menu) and $menu == 'rekap-dosen') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-table"></i>
                  <p>Rekap</p>
                </a>
              </li>
              <hr class="sidebar-divider">
            <?php endif; ?>

            <li class="nav-header">Main Menu</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Menu 1
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Menu 2
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Extras
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Login & Register v1
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pages/examples/login.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Login v1</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/register.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Register v1</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/forgot-password.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Forgot Password v1</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/recover-password.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Recover Password v1</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Login & Register v2
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pages/examples/login-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Login v2</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/register-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Register v2</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Forgot Password v2</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/recover-password-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Recover Password v2</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/lockscreen.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lockscreen</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Legacy User Menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/language-menu.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Language Menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/404.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 404</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/500.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 500</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/pace.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pace</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/blank.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blank Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="starter.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Starter Page</p>
                  </a>
                </li>
              </ul>
            </li>

            <?php if (in_groups('administrator')) : ?>
              <hr class="sidebar-divider">

              <li class="nav-header">Pengaturan</li>
              <li class="nav-item">
                <a href="<?= route_to('user_list'); ?>" class="nav-link <?= (isset($menu) and $menu == 'setting-user') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-users"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            <?php endif; ?>
            <<<<<<< HEAD=======>>>>>>> master
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>