<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';
include_once 'application/common/Fechas.php';

include_once 'system/api/Api.php';
$api = new ApiRest();
?>

<div id="msj"></div>
<h2 class="h2-responsive">Código de activación</h2>



<div class="row">
  
<!-- Card -->
<div class="card testimonial-card mt-4 col-xl-6 col-md-6">

  <!-- Background color -->
  <div class="card-up blue lighten-1"></div>

  <!-- Avatar -->
  <div class="avatar mx-auto white">
    <img src="https://pizto.com/demo/pizto/assets/img/Photos/restaurante.jpg" class="rounded-circle" alt="woman avatar">
  </div>

  <!-- Content -->
  <div class="card-body">
    <!-- Name -->
    <h4 class="card-title"><?php 

      $claver = $api->CodigoDemo("R");
      echo $claver; ?>
      
    </h4>
    <hr>
    <!-- Quotation -->
    <p></i> 
    <?php 

    $clave1 = $api->SanarClave($claver);
    $codigo1 = $api->ObtenerCodigo($claver, $clave1, md5($clave1));
    echo $codigo1;


      // if($api->ValidarCodigo($claver, $codigo1, md5($clave1)) == TRUE){
      //   echo "<br>Valido";
      // }
     ?>
    </p>
  </div>

</div>
<!-- Card -->





<!-- Card -->
<div class="card testimonial-card mt-4 col-xl-6 col-md-6">

  <!-- Background color -->
  <div class="card-up red lighten-1"></div>

  <!-- Avatar -->
  <div class="avatar mx-auto white">
    <img src="https://pizto.com/demo/cozto/assets/img/Photos/ferreteria.jpg" class="rounded-circle" alt="woman avatar">
  </div>

  <!-- Content -->
  <div class="card-body">
    <!-- Name -->
    <h4 class="card-title"><?php 

      $clavep = $api->CodigoDemo("P");
      echo $clavep; ?></h4>
    <hr>
    <!-- Quotation -->
    <p></i><?php 

    $clave2 = $api->SanarClave($clavep);
    $codigo2 = $api->ObtenerCodigo($clavep, $clave2, md5($clave2));
    echo $codigo2;

      // if($api->ValidarCodigo($clavep, $codigo2, md5($clave2)) == TRUE){
      //   echo "<br>Valido";
      // }
     ?></p>
  </div>

</div>
<!-- Card -->  

</div>

