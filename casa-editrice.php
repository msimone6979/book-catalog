<?php
session_start();
require_once 'inc/inc.func.php';

isUserAuthenticated();

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Case editrici | Catalogo Libri </title>

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
                        <li class="breadcrumb-item active">Case Editrici</li>
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
                                    <label class="col-md-3 control-label">Denominazione </label>
                                    <div class="col-md-7">
                                       <input type="text" id="denominazione" name="denominazione" class="form-control" placeholder="Denominazione" />
                                    </div>
                                 </div>
                              </div>
                              <!-- Right -->
                              <div class="col-md-6 col-xs-12">
                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Nazione </label>
                                    <div class="col-md-7">
                                       <input type="text" id="nazione" name="nazione" class="form-control" placeholder="Nazione" />
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
                           <h2>Elenco delle case editrici</h2>
                           <ul class="nav navbar-right panel_toolbox">
                              <li>
                                 <button id="newCasaEditrice" type="button" class="btn btn-round btn-primary"><i class="fa fa-plus"></i> Nuovo</button>
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

                           <table id="tabella_casa_editrici" class="table table-hover table-striped">
                              <thead>
                                 <tr>
                                    <th style="white-space: nowrap">Denominazione
                                       <a href="#" onclick='searchElem("denominazione","asc")'>
                                          <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                       </a><a style="float:righ" href="#" onclick='searchElem("denominazione","desc")'>
                                          <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                       </a>
                                    </th>
                                    <th>Nazione</th>
                                    <th>Url</th>
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
      $("#newCasaEditrice").click(function() {
         window.location.href = "casa-editrice-item.php?action=new";
      });

      $("#denominazione").keyup(function() {
         searchElem();
      });

      $("#nazione").keyup(function() {
         searchElem();
      });
      // Ordinamento
      function searchElem(ordField, sort) {

         if (typeof(ordField) === 'undefined') ordField = "denominazione";
         if (typeof(sort) === 'undefined') sort = "ASC";

         var denominazione = ($("#denominazione").val()) ? $("#denominazione").val() : "";
         var nazione = ($("#nazione").val()) ? $("#nazione").val() : "";

         $("#tabella_casa_editrici tbody").html("");
         $.getJSON(
            "./public/casa-editrice/list/" + ordField + "/" + sort + "?denominazione=" + denominazione + "&nazione=" + nazione,
            function(data) {
               $("#totalReturned").html(data.length);
               $.each(data, function(i, data) {
                  showElements(data);
               });
            }
         );
      }

      function showElements(data) {

         var tblRow = "<tr onclick='viewPage(" + data.id + ")'>" +
            "<td>" + data.denominazione + "</td>" +
            "<td>" + data.nazione + "</td>" +
            "<td>" + data.url + "</td>" +


            "<td><a href='./casa-editrice-item.php?action=view&id=" + data.id + "' type='button' class='btn btn-success btn-sm mr-10'><i class='fa fa-search' aria-hidden='true'></i> </a>&nbsp;" +
            "<a href='./casa-editrice-item.php?action=edit&id=" + data.id + "' type='button' class='btn btn-warning btn-sm mr-10'><i class='fa fa-edit' aria-hidden='true'></i> </a>&nbsp;" +
            "<a onclick='javascript:elimina(" + data.id + ")' type='button' class='btn btn-danger btn-sm mr-10'><i class='fa fa-trash' aria-hidden='true'></i> </a>" +
            "</td>" +
            "</tr>";
         $(tblRow).appendTo("#tabella_casa_editrici tbody");
      }

      function init() {
         $('#esito').hide();
         $("#tabella_casa_editrici tbody").html("");
         $.getJSON(
            "./public/casa-editrice/list",
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
            bootbox.confirm("Sei sicuro di voler cancellare la casa editrice selezionata ?", function(result) {
               if (result == true) {

                  var jqxhr = $.ajax({
                     url: "./public/casa-editrice/" + id,
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
         window.location = "./casa-editrice-item.php?action=view&id=" + id;
      }

      $(function() {
         init();
      });
   </script>

</body>

</html>