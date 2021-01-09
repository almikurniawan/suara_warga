<?= $this->extend('frontend/default') ?>
<?= $this->section('content') ?>
<div class="row red accent-4">
    <div class="col s12 center-align">
        <h5 class="truncate white-text"><b>DETAIL LAPORAN KAMU</b></h5>
    </div>
    <div class="col s12 center-align white-text">
        <p class="">Hai warga kediri, ini detail dan progres laporan yang kamu buat.</p>
    </div>
</div>
<div class="row">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= get_day(date_format(date_create($aduan['aduan_date']),'Y-m-d'))?>, <?= date_format(date_create($aduan['aduan_date']),'d M Y')?></span>
                <span class="card-subtitle"><b>Laporan</b></span>
                <p><?= $aduan['aduan_pesan']?></p>
                <span class="card-subtitle"><b>Status</b></span>
                <p><span class="new left badge blue darken-1" data-badge-caption=""><?= $aduan['status_label']?></span></p>
                <br/>
                <h6><b>Histori Status</b></h6>
                <table>
                    <?php
                    foreach ($histori as $key => $value) {
                        $class = ($value['history_created_at']=='' ? 'class="grey lighten-3"' : '');
                        echo '<tr '.$class.'>
                                <td>'.$value['history_status_text'].'<br/>'.$value['dinas'].'</td>
                                <td align="right"><em class="right">'.($value['history_created_at']=='' ? '-' : date_format(date_create($value['history_created_at']),'H:i - d M Y')).'</em></td>
                            </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>