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
   <title>Volumi | Catalogo Libri </title>

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
                        <li class="breadcrumb-item active">Volumi</li>
                     </ol>
                  </div>

               </div>
               <div class="clearfix"></div>
               <div class="row">
                  <div class="col-md-12 col-sm-12  ">
                     <div class="x_panel">
                        <div class="x_title">
                           <h2>Elenco dei libri</h2>

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
                                    <th>Genere</th>
                                    <th>Prezzo</th>
                                    <th>Anno</th>
                                    <th>Pagine</th>
                                    <th>Genere</th>
                                    <th>Lingua</th>
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
         window.location.href = "volumi_item.php?action=new";
      });

      var imgUrlBase = '<?php echo IMG_URL_BASE ?>';

      function showElements(data) {


         var imageUrl = getImagePath(data.immagine, imgUrlBase);

         var tblRow = "<tr onclick='viewPage(" + data.id + ")'>" +
            "<td> <img class='immagine-small' src='" + imageUrl + "'> </td> " +
            "<td> " + data.titolo + "</td>" +
            "<td>" + data.autore.cognome + ' ' + data.autore.nome + "</td>" +
            "<td>" + data.casa_editrice.denominazione + "</td>" +
            "<td>" + data.genere + "</td>" +
            "<td>" + data.prezzo + "</td>" +
            "<td>" + data.anno + "</td>" +
            "<td>" + data.pagine + "</td>" +
            "<td>" + data.genere + "</td>" +
            "<td>" + data.lingua + "</td>" +

            "<td>" +
            "<a href='./volumi_item.php?action=view&id=" + data.id + "' type='button' class='btn btn-success btn-sm mr-10'><i class='fa fa-search' aria-hidden='true'></i> </a>&nbsp;" +
            "<a href='./volumi_item.php?action=edit&id=" + data.id + "' type='button' class='btn btn-warning btn-sm mr-10'><i class='fa fa-edit' aria-hidden='true'></i> </a>&nbsp;" +
            "<a onclick='javascript:elimina(" + data.id + ");' type='button' class='btn btn-danger btn-sm mr-10'><i class='fa fa-trash' aria-hidden='true'></i> </a>" +
            "</td>" +
            "</tr>";
         $(tblRow).appendTo("#tabella_volumi tbody");
      }

      function init() {

         $("#tabella_volumi tbody").html("");
         $.getJSON(
            "./public/volume/list",
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
                        $("#esito").removeClass(["alert-success", "alert-danger", "alert-warning"]);

                        if (data.status === 200) {
                           bootbox.alert(
                              "Cancellazione avvenuta con successo",
                              function() {
                                 location.reload()
                              });
                        } else {
                           $('#esito').addClass('alert alert-danger');
                           $('#esito').html("Errore durante la cancellazione del volume");
                           $('#esito').show();
                           $('#esito').fadeOut(2500);
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