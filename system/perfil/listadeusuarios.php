<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Encrypt.php';

?>


<h2 class="h2-responsive">LISTADO DE USUARIOS</h2>
<?php 

    $a = $db->query("SELECT * FROM perfil");
    echo '<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Documento</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Ver</th>
    </tr>
  </thead>
  <tbody>'; 
  $n=1;
    foreach ($a as $b) {

   echo '<tr>
      <th scope="row">'. $n++ .'</th>
      <td>'. $b["nombre"] .'</td>
      <td>'.$b["documento"].'</td>
      <td>'.$b["email"].'</td>
      <td>'.$b["telefono1"].' '.$b["telefono2"].'</td>
      <td><a href="verusuario&username='. $b["username"] .'"><i class="fas fa-cloud-download-alt fa-lg red-text"></i>
      </a></td>
    </tr>';

    } $a->close();

    echo '</tbody>
        </table>';
?>