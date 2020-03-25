<?
include_once '../application/common/Helpers.php';
include_once '../application/includes/variables_db.php';
include_once '../application/common/Mysqli.php';
$db = new dbConn();
include_once '../application/includes/DataLogin.php';

$seslog = new Login();
$seslog->sec_session_start();


    $a = $db->query("SELECT imagen, categoria
    	FROM s1_imagenes");
    foreach ($a as $b) {
       $data[] = $b;
    }

    $a->close();


echo json_encode($data, false);

?>