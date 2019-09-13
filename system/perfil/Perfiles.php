<?php 
class Perfiles{

	public function __construct() { 
     } 


	public function CompruebaPerfil($username){
		$db = new dbConn();

		$a = $db->query("SELECT * FROM perfil WHERE username = '$username' and edo = '1'");
		if($a->num_rows > 0) return TRUE;
		else return FALSE;
		$a->close();
	}



	public function AddDatos($data){
		$db = new dbConn();

		if($data["nombre"] != NULL and $data["documento"] != NULL){
			if($this->CompruebaPerfil($_SESSION["username"]) == TRUE){
				// actualizar
			$this->Actualizar($data);
			$this->ActualizarNombre($data["nombre"]);
			} else {
				// Insertar
			$this->Insertar($data);
			$this->ActualizarNombre($data["nombre"]);
			}
		} else {
		        Alerts::Alerta("error","Error!","faltan datos importante!");
		}

	}


	public function Actualizar($data){
		$db = new dbConn();
		    $cambio = array();
		    $cambio["nombre"] = Encrypt::Encrypt($data["nombre"],$_SESSION['secret_key']);
		    $cambio["documento"] = Encrypt::Encrypt($data["documento"],$_SESSION['secret_key']);
		    $cambio["fecha_nac"] = Encrypt::Encrypt(date("d-m-Y", strtotime($data["fecha_nac"])),$_SESSION['secret_key']);
		    $cambio["edo_civil"] = Encrypt::Encrypt($data["edo_civil"],$_SESSION['secret_key']);
		    $cambio["sexo"] = Encrypt::Encrypt($data["sexo"],$_SESSION['secret_key']);
		    $cambio["pais"] = Encrypt::Encrypt($data["pais"],$_SESSION['secret_key']);
		    $cambio["departamento"] = Encrypt::Encrypt($data["departamento"],$_SESSION['secret_key']);
		    $cambio["municipio"] = Encrypt::Encrypt($data["municipio"],$_SESSION['secret_key']);
		    $cambio["direccion"] = Encrypt::Encrypt($data["direccion"],$_SESSION['secret_key']);
		    $cambio["email"] = Encrypt::Encrypt($data["email"],$_SESSION['secret_key']);
		    $cambio["telefono1"] = Encrypt::Encrypt($data["telefono"],$_SESSION['secret_key']);
		    $cambio["telefono2"] = Encrypt::Encrypt($data["celular"],$_SESSION['secret_key']);
		    $cambio["comentarios"] = Encrypt::Encrypt($data["comentarios"],$_SESSION['secret_key']);
		    if ($db->update("perfil", $cambio, "WHERE username='".$_SESSION["username"]."'")) {
		        Alerts::Alerta("success","Actualizado!","Actualizado correctamente!");
		        echo '<script>
					window.location.href="?me"
				</script>';
		    } else {
		        Alerts::Alerta("error","Error!","Sucedio un error!");
		    }
	    
	}


	public function ActualizarNombre($nombre){
		$db = new dbConn();
		    $cambio = array();
		    $cambio["nombre"] = $nombre;
		    $db->update("login_userdata", $cambio, "WHERE user='".$_SESSION["user"]."'");
	}


	public function Insertar($data){
		$db = new dbConn();
		    $datos = array();
		    $datos["nombre"] = Encrypt::Encrypt($data["nombre"],$_SESSION['secret_key']);
		    $datos["documento"] = Encrypt::Encrypt($data["documento"],$_SESSION['secret_key']);
		    $datos["fecha_nac"] = Encrypt::Encrypt(date("d-m-Y", strtotime($data["fecha_nac"])),$_SESSION['secret_key']);
		    $datos["edo_civil"] = Encrypt::Encrypt($data["edo_civil"],$_SESSION['secret_key']);
		    $datos["sexo"] = Encrypt::Encrypt($data["sexo"],$_SESSION['secret_key']);
		    $datos["pais"] = Encrypt::Encrypt($data["pais"],$_SESSION['secret_key']);
		    $datos["departamento"] = Encrypt::Encrypt($data["departamento"],$_SESSION['secret_key']);
		    $datos["municipio"] = Encrypt::Encrypt($data["municipio"],$_SESSION['secret_key']);
		    $datos["direccion"] = Encrypt::Encrypt($data["direccion"],$_SESSION['secret_key']);
		    $datos["email"] = Encrypt::Encrypt($data["email"],$_SESSION['secret_key']);
		    $datos["telefono1"] = Encrypt::Encrypt($data["telefono"],$_SESSION['secret_key']);
		    $datos["telefono2"] = Encrypt::Encrypt($data["celular"],$_SESSION['secret_key']);
		    $datos["comentarios"] = Encrypt::Encrypt($data["comentarios"],$_SESSION['secret_key']);
		    $datos["username"] = $_SESSION['username'];
		    $datos["edo"] = 1;
			    if ($db->insert("perfil", $datos)) {
			        Alerts::Alerta("success","Agregado!","Datos Agregados!");
			        echo '<script>
					window.location.href="?me"
				</script>';
			    } 
	}









