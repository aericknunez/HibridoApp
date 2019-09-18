<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

include_once 'system/producto/Productos.php';
$product = new Productos();


?>


<h2 class="h2-responsive">DOCUMENTOS A DESCARGAR</h2>
<?php 

    $a = $db->query("SELECT * FROM producto_archivos");
    foreach ($a as $b) {
      $info = new SplFileInfo($b["archivo"]);
      $ext = $info->getExtension();
      echo '
      <figure class="figure">
      <a href="download.php?data='. $b["archivo"] .'&name='. $b["nombre"] .'" data-toggle="tooltip" data-html="true"
  title="<b>'.$b["descripcion"].'</b>">
      <img src="assets/img/ico/'.$ext.'.png" class="img-thumbnail img-responsive img-fluid z-depth-1" style="width: 150px">
      <figcaption class="figure-caption text-center">'.$b["nombre"].'</figcaption>
      </a>
    </figure>';

    } $a->close();

?>