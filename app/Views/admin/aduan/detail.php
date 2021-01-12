<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-body">
                <?= $content?>
                <div class="row mt-5">
                    <div class="col-12">
                        <a href="<?= base_url("admin/aduan/valid/".$id)?>" class="btn btn-primary btn-raised">Proses</a>
                        <a href="<?= base_url("admin/aduan/reject/".$id)?>" class="btn btn-warning btn-raised">Tidak Valid</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function wa(phone){
    window.open('https://wa.me/'+phone);
}
</script>
<?= $this->endSection() ?>