<?php
class Helpers{

    public function __construct(){

    } 


    public static function ServerDomain(){
          if($_SERVER["SERVER_NAME"] == "pizto.com" 
          or $_SERVER["SERVER_NAME"] == "www.pizto.com"
          or $_SERVER["SERVER_NAME"] == "superpollo.net"
          or $_SERVER["SERVER_NAME"] == "www.superpollo.net"
          or $_SERVER["SERVER_NAME"] == "hibridosv.com"
          or $_SERVER["SERVER_NAME"] == "www.hibridosv.com"){
            return TRUE;
          } else {
            return FALSE;
          }
    }

    public static function IsAdmin(){ // verifica si es administrador del sistema
          if($_SESSION["tipo_cuenta"] == 1 and $_SESSION["td"] == 0){
            return TRUE;
          } else {
            return FALSE;
          }
    }

    static public function ServerDemo(){
      $direccion = dirname(__FILE__);
        if (strpos($direccion, 'demo') !== false) {
           return TRUE;
        } else { 
          return FALSE; 
        }  
    }




    static public function EdoProducto($string) {
    if($string == "1") return 'Activo';
    if($string == "2") return 'Eliminado';
    if($string == "3") return 'Suspendido';
    }

    static public function EdoEmpresa($string) {
    if($string == "1") return 'Activa';
    if($string == "2") return 'Eliminada';
    if($string == "3") return 'Disponible';
    if($string == "4") return 'Abandonada';
    }

    static public function EdoProAsig($string) {
    if($string == "1") return 'Activo';
    if($string == "2") return 'En Proceso';
    if($string == "3") return 'Vendido';
    if($string == "4") return 'Pagado';
    if($string == "5") return 'Eliminado';
    }

    static public function EdoCita($string) {
    if($string == "1") return 'Activo';
    if($string == "2") return 'Cancelada';
    if($string == "3") return 'Realizada';
    }



    static public function InOut($string) {
    if($string == "1") return '<p class="text-success font-weight-bold">Entrada</p>';
    if($string == "2") return '<p class="text-danger font-weight-bold">Salida</p>';
    }


    static public function Pais($string) {
      $db = new dbConn();
          if ($r = $db->select("pais", "system_paises", "WHERE id = '".$string."'")) { 
              return $r["pais"];
          }  unset($r);
    }


    static public function Departamento($string) {
      $db = new dbConn();
          if ($r = $db->select("departamento", "system_departamentos", "WHERE id = '".$string."'")) { 
              return $r["departamento"];
          }  unset($r);
    }


    static public function Rugro($string) {
      $db = new dbConn();
          if ($r = $db->select("rugro", "system_rugro", "WHERE id = '".$string."'")) { 
              return $r["rugro"];
          }  unset($r);
    }

    static public function Sexo($string) {
        if($string == "1") return 'Masculino';
        if($string == "2") return 'Femenino';
        if($string == "3") return 'No Especificado';
    }

    static public function EdoCivil($string) {
        if($string == "1") return 'Solter@';
        if($string == "2") return 'Casad@';
        if($string == "3") return 'Divorciad@';
        if($string == "4") return 'Otros';
    }


    static public function UserName($tipo){
        if($tipo == 1) return "Root";
        if($tipo == 2) return "Administrador";
        if($tipo == 3) return "Ejecutivo";
        if($tipo == 4) return "Tecnico";
        if($tipo == 5) return "Gerencia";
    }




    static public function Signo($string) {
    if($string == "1") return '+';
    if($string == "2") return '-';
    }


    public static function Color($elemento){
    if(substr($elemento, -1) == "1") $color="light-blue lighten-5";
    if(substr($elemento, -1) == "2") $color="deep-orange lighten-5";
    if(substr($elemento, -1) == "3") $color="brown lighten-5";
    if(substr($elemento, -1) == "4") $color="cyan lighten-5";
    if(substr($elemento, -1) == "5") $color="blue-grey lighten-5";
    if(substr($elemento, -1) == "6") $color="red lighten-5";
    if(substr($elemento, -1) == "7") $color="cyan lighten-4";
    if(substr($elemento, -1) == "8") $color="deep-purple lighten-5";
    if(substr($elemento, -1) == "9") $color="orange lighten-5";
    if(substr($elemento, -1) == "0") $color="purple lighten-5";
     return $color;
    }


    static public function Mayusculas($nombre){
        return ucwords(strtolower($nombre));
    }

    static public function MayusInicial($nombre){
    return ucfirst(strtolower($nombre));
    }


    static public function Dinero($numero){  
        $format= $_SESSION['config_moneda_simbolo'] ." " . number_format($numero,2,'.',',');
        return $format;
     } 


    static public function Format($numero){ 
        $format=number_format($numero,2,'.',',');
        return $format;
     } 

    static public function Entero($numero){ 
        $format=intval($numero);
        return $format;
     } 

    
    static public function STotal($numero, $impuestos){  
        $imp = ($impuestos / 100)+1;
        $st = $numero / $imp;
        return $st;
     } 


   static  public function Impuesto($numero, $impuestos){  
        $imp = $impuestos / 100;
        return $numero * $imp;
    } 


    static public function Propina($numero){ 
        $num = $_SESSION['config_propina'] / 100;
        $propina = $numero * $num;
        return $propina;
    }


    static public function PropinaTotal($numero){ 
        $num = $_SESSION['config_propina'] / 100;
        $propina = $numero * $num;
        $numer = $propina + $numero;
        return $numer;
    }


