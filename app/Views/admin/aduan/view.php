<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header bg-primary text-white">
                <center><b>DETIAL ADUAN</b></center>
            </div>
            <div class="card-body">
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <a href="<?= $url_back ?>" class="btn btn-sm bg-danger text-light" href="">Kembali</a>
                    </div>
                </div> -->
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
<script>
    function wa(phone) {
        window.open('https://wa.me/' + phone);
    }
</script>
<?= $this->endSection() ?>