<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

include_once 'system/perfil/Perfiles.php';
$perfil = new Perfiles();


  if ($r = $db->select("*", "perfil", "WHERE username = '".$_SESSION["username"]."'")) { 

$nombre = Encrypt::Decrypt($r["nombre"],$_SESSION['secret_key']);
$documento = Encrypt::Decrypt($r["documento"],$_SESSION['secret_key']);
$fecha_nac = Encrypt::Decrypt($r["fecha_nac"],$_SESSION['secret_key']);
$edo_civil = Encrypt::Decrypt($r["edo_civil"],$_SESSION['secret_key']);
$sexo = Encrypt::Decrypt($r["sexo"],$_SESSION['secret_key']);
$pais = Encrypt::Decrypt($r["pais"],$_SESSION['secret_key']);
$departamento = Encrypt::Decrypt($r["departamento"],$_SESSION['secret_key']);
$municipio = Encrypt::Decrypt($r["municipio"],$_SESSION['secret_key']);
$direccion = Encrypt::Decrypt($r["direccion"],$_SESSION['secret_key']);
$email = Encrypt::Decrypt($r["email"],$_SESSION['secret_key']);
$telefono1 = Encrypt::Decrypt($r["telefono1"],$_SESSION['secret_key']);
$telefono2 = Encrypt::Decrypt($r["telefono2"],$_SESSION['secret_key']);
$comentarios = Encrypt::Decrypt($r["comentarios"],$_SESSION['secret_key']);


  }  unset($r);
?>
<div id="msj"></div>
      <!-- Section: Edit Account -->
      <section class="section">
        <!-- First row -->
        <div class="row">
          <!-- First column -->
          <div class="col-lg-4 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                <h5 class="mb-0 font-weight-bold">Editar Foto</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <div id="contenido-img">
                   <?php 
                   $foto = $perfil->GetFotoPerfil($_SESSION["username"]);
                      echo '<img src="assets/img/avatar/'.$foto.'" alt="User Photo" class="z-depth-1 mb-3 img-fluid" />';
                    ?> 
                  </div>

                <p class="text-muted"><small>Esta será la foto que aparecera en su perfil</small></p>
                
                <div class="row flex-center">

					<form id="form-img" name="form-img" class="md-form">
					
					<div class="file-field row">
				        <a class="btn-floating blue-gradient mt-0 float-left btn-sm">
				            <i class="fas fa-paperclip" aria-hidden="true"></i>
				            <input type="file" id="archivo" name="archivo">
				        </a>
				        <div class="file-path-wrapper">
				           <input class="file-path validate" type="text" placeholder="Agregue su Foto">
				        </div>
				    </div>
					
				<button class="btn btn-info btn-rounded btn-sm" type="submit" id="btn-img" name="btn-img">Subir Foto</button>
        </form>
             	
                	
                </div>
<button class="btn btn-danger btn-rounded btn-sm" id="borrar-img" op="12">Eliminar</button>
           
              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->
 

<div class="mt-3" id="dui-msj">
  <?php 
        if($perfil->CompruebaDoc($_SESSION["username"], 1) == TRUE){
          Alerts::Mensajex("Existe Documento adjuntado","success",null,'<a class="btn btn-info btn-rounded btn-sm my-4" id="dui-ver"><i class="fas fa-user mr-1"></i> Agregar </a>');
        } else {
          Alerts::Mensajex("No se encontro Documento","danger",null,'<a class="btn btn-info btn-rounded btn-sm my-4" id="dui-ver"><i class="fas fa-user mr-1"></i> Agregar </a>');
        }
   ?>
</div>
 <div class="card card-cascade narrower" id="dui">
  <div class="row flex-center">
          <form id="form-dui" name="form-dui" class="md-form">
          <input type="hidden" value="1" name="documento">
          <div class="file-field row">
                <a class="btn-floating purple-gradient mt-0 float-left btn-sm">
                    <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                    <input type="file" id="archivo" name="archivo">
                </a>
                <div class="file-path-wrapper">
                   <input class="file-path validate" type="text" placeholder="Agregue su Documento">
                </div>
            </div>
        <a class="btn btn-danger btn-rounded btn-sm my-4" id="dui-hid"><i class="fas fa-ban mr-1"></i> Cancelar </a>
        <button class="btn btn-info btn-rounded btn-sm" type="submit" id="btn-dui" name="btn-dui">Subir Documento</button>
        </form>
</div>              
</div>

