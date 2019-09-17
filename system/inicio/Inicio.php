<?php 
class Inicio{

	public function __construct() { 
     } 

   
     	static public function RegisterInOut($edo){
		$db = new dbConn();
		    $datos = array();
		    $datos["user"] = $_SESSION['user'];
		    $datos["nombre"] = $_SESSION['nombre'];
		    $datos["accion"] = $edo;
		    $datos["ip"] = Helpers::GetIp();
		    $datos["navegador"] = $_SERVER["HTTP_USER_AGENT"];
		    $datos["fecha"] = date("d-m-Y");
		    $datos["fechaF"] = Fechas::Format(date("d-m-Y"));
		    $datos["hora"] = date("H:i:s");
		    $db->insert("login_inout", $datos); 		
	}







} // fin de la clase

 ?>

