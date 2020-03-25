<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/common/Alerts.php';

include_once 'system/api/Api.php';
$api = new ApiRest;

?>
<h1 class="h1-responsive">Subir Base de datos</h1>

<?php   
echo '<div id="contenido">';
$api->VerHashes();
echo '</div>';
 ?>

 <div class="row d-flex justify-content-center text-center">
	  <div class="col-sm-6">

	 <pre>Agregar nuevo registro</pre>	

	<form class="text-center border border-light p-2" method="post" id="form-new-hash" name="form-new-hash">
	
 	<input type="text"  id="hash" name="hash" class="form-control mb-3" placeholder="hash">
	<select class="browser-default custom-select mb-3" id="sistema" name="sistema">
		  <option value="1">RESTAURANTE</option>
		  <option value="2">PRODUCTOS</option>
		</select>
	<textarea type="text" id="comentarios" name="comentarios" class="form-control mb-3"></textarea>
	<button class="btn btn-success" type="submit" id="btn-new-hash" name="btn-new-hash">AGREGAR</button>
	</form>

	  </div>
	</div>