<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

include_once 'system/empresa/Empresas.php';
$empresa = new Empresas();
?>

<div id="msj"></div>
<h2 class="h2-responsive">PRODUCTOS ASIGNADOS A MIS EMPRESAS</h2>


<div id="contenido">
   <?php $empresa->MyProducts(1, "id", "asc"); ?>
</div>




<!-- modal  -->
<div class="modal" id="ModalCambiar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        DETALLES DE LA EMPRESA</h5>
      </div>
      <div class="modal-body">
<!-- ./  content -->

<!-- ./  content -->
 <form id="form-estado">

<input type="hidden" id="producto" name="producto" value="">

    <div class="form-row text-center">
    <div class="col-md-12 mb-1 md-form">
      <select class="browser-default custom-select" id="edo" name="edo">
        <option selected disabled>* Estado</option>       
        <option <?php if($edo == 1) echo "selected"; ?> value="1">Activo</option>
        <option <?php if($edo == 2) echo "selected"; ?> value="2">En Proceso</option>
        <option <?php if($edo == 3) echo "selected"; ?> value="3">Vendido</option>
        <option <?php if($edo == 4) echo "selected"; ?> value="4">Pagado</option>
        <option <?php if($edo == 5) echo "selected"; ?> value="5">Eliminado</option>
      </select>
    </div>
  </div>     


  <div class="form-row">
    <div class="col-12 my-12 md-form text-right">
     <button class="btn btn-info btn-rounded my-4" type="submit" id="btn-estado"><i class="fas fa-save mr-1"></i> Guardar </button>
    </div>
  </div>


   </form>
<!-- ./  content -->
<!-- ./  content -->
      </div>
      <div class="modal-footer">
<a href="" id="btn-pro" class="btn btn-secondary btn-rounded">Detalles</a>


<a id="cerrarmodal" class="btn btn-primary btn-rounded" data-dismiss="modal">Regresar</a>

          
    
      </div>
    </div>
  </div>
</div>
<!-- ./  Modal -->


