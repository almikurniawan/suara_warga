<?= $this->extend('frontend/default') ?>
<?= $this->section('content') ?>
<div class="red accent-4 white-text" style="height: 100vh;">
    <div class="row">
        <div class="col s12 center-align">
            <h4><b>APLIKASI ADUAN MASYARAKAT</b></br>KABUPATEN KEDIRI</h4>
        </div>
    </div>
    <div class="row">
        <div class="col s12 center-align">Sampaikan laporan Anda langsung kepada Mas Bupati</div>
    </div>
    <div class="row">
        <div class="col s12 center-align">
            <a href="<?= base_url('laporan') ?>" class="btn waves-effect blue" type="button" name="action">
                <i class="far fa-smile"></i>
                LAPORAN MELALUI APLIKASI
                <!-- i class="material-icons left">assignment</i-->
                
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col s12 center-align">
            <a href="https://bit.ly/lapor_masbup" class="btn waves-effect green" type="button" name="action">
                <i class="fab fa-whatsapp"></i>
                LAPORAN MELALUI WHATSAPP
                <!--i class="material-icons left">report_problem</i-->
                
                
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col s12 center-align">Melalui SMS ke nomor</br>0856-3131-301</div>
    </div>
    <div class="row">
        <div class="col s12 center-align">Call Center</br>699 665</div>
    </div>
</div>
<?= $this->endSection() ?>
