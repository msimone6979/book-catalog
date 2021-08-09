<?php
session_start();
require_once 'inc/inc.func.php';

isUserAuthenticated();
?>
<!DOCTYPE html>
<html lang="it">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Autori | Catalogo Libri </title>

   <?php include_once 'inc/inc.header.php'; ?>
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
                        <li class="breadcrumb-item active">Autori</li>
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
                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Nome </label>
                                    <div class="col-md-7">
                                       <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" />
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Cognome </label>
                                    <div class="col-md-7">
                                       <input type="text" id="cognome" name="cognome" class="form-control" placeholder="Cognome" />
                                    </div>
                                 </div>
                              </div>

                              <!-- Right -->
                              <div class="col-md-6 col-xs-12">
                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Nazionalit&agrave; </label>
                                    <div class="col-md-7">
                                       <input type="text" id="nazionalita" name="nazionalita" class="form-control" placeholder="Nazionalit&agrave;" />
                                    </div>
                                 </div>
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
                           <h2>Elenco autori</h2>
                           <ul class="nav navbar-right panel_toolbox">
                              <li>
                                 <button id="newAutore" type="button" class="btn btn-round btn-primary"><i class="fa fa-plus"></i> Nuovo</button>
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
                           Totale: <span id="totalReturned"></span>
                           <table id="tabella_autori" class="table table-hover table-striped">
                              <thead>
                                 <tr>
                                    <th style="white-space: nowrap">Cognome
                                       <a href="#" onclick='searchElem("cognome","asc")'>
                                          <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                       </a><a style="float:righ" href="#" onclick='searchElem("cognome","desc")'>
                                          <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                       </a>
                                    </th>
                                    <th>Nome
                                       <a href="#" onclick='searchElem("nome","asc")'>
                                          <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                       </a><a style="float:righ" href="#" onclick='searchElem("nome","desc")'>
                                          <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                       </a>
                                    </th>
                                    <th>Nazionalità</th>
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
      $("#newAutore").click(function() {
         window.location.href = "autori-item.php?action=new";
      });

      $("#nome").keyup(function() {
         searchElem();
      });

      $("#cognome").keyup(function() {
         searchElem();
      });

      $("#nazionalita").keyup(function() {
         searchElem();
      });

      // Ordinamento
      function searchElem(ordField, sort) {

         if (typeof(ordField) === 'undefined') ordField = "cognome";
         if (typeof(sort) === 'undefined') sort = "ASC";

         var nome = ($("#nome").val()) ? $("#nome").val() : "";
         var cognome = ($("#cognome").val()) ? $("#cognome").val() : "";
         var nazionalita = ($("#nazionalita").val()) ? $("#nazionalita").val() : "";

         $("#tabella_autori tbody").html("");
         $.getJSON(
            "./public/autore/list/" + ordField + "/" + sort + "?nome=" + nome + "&cognome=" + cognome + "&nazionalita=" + nazionalita,
            function(data) {
               $("#tabella_autori tbody").html("");
               $("#totalReturned").html(data.length);
               $.each(data, function(i, data) {
                  showElements(data);
               });
            }
         );

      }

      function showElements(data) {

         var tblRow = "<tr onclick='viewPage(" + data.id + ")'>" +
            "<td>" + data.cognome + "</td>" +
            "<td>" + data.nome + "</td>" +
            "<td>" + data.nazionalita + "</td>" +

            "<td><a href='./autori-item.php?action=view&id=" + data.id + "' type='button' class='btn btn-success btn-sm mr-10'><i class='fa fa-search' aria-hidden='true'></i> </a>&nbsp;" +
            "<a href='./autori-item.php?action=edit&id=" + data.id + "' type='button' class='btn btn-warning btn-sm mr-10'><i class='fa fa-edit' aria-hidden='true'></i> </a>&nbsp;" +
            "<a onclick='javascript:elimina(" + data.id + ")' type='button' class='btn btn-danger btn-sm mr-10'><i class='fa fa-trash' aria-hidden='true'></i> </a>" +
            "</td>" +
            "</tr>";
         $(tblRow).appendTo("#tabella_autori tbody");
      }

      function elimina(id) {
         event.stopPropagation();
         if (id) {
            bootbox.confirm("Sei sicuro di voler cancellare l'autore selezionato ?", function(result) {
               if (result == true) {

                  var jqxhr = $.ajax({
                     url: "./public/autore/" + id,
                     type: 'DELETE',
                     contentType: "application/json",
                     error: function(data) {
                        $("#esito").removeClass("alert-success", "alert-danger", "alert-warning");

                        if (data.status === 200) {
                           bootbox.alert(
                              "Cancellazione avvenuta con successo",
                              function() {
                                 init();
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
         }
      }

      function viewPage(id) {
         window.location = "./autori-item.php?action=view&id=" + id;
      }

      function init() {
         $("#tabella_autori tbody").html("");
         $.getJSON(
            "./public/autore/list",
            function(data) {
               $("#totalReturned").html(data.length);
               $.each(data, function(i, data) {
                  showElements(data);
               });
            }
         );

      }

      $(function() {
         init();
      });
   </script>
</body>

</html>