<?= $this->extend('frontend/default') ?>
<?= $this->section('content') ?>
<div class="row red accent-4">
    <div class="col s12 center-align">
        <h5 class="truncate white-text"><b>DAFTAR LAPORAN KAMU</b></h5>
    </div>
    <div class="col s12 center-align white-text">
        <p class="">Hai warga kediri, <?= count($data)?> laporan kamu ditemukan. Ayo pantau terus perkembangannya.</p>
    </div>
</div>
<div class="row">
        <?php
        foreach ($data as $key => $value) {
            echo '<div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">'.get_day($value['aduan_date']).', '.date_format(date_create($value['aduan_date']),'d M Y').'</span>
                            <span class="card-subtitle"><b>Laporan</b></span>
                            <p>'.$value['aduan_pesan'].'</p>
                            <span class="card-subtitle"><b>Status</b></span>
                            <p><span class="new left badge blue darken-1" data-badge-caption="">'.$value['status_label'].'</span></p>
                            </div>
                        <div class="card-action">
                            <a href="'.base_url("pencarian/detail/".$value['aduan_id']).'" class="btn"><i class="material-icons left">visibility</i> Detail</a>
                        </div>
                    </div>
                </div>';
        }
        ?>
</div>
<?= $this->endSection() ?>