<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-body">
                <h1 class="card-title mb-4">
                    <?= $title ?>
                </h1>
                <hr />
                <div id="tabstrip">
                    <ul>
                        <li class="k-state-active">
                            Waiting
                        </li>
                        <li>
                            Valid
                        </li>
                        <li>
                            Invalid
                        </li>
                    </ul>
                    <div>
                        <?= $content ?>
                    </div>
                    <div>
                        <?= $content_valid ?>
                    </div>
                    <div>
                        <?= $content_invalid ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function detail(id){
        $("#dialog").kendoWindow({
            content: '<?= base_url("admin/aduan/detail")?>/'+id,
            width: "800px",
            height: "400px",
            // modal: true,
            iframe: true,
            title: "Detail Aduan",
        });

        var popup = $("#dialog").data('kendoWindow');
        popup.center();
        popup.open();
    }

    $(document).ready(function() {
        $("#tabstrip").kendoTabStrip({
            animation: {
                open: {
                    effects: "fadeIn"
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>