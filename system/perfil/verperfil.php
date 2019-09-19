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


      <section id="about" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 text-center">
                   <?php 
                  $foto = $perfil->GetFotoPerfil($_SESSION["username"]);
                  echo '<img src="assets/img/avatar/'.$foto.'" alt="User Photo" class="z-depth-1 mb-3 img-fluid" />';

                  if($foto == "default.jpg"){
                        echo '<div class="col-md-12 text-center"><a class="btn btn-success btn-rounded btn-sm" href="?perfil#contenido-img"><i class="fas fa-plus mr-1"></i> Agregar Foto </a></div>';
                      }
                    ?>

                  <div>
                    <div class="text-center">Documentos de Identidad</div>
                      <?php 
                        if($perfil->CompruebaDoc($_SESSION["username"], 1) == TRUE){
                          Alerts::Mensajex("Existe Documento adjuntado","success",null,NULL);
                        } else {
                          Alerts::Mensajex("No se encontro Documento","danger",null,'<a href="?perfil" class="btn btn-info btn-rounded btn-sm my-4"><i class="fas fa-plus mr-1"></i> Agregar </a>');
                        }
                        if($perfil->CompruebaDoc($_SESSION["username"], 2) == TRUE){
                          Alerts::Mensajex("Existe NIT adjuntado","success",null,NULL);
                        } else {
                          Alerts::Mensajex("No se encontro NIT","danger",null,'<a href="?perfil" class="btn btn-info btn-rounded btn-sm my-4"><i class="fas fa-plus mr-1"></i> Agregar </a>');
                        }
                   ?>
                  </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        
                          <blockquote class="blockquote bq-danger">
                          <p class="bq-title"><?php echo $nombre; ?></p>
                          <p><?php echo $comentarios; ?></p>
                        </blockquote>

                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> Documento: </span> <span class="pro-detail"><?php echo $documento; ?></span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> Fecha de Nacimiento: </span> <span class="pro-detail"><?php echo $fecha_nac; ?></span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> Estado Civil: </span> <span class="pro-detail"><?php echo Helpers::EdoCivil($edo_civil); ?></span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> Sexo: </span> <span class="pro-detail"><?php echo Helpers::Sexo($sexo); ?></span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> Pais: </span> <span class="pro-detail"><?php echo Helpers::Pais($pais); ?></span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> Departamento: </span> <span class="pro-detail"><?php echo Helpers::Departamento($departamento); ?></span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> Municipio: </span> <span class="pro-detail"><?php echo $municipio; ?></span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> Dirección: </span> <span class="pro-detail"><?php echo $direccion; ?></span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> E-mail: </span> <span class="pro-detail"><?php echo $email; ?></span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> Teléfono: </span> <span class="pro-detail"><?php echo $telefono1; ?></span></li>
                  <li class="list-group-item d-flex justify-content-between align-items-center"><span> Celular: </span> <span class="pro-detail"><?php echo $telefono2; ?></span></li>

                </ul>

                  <div class="row">
                        <div class="col-md-6 my-6 md-form text-left">
                     

                    </div>
                    <div class="col-md-6 my-6 md-form text-right">
                     <a class="btn btn-success btn-rounded btn-sm my-4" href="?perfil"><i class="fas fa-user mr-1"></i> Modificar Información </a>

                    </div>
                  </div>


               </div>


                </div>
            </div>
        </section>