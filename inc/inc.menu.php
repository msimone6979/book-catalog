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
            <div>Benvenuto,</div>
            <a class="profile_link" hef="#"><?php echo sprintf("%s %s", $_SESSION["user"]["nome"], $_SESSION["user"]["cognome"]) ?></a>
         </div>
         <div class="clearfix"></div>
      </div>
      <br />
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
         <div class="menu_section">
            <h3>Generale</h3>
            <ul class="nav side-menu">
               <li>
                  <a href="autori.php"><i class="fa fa-user"></i> Autori</a>
               </li>
               <li>
                  <a href="casa-editrice.php"><i class="fa fa-building"></i> Casa Editrice </a>
               </li>
               <li>
                  <a href="volumi.php"><i class="fa fa-book"></i>Volumi</a>
               </li>
               <li>
                  <a href="wish.php"><i class="fa fa-shopping-cart"></i>Lista dei desideri</a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
<div class="top_nav">
   <div class="nav_menu">
      <div class="nav toggle">
         <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
         <ul class="navbar-right">
            <li class="nav-item dropdown" style="padding-right: 15px;">
               <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt=""><?php echo sprintf("%s %s", $_SESSION["user"]["nome"], $_SESSION["user"]["cognome"]) ?> <span class="fa fa-chevron-down"></span>
               </a>
               <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-87px, 21px, 0px);">
                  <a class="dropdown-item disabled" href="#"><i class="fa fa-user pull-right"></i> Profile</a>

                  <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
               </div>
            </li>
         </ul>
      </nav>
   </div>
</div>