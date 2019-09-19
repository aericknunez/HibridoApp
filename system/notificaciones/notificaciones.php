<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';

include_once 'system/notificaciones/Notifi.php';
$notificaciones = new Notifi();


if($_REQUEST["key"] != NULL){
 $redirect =  $notificaciones->RedirectNotifi($_REQUEST["key"]); 
}

if($redirect == NULL){
  echo '<script>
  window.location.href="?"
</script>';
} else {
  echo '<script>
  window.location.href="'.$redirect.'"
</script>';
}

?>