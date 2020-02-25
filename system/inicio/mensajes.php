<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';

if($_SESSION["config_edo"] == NULL){
?>
<!-- Projects section v.4 -->
<section class="text-center my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5">Bienvenid@!</h2>
  <!-- Section description -->
  <p class="black-text text-center w-responsive mx-auto mb-5">Gracias por formar parte de nuestro gran equipo, somos una empresa muy muy responsable y dedicada a lo que hacemos, nos gusta siempre dar lo mejor que tenemos, eso nos hace diferentes y especiales. Si estás aquí es porque creemos que tu talento vale la pena. Como empresa deseamos que tú también des lo mejor de ti y que juntos avancemos hacia el éxito. </p>

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-12 mb-4">
      <div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/img%20%2832%29.jpg);">
        <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 rounded">
          <div>
            <h6 class="blue-text">
              <i class="fas fa-user"></i>
              <strong> Hibrido</strong>
            </h6>
            <h3 class="py-3 font-weight-bold">
              <strong>Tu información es importante para nosotros </strong>
            </h3>
            <p class="pb-3">Por favor llena el perfil con tu información, esto nos ayudara a tener buena comunicación, además debes adjuntar fotografías legibles de tus documentos de identidad. Nuestra plataforma es completamente segura y toda la información se encuentra cifrada 
            </p>
            <a id="cambiar" op="14" class="btn btn-secondary btn-rounded btn-md"><i class="fas fa-clone left"></i> Continuar ...</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Grid column -->
<p class="black-text text-center w-responsive mx-auto mb-5">Si aun no sabes acercade nosotros puedes revisar nuestro sitio web <a href="https://hibridosv.com" target="blank">Hibrido</a> o la de alguno de nuestros productos <a href="https://pizto.com" target="blank">Pizto</a></p>


  </div>
  <!-- Grid row -->

</section>
<!-- Projects section v.4 -->
<?
}
?>
