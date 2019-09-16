<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

include_once 'system/empresa/Empresas.php';
$empresa = new Empresas();

  if ($r = $db->select("*", "empresa", "WHERE id = '".$_REQUEST["key"]."'")) { 

$iden = $r["id"];
$nombre = $r["nombre"];
$encargado = $r["encargado"];
$pais = $r["pais"];
$departamento = $r["departamento"];
$municipio = $r["municipio"];
$direccion = $r["direccion"];
$rugro = $r["rugro"];
$giro = $r["giro"];
$telefono = $r["telefono"];
$telefono2 = $r["telefono2"];
$whatsapp = $r["whatsapp"];
$email = $r["email"];
$comentarios = $r["comentarios"];

  }  unset($r);

?>
<div id="msj"></div>
      <!-- Section: Edit Account -->
      <section class="section">
        <!-- First row -->
        <div class="row">
          







          <!-- Second column -->
          <div class="col-lg-7 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header success-color-dark">
                <h5 class="mb-0 font-weight-bold">Datos de la Empresa</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
 <form id="form-empresa">
                  <!-- First row -->
  <input type="hidden"id="iden" name="iden" value="<?php echo $iden; ?>">

  <div class="form-row">
    
    <div class="col-md-8 mb-2 md-form">
      <label for="nombre">* Nombre de la empresa</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
  </div>

  <div class="col-md-4 mb-2 md-form">
      <label for="encargado">* Encargado</label>
      <input type="text" class="form-control" id="encargado" name="encargado" value="<?php echo $encargado; ?>">
  </div>

  </div>



  <div class="form-row">
    
    <div class="col-md-6 mb-2 md-form">
      <label for="rugro">* Rugro de la empresa</label>
      <input type="text" class="form-control" id="rugro" name="rugro" value="<?php echo $rugro; ?>">
  </div>

  <div class="col-md-6 mb-2 md-form">
      <label for="giro">* Giro comercial</label>
      <input type="text" class="form-control" id="giro" name="giro" value="<?php echo $giro; ?>">
  </div>

  </div>



  <div class="form-row">

    <div class="col-md-4 my-1 md-form">
      <select class="browser-default custom-select my-4" id="pais" name="pais">
        <option selected disabled>* Pais</option> 

        <?php     
          $ap = $db->query("SELECT * FROM system_paises");
          foreach ($ap as $bp) {
            if($pais == $bp["id"]) $s = "selected"; else $s = "";
              echo '<option '.$s.' value="'.$bp["id"].'">'.$bp["pais"].'</option>';
          } $ap->close();
       ?>    
      </select>
    </div>


    <div class="col-md-4 mb-1 md-form" id="dep">
      <select class="browser-default custom-select my-1" id="departamento" name="departamento">
        <option selected disabled>* Departamento</option> 

        <?php     
          $ad = $db->query("SELECT * FROM system_departamentos WHERE pais = '".$pais."'");
          foreach ($ad as $bd) {
            if($departamento == $bd["id"]) $d = "selected"; else $d = "";
              echo '<option '.$d.' value="'.$bd["id"].'">'.$bd["departamento"].'</option>';
          } $ad->close();
       ?>    
      </select>
    </div>


    <div class="col-md-4 mb-1 md-form">
      <label for="municipio">* Municipio</label>
      <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo $municipio; ?>">
    </div>


  </div> 


  <div class="form-row">

    <div class="col-md-12 mb-1 md-form">
      <label for="direccion">* Dirección</label>
      <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>">
    </div>

  </div> 




  <div class="form-row">

    <div class="col-md-3 mb-1 md-form">
      <label for="email">* Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
    </div>


    <div class="col-md-3 mb-1 md-form">
      <label for="telefono">* Telefono</label>
      <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
    </div>


    <div class="col-md-3 mb-1 md-form">
      <label for="telefono2">* Celular</label>
      <input type="text" class="form-control" id="telefono2" name="telefono2" value="<?php echo $telefono2; ?>">
    </div>

    <div class="col-md-3 mb-1 md-form">
      <label for="celular">* WhatsApp</label>
      <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo $whatsapp; ?>">
    </div>
  </div> 


  <div class="form-row">
  	
    <div class="col-md-12 mb-1 md-form">
      <textarea id="comentarios" name="comentarios" class="md-textarea form-control" rows="3"><?php echo $comentarios; ?></textarea>
  		<label for="comentarios">Informaci&oacuten adicional</label>
    </div>

  </div>



  <div class="form-row">
    <div class="col-6 my-6 md-form text-left">
        <?php 
            if($_REQUEST["key"] != NULL){
              echo '<a class="btn btn-success btn-rounded my-4 btn-sm" href="?verempresa&key='.$iden.'"><i class="fas fa-user mr-1"></i> Ver Datos </a>'; }
         ?>

    </div>
  	<div class="col-6 my-6 md-form text-right">
  	 <button class="btn btn-info btn-rounded my-4" type="submit" id="btn-empresa"><i class="fas fa-save mr-1"></i> Guardar </button>

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








<!-- First column -->
          <div class="col-lg-5 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header warning-color-dark">
                <h5 class="mb-0 font-weight-bold">Productos Asignados</h5>
              </div>
              <!-- Card image -->
              <div id="empresas">
                <?php 
                if($_REQUEST["key"] != NULL){
                    $empresa->VerEmp($_REQUEST["key"]);
                } else {
                  Alerts::Mensajex("Debe agregar la información de la empresa primero","danger");
                }                  
               ?>
              </div>
                
              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">


              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->
 

</div>
<!-- termina primera columna -->
<!-- First column -->




        </div>
        <!-- First row -->

      </section>
      <!-- Section: Edit Account -->

