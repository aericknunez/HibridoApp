<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'system/inicio/dashboard.php';
$dash = new Dashboard();

$index = TRUE;

if($_SESSION["tipo_cuenta"] == 1){
  include_once 'system/inicio/cards_admin.php';
} else {
  include_once 'system/inicio/cards.php';
}


?>
