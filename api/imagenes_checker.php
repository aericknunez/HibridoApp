<?
//  extrae todas las imagenes para ingresarlas al menu de pizto
//  es necesario tambien categorias_imagenes para complementar el menu
include_once '../application/common/Helpers.php';
include_once '../application/includes/variables_db.php';
include_once '../application/common/Mysqli.php';
$db = new dbConn();
include_once '../application/includes/DataLogin.php';

$seslog = new Login();
$seslog->sec_session_start();


    if ($r = $db->select("checker", "s1_img_check", NULL)) { 
       $data[] = $r["checker"];
    }  unset($r);  

echo json_encode($data, false);

?>