<?= $this->extend('frontend/default') ?>
<?= $this->section('content') ?>
<div class="row red accent-4 white-text" style="height: 100vh;">
    <div class="col s12 center-align">
        <h5 class="truncate"><b>CEK LAPORAN KAMU</b></h5>
    </div>
    <div class="col s12 center-align">
        <p>Ayo pantau progres laporan kamu.<br/>Jangan sampai terlewatkan informasi perkembangan problem yang kamu laporakan.</p>
    </div>
    <form method="get" action="<?= base_url("pencarian/list")?>">
        <div class="col s12 m4 offset-m4 input-field">
            <input placeholder="Masukan NIK anda" id="nik" type="text" name="nik" class="validate white-text">
            <label for="nik" class="white-text">NIK</label>
        </div>
        <div class="col s12 m4 offset-m4">
            <button type="submit" class="btn green darken-2"><i class="material-icons left">search</i> Cari</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>