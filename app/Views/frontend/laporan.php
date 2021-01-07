<?= $this->extend('frontend/default') ?>
<?php
$validation = \Config\Services::validation();
$request = \Config\Services::request();
$this->section('content')
?>
<div class="red accent-4" style="height: 100vh;">
    <div class="row">
        <div class="col s12 center-align white-text">
            <H5><b>LAPORAN MASYARAKAT MELALUI APLIKASI</b></H5>
            <!-- <i class="material-icons left">looks_one</i> -->
            Isi Formulir di bawah dengan lengkap!
        </div>
        <form class="col s12" method="POST" action="<?= base_url("laporan/lapor"); ?>" enctype="multipart/form-data"> 
            <div class="input-field col s12">
                <label class="white-text" for="nik">NIK</label>
                <input id="nik" name="nik" type="text" class=" white-text" value="<?= $request->getPost('nik')?>">
                <?php if ($validation->getError('nik')) { ?>
                        <?= $error = $validation->getError('nik'); ?>
                <?php } ?>
            </div>
            <div class="input-field col s12">
                <input id="nama" name="nama" type="text" class="white-text" value="<?= $request->getPost('nama')?>">
                <label class="white-text" for="nama">Nama</label>
                <?php if ($validation->getError('nik')) { ?>
                        <?= $error = $validation->getError('nama'); ?>
                <?php } ?>
            </div>
            <div class="input-field col s12">
                <input id="no_hp" name="no_hp" type="text" class="white-text" value="<?= $request->getPost('no_hp')?>">
                <label class="white-text" for="no_hp">Nomor HP</label>
                <?php if ($validation->getError('nik')) { ?>
                        <?= $error = $validation->getError('no_hp'); ?>
                <?php } ?>
            </div>
            <div class="input-field col s12">
                <textarea id="laporan" name="laporan" class="materialize-textarea white-text"><?= $request->getPost('laporan')?></textarea>
                <label class="white-text" for="laporan">Laporan</label>
                <?php if ($validation->getError('nik')) { ?>
                        <?= $error = $validation->getError('laporan'); ?>
                <?php } ?>
            </div>
            <div class="file-field input-field  col s12">
                <input type="file" name="files">
                <div class="file-path-wrapper">
                    <input class="file-path white-text" name="files" type="text" placeholder="Upload files">
                </div>
            </div>
            <button class="waves-effect waves-light btn right-align" type="submit">Kirim Laporan<i class="material-icons left">send</i></button>
        </form>

    </div>
</div>
<?= $this->endSection() ?>