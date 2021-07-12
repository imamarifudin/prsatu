<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <div class="mx-2" style="width: 200px;">
        <a href="<?= base_url()?>" class="site_title"> <span>GIS-PBB</span></a>
      </div>
    </div>
    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2><?= $user['name']; ?></h2>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>Main Navigation</h3>
        <ul class="nav side-menu">

          <?php if ($this->session->userdata('role_id') == 1) { ?>
            <li><a><i class="fa fa-home"></i> Admin <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?= site_url('admin') ?>">Beranda</a></li>
                <li><a href="<?= site_url('admin/tambahUser') ?>">Tambah User</a></li>
                <li><a href="<?= site_url('admin/listUser') ?>">List User</a></li>
              </ul>
            <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?= site_url('user/index') ?>">Profil Saya</a></li>
                <li><a href="<?= site_url('user/ubahProfil') ?>">Ubah Profil</a></li>
                <li><a href="<?= site_url('user/ubahPassword') ?>">Ubah Password</a></li>
              </ul>
              <!-- <li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li> -->
            <li><a><i class="fa fa-map"></i> Wilayah <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?= site_url('kecamatan') ?>">Kecamatan</a></li>
				<li><a href="<?= site_url('desa') ?>">Desa</a></li>
				<li><a href="<?= site_url('blok') ?>">Blok</a></li>
               <!-- <li><a href="<?= site_url('cakupan') ?>">Cakupan</a></li>-->
                <li><a href="<?= site_url('bangunan') ?>">Bangunan</a></li>
              </ul>
            </li>
          <!--  <li><a><i class="fa fa-tags"></i> Pipa <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?= site_url('pipa') ?>">Pipa Existing</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-map-marker"></i>Lokasi<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?= site_url('air') ?>">Titik Air</a></li>
              </ul>
            </li>-->
            <li><a href="<?= site_url('peta') ?>"><i class="fa fa-globe"></i> Peta</a></li>
          <?php } ?>

          <?php if ($this->session->userdata('role_id') == 2) { ?>
            <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?= site_url('user/index') ?>">Profil Saya</a></li>
                <li><a href="<?= site_url('user/ubahProfil') ?>">Ubah Profil</a></li>
                <li><a href="<?= site_url('user/ubahPassword') ?>">Ubah Password</a></li>
              </ul>
            <li><a href="<?= site_url('peta') ?>"><i class="fa fa-globe"></i> Peta</a></li>
          <?php } ?>

          <li><a href="<?= site_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->
  </div>
</div>