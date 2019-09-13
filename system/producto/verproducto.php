<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

include_once 'system/producto/Productos.php';
$product = new Productos();



?>
<div id="msj"></div>


      <section id="about" class="section-padding">
            <div class="container">
                <div class="row">

          <div class="col-lg-6 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower mb-4">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header info-color">
                <h5 class="mb-0 font-weight-bold">Archivos del producto</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <div id="contenido-archivo">
                  <?php 
                    $product->VerDocumento($_REQUEST["key"], 1);
                   ?>
                </div>
              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->


                        <!-- Card -->
            <div class="card card-cascade narrower mt-4">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header info-color">
                <h5 class="mb-0 font-weight-bold">Precios</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <div id="contenido-archivo">
                  <?php 
                    $product->VerPrecios($_REQUEST["key"],1);
                   ?>
                </div>
                
              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->


          </div>




        <div class="col-lg-6 col-md-12">
                
          <?php 
          $product->VerProducto($_REQUEST["key"],1);
         ?>
       </div>


        </div>
    </div>
</section>