<div class="mt-3" id="nit-msj">
  <?php 
        if($perfil->CompruebaDoc($_SESSION["username"], 2) == TRUE){
          Alerts::Mensajex("Existe NIT adjuntado","success",NULL,'<a class="btn btn-info btn-rounded btn-sm my-4" id="nit-ver"><i class="fas fa-user mr-1"></i> Agregar </a>');
        } else {
          Alerts::Mensajex("No se encontro NIT","danger",NULL,'<a class="btn btn-info btn-rounded btn-sm my-4" id="nit-ver"><i class="fas fa-user mr-1"></i> Agregar </a>');
        }
   ?>
</div>

 <div class="card card-cascade narrower" id="nit">
  <div class="row flex-center">
          <form id="form-nit" name="form-nit" class="md-form">
          <input type="hidden" value="2" name="documento">
          <div class="file-field row">
                <a class="btn-floating purple-gradient mt-0 float-left btn-sm">
                    <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                    <input type="file" id="archivo" name="archivo">
                </a>
                <div class="file-path-wrapper">
                   <input class="file-path validate" type="text" placeholder="Agregue su NIT">
                </div>
            </div>
         
         <a class="btn btn-danger btn-rounded btn-sm my-4" id="nit-hid"><i class="fas fa-ban mr-1"></i> Cancelar </a>
         <button class="btn btn-info btn-rounded btn-sm" type="submit" id="btn-nit" name="btn-nit">Subir NIT</button>
        </form>
</div>              
</div>




          </div>
          <!-- First column -->







          <!-- Second column -->
          <div class="col-lg-8 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                <h5 class="mb-0 font-weight-bold">Cambiar Datos</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
 <form id="form-perfil">
                  <!-- First row -->

  <div class="form-row">
    
    <div class="col-md-8 mb-2 md-form">
      <label for="nombre">* Nombre </label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
  </div>

  <div class="col-md-4 mb-2 md-form">
      <label for="documento">* No. Documento</label>
      <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $documento; ?>">
  </div>

  </div>

  

  <div class="form-row">

    <div class="col-md-4 mb-1 md-form">
      <input type="date" id="fecha_nac" name="fecha_nac" class="form-control" value="<?php echo date("Y-m-d", strtotime($fecha_nac)); ?>">
      <label for="fecha_nac">Fecha de Nacimiento</label>
    </div>


    <div class="col-md-4 mb-1 md-form">
      <select class="browser-default custom-select" id="edo_civil" name="edo_civil">
        <option selected disabled>* Estado Civil</option>      
        <option <?php if($edo_civil == 1) echo "selected"; ?> value="1">Solter@</option>
        <option <?php if($edo_civil == 2) echo "selected"; ?> value="2">Casad@</option>
        <option <?php if($edo_civil == 3) echo "selected"; ?> value="3">Divorciad@</option>
        <option <?php if($edo_civil == 4) echo "selected"; ?> value="4">Otros</option>
        
      </select>
    </div>


    <div class="col-md-4 mb-1 md-form">
      <select class="browser-default custom-select" id="sexo" name="sexo">
        <option selected disabled>* Sexo</option>       
        <option <?php if($sexo == 1) echo "selected"; ?> value="1">Masculino</option>
        <option <?php if($sexo == 2) echo "selected"; ?> value="2">Femenino</option>
        <option <?php if($sexo == 3) echo "selected"; ?> value="3">No Especificado</option>
      </select>
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

    <div class="col-md-4 mb-1 md-form">
      <label for="email">* Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
    </div>


    <div class="col-md-4 mb-1 md-form">
      <label for="telefono">* Telefono</label>
      <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono1; ?>">
    </div>


    <div class="col-md-4 mb-1 md-form">
      <label for="celular">* Celular</label>
      <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $telefono2; ?>">
    </div>


  </div> 


  <div class="form-row">
  	
    <div class="col-md-12 mb-1 md-form">
      <textarea id="comentarios" name="comentarios" class="md-textarea form-control" rows="3"><?php echo $comentarios; ?></textarea>
  		<label for="comentarios">Informaci&oacuten adicional</label>
    </div>

  </div>



  <div class="form-row">
        <div class="col-md-6 my-6 md-form text-left">
     <a class="btn btn-success btn-rounded my-4" href="?me"><i class="fas fa-user mr-1"></i> Ver Perfil </a>

    </div>
  	<div class="col-md-6 my-6 md-form text-right">
  	 <button class="btn btn-info btn-rounded my-4" type="submit" id="btn-perfil"><i class="fas fa-user mr-1"></i> Guardar </button>

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

