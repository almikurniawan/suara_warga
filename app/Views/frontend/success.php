<?= $this->extend('frontend/default') ?>
<?= $this->section('content') ?>
<div class="red accent-4 white-text" style="height: 100vh;">
    <div class="row">
        <div class="col s12 center-align">
            <h6><b>Aduan anda berhasil dikirimkan. Tunggu tanggapannya</h6>
        </div>
    </div>
    <div class="row">
        <div class="col s12 center-align">
            <a href="<?= base_url('home')?>" class="waves-effect waves-light btn">Selesai</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>