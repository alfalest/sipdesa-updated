  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link text-sm">
      <img src="<?= base_url() ?>/themes/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIPDESA V.1</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if (isset($login_session['link_foto_diri']) && $login_session['link_foto_diri'] != "" && $login_session['link_foto_diri'] && $login_session['nama_alias'] != '') : ?>
            <img src="<?= base_url() ?>/image-content/<?= $login_session['link_foto_diri'] ?>" class="round-1 elevation-2" alt="User Image">
          <?php else : ?>
            <img src="<?= base_url() ?>/themes/dist/img/user2-160x160.jpg" class="round-1 elevation-2" alt="User Image">
          <?php endif; ?>
        </div>
        <div class="info">
          <a href="<?= base_url() ?>/penduduk/data-diri" class="d-block"><?= (isset($login_session['nama_alias'])) ? $login_session['nama_alias'] : "username" ?></a>
          <span class="font-weight-light text-light"><?= (isset($hari_ini)) ? $hari_ini : "" ?></span>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url() ?>/penduduk/" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/penduduk/data-diri" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Data diri</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/penduduk/kependudukan" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Kependudukan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/penduduk/layanan-surat" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Layanan Surat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/penduduk/tiket-undangan" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Tiket Undangan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url() ?>/penduduk/setting-akun" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Setting Akun</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url() ?>/logout" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>