<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';

if($_SESSION["config_edo"] == NULL){
	Alerts::Mensajex("No se encuentran datos de este usuario, por favor llene los datos que son solicitados","danger",'<a id="cambiar" op="14" class="btn btn-danger"> Ingresar Datos</a>');
}
?>
