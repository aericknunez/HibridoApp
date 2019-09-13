<?php 
/**
 * class para daah
 */
class Dashboard
{
	
public function __construct()
{
	# code...
}


public function EmpresasAgregadas($username){
	$db = new dbConn();

	$a = $db->query("SELECT * FROM empresa WHERE username = '$username'");
	return $a->num_rows;
	$a->close();	
}


public function ProductosDisponibles($username){
	$db = new dbConn();

	$a = $db->query("SELECT * FROM producto_usuario WHERE username = '$username'");
	return $a->num_rows;
	$a->close();	
}


public function CitasPendientes($username){
	$db = new dbConn();


}



public function ProyeccionEfectivo($username){
	$db = new dbConn();

	$a = $db->query("SELECT id FROM empresa WHERE username = '$username'");
	$precio = 0;
    foreach ($a as $b) {
    		    
    		    $ax = $db->query("SELECT producto FROM producto_empresa WHERE empresa = ".$b["id"]."");
			    foreach ($ax as $bx) {

			    		if ($r = $db->select("precio", "producto_precios", "WHERE producto = ".$bx["producto"]."")) { 
					        $precio = $precio + $r["precio"];
					    }  unset($r);  
			    } $ax->close();
    } $a->close();
   return $precio;
}











} // end class