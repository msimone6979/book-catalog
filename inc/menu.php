<div class="col-md-3 left_col">
               <div class="left_col scroll-view">
                  <div class="navbar nav_title" style="border: 0;">
                     <a href="dashboard.php" class="site_title"><i class="fa fa-book"></i> <span>Catalogo Libri</span></a>
                  </div>
                  <div class="clearfix"></div>
                  <div class="profile clearfix">
                     <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                     </div>
                     <div class="profile_info">
                        <span>Benvenuto,</span>
                        <h2><?php echo $_SESSION['user']['nome']." ". $_SESSION['user']['cognome'] ?></h2>
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <br />
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                     <div class="menu_section">
                        <h3>Generale</h3>
                        <ul class="nav side-menu">
                           <li>
                              <a href="volumi.php"><i class="fa fa-book"></i>Volumi</a>
                           </li>
                           <li>
                              <a href="autori.php"><i class="fa fa-user"></i> Autori</a>
                           </li>
                           <li>
                              <a href="casa-editrice.php"><i class="fa fa-building"></i> Casa Editrice </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="sidebar-footer hidden-small">
                     <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                     <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                     </a>
                  </div>
               </div>
            </div>
