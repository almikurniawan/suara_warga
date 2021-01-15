<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header bg-primary text-white">
                <center><b><?= $title?></b></center>
            </div>
            <div class="card-body">
                <?= $content?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>