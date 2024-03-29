<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12 col-xs-12 mb-2">
        <a href="<?= base_url("admin/ketuaTim")?>" class="btn bg-info text-light btn-sm btn-raised">Aduan</a>
    <!-- </div> -->
    <!-- <div class="col-sm-3 col-xs-3"> -->
        <a href="<?= base_url("admin/ketuaTim/ditinjau")?>" class="btn bg-info text-light btn-sm btn-raised">Perlu Ditinjau</a>
    <!-- </div> -->
    <!-- <div class="col-sm-3 col-xs-3"> -->
        <a href="<?= base_url("admin/ketuaTim/eksekusi")?>" class="btn bg-info text-light btn-sm btn-raised">Eksekusi</a>
    <!-- </div> -->
    <!-- <div class="col-sm-3 col-xs-3"> -->
        <a href="<?= base_url("admin/ketuaTim/selesai")?>" class="btn bg-info text-light btn-sm btn-raised">Selesai</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header bg-primary text-white">
                <center><b><?= $title ?></b></center>
            </div>
            <div class="card-body">
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
