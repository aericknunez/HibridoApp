<?php 
class Config{

	public function __construct() { 
     } 


	public function CrearVariables(){
		$db = new dbConn();
		$encrypt = new Encrypt;

		$r = $db->select("*", "perfil", "WHERE username = '".$_SESSION['username']."'");			
			
			$pais = $encrypt->Decrypt($r["pais"],$_SESSION['secret_key']);
			$_SESSION['config_pais'] = $pais;
				if($pais == 1){
					$_SESSION['config_moneda'] = "Dolares";
					$_SESSION['config_moneda_simbolo'] = "$";
					$_SESSION['config_nombre_impuesto'] = "IVA";
					$_SESSION['config_nombre_documento'] = "NIT";
				}if($pais == 2){
					$_SESSION['config_moneda'] = "Lempiras";
					$_SESSION['config_moneda_simbolo'] = "L";
					$_SESSION['config_nombre_impuesto'] = "ISV";
					$_SESSION['config_nombre_documento'] = "RTN";
				}if($pais == 3){
					$_SESSION['config_moneda'] = "Quetzales";
					$_SESSION['config_moneda_simbolo'] = "Q";
					$_SESSION['config_nombre_impuesto'] = "IVA";
					$_SESSION['config_nombre_documento'] = "NIT";
				}

			$_SESSION['config_skin'] = $r["skin"];
			$_SESSION['config_edo'] = $r["edo"];


			if($_SESSION['config_skin'] == NULL) $_SESSION['config_skin'] = "mdb-skin";
			// white-skin , mdb-skin , grey-skin , pink-skin ,  light-blue-skin , black-skin  cyan-skin, navy-blue-skin

			// fixed-sn , hidden-sn
		unset($r);


	}








} // fin de la clase

 ?>