<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

include_once 'system/producto/Productos.php';
$product = new Productos();


if(isset($_REQUEST["key"])){ /// comprueba la existencia del producto
  if($product->CompruebaExistencia($_REQUEST["key"]) != TRUE){
  echo '<script>
    window.location.href="?producto"
  </script>';
  exit();
  }
}

  if ($r = $db->select("*", "producto", "WHERE id = '".$_REQUEST["key"]."'")) { 
$iden = $r["id"];
$producto = $r["producto"];
$rugro = $r["rugro"];
$caduca = $r["caduca"];
$edo = $r["edo"];
$descripcion = $r["descripcion"];
$condiciones = $r["condiciones"];


  }  unset($r);
?>
<div id="msj"></div>
      <!-- Section: Edit Account -->
      <section class="section">
        <!-- First row -->
        <div class="row">
          







          <!-- Second column -->
          <div class="col-lg-6 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header success-color">
                <h5 class="mb-0 font-weight-bold">Datos del Producto</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
 <form id="form-producto">
                  <!-- First row -->
  <input type="hidden"id="iden" name="iden" value="<?php echo $iden; ?>">

  <div class="form-row">
    
    <div class="col-md-8 mb-2 md-form">
      <label for="producto">* Producto </label>
      <input type="text" class="form-control" id="producto" name="producto" value="<?php echo $producto; ?>">
  </div>

    <div class="col-md-4 my-1 md-form">
      <select class="browser-default custom-select my-4" id="rugro" name="rugro">
        <option selected disabled>* Rugro</option> 

        <?php     
          $ap = $db->query("SELECT * FROM system_rugro");
          foreach ($ap as $bp) {
            if($rugro == $bp["id"]) $s = "selected"; else $s = "";
              echo '<option '.$s.' value="'.$bp["id"].'">'.$bp["rugro"].'</option>';
          } $ap->close();
       ?>    
      </select>
    </div>

  </div>

  

  <div class="form-row">

    <div class="col-md-6 mb-1 md-form">
      <input type="date" id="caduca" name="caduca" class="form-control" value="<?php echo date("Y-m-d", strtotime($caduca)); ?>">
      <label for="caduca">Fecha de Caducidad</label>
    </div>


    <div class="col-md-6 mb-1 md-form">
      <select class="browser-default custom-select" id="edo" name="edo">
        <option selected disabled>* Estado</option>       
        <option <?php if($edo == 1) echo "selected"; ?> value="1">Activo</option>
        <option <?php if($edo == 3) echo "selected"; ?> value="3">Eliminado</option>
        <option <?php if($edo == 2) echo "selected"; ?> value="2">Agotado</option>
      </select>
    </div>


  </div>                  



  <div class="form-row">
  	
    <div class="col-md-12 mb-1 md-form">
      <textarea id="descripcion" name="descripcion" class="md-textarea form-control" rows="3"><?php echo $descripcion; ?></textarea>
  		<label for="descripcion">Descripcion del producto</label>
    </div>

  </div>


  <div class="form-row">
    
    <div class="col-md-12 mb-1 md-form">
      <textarea id="condiciones" name="condiciones" class="md-textarea form-control" rows="3"><?php echo $condiciones; ?></textarea>
      <label for="condiciones">Condiciones del producto</label>
    </div>

  </div>


  <div class="form-row">
        <div class="col-6 my-6 md-form text-left">
     <?php if($iden != NULL){ ?><a class="btn btn-success btn-rounded my-4 btn-sm" href="?pro&key=<?= $iden ?>"><i class="fas fa-user mr-1"></i> Ver Producto </a>
     <?php  } ?>
    </div>
  	<div class="col-6 my-6 md-form text-right">
  	 <button class="btn btn-info btn-rounded my-4" type="submit" id="btn-producto"><i class="fas fa-save mr-1"></i> Guardar </button>

  	</div>
  </div>





                </form>
                <!-- Edit Form -->

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

<div id="usuarios" class="text-center z-depth-1 mt-3">

  <?php 
          if($_REQUEST["key"] != NULL){
              $product->VerUsuarios($_REQUEST["key"]);
          }
       ?>

</div>

          </div>
          <!-- Second column -->




<!-- First column -->
          <div class="col-lg-6 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header warning-color lighten-3">
                <h5 class="mb-0 font-weight-bold">Archivos del producto</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <div id="contenido-archivo">
                  <?php 
                    $product->VerDocumento($_REQUEST["key"]);
         
                   ?>
                </div>

                <p class="text-muted"><small>Archivos subidos al servidor</small></p>
                
                <div class="row flex-center">
<?php if($_REQUEST["key"] != NULL){ ?>
          <form id="form-archivo" name="form-archivo" class="md-form">
          
          <div class="file-field row">
                <a class="btn-floating blue-gradient mt-0 float-left btn-sm">
                    <i class="fas fa-paperclip" aria-hidden="true"></i>
                    <input type="file" id="archivo" name="archivo">
                </a>
                <div class="file-path-wrapper">
                   <input class="file-path validate" type="text" placeholder="Agregar Archivo">
                </div>
            </div>
        <input type="hidden" name="producto" id="producto" value="<?= $iden ?>" >
        <input type="text" name="nombre"  id="nombre" class="form-control" placeholder="Nombre">
        <textarea class="form-control rounded-0" id="descripcion" name="descripcion" rows="3"></textarea>

        <button class="btn btn-info btn-rounded btn-sm" type="submit" id="btn-archivo" name="btn-archivo">Agregar Archivo</button>
        </form>
              
  <?php } ?>                
                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->
 <hr>
                         <!-- Card -->
            <div class="card card-cascade narrower mt-4">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header info-color lighten-3">
                <h5 class="mb-0 font-weight-bold">Precios</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <div id="contenido-precios">
                  <?php 
                    $product->VerPrecios($_REQUEST["key"]);
                   ?>
                </div>

                <p class="text-muted"><small>Precios del Producto</small></p>
                

                <div class="row flex-center">
<?php if($_REQUEST["key"] != NULL){ ?>
          <form id="form-precio" name="form-precio" class="md-form">
          
        <input type="hidden" name="producto" id="producto" value="<?= $iden ?>" >
        
   <div class="form-row">
    
    <div class="col-md-4 mb-2 md-form">
      <label for="producto">* Cantidad </label>
      <input type="number" class="form-control" id="cantidad" name="cantidad" >
  </div>

  <div class="col-md-4 mb-2 md-form">
      <label for="rugro">* Precio</label>
      <input type="number" step="any" class="form-control" id="precio" name="precio">
  </div>
  <div class="col-md-4 mb-2 md-form">
      <label for="rugro">* Puntos</label>
      <input type="number" step="any" class="form-control" id="puntos" name="puntos">
  </div>

  </div>
<input type="text" name="descripcion"  id="descripcion" class="form-control" placeholder="Descripcion">


        <button class="btn btn-info btn-rounded btn-sm" type="submit" id="btn-precio" name="btn-precio">Agregar Precio</button>
        </form>
      <?php } ?>
           </div>


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

