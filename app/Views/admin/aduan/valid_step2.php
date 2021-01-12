<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header bg-primary text-white">
                <span class="badge badge-light text-primary">2</span> Response Aduan
            </div>
            <div class="card-body">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>