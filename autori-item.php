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
    <title>Scheda Autore | Catalogo Libri </title>

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
                                <li class="breadcrumb-item"><a href="autori.php">Autori</a></li>
                                <li class="breadcrumb-item active">Scheda Autore</li>
                            </ol>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Dettaglio Autore</h2>
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
                                                <label class="col-md-3 control-label">Nome <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="nome"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Cognome <span class="text-danger">*</span> </label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="cognome"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="cognome" name="cognome" placeholder="Cognome" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nazionalit&agrave; </label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <span class="form-control" id="nazionalita"></span>
                                                    <?php } else { ?>
                                                        <input type="text" id="nazionalita" name="nazionalita" placeholder="Nazionalit&agrave;" class="form-control" />
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div> <!-- // Left -->

                                        <!-- Right -->
                                        <div class="col-md-6 col-xs-12">


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Note</label>
                                                <div class="col-md-7">
                                                    <?php if ($action == "view") { ?>
                                                        <textarea class="form-control textarea" id="note" rows="6" class="form-control"></textarea>
                                                    <?php } else { ?>
                                                        <textarea id="note" name="note" rows="6" class="form-control" placeholder="Note"></textarea>
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

    <script src="js/func-comuni.js"></script>

    <script type="text/javascript">
        $("#annulla").click(function() {
            window.location.href = "autori.php";
        });

        $('#salva').click(function(e) {
            e.preventDefault();

            $("#esito").removeClass(["alert-success", "alert-danger", "alert-warning"]);

            var id = $("#id").val();
            var nome = $("#nome").val();
            var cognome = $("#cognome").val();
            var nazionalita = $("#nazionalita").val();
            var note = $("#note").val();

            // Controllo campi obbligatori
            if (!nome || !cognome) {
                $("#esito").removeClass("alert-success", "alert-danger", "alert-warning");

                $("#esito").addClass("alert-danger");
                $("#esito").html("I campi 'Nome' e 'Cognome' sono obbligatori");
                $("#esito").show();

            } else {

                let data = {
                    "nome": nome,
                    "cognome": cognome,
                    "nazionalita": nazionalita,
                    "note": note
                }

                $.ajax({
                    type: 'PUT',
                    url: "./public/autore/" + id,
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
                        $("#esito").html("Errore durante l'operazione di modifica '" + msg.responseText + "'");
                        $("#esito").show();
                    }

                });
            }
        });

        $('#create').click(function(e) {
            e.preventDefault();


            var nome = $("#nome").val();
            var cognome = $("#cognome").val();
            var nazionalita = $("#nazionalita").val();
            var note = $("#note").val();

            // Controllo campi obbligatori
            if (!nome || !cognome) {
                $("#esito").removeClass("alert-success", "alert-danger", "alert-warning");
                $("#esito").addClass("alert-danger");
                $("#esito").html("I campi 'Nome' e 'Cognome' sono obbligatori");
                $("#esito").show();

            } else {

                let data = {
                    "nome": nome,
                    "cognome": cognome,
                    "nazionalita": nazionalita,
                    "note": note
                }

                $.ajax({
                    type: 'POST',
                    url: "./public/autore",
                    contentType: 'application/json',
                    data: JSON.stringify(data), // access in body
                }).fail(function(msg) {
                    $("#esito").removeClass("alert-danger");

                    if (msg.status === 201) {
                        bootbox.alert("Inserimento avvenuto con successo", function() {
                            window.location.href = "autori.php";
                        })
                    } else {
                        $("#esito").addClass("alert-danger");
                        $("#esito").html("Errore durante l'operazione di inserimento '" + msg.responseText + "'");
                        $("#esito").show();
                    }

                });
            }
        });

        function showElements(data) {

            $('#nome').value = data.nome;
            $('#nome').html(data.nome);
            $('#nome').val(data.nome);

            $('#cognome').value = data.cognome;
            $('#cognome').html(data.cognome);
            $('#cognome').val(data.cognome);

            $('#nazionalita').value = data.nazionalita;
            $('#nazionalita').html(data.nazionalita);
            $('#nazionalita').val(data.nazionalita);

            $('#note').value = data.note;
            $('#note').html(data.note);
            $('#note').val(data.note);

        }

        function init() {

            $('#esito').hide();

            <?php if ($id) { ?>
                $.getJSON(
                    "./public/autore/" + <?php echo $id ?>,
                    function(data) {
                        showElements(data);
                    }
                ).fail(function() {
                    bootbox.alert({
                        message: "Nessun autore trovato per l'idenitificativo specificato ",
                        size: 'small'
                    });
                })
            <?php } ?>
        }

        function elimina(id) {
            if (id) {
                bootbox.confirm("Sei sicuro di voler cancellare l'autore selezionato ?", function(result) {
                    if (result == true) {
                        var jqxhr = $.ajax({
                            url: "./public/autore/" + id,
                            type: "DELETE",
                            contentType: "application/json",
                            error: function(data) { // FIXME gestione error/success
                                if (data.status === 200) {
                                    bootbox.alert("Cancellazione avvenuta con successo", function() {
                                        window.location.href = "autori.php";
                                    });
                                } else {

                                    bootbox.alert({
                                        title: "<i class='fa fa-exclamation'></i> Errore durante la cancellazione",
                                        message: data.responseText,
                                        className: 'animate__animated animate__rubberBand'
                                    });
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
                        window.location.href = "autori.php";
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