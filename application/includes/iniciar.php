<?php
include_once '../common/Helpers.php'; // [Para todo]
include_once '../includes/variables_db.php';
include_once '../common/Mysqli.php';
$db = new dbConn();
include_once '../includes/DataLogin.php';
$seslog = new Login();
$seslog->sec_session_start();

include_once '../common/Encrypt.php';
include_once '../common/Alerts.php';
include_once '../common/Fechas.php';

include_once '../../system/config/Config.php';

include_once '../../system/inicio/Inicio.php';


if($_SESSION['username'] == NULL){
header("location: logout.php");
exit();
}

if ($seslog->login_check() == TRUE) {
$_SESSION["ver_avatar"] = 1;

$us = sha1(EMAIL);
$user=$_SESSION['username'];

	function UserInicio($user){
        $db = new dbConn();
            
            if ($r = $db->select("*", "login_userdata", "WHERE user = '$user' limit 1")) { 
            $_SESSION['nombre'] = $r["nombre"];
            $_SESSION['tipo_cuenta'] = $r["tipo"];
            $_SESSION['tkn'] = $r["tkn"];
            $_SESSION['avatar'] = $r["avatar"];
            $_SESSION['user'] = $user;
            $_SESSION['td'] = $r["td"];
            $_SESSION['secret_key'] = md5($us);

        } unset($r);


            if($_SESSION['tipo_cuenta'] != 1){
            Inicio::RegisterInOut(2); // registra la salida
            }

    

        $configuracion = new Config;
        $configuracion->CrearVariables(); // creo el resto de variables del sistema

        header("location: ../../");
    }

UserInicio($user);

} else {
   header("location: logout.php");
   exit(); 
}
?>