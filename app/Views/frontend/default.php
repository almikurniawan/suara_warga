<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b41cd4a11f.js" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="<?= base_url("assets_frontend") ?>/css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        .input-field{
            margin-bottom: unset !important;
        }
        span.badge{
            margin-left: 0px;
        }
        nav .sidenav-trigger i {
            height: 25px;
            line-height: 25px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-wrapper white">
            <a href="<?= base_url()?>" class="brand-logo left" style="font-size: 20px;"><img src="<?= base_url()?>/assets/images/halomasbup.png" alt="Girl in a jacket" height="55">
            </a>
            <ul id="slide-out" class="sidenav">
                <li><a class="sidenav-close" href="<?= base_url("pencarian")?>">Pencarian Laporan</a></li>
            </ul>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="grey-text darken-4" href="<?= base_url("pencarian")?>">Pencarian Laporan</a></li>
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger right" ><i class="material-icons red-text accent-4">menu</i></a>
        </div>
    </nav>
    <?php
    $this->renderSection('content');
    ?>
    <script type="text/javascript" src="<?= base_url("assets_frontend") ?>/js/materialize.min.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, {
            edge: 'right'
        });
    });
</script>
</html>
