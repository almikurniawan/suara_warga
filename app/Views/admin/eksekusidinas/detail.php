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
                <div class="row mt-5">
                    <div class="col-12">
                        <a href="<?= base_url("admin/EksekusiDinas/proses/".$din_id."/".$id)?>" class="btn btn-primary btn-raised">Eksekusi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>