	public function GetFotoPerfil($username){
		$db = new dbConn();

		    if ($r = $db->select("foto", "perfil_fotos", "WHERE username = '$username' and edo = 1")) { 
	       	$foto = $r["foto"];  	    	
	    	}  unset($r); 

		    if($foto == NULL){ 
   				return "default.jpg";
   			} else { 
   				return $foto; 
   			}
	}





   public function SaveFotoPerfil($img){ // guarda imagen del producto
   $db = new dbConn();
      
      if($img != NULL){
          $datos = array();
          $datos["foto"] = $img;
          $datos["username"] = $_SESSION["username"];
          $datos["edo"] = 1;
              if ($db->insert("perfil_fotos", $datos)) {
		       $i = $db->insert_id();
    		   $cambio = array();
			   $cambio["edo"] = 0;
			   $db->update("perfil_fotos", $cambio, "WHERE username='".$_SESSION["username"]."' and id != " . $i . "");
		    }  
		} else {
		        Alerts::Alerta("error","Error!","faltan datos importante!");
		}  
   }



   public function BorrarImagen(){ // borrar imagenes
   $db = new dbConn();
		    $cambio = array();
		    $cambio["edo"] = 0;
 			$db->update("perfil_fotos", $cambio, "WHERE username='".$_SESSION["username"]."'");
   }



   public function VerPerfil(){
   	$db = new dbConn();
	
	$foto = $this->GetFotoPerfil($_SESSION["username"]);
	    
	    if ($r = $db->select("nombre, documento, email", "perfil", "WHERE username = '".$_SESSION["username"]."'")) { 
	        $nombre = Encrypt::Decrypt($r["nombre"],$_SESSION["secret_key"]);
	        $documento = Encrypt::Decrypt($r["documento"],$_SESSION["secret_key"]);
	        $email = Encrypt::Decrypt($r["email"],$_SESSION["secret_key"]);
	    } unset($r);  


   	echo '<section class="card profile-card mb-4 text-center">
              <div class="avatar z-depth-1-half">
                <img src="assets/img/avatar/'.$foto.'" alt="" class="img-fluid">
              </div>
              <!-- Card content -->
              <div class="card-body">
                <!-- Title -->
                <h4 class="card-title"><strong>'.$nombre.'</strong></h4>
                <h5>'.$documento.'</h5>
                <p class="dark-grey-text">'.$email.'</p>

                <!-- Social -->
                <a type="button" class="btn-floating btn-small"><i class="fab fa-facebook-f grey-text"></i></a>
                <a type="button" class="btn-floating btn-small"><i class="fab fa-twitter grey-text"></i></a>
                <a type="button" class="btn-floating btn-small"><i class="fab fa-linkedin-in grey-text"></i></a>

                <!-- Text -->
                <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of
                  the cards content.
                </p>

                <button type="button" class="btn btn-info btn-rounded btn-sm" data-toggle="modal" data-target="#modalContactUser">Contact<i
                    class="fas fa-paper-plane ml-2"></i></button>
              </div>

            </section>';

   }






//////// documento

	public function CompruebaDoc($username,$doc){
		$db = new dbConn();

		$a = $db->query("SELECT * FROM perfil_documentos WHERE username = '$username' and tipo = '$doc' and edo = '1'");
		if($a->num_rows > 0) return TRUE;
		else return FALSE;
		$a->close();
	}


   public function SubirDocumento($img,$tipo){ // guarda imagen del documento
   $db = new dbConn();

   		if($img != NULL and $tipo != NULL){
          $datos = array();
          $datos["username"] = $_SESSION["username"];
          $datos["documento"] = $img;
          $datos["tipo"] = $tipo;
          $datos["edo"] = 1;
          $db->insert("perfil_fotos", $datos); 

              if ($db->insert("perfil_documentos", $datos)) {
		       $i = $db->insert_id();
    		   $cambio = array();
			   $cambio["edo"] = 0;
			   $db->update("perfil_documentos", $cambio, "WHERE username='".$_SESSION["username"]."' and tipo = '$tipo' and id != " . $i . "");
		    }  
		}  else {
		        Alerts::Alerta("error","Error!","faltan datos importante!");
		}
		    if($tipo == 1){ $tip = "dui"; $leg = "Documento"; } else { $tip = "nit"; $leg = "NIT"; }
		if($this->CompruebaDoc($_SESSION["username"], $tipo) == TRUE){
          Alerts::Mensajex("Existe ". $leg ." adjuntado","success",null,'<a class="btn btn-info btn-rounded btn-sm my-4" id="'.$tip.'-ver"><i class="fas fa-user mr-1"></i> Agregar </a>');
        } else {
          Alerts::Mensajex("No se encontro ". $leg ."","danger",null,'<a class="btn btn-info btn-rounded btn-sm my-4" id="'.$tip.'-ver"><i class="fas fa-user mr-1"></i> Agregar </a>');
        }

   }





   public function VerDepartamentos($iden, $departamento = NULL){ // departamentos
   $db = new dbConn();
    
    $a = $db->query("SELECT * FROM system_departamentos WHERE pais = ".$iden."");
    echo '<select class="browser-default custom-select my-1" id="departamento" name="departamento">
    		<option selected disabled>* Departamento</option>';
    foreach ($a as $b) {
        echo '<option value="'.$b["id"].'">'.$b["departamento"].'</option>';
    } $a->close();
    echo '</select>';
}










} // fin de la clase

 ?>