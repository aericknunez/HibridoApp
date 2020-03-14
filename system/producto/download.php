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
    echo '<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Documento</th>
      <th scope="col">Descripci&oacuten</th>
      <th scope="col">Descargar</th>
    </tr>
  </thead>
  <tbody>'; 
  $n=1;
    foreach ($a as $b) {
      $info = new SplFileInfo($b["archivo"]);
      $ext = $info->getExtension();
 
   echo '<tr>
      <th scope="row">'. $n++ .'</th>
      <td>'. $b["nombre"] .'</td>
      <td>'.$ext.'</td>
      <td>'.$b["descripcion"].'</td>
      <td><a href="download.php?data='. $b["archivo"] .'&name='. $b["nombre"] .'" data-toggle="tooltip" data-html="true"
  title="<b>'.$b["descripcion"].'</b>"><i class="fas fa-cloud-download-alt fa-lg red-text"></i>
      </a></td>
    </tr>';
  //     echo '<figure class="figure">
  //     <a href="download.php?data='. $b["archivo"] .'&name='. $b["nombre"] .'" data-toggle="tooltip" data-html="true"
  // title="<b>'.$b["descripcion"].'</b>">
  //     <img src="assets/img/ico/'.$ext.'.png" class="img-thumbnail img-responsive img-fluid z-depth-1" style="width: 150px">
  //     <figcaption class="figure-caption text-center">'.$b["nombre"].'</figcaption>
  //     </a>
  //   </figure>';

    } $a->close();

    echo '</tbody>
        </table>';
?>