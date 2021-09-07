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
              <a href="<?= route_to('home'); ?>" class="nav-link <?= (isset($menu) and $menu == 'beranda') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>

            <!-- Role Dosen Sidebar Menu -->
            <?php if (in_groups('dosen')) : ?>
              <!-- Menu DUPAK -->
              <hr class="sidebar-divider">
              <li class="nav-header">DUPAK</li>
              <li class="nav-item">
                <a href="<?= route_to('dupak_create'); ?>" class="nav-link <?= (isset($menu) and $menu == 'dupak-buat') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-file-medical"></i>
                  <p>Buat Usulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('dupak_index'); ?>" class="nav-link <?= (isset($menu) and $menu == 'dupak-daftar') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-list-alt"></i>
                  <p>Daftar Usulan</p>
                </a>
              </li>

              <!-- Profil -->
              <hr class="sidebar-divider">
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
            <?php endif; ?>

            <!-- Role Operator Unit Sidebar Menu -->
            <?php if (in_groups('operator')) : ?>
              <!-- Menu DUPAK -->
              <hr class="sidebar-divider">
              <li class="nav-header">Menu</li>
              <li class="nav-item">
                <a href="<?= route_to('pegawai_index'); ?>" class="nav-link <?= (isset($menu) and ($menu == 'dupak-buat' or $menu == 'pegawai-index')) ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-file-medical"></i>
                  <p>Daftar Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('dupak_index'); ?>" class="nav-link <?= (isset($menu) and $menu == 'dupak-daftar') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-list-alt"></i>
                  <p>Daftar Usulan</p>
                </a>
              </li>
            <?php endif; ?>

            <!-- Role Verifikator Unit Sidebar Menu -->
            <?php if (in_groups('verifikator')) : ?>
              <!-- Menu DUPAK -->
              <hr class="sidebar-divider">
              <li class="nav-header">DUPAK</li>
              <li class="nav-item">
                <a href="<?= route_to('dupak_index'); ?>" class="nav-link <?= (isset($menu) and $menu == 'dupak-daftar') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-list-alt"></i>
                  <p>Daftar Usulan</p>
                </a>
              </li>
            <?php endif; ?>

            <!-- Role Reviewer Unit Sidebar Menu -->
            <?php if (in_groups('reviewer')) : ?>
              <!-- Menu DUPAK -->
              <hr class="sidebar-divider">
              <li class="nav-header">DUPAK</li>
              <li class="nav-item">
                <a href="<?= route_to('dupak_index'); ?>" class="nav-link <?= (isset($menu) and $menu == 'dupak-daftar') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-list-alt"></i>
                  <p>Daftar Usulan</p>
                </a>
              </li>
            <?php endif; ?>

            <!-- Role Koordinator Sidebar Menu -->
            <?php if (in_groups('koordinator')) : ?>
              <!-- Menu Utama -->
              <hr class="sidebar-divider">
              <li class="nav-header">Menu Utama</li>
              <li class="nav-item">
                <a href="<?= route_to('periode_penilaian'); ?>" class="nav-link <?= (isset($menu) and $menu == 'periode-penilaian') ? 'active' : ''; ?>">
                  <i class="nav-icon far fa-fw fa-clock"></i>
                  <p>Periode Penilaian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('dupak_index'); ?>" class="nav-link <?= (isset($menu) and $menu == 'dupak-daftar') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-list-alt"></i>
                  <p>Daftar Usulan</p>
                </a>
              </li>

              <!-- Menu Basis Data -->
              <hr class="sidebar-divider">
              <li class="nav-header">Basis Data</li>
              <li class="nav-item">
                <a href="<?= route_to('data_pegawai'); ?>" class="nav-link <?= (isset($menu) and $menu == 'data-pegawai') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-user-graduate"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('data_referensi'); ?>" class="nav-link <?= (isset($menu) and $menu == 'data-referensi') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-database"></i>
                  <p>Referensi</p>
                </a>
              </li>

            <?php endif ?>

            <?php if (in_groups('administrator')) : ?>
              <!-- Menu Data -->
              <hr class="sidebar-divider">
              <li class="nav-header">Data</li>
              <li class="nav-item">
                <a href="<?= route_to('data_pegawai'); ?>" class="nav-link <?= (isset($menu) and $menu == 'data-pegawai') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-user-graduate"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('data_referensi'); ?>" class="nav-link <?= (isset($menu) and $menu == 'data-referensi') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-database"></i>
                  <p>Referensi</p>
                </a>
              </li>

              <!-- Menu Pengaturan -->
              <hr class="sidebar-divider">
              <li class="nav-header">Pengaturan</li>
              <li class="nav-item">
                <a href="<?= route_to('user_list'); ?>" class="nav-link <?= (isset($menu) and $menu == 'setting-user') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-fw fa-users"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            <?php endif; ?>


            <!-- Contoh Menu -->
            <!--             
            <li class="nav-header">Example Menu</li>
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
            </li> -->


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>