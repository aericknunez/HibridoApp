<?php 
class ApiRest{

	public function __construct() { 
     } 



////////// pra clave demo
     public function CodigoDemo($tipo){

     	$clavex = $tipo . rand(10 , 99) . "0-SV-" . rand(10 , 99) . "0". rand(10 , 99);

     	return $clavex;
     }

	function SanarClave($clave){
		return $res = substr($clave,10,-2);

	}

	function ObtenerCodigo($css, $clave, $td){ // (clave sananda) css clave sin sanar
		$cod = Encrypt::Encrypt($clave . $this->ObtenerRand($css), $td . Fechas::Format(date("d-m-Y")));
		$codigo = substr($cod,0,4);
		return strtoupper($codigo);
	}


	function ValidarCodigo($clave, $codigo, $td){
		$clavex = $this->SanarClave($clave);
		$clavey = $this->ObtenerCodigo($clave, $clavex, $td);

		if($clavey == $codigo){
			return TRUE;
		} else {
			return FALSE;
		}
	}




	function ObtenerTipoCuenta($clave){
		return $tipo = substr($clave,3,1);
	}


	function ObtenerRand($clave){
		return $tipo = substr($clave,0,3);
	}
/// para clave demo










/// administrar bases de datos remotas
	public function AddBd($data){
		$db = new dbConn();
  		
  		if(strlen($data["hash"]) != 36){
  			Alerts::Alerta("error","Error!","El hash no coincide!"); 
  		} else {
  			$datos = array();
		    $datos["hash"] = $data["hash"];
		    $datos["comentarios"] = $data["comentarios"];
		    $datos["sistema"] = $data["sistema"];
		    $datos["fecha"] = date("d-m-Y");
		    $datos["hora"] = date("H:i:s");
		    if ($db->insert("system_dbsync", $datos)) {
		      Alerts::Alerta("success","Agregado!","BD agregado correctamente!");  
		    }
		}    
	   $this->VerHashes(); 	     		
	}


	public function DelBd($datos){
		$db = new dbConn();
  		
  		if ($db->delete("system_dbsync", "WHERE hash = '".$datos["hash"]."'")) {
		        $db->delete("system_dbuser", "WHERE hash = '".$datos["hash"]."'");
		        Alerts::Alerta("success","Eliminado!","Base de datos elimianda correctamente!");
	   
	    }
	   $this->VerHashes(); 	     		
	}


	public function AsisgnarBd($data){
		$db = new dbConn();   
	    if($data["edo"] == 1){
		    $datos = array();
		    $datos["sistema"] = $data["sistema"];
		    $datos["hash"] = $data["hash"];
		    $datos["td"] = $data["td"];
		    if ($db->insert("system_dbuser", $datos)) {
		      Alerts::Alerta("success","Agregado!","Usuario agregado correctamente!");  
		    }
		} else {
	  		if ($db->delete("system_dbuser", "WHERE hash = '".$data["hash"]."' and td = '".$data["td"]."'")) {
			        Alerts::Alerta("success","Eliminado!","Descativado correctamente!");
		    }			
		}

		$this->VerHashes(); 		
	}


	public function VerHashes(){
		$db = new dbConn();

	 $a = $db->query("SELECT * FROM system_dbsync order by id desc");

	if($a->num_rows > 0){
	 echo '<table class="table table-sm table-striped">
			  <thead>
			    <tr>
			    <th scope="col">Hash</th>
			      <th scope="col">Fecha</th>
			      <th scope="col">Hora</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Eliminar</th>
			    </tr>
			  </thead>
			  <tbody>';
	    foreach ($a as $b) {  
		    echo '<tr>
		    	  <th scope="col">'.$b["hash"].'</th>
			      <th scope="col">'.$b["fecha"].'</th>
			      <th scope="col">'.$b["hora"].'</th>			      
			      <th scope="col">'.$b["edo"].'</th>
			      <th scope="col"><a id="eliminardb" op="101" hash="'.$b["hash"].'">
				      <span class="badge red"><i class="fas fa-trash-alt" aria-hidden="true"></i></span></a></th>
			    </tr>
			    <tr>
		    	  <th class="text-danger" colspan="5">'.$b["comentarios"].'</th>
			    </tr>';
			    $this->VerClientesHashes($b["hash"]);
	    } 
	    echo '</tbody>
		    </table>';
		} else {
			Alerts::Mensajex("No se encuentran archivos que sincronizar","danger");
		}
		$a->close();
	}


