<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

include_once 'system/empresa/Empresas.php';
$empresa = new Empresas();

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
 

         </div>

        <div class="col-lg-6 col-md-12">
                
        <?php 
        $empresa->VerEmpresa($_REQUEST["key"],1); ?>


       </div>


        </div>
    </div>
</section>