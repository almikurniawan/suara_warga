<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-body">
                <?= $content?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>