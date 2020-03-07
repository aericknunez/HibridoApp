<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'application/common/Fechas.php';
include_once 'system/inicio/dashboard.php';
$dash = new Dashboard();

$pormes = NULL; /// inicio de mes o inicio en quicena

if($pormes == NULL){
	$finiciox = "01-" . date("m-Y");
	$ffinx = Fechas::UltimoDiaMes() . "-" . date("m-Y");
	$finicio = Fechas::Format($finiciox);
	$ffin = Fechas::Format($ffinx);
	$tdias = Fechas::ContarDias($finiciox, $ffinx);
} else {
	$finiciox = Fechas::InicioQuincena(date("d-m-Y"));
	$ffinx = Fechas::FinQuincena(date("d-m-Y"));
	$finicio = Fechas::Format($finiciox);
	$ffin = Fechas::Format($ffinx);
	$tdias = Fechas::ContarDias($finiciox, $ffinx);
}


$index = TRUE;


if($_SESSION["tipo_cuenta"] == 1){
  include_once 'system/inicio/cards_admin.php';
} else {
  include_once 'system/inicio/cards.php';
}

echo  "Fecha Inicio: " . $finiciox . " | ";
echo  "Fecha Fin: " . $ffinx . " | ";
echo  "Dias Contados: " . $tdias;
?>
