<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
            <span><?= $user['name']; ?></span>
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= site_url('user/index') ?>">
              <i class="fa fa-user"></i> Profile</a>
            <a class="dropdown-item" href="<?= site_url('auth/logout') ?>" onclick="return confirm('Yakin keluar dari sistem ini ?')">
              <i class="fa fa-sign-out"></i> Log Out</a>
          </div>
        </li>
  </div>
  </li>
  </ul>
  </nav>
</div>
</div>
<!-- /top navigation -->