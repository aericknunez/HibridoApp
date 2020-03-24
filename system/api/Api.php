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


} // fin de la clase

 ?>