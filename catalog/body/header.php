<body class="hidden-sn <?php echo $_SESSION['config_skin']; ?>">
    
<!-- preloader -->

<div id="mdb-preloader" class="flex-center">
    <div class="preloader-wrapper big active crazy">
        <div class="spinner-layer spinner-blue-only">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
</div>

<!-- preloader -->

<!-- white-skin , mdb-skin , grey-skin , pink-skin ,  light-blue-skin , black-skin  cyan-skin, navy-blue-skin -->
<!--Double navigation-->
<header>
<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav sn-bg-4 custom-scrollbar">
<ul class="custom-scrollbar">
    <!-- Logo -->
    <li>
        <div class="logo-wrapper waves-light">
            <a href="?"><img src="assets/img/logo/pizto.png" class="img-fluid flex-center"></a>
        </div>
    </li>
    <!--/. Logo -->

    <!--Search Form-->
    <li>
        <form class="search-form" role="search" method="post" action="?search">
            <div class="form-group md-form mt-0 pt-1 waves-light">
                <input type="text" class="form-control" placeholder="Buscar..." id="search" name="search">
            </div>
        </form>
    </li>
    <!--/.Search Form-->
    <!-- Side navigation links -->
<ul class="collapsible collapsible-accordion">

<?php include_once 'menu.php'; ?>
    <hr>
    <small> Powered By</small>  
    <a href="https://www.hibridosv.com" target="_blank"><img src="assets/img/logo/lgb.png" class="img-fluid flex-center"></a>
    <!--/. Side navigation links -->
</ul>
<div class="sidenav-bg mask-strong"></div>
</div>
<!--/. Sidebar navigation -->

<!-- //////////////////////////////////// -->

<!-- Navbar -->
<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">


<!-- SideNav slide-out button -->
<div class="float-left">
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
</div>
<!-- Breadcrumb-->
<div class="breadcrumb-dn mr-auto">
    <p><?php echo $_SESSION["nombre"]; ?></p>
</div>

            <ul class="nav navbar-nav nav-flex-icons ml-auto">
    



                           <!-- Dropdown -->
        <li class="nav-item dropdown notifications-nav">
          <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="badge red">0</span> <i class="fas fa-bell"></i>
            <span class="d-none d-md-inline-block">Notifications</span>
          </a>
<!--           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">
              <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
              <span>New order received</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
              <span>New order received from Erick</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
              <span>Your campaign is about to end</span>
            </a>
          </div> -->
        </li>




            
<!--                 <li class="nav-item">
                    <a id="cambiar" op="15" class="nav-link"><i class="fab fa-first-order-alt"></i></a>
                </li>
 -->






<!--           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profile</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="application/includes/logout.php">Salir</a>
              <a class="dropdown-item" href="?me">Mi Cuenta</a>
            </div>
          </li> -->


                <li class="nav-item">
                    <a href="?" class="nav-link"><i class="fas fa-home"></i> <span class="clearfix d-none d-sm-inline-block">Inicio</span></a>
                </li> 


            </ul>
   



</nav>
<!-- /.Navbar -->
</header>

  <main>