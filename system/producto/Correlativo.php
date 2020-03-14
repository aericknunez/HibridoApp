<?php 
/**
 * aqui va la calse para registrar
 */
class Correlativo {
	
	function __construct(){
		# code...
	}


	public function BuscaCorrelativo($data){ /// busca si necesita un correlativo
	      $db = new dbConn();
	       
	    $a = $db->query("SELECT * FROM producto_correlativo WHERE producto = '".$data["producto"]."' and empresa = '".$data["empresa"]."'");
	      if($a->num_rows > 0){
	       return TRUE; 
		   } else { 
		   	return FALSE; 
		   }
	      $a->close(); 
	    }

	public function MuestraCorrelativo($data){ /// revisa si se proceso el correlativo
	      $db = new dbConn();
	       
	    $a = $db->query("SELECT * FROM producto_correlativo WHERE producto = '".$data["producto"]."' and empresa = '".$data["empresa"]."' and edo='2'");
	      if($a->num_rows > 0){
	       return TRUE; 
		   } else { 
		   	return FALSE; 
		   }
	      $a->close(); 
	    }




	public function Opciones($data){ // muesta las opciones
	      $db = new dbConn();     
	      	if($this->BuscaCorrelativo($data) == TRUE){ // si ya hay registro de activacion
	 			if($this->MuestraCorrelativo($data) == FALSE){

	 $clavex = $data["codigo"] . "-" . $this->CodigoPaisEmpresa($data["empresa"]) . "-". rand(10,99) . $this->ObtenerTd($this->ObtenerTipo($data["codigo"])) . rand(10,99);

		$clave = $this->SanarClave($clavex);
		$codigo = $this->ObtenerCodigo($clave, md5($clave));

	      		echo '<div>
	      			<p class="text-center">Clave de activación</p>
					</div>
					
					<div>
	      			<h2 class="text-center">'.$clavex.'</h2>
					</div>
					<div >
	      			<p class="text-center">Codigo </p>
					</div>
					<div>
	      			<h3 class="text-center">'.$codigo.'</h3>
					</div>
					<div class="text-center">
	      			<a id="activar" op="47" codigo="'.$codigo.'" clave="'.$clavex.'" correlativo="'.$clave.'" empresa="'.$data["empresa"].'" producto="'.$data["producto"].'" class="btn btn-danger" data-dismiss="modal">Sistema Activado</a>
					</div>
					';
				} else {
					Alerts::Mensajex("Producto activado","info");
				}		
	      	} else { // si no hay registro
	      		echo '<div class="row">
	      				<p class="text-center">Desea generar un codigo para este producto?</p>
					  <a id="activarcodigo" op="45" codigo="'.$data["codigo"].'" empresa="'.$data["empresa"].'" producto="'.$data["producto"].'" class="btn btn-success" data-dismiss="modal">Activar</a>
					  <a id="desactivarcodigo" op="46" codigo="'.$data["codigo"].'" empresa="'.$data["empresa"].'" producto="'.$data["producto"].'" class="btn btn-danger" data-dismiss="modal">Desactivar</a>
					</div>';
	      	}
	}


	public function Insertar($data){
		$db = new dbConn();
		    $datos = array();
		    $datos["tipo"] = $this->ObtenerTipo($data["codigo"]);
		    $datos["producto"] = $data["producto"];
		    $datos["empresa"] = $data["empresa"];
		    $datos["edo"] = 1;
			    if ($db->insert("producto_correlativo", $datos)) {

    	        $cambio = array();
	            $cambio["correlativo"] = 1;
	            $db->update("producto_empresa", $cambio, "WHERE producto='".$data["producto"]."' and empresa='".$data["empresa"]."'");

			        Alerts::Alerta("success","Agregado!","Datos Agregados!");
			    } else {
			    	 Alerts::Alerta("error","Error!","No se agragaron los datos!");
			    }
	}

/// obetener el tipo
	public function ObtenerTipo($clave){
		$res = substr($clave,0,1);

		if($res == "R"){
			return 1;
		}
		if($res == "P"){
			return 2;
		} 
	}


//// descativar codigo del producto
   public function QuitarClave($data){
   $db = new dbConn();
        $cambio = array();
            $cambio["correlativo"] = 2;
             if($db->update("producto_empresa", $cambio, "WHERE producto='".$data["producto"]."' and empresa='".$data["empresa"]."'")){
                Alerts::Alerta("success","Descativos!","Clave desactivada correctamente!");
            } else {
               Alerts::Alerta("error","Error!","No se agragaron los datos!");
            }
  }



//// activar codigo del producto
   public function Activar($data){
   $db = new dbConn();
        $cambio = array();
        	$cambiox["correlativo"] = $data["correlativo"];
            $cambio["correlativo"] = $data["correlativo"];
            $cambio["user_registro"] = $_SESSION["username"];
            $cambio["fecha"] = date("d-m-Y");
            $cambio["hora"] = date("H:i:s");
            $cambio["fechaF"] = Fechas::Format(date("d-m-Y"));
            $cambio["clave"] = $data["clave"];
            $cambio["codigo"] = $data["codigo"];
            $cambio["edo"] = 2;
             if($db->update("producto_correlativo", $cambio, "WHERE producto='".$data["producto"]."' and empresa='".$data["empresa"]."'")){
             	$db->update("system_correlativo", $cambiox, "WHERE tipo='".$this->ObtenerTipo($data["clave"])."'");
                Alerts::Alerta("success","Descativos!","Clave registrada correctamente!");
            } else {
               Alerts::Alerta("error","Error!","No se agragaron los datos!");
            }
  }



   public function CodigoPaisEmpresa($key){ 
   $db = new dbConn();

        if ($r = $db->select("pais", "empresa", "WHERE id = '".$key."'")) { 
          $pais = $r["pais"];
        }  unset($r);  

       if($pais == 1){
       	return "SV";
       }
       if($pais == 2){
       	return "HN";
       } 
       if($pais == 3){
       	return "GT";
       }  
    }


	public function ObtenerTd($tipo){
		$db = new dbConn();
	    if ($r = $db->select("correlativo", "system_correlativo", "where tipo = '$tipo' order by id DESC LIMIT 1")) { 
	        $td=$r["correlativo"];
	    } 
	    unset($r); 
		return $td + 1;
	}

//////////////////////////////

	public function CuentaClave($clave){
		if(strlen($clave) == 13 or strlen($clave) == 14 or strlen($clave) == 15){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function SanarClave($clave){
		return $res = substr($clave,10,-2);

	}

	public function ObtenerCodigo($clave, $td){ // (clave sanada)
		$cod = Encrypt::Encrypt($clave, $td . Fechas::Format(date("d-m-Y")));
		$codigo = substr($cod,0,4);
		return strtoupper($codigo);
	}


	public function ValidarCodigo($clave, $codigo, $td){
		$clavex = $this->SanarClave($clave);
		$clavey = $this->ObtenerCodigo($clavex, $td);

		if($clavey == $codigo){
			return TRUE;
		} else {
			return FALSE;
		}
	}


// $hash = "3-1-6d1a7c5b57cf56553ae79e3ae826ff0a";

// obtener el td y type del archivo
//     $fecha = date("d-m-Y");
//     $hora = date("H:i:s");
//   	$numero = strpos($hash, "-"); // extrae caracteres antes de -
// 	$td = substr($hash,0,$numero); // extrae el td
// 	$countc = strlen($td); // cuenta el numero de caracteres de td
// 	$type = substr($hash,$countc+1,1); // el numero de caracteres depues de td










}


 ?>