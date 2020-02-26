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


public function EmpresasAgregadas($username = NULL){
	$db = new dbConn();

	if($username == NULL){
		$a = $db->query("SELECT * FROM empresa");
	} else {
		$a = $db->query("SELECT * FROM empresa WHERE username = '$username'");
	}
	return $a->num_rows;
	$a->close();	
}




public function TratosCerrados($primero, $segundo, $username = NULL){ /// por rango
	$db = new dbConn();

	if($username == NULL){
	    $a = $db->query("SELECT id FROM empresa");
	} else {
	    $a = $db->query("SELECT id FROM empresa WHERE username = '$username'");
	}


	    $num = 0;
    foreach ($a as $b) {
	 	
	 	$ax = $db->query("SELECT * FROM producto_empresa WHERE empresa = '".$b["id"]."' and (edo='3' OR edo='4') and fechaF BETWEEN '$primero' AND '$segundo'");
		if($ax->num_rows > 0) $nx = 1; else $nx = 0;
		$ax->close();	
		$num = $num + $nx;
       
    } $a->close();
return $num;
}






public function VisitasPendientes($primero, $segundo, $username = NULL){ /// por rango
	$db = new dbConn();

	if($username == NULL){
	$a = $db->query("SELECT * FROM visitas WHERE edo = '1' and fechaF BETWEEN '$primero' AND '$segundo'");
	} else {
		$a = $db->query("SELECT * FROM visitas WHERE username = '$username' and edo = '1' and fechaF BETWEEN '$primero' AND '$segundo'");
	}


	return $a->num_rows;
	$a->close();	
}





public function VisitasRealizadas($primero, $segundo, $username = NULL){ /// por rango
	$db = new dbConn();

	if($username == NULL){
	$a = $db->query("SELECT * FROM visitas WHERE edo = '3' and fechaF BETWEEN '$primero' AND '$segundo'");
	} else {
	$a = $db->query("SELECT * FROM visitas WHERE username = '$username' and edo = '3' and fechaF BETWEEN '$primero' AND '$segundo'");
	}

	return $a->num_rows;
	$a->close();	
}







public function PuntosProyectados($primero, $segundo, $username){ /// por rango
	$db = new dbConn();

	$a = $db->query("SELECT id FROM empresa WHERE username = '$username'");
	$precio = 0;
    foreach ($a as $b) {
    		    
    		    $ax = $db->query("SELECT producto FROM producto_empresa WHERE empresa = ".$b["id"]." and fechaF BETWEEN '$primero' AND '$segundo'");
			    foreach ($ax as $bx) {

			    		if ($r = $db->select("puntos", "producto_precios", "WHERE producto = ".$bx["producto"]."")) { 
					        $precio = $precio + $r["puntos"];
					    }  unset($r);  
			    } $ax->close();
    } $a->close();
   return $precio;
}



public function PuntosObtenidos($primero, $segundo, $username){ /// por rango
	$db = new dbConn();

	    $a = $db->query("SELECT id FROM empresa WHERE username = '$username'");
	    $pts = 0;
    foreach ($a as $b) {

    	    	$ax = $db->query("SELECT producto FROM producto_empresa WHERE empresa = '".$b["id"]."' and (edo='3' OR edo='4') and fechaF BETWEEN '$primero' AND '$segundo'");
			    foreach ($ax as $bx) {

			    		if ($r = $db->select("puntos", "producto_precios", "WHERE producto = ".$bx["producto"]."")) { 
					        $pts = $pts + $r["puntos"];
					    }  unset($r);  
			    } $ax->close();
       
    } $a->close();
return $pts;
}













///////////////////////////////////////////////////////////////


public function DineroIngresado($primero, $segundo){ /// por rango
	$db = new dbConn();

    		    
    		    $ax = $db->query("SELECT producto FROM producto_empresa WHERE edo='3' OR edo='4' and fechaF BETWEEN '$primero' AND '$segundo'");
			    foreach ($ax as $bx) {

			    		if ($r = $db->select("precio", "producto_precios", "WHERE producto = ".$bx["producto"]."")) { 
					        $precio = $precio + $r["precio"];
					    }  unset($r);  
			    } $ax->close();

   return $precio;
}




public function DineroProyectado($primero, $segundo){ /// por rango
	$db = new dbConn();

    		    
    		    $ax = $db->query("SELECT producto FROM producto_empresa WHERE edo !='5' and fechaF BETWEEN '$primero' AND '$segundo'");
			    foreach ($ax as $bx) {

			    		if ($r = $db->select("precio", "producto_precios", "WHERE producto = ".$bx["producto"]."")) { 
					        $precio = $precio + $r["precio"];
					    }  unset($r);  
			    } $ax->close();

   return $precio;
}





public function NoEmpleados(){
	$db = new dbConn();

	$a = $db->query("SELECT * FROM perfil WHERE edo = '1'");
	return $a->num_rows;
	$a->close();	
}




public function TratosPendientes($username = NULL){
	$db = new dbConn();

	if($username == NULL){
	    $a = $db->query("SELECT id FROM empresa");
	} else {
	    $a = $db->query("SELECT id FROM empresa WHERE username = '$username'");
	}


	    $num = 0;
    foreach ($a as $b) {
	 	
	 	$ax = $db->query("SELECT * FROM producto_empresa WHERE empresa = '".$b["id"]."' and (edo='1' OR edo='2')");
		if($ax->num_rows > 0) $nx = 1; else $nx = 0;
		$ax->close();	
		$num = $num + $nx;
       
    } $a->close();
return $num;
}























} // end class