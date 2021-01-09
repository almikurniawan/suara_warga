<?= $this->extend('frontend/default') ?>
<?php
$validation = \Config\Services::validation();
$request = \Config\Services::request();
$this->section('content')
?>
<div class="red accent-4" style="height: 100vh;">
    <div class="row">
        <div class="col s12 m4 offset-m4 center-align white-text">
            <H5><b>LAPORAN MASYARAKAT <br> MELALUI APLIKASI</b></H5>
            <div class="col s12 center-align valign-wrapper">
                <i class="material-icons center">looks_one</i>
                Isi Formulir di bawah dengan lengkap!
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m4 offset-m4">
            <div class="card horizontal">
                <div class="card-content">
                    <form class="col s12 m12" method="POST" action="<?= base_url("laporan/lapor"); ?>" enctype="multipart/form-data">
                        <div class="input-field col s12">
                            <label class="" for="nik">NIK</label>
                            <input placeholder="35061257657234234" id="nik" name="nik" type="text" min="16" class="" value="<?= $request->getPost('nik') ?>">
                            <?php if ($validation->getError('nik')) { ?>
                                <?= $error = $validation->getError('nik'); ?>
                            <?php } ?>
                        </div>
                        <div class="input-field col s12">
                            <input placeholder="Almi Kurniawan" id="nama" name="nama" type="text" class="validate" value="<?= $request->getPost('nama') ?>">
                            <label for="nama">Nama</label>
                            <?php if ($validation->getError('nik')) { ?>
                                <?= $error = $validation->getError('nama'); ?>
                            <?php } ?>
                        </div>
                        <div class="input-field col s12">
                            <input placeholder="086454654689" id="no_hp" name="no_hp" type="text" class="" value="<?= $request->getPost('no_hp') ?>">
                            <label class="" for="no_hp">Nomor HP</label>
                            <?php if ($validation->getError('nik')) { ?>
                                <?= $error = $validation->getError('no_hp'); ?>
                            <?php } ?>
                        </div>
                        <div class="input-field col s12">
                            <textarea placeholder="Telah Terjadi" id="laporan" name="laporan" class="materialize-textarea " style="height: 100px;"><?= $request->getPost('laporan') ?></textarea>
                            <label class="" for="laporan">Laporan</label>
                            <?php if ($validation->getError('nik')) { ?>
                                <?= $error = $validation->getError('laporan'); ?>
                            <?php } ?>
                        </div>
                        <button class="waves-effect waves-light btn right-align" type="submit">Kirim Laporan<i class="material-icons left">send</i></button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
