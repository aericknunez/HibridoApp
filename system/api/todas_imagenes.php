<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/common/Alerts.php';

include_once 'system/api/Api.php';
$api = new ApiRest;

?>
<h1 class="h1-responsive">Seleccionar la categoria de la imagen</h1>

<?php   
echo '<div id="contenido">';
$api->TodasLasImagenes("assets/img/icox/");
echo '</div>';
 ?>
