<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12 col-xs-12 mb-2">
        <a href="<?= base_url("admin/EksekusiDinas") ?>" class="btn bg-info text-light btn-sm btn-raised">Perlu Dieksekusi</a>
        <a href="<?= base_url("admin/EksekusiDinas/eksekusi") ?>" class="btn bg-info text-light btn-sm btn-raised">Proses Eksekusi</a>
        <a href="<?= base_url("admin/EksekusiDinas/selesai") ?>" class="btn bg-info text-light btn-sm btn-raised">Selesai</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header bg-primary text-white">
                <center><b><?= $title ?></b></center>
            </div>
            <div class="card-body">
                <?= $search . $grid ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>