<?php
include_once 'application/common/Helpers.php'; // [Para todo]
include_once 'application/includes/variables_db.php';
include_once 'application/common/Mysqli.php';
include_once 'application/includes/DataLogin.php';
$db = new dbConn();
$seslog = new Login();
$seslog->sec_session_start();


if ($seslog->login_check() == TRUE) {
    include_once 'catalog/index.php';
} else {
	
	if(isset($_REQUEST["register"])){
		include_once 'catalog/register.php';
	} else {
		include_once 'catalog/login.php';
	}
 

}
/////////
$db->close();
?>