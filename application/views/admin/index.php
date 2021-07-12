<?= content_open($title) ?>
<?php $us = $this->db->get('user')->result_array(); ?>
<?php $cak = $this->db->get('tbl_cakupan')->result_array(); ?>
<?php $kec = $this->db->get('tbl_kecamatan')->result_array(); ?>
<?php $pipa = $this->db->get('tbl_pipa')->result_array(); ?>
<?php $bang = $this->db->get('tbl_bangunan')->result_array(); ?>
<?php $air = $this->db->get('tbl_air')->result_array(); ?>
<?= $this->session->flashdata('message') ?>

<!--<div class="col-md-3 col-sm-3  ">
  <div class="x_panel">
    <div class="x_title">
      <h2>Users</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class=" tile-stats">
        <span class="count_top"></span>
        <div class="count"><?= count($us) ?>
          <i class="fa fa-user"></i></div>
        <span class="count_bottom"></span>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-3  ">
  <div class="x_panel">
    <div class="x_title">
      <h2>Cakupan</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class=" tile-stats">
        <span class="count_top"></span>
        <div class="count"><?= count($cak) ?>
          <i class="fa fa-globe"></i></div>
        <span class="count_bottom"></span>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-3  ">
  <div class="x_panel">
    <div class="x_title">
      <h2>Kecamatan</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class=" tile-stats">
        <span class="count_top"></span>
        <div class="count"><?= count($kec) ?>
          <i class="fa fa-map"></i></div>
        <span class="count_bottom"></span>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-3  ">
  <div class="x_panel">
    <div class="x_title">
      <h2>Pipa Existing</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class=" tile-stats">
        <span class="count_top"></span>
        <div class="count"><?= count($pipa) ?>
          <i class="fa fa-tags"></i></div>
        <span class="count_bottom"></span>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-3  ">
  <div class="x_panel">
    <div class="x_title">
      <h2>Titik Air</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class=" tile-stats">
        <span class="count_top"></span>
        <div class="count"><?= count($air) ?>
          <i class="fa fa-map-marker"></i></div>
        <span class="count_bottom"></span>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-3  ">
  <div class="x_panel">
    <div class="x_title">
      <h2>Perumahan</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class=" tile-stats">
        <span class="count_top"></span>
        <div class="count"><?= count($bang) ?>
          <i class="fa fa-building"></i></div>
        <span class="count_bottom"></span>
      </div>
    </div>
  </div>
</div>
</div>
</div>-->
<?= content_close() ?>