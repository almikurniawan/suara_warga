<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-3 col-xs-3">
        <a href="<?= base_url("admin/aduan")?>" class="btn btn-primary btn-sm btn-raised">Laporan Masuk</a>
    </div>
    <div class="col-sm-3 col-xs-3">
        <a href="<?= base_url("admin/aduan/ditinjau")?>" class="btn btn-primary btn-sm btn-raised">Ditinjau</a>
    </div>
    <div class="col-sm-3 col-xs-3">
        <a href="<?= base_url("admin/aduan/eksekusi")?>" class="btn btn-primary btn-sm btn-raised">Eksekusi</a>
    </div>
    <div class="col-sm-3 col-xs-3">
        <a href="<?= base_url("admin/aduan/selesai")?>" class="btn btn-primary btn-sm btn-raised">Selesai</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-body">
                <h1 class="card-title mb-4">
                    <?= $title ?>
                </h1>
                <hr />
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#tabstrip").kendoTabStrip({
            animation: {
                open: {
                    effects: "fadeIn"
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>