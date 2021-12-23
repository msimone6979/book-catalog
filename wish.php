<?php
session_start();
require_once 'inc/inc.func.php';
include_once 'inc/inc.conf.php';

isUserAuthenticated();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Lista dei desideri | Catalogo Libri </title>

   <?php include_once 'inc/inc.header.php'; ?>

</head>

<body class="nav-md">
   <div class="container body">
      <div class="main_container">

         <?php include_once 'inc/inc.menu.php'; ?>

         <div class="right_col" role="main">
            <div class="">
               <div class="page-title">
                  <div class="title_left">
                     <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lista dei desideri</li>
                     </ol>
                  </div>

               </div>
               <div class="clearfix"></div>

               <!-- Search filters -->
               <div class="row">
                  <div class="col-md-12 col-sm-12  ">
                     <div class="x_panel">
                        <div class="x_title">
                           <h2>Filtri ricerca</h2>
                           <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                           </ul>
                           <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                           <form method="post" class="form-horizontal">

                              <!-- Left -->
                              <div class="col-md-6 col-xs-12">
                                 <fieldset>
                                    <legend>Volume:</legend>
                                    <div class="form-group">
                                       <label class="col-md-3 control-label">Titolo </label>
                                       <div class="col-md-7">
                                          <input type="text" id="titolo" name="titolo" class="form-control" placeholder="Titolo" />
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-md-3 control-label">Genere </label>
                                       <div class="col-md-7">
                                          <input type="text" id="genere" name="genere" class="form-control" placeholder="Genere" />
                                       </div>
                                    </div>
                                 </fieldset>
                              </div>

                              <!-- Right -->
                              <div class="col-md-6 col-xs-12">
                                 <fieldset>
                                    <legend>Autore:</legend>
                                    <div class="form-group">
                                       <label class="col-md-3 control-label">Nominativo </label>
                                       <div class="col-md-7">
                                          <input type="text" id="nominativo" name="nominativo" class="form-control" placeholder="Nominativo" />
                                       </div>
                                    </div>

                                 </fieldset>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12 col-sm-12  ">
                     <div class="x_panel">
                        <div class="x_title">
                           <h2>Elenco dei libri da acquistare</h2>

                           <ul class="nav navbar-right panel_toolbox">
                              <li>
                                 <button id="newVolume" type="button" class="btn btn-round btn-primary"><i class="fa fa-plus"></i> Nuovo</button>
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
                           <div class="total-container"> Totale: <span id="totalReturned"></span></div>

                           <!-- ESITO  -->
                           <div class="clearfix"></div>
                           <div class="mt50"></div>
                           <div class="col-xs-12">
                              <div id="esito" class="alert alert-danger"></div>
                           </div>

                           <table id="tabella_volumi" class="table table-hover table-striped">
                              <thead>
                                 <tr>
                                    <th>Copertina</th>
                                    <th style="white-space: nowrap">Titolo
                                       <a href="#" onclick='searchElem("titolo","asc")'>
                                          <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                       </a><a style="float:righ" href="#" onclick='searchElem("titolo","desc")'>
                                          <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                       </a>
                                    </th>
                                    <th>Autore</th>
                                    <th>Casa Editrice</th>
                                    <th>Genere
                                       <a href="#" onclick='searchElem("genere","asc")'>
                                          <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                       </a><a style="float:righ" href="#" onclick='searchElem("genere","desc")'>
                                          <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                       </a>
                                    </th>
                                    <th>Prezzo
                                       <a href="#" onclick='searchElem("prezzo","asc")'>
                                          <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                       </a><a style="float:righ" href="#" onclick='searchElem("prezzo","desc")'>
                                          <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                       </a>
                                    </th>
                                    <th>Anno
                                       <a href="#" onclick='searchElem("anno","asc")'>
                                          <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                       </a><a style="float:righ" href="#" onclick='searchElem("anno","desc")'>
                                          <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                       </a>
                                    </th>
                                    <th>Pagine
                                       <a href="#" onclick='searchElem("pagine","asc")'>
                                          <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                       </a><a style="float:righ" href="#" onclick='searchElem("pagine","desc")'>
                                          <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                       </a>
                                    </th>

                                    <th>Lingua
                                       <a href="#" onclick='searchElem("lingua","asc")'>
                                          <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                       </a><a style="float:righ" href="#" onclick='searchElem("lingua","desc")'>
                                          <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                       </a>
                                    </th>
                                    <th>Azioni</th>
                                 </tr>
                              </thead>
                              <tbody>
                              </tbody>
                           </table>
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

   <script type="text/javascript">
      $("#newVolume").click(function() {
         window.location.href = "volumi_item.php?action=new&isWish=true";
      });

      $("#titolo").keyup(function() {
         searchElem();
      });

      $("#genere").keyup(function() {
         searchElem();
      });

      $("#anno").keyup(function() {
         searchElem();
      });

      $("#nominativo").keyup(function() {
         searchElem();
      });

      $("#nazionalita").keyup(function() {
         searchElem();
      });

      // Ordinamento
      function searchElem(ordField, sort) {

         if (typeof(ordField) === 'undefined') ordField = "titolo";
         if (typeof(sort) === 'undefined') sort = "ASC";

         var titolo = ($("#titolo").val()) ? $("#titolo").val() : "";
         var genere = ($("#genere").val()) ? $("#genere").val() : "";
         var anno = ($("#anno").val()) ? $("#anno").val() : "";
         var nominativo = ($("#nominativo").val()) ? $("#nominativo").val() : "";
         var nazionalita = ($("#nazionalita").val()) ? $("#nazionalita").val() : "";

         $("#tabella_volumi tbody").html("");
         $.getJSON(
            "./public/volume/list/" + ordField + "/" + sort + "?isWish=true&titolo=" + titolo + "&genere=" + genere + "&anno=" + anno + "&nominativo=" + nominativo + "&nazionalita=" + nazionalita,
            function(data) {
               $("#tabella_volumi tbody").html("");
               $("#totalReturned").html(data.length);
               $.each(data, function(i, data) {
                  showElements(data);
               });
            }
         );

      }

      var imgUrlBase = '<?php echo IMG_URL_BASE ?>';

      function showElements(data) {

         var imageUrl = getImagePath(data.immagine, imgUrlBase);

         var nomeAutore = (data.autore && data.autore.nome) ? data.autore.nome : "";
         var cognomeAutore = (data.autore && data.autore.cognome) ? data.autore.cognome : "";
         var nominativoAutore = (nomeAutore && cognomeAutore) ? nomeAutore + " " + cognomeAutore : "-";
         var casaEditrice = (data.casa_editrice && data.casa_editrice.denominazione) ? data.casa_editrice.denominazione : "-";

         var tblRow = "<tr onclick='viewPage(" + data.id + ")'>" +
            "<td> <img class='immagine-small' src='" + imageUrl + "'> </td> " +
            "<td> " + data.titolo + "</td>" +
            "<td>" + nominativoAutore + "</td>" +
            "<td>" + casaEditrice + "</td>" +
            "<td>" + data.genere + "</td>" +
            "<td>" + data.prezzo + "</td>" +
            "<td>" + data.anno + "</td>" +
            "<td>" + data.pagine + "</td>" +
            "<td>" + data.lingua + "</td>" +
            "<td>" +
            "<a href='./volumi_item.php?action=view&id=" + data.id + "' type='button' class='btn btn-success btn-sm mr-10'><i class='fa fa-search' aria-hidden='true'></i> </a>&nbsp;" +
            "<a href='./volumi_item.php?action=edit&isWish=true&id=" + data.id + "' type='button' class='btn btn-warning btn-sm mr-10'><i class='fa fa-edit' aria-hidden='true'></i> </a>&nbsp;" +
            "<a onclick='javascript:buy(" + data.id + ");' type='button' class='btn btn-default btn-sm mr-10'><i class='fa fa-shopping-cart' aria-hidden='true'></i> </a>&nbsp;" +
            "<a onclick='javascript:elimina(" + data.id + ");' type='button' class='btn btn-danger btn-sm mr-10'><i class='fa fa-trash' aria-hidden='true'></i> </a>" +
            "</td>" +
            "</tr>";
         $(tblRow).appendTo("#tabella_volumi tbody");
      }

      function init() {

         $("#tabella_volumi tbody").html("");
         $.getJSON(
            "./public/volume/list?isWish=true",
            function(data) {
               $("#totalReturned").html(data.length);
               $.each(data, function(i, data) {
                  showElements(data);
               });
            }
         );

      }

      function elimina(id) {
         event.stopPropagation();
         if (id) {
            bootbox.confirm("Sei sicuro di voler cancellare il volume selezionato ?", function(result) {
               if (result == true) {

                  var jqxhr = $.ajax({
                     url: "./public/volume/" + id,
                     type: 'DELETE',
                     contentType: "application/json",
                     error: function(data) {

                        if (data.status === 200) {
                           bootbox.alert(
                              "Cancellazione avvenuta con successo",
                              function() {
                                 init();
                              });
                        } else {
                           bootbox.alert({
                              title: "<i class='fa fa-exclamation'></i> Errore durante l'acquisto",
                              message: "Errore durante la cancellazione del volume",
                              className: 'text-danger animate__animated animate__rubberBand'
                           });
                        }
                     }
                  });
               }
            });
         }
      }

      function buy(id) {
         event.stopPropagation();
         if (id) {
            bootbox.confirm("Sei sicuro di voler acquistare il volume selezionato ?", function(result) {
               if (result == true) {
                  var jqxhr = $.ajax({
                     url: "./public/volume/" + id + "/buy",
                     type: 'POST',
                     contentType: "application/json",
                     error: function(msg) {

                        if (msg.status === 200) {
                           bootbox.alert(
                              "Acquisto avvenuto con successo",
                              function() {
                                 init();
                              });
                        } else {
                           bootbox.alert({
                              title: "<i class='fa fa-exclamation'></i> Errore durante l'acquisto",
                              message: msg.responseText,
                              className: 'text-danger animate__animated animate__rubberBand'
                           });
                        }
                     }
                  });
               }
            });
         }
      }


      function viewPage(id) {
         window.location = "./volumi_item.php?action=view&id=" + id;
      }

      $(function() {
         init();
         $('#esito').hide();
      });
   </script>
</body>

</html>