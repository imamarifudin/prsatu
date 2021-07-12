<?= content_open($title) ?>
<?= $this->session->flashdata('message'); ?>

<div class="x_content">
    <form class="" action="<?= site_url('user/ubahPassword') ?>" method="post">
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Password Saat Ini<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" />
                <medium class="text-danger"><?= form_error('current_password'); ?>
                </medium>
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Password Baru<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="New Password" />
                <medium class="text-danger"><?= form_error('new_password1'); ?>
                </medium>
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Ulangi Password<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Repeat New Password" />
                <medium class="text-danger"><?= form_error('new_password2'); ?>
                </medium>
            </div>
        </div>
        <hr>
        <div class="row justify-content-md-center">
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block submit">Ubah Password</button>
            </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
<?= content_close() ?>