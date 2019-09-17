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
          <div class="col-lg-6 mb-4">

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
                    $historial->VerCitas();
                   ?>
                </div>

                <p class="text-muted"><small>Seleccione el estado para cambiar la cita</small></p>
      
              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- First column -->








          <!-- Second column -->
          <div class="col-lg-6 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header success-color">
                <h5 class="mb-0 font-weight-bold">Registrar Cita</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
 <form id="form-historial">
                  <!-- First row -->
 <!--  <input type="hidden" id="empresa" name="empresa" value="<?php echo $iden; ?>">
 -->
   <div class="form-row">

    <div class="col-md-12 mb-1 md-form">
      <select class="browser-default custom-select" id="empresa" name="empresa">
        <option selected disabled>* Empresa</option>
        <?php 
            $a = $db->query("SELECT id, nombre FROM empresa WHERE username = '".$_SESSION["username"]."'");
          foreach ($a as $b) {
              echo '<option value="'.$b["id"].'">'.$b["nombre"].'</option>';
          } $a->close();

         ?>       
      </select>
    </div>
  </div>  
  

  <div class="form-row">

    <div class="col-md-6 mb-1 md-form">
    <input placeholder="Seleccione una fecha" type="text" id="fecha" name="fecha" class="form-control datepicker my-0" data-value="[<?= date("Y-m-d"); ?>]">
    <label for="fecha">Fecha</label>
    </div>


    <div class="col-md-6 mb-1 md-form">
      <input placeholder="Seleccione la Hora" type="text" id="hora" name="hora" class="form-control timepicker">
      <label for="hora">Hora</label>
    </div>


  </div>                  



  <div class="form-row">
  	
    <div class="col-md-12 mb-1 md-form">
      <textarea id="datalles" name="datalles" class="md-textarea form-control" rows="3"></textarea>
  		<label for="datalles">Detalles de la cita</label>
    </div>

  </div>




  <div class="form-row">
  	<div class="col-12 my-12 md-form text-right">
  	 <button class="btn btn-info btn-rounded my-4" type="submit" id="btn-historial"><i class="fas fa-save mr-1"></i> Guardar </button>

  	</div>
  </div>





                </form>
                <!-- Edit Form -->

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Second column -->









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
 <form id="form-estado">

<input type="hidden" id="visita" name="visita" value="">

    <div class="form-row text-center">
    <div class="col-md-12 mb-1 md-form">
      <select class="browser-default custom-select" id="edo" name="edo">
        <option selected disabled>* Estado</option>       
        <option <?php if($edo == 1) echo "selected"; ?> value="1">Activo</option>
        <option <?php if($edo == 2) echo "selected"; ?> value="2">Cancelado</option>
        <option <?php if($edo == 3) echo "selected"; ?> value="3">Realizado</option>
      </select>
    </div>
  </div>     


  <div class="form-row">
    
    <div class="col-md-12 mb-1 md-form">
      <textarea id="datalles" name="datalles" class="md-textarea form-control" rows="3"></textarea>
      <label for="datalles">Detalles de la cita</label>
    </div>

  </div>


  <div class="form-row">
    <div class="col-12 my-12 md-form text-right">
     <button class="btn btn-info btn-rounded my-4" type="submit" id="btn-estado"><i class="fas fa-save mr-1"></i> Guardar </button>
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