	public function VerClientesHashes($hash){
		$db = new dbConn();

	 $ac = $db->query("SELECT * FROM system_sistemasactivos order by id desc");

	if($ac->num_rows > 0){

	    foreach ($ac as $bc) {  

	    	$ax = $db->query("SELECT * FROM system_dbuser WHERE hash = '$hash' and td = " . $bc["td"]);
	    	if($ax->num_rows > 0){	    		
	    		
	    		$as = $db->query("SELECT * FROM system_dbsuccess WHERE hash = '$hash' and td = ".$bc["td"]."");
	    		if($as->num_rows > 0){
	    			$edo = "Ejecutado";
	    			$ico = "fa-ban";
	    			$color = "red";
	    			$dir = ''; //nada
	    		} else{
	    			$edo = "Activo";
	    			$ico = "fa-radiation-alt";
	    			$color = "blue";
	    			$dir = 'id="cambiaredo" op="102" edo="0" sistema="'.$bc["sistema"].'" td="'.$bc["td"].'" hash="'.$hash.'"'; // desactivarlo
	    		}
	    		
	    	} else {
	    		$edo = "Inactivo";
	    		$color = "green";
	    		$ico = "fa-asterisk";
	    		$dir = 'id="cambiaredo" op="102" edo="1"  sistema="'.$bc["sistema"].'" td="'.$bc["td"].'" hash="'.$hash.'"'; // activarlo	    		
	    	}

		    echo '<tr>
			      <th scope="col" colspan="3">'.$bc["nombre"].'</th>
			      <th scope="col">'.$edo.'</th>
			      <th scope="col"><a '.$dir.'>
				      <span class="badge '.$color.'"><i class="fas '.$ico.'" aria-hidden="true"></i></span></a></th>
			    </tr>';

			  } 
		}
		$ac->close();
	}

///   termina subida de base de datos 


///////////// agregar imagenes a categoria
 public function Imagenes($src){
  echo ' <div class="row text-center portfolio"> 
   <ul class="gallery"> ';
  $db = new dbConn();
  $images = glob($src . "*.*");  
      foreach($images as $image){  
      
      $image = str_replace($src, "", $image);
      $a = $db->query("SELECT * FROM s1_imagenes WHERE imagen = '$image'");
        if($a->num_rows == 0){
        echo '<li><img src="' . $src . $image .'" alt="image" class="img-fluid img-responsive wow fadeIn" />
        <a id="cimagen" op="105" img="'. $image .'" cat="1" t="1" class="badge badge-success">Rapida</a>
        <a id="cimagen" op="105" img="'. $image .'" cat="2" t="1" class="badge badge-danger">Restaurante</a>
        <a id="cimagen" op="105" img="'. $image .'" cat="3" t="1" class="badge badge-secondary">Bar</a>
        <a id="cimagen" op="105" img="'. $image .'" cat="4" t="1" class="badge badge-info">Cafeteria</a>
        <a id="cimagen" op="105" img="'. $image .'" cat="0" t="1" class="badge badge-info">Nunguno</a></li>';
        } $a->close();
   
 } 
 echo '</ul>
</div>';
}





	public function AddImagen($data){
	$db = new dbConn();  

		if($data["t"] == 1){
			    $datos = array();
			    $datos["imagen"] = $data["img"];
			    $datos["categoria"] = $data["cat"];
			    if ($db->insert("s1_imagenes", $datos)) {
			    	Alerts::Alerta("success","Agregado!","Imagen agregada correctamente!"); 
			    } 
			$this->Imagenes("../../../pizto/assets/img/ico/");
		
		} else {

			$cambio["categoria"] = $data["cat"];		
	  		if($db->update("s1_imagenes", $cambio, "WHERE imagen='".$data["img"]."'")){
			        Alerts::Alerta("success","Eliminado!","Modificado correctamente!");
			}	
			$this->TodasLasImagenes("../../../pizto/assets/img/ico/");
		}
    		
	}



 public function TodasLasImagenes($src){
  echo ' <div class="row text-center portfolio"> 
   <ul class="gallery"> ';
  $db = new dbConn();

    $a = $db->query("SELECT * FROM s1_imagenes order by categoria desc");
    foreach ($a as $b) {

        echo '<li><img src="' . $src . $b["imagen"] .'" alt="image" class="img-fluid img-responsive wow fadeIn" />';
        if($b["categoria"] != 1){
        echo '<a id="cimagen" op="105" img="'. $b["imagen"] .'" cat="1" t="2" class="badge badge-success">Rapida</a>';
        }
        if($b["categoria"] != 2){
        echo '<a id="cimagen" op="105" img="'. $b["imagen"] .'" cat="2" t="2" class="badge badge-danger">Restaurante</a>';
    	}
    	if($b["categoria"] != 3){
        echo '<a id="cimagen" op="105" img="'. $b["imagen"] .'" cat="3" t="2" class="badge badge-secondary">Bar</a>';
    	}
    	if($b["categoria"] != 4){
        echo '<a id="cimagen" op="105" img="'. $b["imagen"] .'" cat="4" t="2" class="badge badge-info">Cafeteria</a>';
    	}
    	if($b["categoria"] != 0){
        echo '<a id="cimagen" op="105" img="'. $b["imagen"] .'" cat="0" t="2" class="badge badge-warning">Nunguno</a></li>';
        }

    } $a->close();

 echo '</ul>
</div>';
}

















} // fin de la clase

 ?>