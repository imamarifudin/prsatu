<?= content_open($title) ?>
<?= $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-lg-6">
    </div>
</div>

<div class="card mb-3 col-lg-8">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $user['name']; ?></h5>
                <h6>
                    <p class="card-text"><?= $user['email']; ?></>
                </h6>
                </p>
                <p class="card-text">
                    <medium class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></medium>
                </p>
            </div>
        </div>
    </div>
</div>
<?= content_close() ?>