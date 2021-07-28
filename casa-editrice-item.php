<?php
session_start();
require_once 'inc/inc.func.php';

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
    <title>Scheda Casa Editrice | Catalogo Libri </title>

    <?php include_once 'inc/inc.header.php'; ?>

    <!-- Toggle button -->
    <link href="./css/bootstrap-toggle.min.css" rel="stylesheet">

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
                                <li class="breadcrumb-item"><a href="casa-editrice.php">Casa Editrice</a></li>
                                <li class="breadcrumb-item active">Scheda Casa Editrice</li>
                            </ol>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Dettaglio Casa Editrice</h2>
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

                                    <form method="post" class="form-horizontal">
                                        <input type="hidden" id="action" name="action" value="<?php echo $action; ?> ">
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                                        <!-- Left -->
                                        <div class="col-md-6 col-xs-12">


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Denominazione <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="denominazione"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="denominazione" name="denominazione" placeholder="Denominazione" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nazione </label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="nazione"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="nazione" name="nazione" placeholder="Nazione" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Sito web </label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="url"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="url" name="url" placeholder="Sito Web" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>


                                        </div> <!-- // Left -->

                                        <!-- Right -->
                                        <div class="col-md-6 col-xs-12">

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

    <script src="js/func-comuni.js"></script>

    <script type="text/javascript">
        $("#annulla").click(function() {
            window.location.href = "casa-editrice.php";
        });

        $('#salva').click(function(e) {
            e.preventDefault();

            $("#esito").removeClass(["alert-success", "alert-danger", "alert-warning"]);

            var id = $("#id").val();
            var denominazione = $("#denominazione").val();
            var nazione = $("#nazione").val();
            var url = $("#url").val();

            // Controllo campi obbligatori
            if (!denominazione) {
                $("#esito").removeClass("alert-success", "alert-danger", "alert-warning");

                $("#esito").addClass("alert-danger");
                $("#esito").html("Il campo 'Denominazione' &egrave; obbligatorio");
                $("#esito").show();

            } else {

                let data = {
                    "denominazione": denominazione,
                    "nazione": nazione,
                    "url": url
                }

                $.ajax({
                    type: 'PUT',
                    url: "./public/casa-editrice/" + id,
                    contentType: 'application/json',
                    data: JSON.stringify(data), // access in body
                }).done(function() {
                    $("#esito").removeClass("alert-danger", "alert-warning");


                    $("#esito").addClass("alert-success");
                    var html = "Modifica avvenuta con successo";
                    $("#esito").html(html);
                    $("#esito").show();
                }).error(function(msg) {

                    $("#esito").removeClass("alert-danger", "alert-warning");

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


            var denominazione = $("#denominazione").val();
            var nazione = $("#nazione").val();
            var url = $("#url").val();

            // Controllo campi obbligatori
            if (!denominazione) {
                $("#esito").removeClass("alert-success", "alert-danger", "alert-warning");
                $("#esito").addClass("alert-danger");
                $("#esito").html("Il campo 'Denominazione' &egrave; obbligatorio");
                $("#esito").show();

            } else {

                let data = {
                    "denominazione": denominazione,
                    "nazione": nazione,
                    "url": url
                }

                $.ajax({
                    type: 'POST',
                    url: "./public/casa-editrice",
                    contentType: 'application/json',
                    data: JSON.stringify(data), // access in body
                }).done(function() {
                    $("#esito").removeClass("alert-danger");

                    $("#esito").addClass("alert-success");
                    var html = "Inserimento avvenuto con successo";
                    $("#esito").html(html);
                    $("#esito").show();
                }).fail(function(msg) {
                    $("#esito").removeClass("alert-danger");

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

        function showElements(data) {

            $('#denominazione').value = data.denominazione;
            $('#denominazione').html(data.denominazione);
            $('#denominazione').val(data.denominazione);

            $('#nazione').value = data.nazione;
            $('#nazione').html(data.nazione);
            $('#nazione').val(data.nazione);

            $('#url').value = data.url;
            $('#url').html(data.url);
            $('#url').val(data.url);

        }

        function init() {

            $('#esito').hide();


            <?php if ($id) { ?>
                $.getJSON(
                    "./public/casa-editrice/" + <?php echo $id ?>,
                    function(data) {
                        showElements(data);
                    }
                ).fail(function() {
                    bootbox.alert({
                        message: "Nessuna casa editrice trovata per l'idenitificativo specificato ",
                        size: 'small'
                    });
                })
            <?php } ?>
        }

        function elimina(id) {
            if (id) {
                bootbox.confirm("Sei sicuro di voler cancellare la casa editrice selezionata ?", function(result) {
                    if (result == true) {
                        var jqxhr = $.ajax({
                            url: "./public/casa-editrice/" + id,
                            type: "DELETE",
                            contentType: "application/json",
                            error: function(data) { // FIXME gestione error/success
                                if (data.status === 200) {
                                    bootbox.alert("Cancellazione avvenuta con successo", function() {
                                        window.location.href = "casa-editrice.php";
                                    });
                                } else if (data.status === 404) {
                                    $("#esito").removeClass(["alert-success", "alert-danger", "alert-warning"]);

                                    $('#esito').addClass('alert alert-danger');
                                    $('#esito').html("Errore durante la cancellazione della casa editrice");
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
                        window.location.href = "casa-editrice.php";
                    }
                });
            }
        }

        $(function() {
            init();
        });
    </script>
</body>

</html>