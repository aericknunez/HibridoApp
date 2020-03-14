<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($_SESSION["noacceso"] != NULL) include_once 'system/inicio/noacceso.php';

elseif($_SESSION["config_edo"] == NULL) include_once 'system/inicio/mensajes.php';

elseif(isset($_GET["modal"])) include_once 'system/modal/modal.php';

elseif(isset($_GET["user"])) include_once 'system/user/user.php';


/// perfil
elseif(isset($_GET["perfil"])) include_once 'system/perfil/perfil.php';
elseif(isset($_GET["me"])) include_once 'system/perfil/verperfil.php';
elseif(isset($_GET["listadeusuarios"])) include_once 'system/perfil/listadeusuarios.php';
elseif(isset($_GET["verusuario"])) include_once 'system/perfil/ver_usuario.php';



///empresas
elseif(isset($_GET["empresa"])) include_once 'system/empresa/empresa.php';
elseif(isset($_GET["verempresa"])) include_once 'system/empresa/verempresa.php';
elseif(isset($_GET["empresas"])) include_once 'system/empresa/todaslasempresas.php';
elseif(isset($_GET["myempresa"])) include_once 'system/empresa/myempresas.php';
elseif(isset($_GET["proasig"])) include_once 'system/empresa/myproducts.php';


//producto
elseif(isset($_GET["producto"])) include_once 'system/producto/producto.php';
elseif(isset($_GET["pro"])) include_once 'system/producto/verproducto.php';
elseif(isset($_GET["productos"])) include_once 'system/producto/todoslosproductos.php';
elseif(isset($_GET["download"])) include_once 'system/producto/download.php';


/// historial
elseif(isset($_GET["historial"])) include_once 'system/historial/historial.php';



/// Notificaciones
elseif(isset($_GET["notificaciones"])) include_once 'system/notificaciones/notificaciones.php';



else{
include_once 'system/inicio/index.php';
}
	
?>