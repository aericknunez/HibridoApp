<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!-- ////////////////////////////////////////////////////////// -->
<div class="row mb-3">

<!-- Grid column -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card">
    <div class="row mt-3">
      <div class="col-md-3 col-3 text-left pl-1">
        <a href="?myempresa" type="button" class="btn-floating btn-lg secondary-color ml-4 waves-effect waves-light"><i class="fas fa-barcode" aria-hidden="true"></i></a>
      </div>
      <div class="col-md-9 col-9 text-right pr-4">
        <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo $dash->EmpresasAgregadas($_SESSION["username"]); ?></h5>
        <p class="font-small grey-text">Empresas Agregadas</p>
      </div>
    </div>

  </div>
</div>
<!-- Grid column -->




<!-- Grid column -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card">
    <div class="row mt-3">
      <div class="col-md-3 col-3 text-left pl-1">
        <a href="?productos" type="button" class="btn-floating btn-lg info-color ml-4 waves-effect waves-light"><i class="fas fa-credit-card" aria-hidden="true"></i></a>
      </div>
      <div class="col-md-9 col-9 text-right pr-4">
        <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo $dash->ProductosDisponibles($_SESSION["username"]); ?></h5>
        <p class="font-small grey-text">Productos Disponibles</p>
      </div>
    </div>

  </div>
</div>
<!-- Grid column -->


<!-- Grid column -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card">
    <div class="row mt-3">
      <div class="col-md-3 col-3 text-left pl-1">
        <a type="button" class="btn-floating btn-lg success-color lighten-1 ml-4 waves-effect waves-light"><i class="fas fa-dollar-sign" aria-hidden="true"></i></a>
      </div>
      <div class="col-md-9 col-9 text-right pr-4">
        <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo Helpers::Dinero($dash->ProyeccionEfectivo($_SESSION["username"])); ?></h5>
        <p class="font-small grey-text">Proyeccion Efectivo</p>
      </div>
    </div>

  </div>
</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card">
    <div class="row mt-3">
      <div class="col-md-3 col-3 text-left pl-1">
        <a type="button" class="btn-floating btn-lg red accent-2 ml-4 waves-effect waves-light"><i class="fas fa-money-bill" aria-hidden="true"></i></a>
      </div>
      <div class="col-md-9 col-9 text-right pr-4">
        <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo Helpers::Dinero($dash->ProyeccionEfectivo($_SESSION["username"]) * 0.25); ?></h5>
        <p class="font-small grey-text">Proyeccion Utilidades</p>
      </div>
    </div>

  </div>
</div>
<!-- Grid column -->

</div>







<!-- division -->


<div class="row mt-3">

<!-- Grid column -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card">
    <div class="row mt-3">
      <div class="col-md-3 col-3 text-left pl-1">
        <a type="button" class="btn-floating btn-lg secondary-color ml-4 waves-effect waves-light"><i class="far fa-chart-bar" aria-hidden="true"></i></a>
      </div>
      <div class="col-md-9 col-9 text-right pr-4">
        <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo Helpers::Entero($dash->ProductosAsignados($_SESSION["username"])); ?></h5>
        <p class="font-small grey-text">Productos Asignados</p>
      </div>
    </div>

  </div>
</div>
<!-- Grid column -->




<!-- Grid column -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card">
    <div class="row mt-3">
      <div class="col-md-5 col-5 text-left pl-1">
        <a type="button" class="btn-floating btn-lg success-color ml-4 waves-effect waves-light"><i class="fas fa-chart-line" aria-hidden="true"></i></a>
      </div>
      <div class="col-md-7 col-7 text-right pr-4">
        <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo Helpers::Entero($dash->TratosCerrados($_SESSION["username"])); ?></h5>
        <p class="font-small grey-text">Tratos Cerrados</p>
      </div>
    </div>

  </div>
</div>
<!-- Grid column -->


<!-- Grid column -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card">
    <div class="row mt-3">
      <div class="col-md-5 col-5 text-left pl-1">
        <a type="button" class="btn-floating btn-lg light-blue lighten-1 ml-4 waves-effect waves-light"><i class="fas fa-grin-beam" aria-hidden="true"></i></a>
      </div>
      <div class="col-md-7 col-7 text-right pr-4">
        <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo Helpers::Entero($dash->VisitasPendientes($_SESSION["username"])); ?></h5>
        <p class="font-small grey-text"> Visitas Pendientes </p>
      </div>
    </div>

  </div>
</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card">
    <div class="row mt-3">
      <div class="col-md-5 col-5 text-left pl-1">
        <a type="button" class="btn-floating btn-lg red accent-2 ml-4 waves-effect waves-light"><i class="fas fa-sliders-h" aria-hidden="true"></i></a>
      </div>
      <div class="col-md-7 col-7 text-right pr-4">
        <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo Helpers::Entero($dash->VisitasRealizadas($_SESSION["username"])); ?></h5>
        <p class="font-small grey-text">Visitas Realizadas</p>
      </div>
    </div>

  </div>
</div>
<!-- Grid column -->


</div>