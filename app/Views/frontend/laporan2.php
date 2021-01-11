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
            <div class="center-align valign-wrapper">
                <i class="material-icons center-align">looks_two</i>
                Lampiran (Foto/Dokumen) Pendukung
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m4 offset-m4">
            <div class="card horizontal">
                <div class="card-content">
                    <form class="col s12 m12" method="POST" action="<?= base_url("laporan/lapor2/" . $id_lap); ?>" enctype="multipart/form-data">
                        <div class="file-field input-field  col s12">
                            <input type="file" name="files[]" multiple>
                            <div class="file-path-wrapper">
                                <input class="file-path" name="files[]" type="text" placeholder="Unggah Foto">
                            </div>
                        </div>
                        <button class="waves-effect waves-light btn right-align" type="submit" style="margin-top: 10px;">Tambah lampiran<i class="material-icons left">send</i></button>
                        <a href="<?= base_url('home/success/' . $id_lap) ?>" class="waves-effect waves-light blue btn right-align" type="button" style="margin-top: 10px;">
                            Lewati <i class="material-icons left">clear</i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
