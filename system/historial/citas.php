<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

include_once 'system/historial/Historiales.php';
$historial = new Historiales();


?>
<div id="msj"></div>
      <!-- Section: Edit Account -->
      <section class="section">
        <!-- First row -->
        <div class="row">
          


<!-- First column -->
          <div class="col-lg-12 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header warning-color lighten-3">
                <h5 class="mb-0 font-weight-bold">Citas Registradas</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <div id="contenido-historial">
                  <?php 
                    $historial->TodasLasCitas();
                   ?>
                </div>

                <p class="text-muted"><small>Seleccione el estado para cambiar la cita</small></p>
      
              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- First column -->






        </div>
        <!-- First row -->

      </section>
      <!-- Section: Edit Account -->




<!-- modal  -->
<div class="modal" id="ModalVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        MODIFICAR ESTADO DE CITA</h5>
      </div>
      <div class="modal-body">
<!-- ./  content -->

<?php Alerts::Mensajex("Determina el estado de la cita programada","info"); ?>
 <form id="form-estado">

<input type="hidden" id="visita" name="visita" value="">

    <div class="form-row text-center">
    <div class="col-md-12 mb-1 md-form" id="estado_form">
<!-- Aqui va el resultado de form -->
    </div>
  </div>     


  <div class="form-row">
    
    <div class="col-md-12 mb-1 md-form" id="frm-det">
      <textarea id="datalles" name="datalles" class="md-textarea form-control" rows="3"></textarea>
      <label for="datalles">Detalles de la cita</label>
    </div>

  </div>


  <div class="form-row">
    <div class="col-12 my-12 md-form text-right">
     <button class="btn btn-success btn-rounded my-4" type="submit" id="btn-estado"><i class="fas fa-save mr-1"></i> Guardar </button>
    </div>
  </div>


   </form>
<!-- ./  content -->
      </div>
      <div class="modal-footer">

<a id="cerrarmodal" class="btn btn-primary btn-rounded" data-dismiss="modal">Regresar</a>

          
    
      </div>
    </div>
  </div>
</div>
<!-- ./  Modal -->
