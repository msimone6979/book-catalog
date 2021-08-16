<?php
session_start();
require_once 'inc/inc.func.php';
include_once 'inc/inc.conf.php';
isUserAuthenticated();

$action = (isset($_GET["action"])) ? $_GET["action"] : "";
$id = (isset($_GET["id"])) ? $_GET["id"] : "";

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scheda Volume | Catalogo Libri </title>

    <?php include_once 'inc/inc.header.php'; ?>

    <!-- Toggle button -->
    <link href="./css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- File Input -->

    <link href="./node_modules/bootstrap-fileinput/css/fileinput.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php include_once 'inc/menu.php'; ?>

            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">

                    </nav>
                </div>
            </div>
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="volumi.php">Volumi</a></li>
                                <li class="breadcrumb-item active">Scheda Volume</li>
                            </ol>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Dettaglio libro</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li>
                                            <button id="viewItem" type="button" class="btn btn-round btn-primary"><i class="fa fa-file"></i> Vista Tradizionale</button>
                                        </li>
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form action="#" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <input type="hidden" id="action" name="action" value="<?php echo $action; ?> ">
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                                        <!-- Left -->
                                        <div class="col-md-4 col-xs-12">

                                            <div class="form-group">
                                                <div class="file-loading">
                                                    <img class="logo-preview" id="immagine" name="immagine">
                                                </div>
                                            </div>

                                        </div> <!-- // Left -->

                                        <!-- Right -->
                                        <div class="col-md-8 col-xs-12">
                                            <div class="col-info">

                                                <h2 id="titolo"></h2>
                                                di <span id="idAutore" class="volume-titolo"></span> (Autore)

                                                <div id="descrizione" class="volume-descrizione"></div>

                                                <h3 class="volume-dettagli">Dettagli</h3>

                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-6">Genere </label>
                                                            <span id="genere"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-6">Anno </label>
                                                            <span id="anno"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-6">Pagine </label>
                                                            <span id="pagine"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-6">Lingua </label>
                                                            <span id="lingua"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-6">Prezzo </label>
                                                            <span id="prezzo"></span> &euro;
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-6">Casa Editrice </label>
                                                            <span id="idCasaEditrice"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-6">Letto </label>
                                                            <span id="letto">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="col-md-6">Formato </label>
                                                            <span id="formato">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-offset-2 col-md-9 mt-50">
                                                <div id="editButtons" class=" pull-right">
                                                    <button id="annulla" name="annulla" type="button" class="btn btn-default ">Chiudi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once 'inc/inc.footer.php'; ?>
        </div>
    </div>

    <?php include_once 'inc/inc.script.php'; ?>


    <!-- Bootstrap Dialog -->
    <script src="./node_modules/bootbox/bootbox.js"></script>

    <!-- File Input -->
    <script src="./node_modules/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="./node_modules/bootstrap-fileinput/js/locales/it.js"></script>
    <script src="./node_modules/bootstrap-fileinput/js/plugins/piexif.min.js" type="text/javascript"></script>


    <script src="js/func-comuni.js"></script>

    <script type="text/javascript">
        $("#annulla").click(function() {
            window.location.href = "volumi.php";
        });

        $("#viewItem").click(function() {
            window.location.href = "volumi_item.php?id=" + <?= $id ?>;
        });

        function showElements(data, imgUrlBase) {

            $('#titolo').html(data.titolo);
            $('#descrizione').html(data.descrizione);
            $('#pagine').html(data.pagine);
            $('#genere').html(data.genere);
            $('#lingua').html(data.lingua);
            $('#anno').html(data.anno);
            $('#prezzo').html(data.prezzo);
            $("#idCasaEditrice").html(data.casa_editrice.denominazione);
            $("#idAutore").html(data.autore.cognome + " " + data.autore.nome);

            var imageUrl = getImagePath(data.immagine, imgUrlBase);
            $('#immagine').attr('src', imageUrl);

            $("#letto").prop("checked", data.letto);
            var letto = (data.letto) ? 'Si' : 'No';
            $("#letto").html(letto);

            var formato = (data.formato_cartaceo) ? 'Cartaceo' : 'E-book';
            $("#formato").html(formato);

        }

        function loadData() {
            <?php if ($id) { ?>
                $.getJSON(
                    "./public/volume/" + <?php echo $id ?>,
                    function(data) {
                        var imgUrlBase = '<?php echo IMG_URL_BASE ?>';
                        showElements(data, imgUrlBase);


                    }
                ).fail(function() {
                    bootbox.alert({
                        message: "Nessun volume trovato per l'idenitificativo specificato ",
                        size: 'small'
                    });
                })
            <?php } else { ?>
                initPreviewImage();
            <?php } ?>
        }

        function init() {

            $('#esito').hide();
            loadData();
        }



        function initPreviewImage(image) {
            if (image) {
                var urlImage = '<?php echo IMG_URL_BASE ?>copertine/' + image
                $("#immagine").fileinput({
                    showUpload: true,
                    previewFileType: 'any',
                    initialPreviewAsData: true,
                    maxFileCount: 1,
                    language: 'it',
                    uploadUrl: '<?php echo WEB_ROOT; ?>/upload-image.php',
                    overwriteInitial: true,
                    resizeImage: true,
                    maxImageWidth: "80%",
                    initialPreviewFileType: 'image',
                    initialCaption: image,
                    initialPreview: [urlImage],
                    initialPreviewConfig: [{
                        caption: image,
                        downloadUrl: urlImage,
                        width: "50px"
                    }]
                });
            } else {
                $("#immagine").fileinput({
                    showUpload: true,
                    previewFileType: 'any',
                    initialPreviewAsData: true,
                    maxFileCount: 1,
                    language: 'it',
                    uploadUrl: '<?php echo WEB_ROOT; ?>/upload-image.php',
                    overwriteInitial: true,
                    resizeImage: true,
                    maxImageWidth: "80%"

                });
            }
        }

        $(function() {
            init();
        });
    </script>
</body>

</html>