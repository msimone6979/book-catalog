<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Autori | Catalogo Libri </title>

      <?php  include_once 'inc/inc.header.php'; ?>
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
                        <h3>Autori</h3>
                     </div>

                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 col-sm-12  ">
                        <div class="x_panel">
                           <div class="x_title">
                              <h2>Elenco autori</h2>
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
                              Add content to the page ...
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
   </body>
</html>