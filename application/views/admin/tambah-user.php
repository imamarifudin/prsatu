<?= content_open($title) ?>
<div class="x_content">
    <form class="" action="<?= site_url('admin/tambahUser') ?>" method="post">
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" id="name" name="name" placeholder="Fullname" value="<?= set_value('name'); ?>" />
                <medium class="text-danger"><?= form_error('name'); ?>
                </medium> </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                <medium class="text-danger"><?= form_error('email'); ?>
                </medium> </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password" />
                <medium class="text-danger"><?= form_error('password1'); ?>
                </medium> </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Ulangi Password<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password" />
            </div>
        </div>
        <hr>
        <div class="row justify-content-md-center">
        <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block submit">Tambah User</button>
            </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
<?= content_close() ?>

