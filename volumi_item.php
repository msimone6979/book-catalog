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
                                        <div class="col-md-6 col-xs-12">

                                            <div class="form-group">

                                                <?php
                                                if ($action == "view") { ?>
                                                    <div class="file-loading">
                                                        <label class="col-md-3 control-label">Immagine</label>
                                                        <div class="col-md-7">
                                                            <img id="immagine" name="immagine" class="immagine-small">
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="file-loading">
                                                        <input id="immagine" name="immagine" type="file">
                                                    </div>
                                                <?php } ?>

                                            </div>
                                            <!-- /.fileupload -->

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Titolo <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="titolo"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="titolo" name="titolo" placeholder="Titolo" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Descrizione <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <textarea class="form-control textarea" id="descrizione" rows="6" class="form-control"></textarea>
                                                    <?php } else { ?>
                                                        <textarea id="descrizione" name="descrizione" rows="6" class="form-control" placeholder="Descrizione"></textarea>
                                                    <?php } ?>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Genere <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="genere"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="genere" name="genere" placeholder="Genere" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Anno </label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="anno"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="anno" name="anno" placeholder="Anno" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>


                                        </div> <!-- // Left -->

                                        <!-- Right -->
                                        <div class="col-md-6 col-xs-12">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Pagine </label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="pagine"></span>
                                                    <?php } else { ?>
                                                        <input type="number" id="pagine" name="pagine" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Lingua</label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="lingua"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="lingua" name="lingua" placeholder="Lingua" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Prezzo </label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="prezzo"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="prezzo" name="prezzo" placeholder="Prezzo" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Casa Editrice <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <select id="idCasaEditrice" name="idCasaEditrice" class="form-control col-md-7 col-xs-12" <?php if ($action == "view") {
                                                                                                                                                    echo "disabled";
                                                                                                                                                } ?>>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Autore <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <select id="idAutore" name="idAutore" class="form-control col-md-7 col-xs-12" <?php if ($action == "view") {
                                                                                                                                        echo "disabled";
                                                                                                                                    } ?>>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Letto </label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <input id="letto" type="checkbox" class="form-control">
                                                    <?php } else { ?>
                                                        <input type="checkbox" id="letto" name="letto" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Formato Cartaceo </label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <input id="formatoCartaceo" type="checkbox" class="form-control">
                                                    <?php } else { ?>
                                                        <input type="checkbox" id="formatoCartaceo" name="formatoCartaceo" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Formato Ebook </label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <input id="formatoEbook" type="checkbox" class="form-control">
                                                    <?php } else { ?>
                                                        <input type="checkbox" id="formatoEbook" name="formatoEbook" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- ESITO  -->
                                        <div class="clearfix"></div>
                                        <div class="mt50"></div>
                                        <div class="col-xs-12">
                                            <div id="esito" class="alert alert-danger"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-offset-2 col-md-9 mt-50">
                                                <div id="editButtons" class=" pull-right">
                                                    <button id="annulla" name="annulla" type="button" class="btn btn-default ">Chiudi</button>
                                                    <a href="javascript:elimina(<?php echo $id ?>)" type="button" class="btn  btn-inverse-danger"><i class="fa fa-trash" aria-hidden="true"></i> Elimina</a>

                                                    <?php if ($action === "edit") { ?>
                                                        <button id="salva" name="salva" type="submit" class="btn btn-default btn-primary">Modifica</button>
                                                    <?php } ?>

                                                    <?php if ($action === "new") { ?>
                                                        <button id="create" name="create" type="submit" class="btn btn-default btn-primary">Salva</button>
                                                    <?php } ?>
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

        $('#salva').click(function(e) {
            e.preventDefault();

            $("#esito").removeClass("alert-success");
            $("#esito").removeClass("alert-danger");
            $("#esito").removeClass("alert-warning");

            var id = $("#id").val();
            var titolo = $("#titolo").val();
            var descrizione = $("#descrizione").val();
            var genere = $("#genere").val();
            var anno = $("#anno").val();
            var pagine = $("#pagine").val();
            var lingua = $("#lingua").val();
            var prezzo = $("#prezzo").val();

            var captionName = $.find(".file-caption-info");
            var immagine = "";
            if (captionName && captionName.length > 0) {
                immagine = captionName[0].textContent;
            }

            var idCasaEditrice = $("#idCasaEditrice").val();
            var idAutore = $("#idAutore").val();
            var letto = ($("#letto").prop('checked')) ? true : false;
            var formatoCartaceo = ($("#formatoCartaceo").prop('checked')) ? true : false;
            var formatoEbook = ($("#formatoEbook").prop('checked')) ? true : false;

            // Controllo campi obbligatori
            if (!titolo || !descrizione || !idCasaEditrice || !idAutore) {
                $("#esito").removeClass("alert-success");
                $("#esito").removeClass("alert-danger");
                $("#esito").removeClass("alert-warning");


                $("#esito").addClass("alert-danger");
                $("#esito").html("I campi 'Titolo', 'Descrizione', 'Casa Editrice' e 'Autore' sono obbligatori");
                $("#esito").show();

            } else {

                let data = {
                    "titolo": titolo,
                    "descrizione": descrizione,
                    "genere": genere,
                    "anno": anno,
                    "pagine": pagine,
                    "lingua": lingua,
                    "prezzo": prezzo,
                    "immagine": immagine,
                    "idCasaEditrice": idCasaEditrice,
                    "idAutore": idAutore,
                    "letto": letto,
                    "formatoCartaceo": formatoCartaceo,
                    "formatoEbook": formatoEbook
                }

                $.ajax({
                    type: 'PUT',
                    url: "./public/volume/" + id,
                    contentType: 'application/json',
                    data: JSON.stringify(data), // access in body
                }).done(function() {
                    $("#esito").removeClass("alert-success");
                    $("#esito").removeClass("alert-danger");
                    $("#esito").removeClass("alert-warning");

                    $("#esito").addClass("alert-success");
                    var html = "Modifica avvenuta con successo";
                    $("#esito").html(html);
                    $("#esito").show();
                }).fail(function(msg) {
                    $("#esito").removeClass("alert-success");
                    $("#esito").removeClass("alert-danger");
                    $("#esito").removeClass("alert-warning");

                    if (msg.status === 200) {
                        $("#esito").addClass("alert-success");
                        var html = "Modifica avvenuta con successo";
                        $("#esito").html(html);
                        $("#esito").show();
                    } else {
                        $("#esito").addClass("alert-danger");
                        $("#esito").html("Errore durante l'operazione di modifica");
                        $("#esito").show();
                    }

                });
            }
        });

        $('#create').click(function(e) {
            e.preventDefault();

            $("#esito").removeClass("alert-success");
            $("#esito").removeClass("alert-danger");
            $("#esito").removeClass("alert-warning");

            var titolo = $("#titolo").val();
            var descrizione = $("#descrizione").val();
            var genere = $("#genere").val();
            var anno = $("#anno").val();
            var pagine = $("#pagine").val();
            var lingua = $("#lingua").val();
            var prezzo = $("#prezzo").val();

            var captionName = $.find(".file-caption-info");
            var immagine = captionName[0].textContent;

            var idCasaEditrice = $("#idCasaEditrice").val();
            var idAutore = $("#idAutore").val();
            var letto = ($("#letto").prop('checked')) ? true : false;
            var formatoCartaceo = ($("#formatoCartaceo").prop('checked')) ? true : false;
            var formatoEbook = ($("#formatoEbook").prop('checked')) ? true : false;

            // Controllo campi obbligatori
            if (!titolo || !descrizione || !idCasaEditrice || !idAutore) {
                $("#esito").removeClass("alert-success");
                $("#esito").removeClass("alert-danger");
                $("#esito").removeClass("alert-warning");

                $("#esito").addClass("alert-danger");
                $("#esito").html("I campi 'Titolo', 'Descrizione', 'Casa Editrice' e 'Autore' sono obbligatori");
                $("#esito").show();

            } else {

                let data = {
                    "titolo": titolo,
                    "descrizione": descrizione,
                    "genere": genere,
                    "anno": anno,
                    "pagine": pagine,
                    "lingua": lingua,
                    "prezzo": prezzo,
                    "immagine": immagine,
                    "idCasaEditrice": idCasaEditrice,
                    "idAutore": idAutore,
                    "letto": letto,
                    "formatoCartaceo": formatoCartaceo,
                    "formatoEbook": formatoEbook
                }

                $.ajax({
                    type: 'POST',
                    url: "./public/volume",
                    contentType: 'application/json',
                    data: JSON.stringify(data), // access in body
                }).done(function() {
                    $("#esito").removeClass("alert-success");
                    $("#esito").removeClass("alert-danger");
                    $("#esito").removeClass("alert-warning");

                    $("#esito").addClass("alert-success");
                    var html = "Inserimento avvenuto con successo";
                    $("#esito").html(html);
                    $("#esito").show();
                }).fail(function(msg) {
                    $("#esito").removeClass("alert-success");
                    $("#esito").removeClass("alert-danger");
                    $("#esito").removeClass("alert-warning");

                    if (msg.status === 200) {
                        $("#esito").addClass("alert-success");
                        var html = "Inserimento avvenuto con successo";
                        $("#esito").html(html);
                        $("#esito").show();
                    } else {
                        $("#esito").addClass("alert-danger");
                        $("#esito").html("Errore durante l'operazione di inserimento '" + msg.responseText + "'");
                        $("#esito").show();
                    }

                });
            }
        });

        function showElements(data, imgUrlBase) {

            $('#titolo').value = data.titolo;
            $('#titolo').html(data.titolo);
            $('#titolo').val(data.titolo);

            $('#descrizione').value = data.descrizione;
            $('#descrizione').html(data.descrizione);
            $('#descrizione').val(data.descrizione);

            $('#pagine').value = data.pagine;
            $('#pagine').html(data.pagine);
            $('#pagine').val(data.pagine);

            $('#genere').value = data.genere;
            $('#genere').html(data.genere);
            $('#genere').val(data.genere);

            $('#lingua').value = data.lingua;
            $('#lingua').html(data.lingua);
            $('#lingua').val(data.lingua);

            $('#anno').value = data.anno;
            $('#anno').html(data.anno);
            $('#anno').val(data.anno);

            $('#prezzo').value = data.prezzo;
            $('#prezzo').html(data.prezzo);
            $('#prezzo').val(data.prezzo);

            var imageUrl = getImagePath(data.immagine, imgUrlBase);
            $('#immagine').attr('src', imageUrl);

            $("#letto").prop("checked", data.letto);
            $("#formatoEbook").prop("checked", data.formato_ebook);
            $("#formatoCartaceo").prop("checked", data.formato_cartaceo);

        }

        function init() {

            $('#esito').hide();

            popolaCasaEditrici();
            popolaAutore();

            <?php if ($id) { ?>
                $.getJSON(
                    "./public/volume/" + <?php echo $id ?>,
                    function(data) {
                        var imgUrlBase = '<?php echo IMG_URL_BASE ?>';
                        showElements(data, imgUrlBase);
                        popolaCasaEditrici(data.casa_editrice.id);
                        popolaAutore(data.autore.id);
                        initPreviewImage(data.immagine);
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

        function elimina(id) {
            if (id) {
                bootbox.confirm("Sei sicuro di voler cancellare il volume selezionato ?", function(result) {
                    if (result == true) {
                        var jqxhr = $.ajax({
                            url: "./public/volume/" + id,
                            type: "DELETE",
                            contentType: "application/json",
                            error: function(data) { // FIXME gestione error/success
                                if (data.status === 200) {
                                    bootbox.alert("Cancellazione avvenuta con successo", function() {
                                        window.location.href = "volumi.php";
                                    });
                                } else if (data.status === 404) {
                                    $("#esito").removeClass("alert-success");
                                    $("#esito").removeClass("alert-danger");
                                    $("#esito").removeClass("alert-warning");

                                    $('#esito').addClass('alert alert-danger');
                                    $('#esito').html("Errore durante la cancellazione del volume");
                                    $('#esito').show();
                                    $('#esito').fadeOut(2500);
                                }
                            }
                        });
                    }
                });
            } else {
                bootbox.alert({
                    message: "Identificativo non valido",
                    size: 'small',
                    callback: function() {
                        window.location.href = "volumi.php";
                    }
                });
            }
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