    static public function Descuento($numero){ 
        $num = $_SESSION['descuento'] / 100;
        $descuento = $numero * $num;
        return $descuento;
    }

    static public function DescuentoTotal($numero){ 
        $num = $_SESSION['descuento'] / 100;
        $descuento = $numero * $num;
        $numer = $numero - $descuento;
        return $numer;
    }



    static public function NFactura($numero){ 
        $numero1=str_pad($numero, 8, "0", STR_PAD_LEFT);
        $format="000-001-01-$numero1";
        return $format;
     } 





///////////// para usos de control de usuario ////////
    static public function GetIp(){
        // Intentamos primero saber si se ha utilizado un proxy para acceder a la página,
            // y si éste ha indicado en alguna cabecera la IP real del usuario.
            if (getenv('HTTP_CLIENT_IP')) {
              $ip = getenv('HTTP_CLIENT_IP');
            } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
              $ip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_X_FORWARDED')) {
              $ip = getenv('HTTP_X_FORWARDED');
            } elseif (getenv('HTTP_FORWARDED_FOR')) {
              $ip = getenv('HTTP_FORWARDED_FOR');
            } elseif (getenv('HTTP_FORWARDED')) {
              $ip = getenv('HTTP_FORWARDED');
            } else {
              // Método por defecto de obtener la IP del usuario
              // Si se utiliza un proxy, esto nos daría la IP del proxy
              // y no la IP real del usuario.
              $ip = $_SERVER['REMOTE_ADDR'];
            }

            return $ip;
    }



    static public function ObtenerNavegador($user_agent) {
     $navegadores = array(
          'Opera' => 'Opera',
          'Mozilla Firefox'=> '(Firebird)|(Firefox)',
          'Galeon' => 'Galeon',
          'Google Chrome' => 'Chrome',
          'Mozilla'=>'Gecko',
          'MyIE'=>'MyIE',
          'Lynx' => 'Lynx',
          'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)',
          'Konqueror'=>'Konqueror',
          'Internet Explorer 7' => '(MSIE 7\.[0-9]+)',
          'Internet Explorer 6' => '(MSIE 6\.[0-9]+)',
          'Internet Explorer 5' => '(MSIE 5\.[0-9]+)',
          'Internet Explorer 4' => '(MSIE 4\.[0-9]+)',
            );
            foreach($navegadores as $navegador=>$pattern){
                   if (eregi($pattern, $user_agent))
                   return $navegador;
                }
            return 'Desconocido';
            }


////////////////////////////// Nuevos Hash $id = base_convert(microtime(false), 10, 36);
public static function HashId(){
  $id = $_SESSION["td"] . "-" . date("d-m-Y-H:i:s") . rand(1,999999999);
  $iden = sha1($id);
  $hash = substr($iden,0,10);
  return $hash;
}


public static function TimeId(){
  $id = strtotime(date("H:i:s"));
  return $id;
}


public static function DeleteId($tabla, $condicion){
  $db = new dbConn();
      if($_SESSION["root_plataforma"] == 0){
        $a = $db->query("SELECT hash FROM {$tabla} WHERE {$condicion}"); 
        foreach ($a as $b) {
              $datos = array();
              $datos["tabla"] = $tabla;
              $datos["hash"] = $b["hash"];
              $datos["time"] = self::TimeId();
              $datos["action"] = 1;
              $datos["td"] = $_SESSION["td"];
              $db->insert("sync_tables_updates", $datos);
              if($db->delete($tabla, "WHERE {$condicion}")){
                return TRUE;
              } else {
                return FALSE;
              }
          unset($datos);
        } $a->close();
      } else {
            if($db->delete($tabla, "WHERE {$condicion}")){
                return TRUE;
              } else {
                return FALSE;
              }
      }
}


public static function UpdateId($tabla, $dato, $condicion){
  $db = new dbConn(); // dato actualzar y datos insertar
      if($_SESSION["root_plataforma"] == 0){
        $a = $db->query("SELECT hash FROM {$tabla} WHERE {$condicion}"); 
        foreach ($a as $b) {
              $datos = array();
              $datos["tabla"] = $tabla;
              $datos["hash"] = $b["hash"];
              $datos["time"] = self::TimeId();
              $datos["action"] = 2;
              $datos["td"] = $_SESSION["td"];

              /// verifico si hay registro, lo actualizao, sino  lo agrego
              $reg = $db->query("SELECT * FROM sync_tables_updates WHERE tabla = '$tabla' and hash = '".$b["hash"]."' and td = ".$_SESSION["td"]."");
              if($reg->num_rows == 0){
                $db->insert("sync_tables_updates", $datos);
              } else {
                $datopre["time"] = self::TimeId();
                $db->update("sync_tables_updates", $datopre, "WHERE tabla = '$tabla' and hash = '".$b["hash"]."' and td = ".$_SESSION["td"]."");
              } $reg->close();
               /// con esto nada mas se registra una vez           


              $dato["time"] = self::TimeId();
              if($db->update($tabla, $dato, "WHERE {$condicion}")){
                return TRUE;
              } else {
                return FALSE;
              }
          unset($datos);
        } $a->close(); // foreach

      } else { // si es web solo actualizo y ya
            $dato["time"] = self::TimeId();
            if($db->update($tabla, $dato, "WHERE {$condicion}")){
                return TRUE;
              } else {
                return FALSE;
              }
      }  
}










} // class
