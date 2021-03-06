<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

include_once 'system/empresa/Empresas.php';
$empresa = new Empresas();

include_once 'system/historial/Historiales.php';
$historial = new Historiales();

if($empresa->CompruebaExistencia($_REQUEST["key"]) == TRUE){ // comprueba exixtencia de la empresa

?>
<div id="msj"></div>


      <section id="about" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header info-color-dark">
                <h5 class="mb-0 font-weight-bold">Productos Asignados</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <?php 
                   $empresa->VerEmpAsig($_REQUEST["key"]);
               ?>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->
 
<hr>
             <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header warning-color-dark">
                <h5 class="mb-0 font-weight-bold">Historial de Citas</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <?php 
                   $historial->VerCitas($_REQUEST["key"]);
               ?>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->



         </div>

        <div class="col-lg-6 col-md-12">
                
        <?php 
        $empresa->VerEmpresa($_REQUEST["key"],1); ?>


       </div>


        </div>
    </div>
</section>

<?php } else {
  Alerts::Mensajex("Error! No se encontro la pagina","danger");
} ?>