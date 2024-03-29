<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12 col-xs-12 mb-2">
        <a href="<?= base_url("admin/aduan")?>" class="btn bg-info text-light btn-sm btn-raised">Aduan</a>
    <!-- </div> -->
    <!-- <div class="col-sm-3 col-xs-3"> -->
        <a href="<?= base_url("admin/aduan/ditinjau")?>" class="btn bg-info text-light btn-sm btn-raised">Ditinjau</a>
    <!-- </div> -->
    <!-- <div class="col-sm-3 col-xs-3"> -->
        <a href="<?= base_url("admin/aduan/eksekusi")?>" class="btn bg-info text-light btn-sm btn-raised">Eksekusi</a>
    <!-- </div> -->
    <!-- <div class="col-sm-3 col-xs-3"> -->
        <a href="<?= base_url("admin/aduan/selesai")?>" class="btn bg-info text-light btn-sm btn-raised">Selesai</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header bg-primary text-white">
                <center><b><?= $title ?></b></center>
            </div>
            <div class="card-body">
                <!-- <h1 class="card-title mb-4">
                    
                </h1> -->
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
