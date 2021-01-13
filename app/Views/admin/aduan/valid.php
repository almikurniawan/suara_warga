<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header bg-primary text-white">
                <span class="badge badge-light text-primary">1</span> Response Aduan
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?= base_url("admin/aduan/view/".$aduan_id."?step=1")?>" class="btn btn-sm bg-danger text-light" href="">DETAIL ADUAN</a>
                        <em class="float-right"><?= date_format(date_create($tanggal),'d M Y H:i:s')?></em>
                    </div>
                </div>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>