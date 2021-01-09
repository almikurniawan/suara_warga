<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-body">
                <?= $content?>
                <div class="row mt-5">
                    <div class="col-12">
                        <a href="<?= base_url("admin/ketuatim/disposisi/".$id)?>" class="btn btn-primary btn-raised">Disposisikans</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>