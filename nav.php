<!--navigation-->
<div class="primary-menu">
  <nav class="navbar navbar-expand-xl align-items-center">
   <div class="offcanvas offcanvas-start w-260" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
   <div class="offcanvas-header border-bottom h-70">
     <div class="d-flex align-items-center gap-2">
       <div class="">
         <img src="assets/images/logo-icon.png" class="logo-icon" width="45" alt="logo icon">
       </div>
       <div class="">
         <h4 class="logo-text">Foto admin</h4>
       </div>
     </div>
     <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
      <i class="material-icons-outlined">close</i>
     </a>
   </div>
   <div class="offcanvas-body p-0">
     <ul class="navbar-nav align-items-center flex-grow-1">
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="dashboard.php" >
         <div class="parent-icon"><i class="material-icons-outlined">home</i>
         </div>
         <div class="menu-title d-flex align-items-center">Dashboard</div>

       </a>

       </li>
       <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
         <div class="parent-icon"><i class='material-icons-outlined'>apps</i>
         </div>
         <div class="menu-title d-flex align-items-center">Apper</div>
         <div class="ms-auto dropy-icon"><i class='material-icons-outlined'>expand_more</i></div>
       </a>
       <ul class="dropdown-menu">

         <li class="nav-item dropend">
         <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>account_circle</i>Kundegalleri</a>
         <ul class="dropdown-menu submenu">

           <li><a class="dropdown-item" href="kundeliste.php"><i class='material-icons-outlined'>navigate_next</i>Oversikt</a></li>


           </ul>
         </li>
         <li class="nav-item dropend">
         <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>inventory_2</i>Produkter</a>
         <ul class="dropdown-menu submenu">

           <li><a class="dropdown-item" href="produkt_listing.php"><i class='material-icons-outlined'>navigate_next</i>Oversikt</a></li>
           <li><a class="dropdown-item" href="ny_produkt.php"><i class='material-icons-outlined'>navigate_next</i>Nytt produkt</a></li>

           </ul>
         </li>
         <li class="nav-item dropend">
         <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>manage_accounts</i>brukertilgang</a>
         <ul class="dropdown-menu submenu">

           <li><a class="dropdown-item" href="user_listing.php"><i class='material-icons-outlined'>navigate_next</i>Oversikt</a></li>


           </ul>
         </li>
         <li><a class="dropdown-item" href="pages.php"><i class='material-icons-outlined'>description</i>Sider</a></li>
         <!-- <li><a class="dropdown-item" href="kalender.php"><i class='material-icons-outlined'>calendar_month</i>Kalender</a></li> --->


       </ul>
       </li>
       <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
         <div class="parent-icon"><i class='material-icons-outlined'>note_alt</i>
         </div>
         <div class="menu-title d-flex align-items-center">Nettbutikk</div>
         <div class="ms-auto dropy-icon"><i class='material-icons-outlined'>expand_more</i></div>
       </a>
       <ul class="dropdown-menu">
         <li> <a class="dropdown-item" href="ecom_orders.php"><i class='material-icons-outlined'>inventory_2</i>Bestillinger</a>
         </li>
         <li> <a class="dropdown-item" href="ecomkunder.php"><i class='material-icons-outlined'>account_circle</i>Kunder</a>
         </li>
         <li class="nav-item dropend">
         <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>inventory_2</i>Produkter</a>
         <ul class="dropdown-menu submenu">

           <li><a class="dropdown-item" href="ecom_produkter.php"><i class='material-icons-outlined'>navigate_next</i>Oversikt</a></li>
           <li><a class="dropdown-item" href="ny_ecom_produkt.php"><i class='material-icons-outlined'>navigate_next</i>Nytt produkt</a></li>

           </ul>
         </li>
       </ul>
       </li>




     </ul>
   </div>
   </div>
 </nav>
</div>
<!--end navigation-->
