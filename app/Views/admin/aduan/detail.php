<?= $this->extend('template/default_popup') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-body">
                <?= $content?>
                <div class="row mt-5">
                    <div class="col-12">
                        <a href="<?= base_url("admin/aduan/disposisi/".$id)?>" class="btn btn-primary btn-raised">Disposisi Ke Dinas</a>
                        <a href="<?= base_url("admin/aduan/reject/".$id)?>" class="btn btn-warning btn-raised">Tidak Valid</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>