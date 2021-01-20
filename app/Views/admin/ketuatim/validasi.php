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
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?= base_url("admin/ketuaTim/setujui/".$id)?>" class="btn btn-sm btn-raised btn-success">Setuju</a>
                        <a href="<?= base_url("admin/ketuaTim/tolak/".$id)?>" class="btn btn-sm btn-raised btn-danger">Tolak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>