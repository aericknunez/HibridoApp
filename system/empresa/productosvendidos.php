<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

include_once 'system/empresa/Empresas.php';
$empresa = new Empresas();
?>

<div id="msj"></div>
<h2 class="h2-responsive">PRODUCTOS VENDIDOS</h2>


<div id="contenido">
   <?php $empresa->ProductosVendidos(1, "id", "asc"); ?>
</div>



<!-- modal  -->
<div class="modal" id="ModalVendidos" tabindex="-1" role="dialog" aria-labelledby="ModalVendidos" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        ACTIVAR SISTEMA</h5>
      </div>
      <div class="modal-body">
<!-- ./  content -->

<div id="vista"></div>

<!-- ./  content -->
      </div>
      <div class="modal-footer">
<a id="cerrarmodal" class="btn btn-primary btn-rounded" data-dismiss="modal">Regresar</a>

          
    
      </div>
    </div>
  </div>
</div>
<!-- ./  Modal -->


