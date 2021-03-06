<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ingresar al sistema</title>

    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/mdb.min.css" rel="stylesheet">
    <link href="assets/css/galeria.css" rel="stylesheet">

    <style>/* Required for full background image */

html,
body,
header,
.view {
  height: 100%;
}

@media (max-width: 740px) {
  html,
  body,
  header,
  .view {
    height: 1000px;
  }
}
@media (min-width: 800px) and (max-width: 850px) {
  html,
  body,
  header,
  .view {
    height: 650px;
  }
}

.top-nav-collapse {
  background-color: #3f51b5 !important;
}

.navbar:not(.top-nav-collapse) {
  background: transparent !important;
}

@media (max-width: 991px) {
  .navbar:not(.top-nav-collapse) {
    background: #3f51b5 !important;
  }
}

/*.rgba-gradient {
  background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
  background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
  background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
}*/

.card {
  background-color: rgba(0, 64, 90, 0.7);
}

.md-form label {
  color: #ffffff;
}

h6 {
  line-height: 9.7;
}
body { overflow-x: hidden; padding-left: 5px; padding-right: 5px; }</style>

</head>
<body class="hidden-sn navy-blue-skin">

<!-- Main navigation -->
<header>

  <!-- Full Page Intro -->
  <div class="view" style="background-image: url('assets/img/Photos/backgroundDefault.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!-- Mask & flexbox options-->
    <div class="mask rgba-gradient d-flex justify-content-center">
      <!-- Content -->
      <div class="container">
        <!--Grid row-->
        <div class="row mt-5">
          <!--Grid column-->
          



          <div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left d-none d-md-block">
            <!-- <h1 class="h1-responsive font-weight-bold wow fadeInLeft" data-wow-delay="0.3s">Registrese Ahora! </h1> 

            <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s"> -->
            <h6 class="mb-3 wow fadeInLeft" data-wow-delay="0.3s">
			<img src="assets/img/secure.png" alt="">
            </h6>

          </div>



          <!--Grid column-->
          <!--Grid column-->
          <div class="col-md-6 col-xl-5 mb-4">
            <!--Form-->
			 <form id="form-registrar" name="form-registrar">
            <div class="card wow fadeInRight" data-wow-delay="0.3s">
              <div class="card-body">
                <!--Header-->
                <div class="text-center">
                  <h3 class="white-text">
                    <i class="fa fa-user white-text"></i> Registrarse</h3>
                  <hr class="hr-light">
                </div>
                <!--Body-->
                

                <div class="md-form">
                  <i class="fa fa-user prefix white-text active"></i>
                  <input type="text" name="nombre" id="nombre" class="white-text form-control" />
                  <label for="nombre" class="active">Nombre</label>
                </div>


                <div class="md-form">
                  <i class="fa fa-envelope prefix white-text active"></i>
                  <input type="text" name="email" id="email" class="white-text form-control" />
                  <label for="email">Email</label>
                </div>


                <div class="md-form">
                  <i class="fa fa-lock prefix white-text active"></i>  
                <input type="password" name="password" id="password" class="white-text form-control" />
                  <label for="password">Password</label>
                </div>


                <div class="md-form">
                  <i class="fa fa-lock prefix white-text active"></i>                
                <input type="password" name="confirmpwd" id="confirmpwd" class="white-text form-control" />
                  <label for="confirmpwd">Confirme Password</label>
                </div>

                <input type="hidden" id="tipo" name="tipo" value="3">
                <input type="hidden" id="inicio" name="inicio" value="1">

                <div class="text-center mt-4">
                	
                  <input type="button" value="Registrar" class="btn btn-info btn-rounded  z-depth-0 my-4 waves-effect" id="btn-registrar" name="btn-registrar"/> 

                  
                  <hr class="hr-light mb-3 mt-4">  
                  <div id="msj"></div>              
                  <div class="inline-ul text-center d-flex justify-content-center">

                  	
                    <!-- <a class="p-2 m-2 tw-ic">
                      <i class="fa fa-twitter white-text"></i>
                    </a>
                    <a class="p-2 m-2 li-ic">
                      <i class="fa fa-linkedin white-text"> </i>
                    </a>
                    <a class="p-2 m-2 ins-ic">
                      <i class="fa fa-instagram white-text"> </i>
                    </a> -->
                    <img src="assets/img/logo/pizto.png" alt="">
                    
                  </div>
                  <a class="btn btn-outline-danger btn-sm waves-effect" href="?">Iniciar Sesión</a>
            
                </div>
              </div>
            </div>

            </form>
            <!--/.Form-->
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->
</header>
<!-- Main navigation -->

<!-- 
<main>



</main>  
 -->

    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript" src="assets/js/popper.min.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script>
        // SideNav Initialization
        $(".button-collapse").sideNav();
        
        new WOW().init();

       </script>

<script type="text/javascript" src="assets/js/query/login.js"></script>

</body>

</html>
