<?php 
/**
 * class para daah
 */
class Notifi
{
	
public function __construct()
{
	# code...
}


public function AddNotifi($not, $redi, $username = NULL, $op = NULL){
	$db = new dbConn();

	if($username == NULL){ // obtener todos los usuarios
	
		$a = $db->query("SELECT username FROM perfil WHERE edo = 1");
	    foreach ($a as $b) {

			$datos = array();
		    $datos["notificacion"] = $not;
		    $datos["redirect"] =  $this->Redirect($redi, $op);
		    $datos["username"] = $b["username"];
		    $datos["edo"] = 1;
		    $db->insert("notificaciones", $datos);

	    } $a->close();


	} else { // usuario especifico
		$datos = array();
	    $datos["notificacion"] = $not;
	    $datos["redirect"] =  $this->Redirect($redi, $op);
	    $datos["username"] = $username;
	    $datos["edo"] = 1;
	    $db->insert("notificaciones", $datos); 
	}

}

public function Redirect($redirect, $op = NULL){
	if($redirect == 1) return "?pro&key=" . $op; // producto
	if($redirect == 2) return "?historial"; // hay una cita hoy
	if($redirect == 3) return "?download"; // nuevo documento
}


   public function VerNotifi(){ // ver notificaciones
   $db = new dbConn();

    $a = $db->query("SELECT * FROM notificaciones WHERE username = '".$_SESSION["username"]."' and edo = 1");
 	
 	$number = $a->num_rows;
     	echo '<li class="nav-item dropdown notifications-nav">
          <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">';
             if($number > 0){
          echo '<span class="badge red">'.$number.'</span>';
             }            
          echo '<i class="fas fa-bell"></i>
          <span class="d-none d-md-inline-block">Notificaciones</span>
          </a>';  
    if($number > 0){
    	echo ' <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">';
	    foreach ($a as $b) {
	    	echo '<a class="dropdown-item" href="?notificaciones&key='.$b["id"].'">
	              <i class="far fa-bell mr-2" aria-hidden="true"></i>
	              <span>'.$b["notificacion"].'</span>
	            </a>';
	    } echo ' </div>';
	} 
	echo '</li>';
    $a->close();
 }



public function RedirectNotifi($not){
	$db = new dbConn();

	if ($r = $db->select("redirect", "notificaciones", "WHERE id = '".$not."'")) { 
        $redir = $r["redirect"];
    } unset($r);  


    $cambio = array();
    $cambio["edo"] = 0;
    if ($db->update("notificaciones", $cambio, "WHERE id='".$not."'")) {
        return $redir;
    } else {
    	return NULL;
    }

}





} // end class