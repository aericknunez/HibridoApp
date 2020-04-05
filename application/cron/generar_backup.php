<?php
date_default_timezone_set('America/El_Salvador');
/// este cron generara los respaldos solicitados al sistema

define("HOST", "localhost"); 			//35.225.56.157 The host you want to connect to. 
define("USER", "superpol_erick"); 			// The database username. 
define("PASSWORD", "caca007125-"); 	// The database password. 
define("DATABASE", "superpol_hibridoapp");  

require_once("/home/superpol/public_html/hibridosv.com/app/application/common/Mysqli.php");
$db = new dbConn();


/// consultar en al app de quienes existen solicitudades de respando
/// despues geberar los respaldos de cada uno de los solicitantes

    $a = $db->query("SELECT sistema, td FROM x_backup_check WHERE edo = 1");
    if($a->num_rows > 0){ // si hay registros continuo con el script sino no

	     foreach ($a as $b) {
	     	// comparo de que sistema es el registros para redireccionar
	     	if($b["sistema"] == 1){

	     		    $cambio = array();
				    $cambio["edo"] = 2;
				    $db->update("x_backup_check", $cambio, "WHERE edo = 1 and td= " . $b["td"]);
	     		
	     		$api_url = "https://pizto.com/admin/application/api/addbackup.php?x=" . $b["td"];
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
	     		    
	     		    $cambio = array();
				    $cambio["edo"] = 3;
				    $db->update("x_backup_check", $cambio, "WHERE edo = 2 and td= " . $b["td"]);

	     	} else {

	     		    $cambio = array();
				    $cambio["edo"] = 2;
				    $db->update("x_backup_check", $cambio, "WHERE edo = 1 and td= " . $b["td"]);

	     		$api_url = "https://pizto.com/login/application/api/addbackup.php?x=" . $b["td"];
				$client = curl_init($api_url);
				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($client);
				curl_close($client);
				
	     		    $cambio = array();
				    $cambio["edo"] = 3;
				    $db->update("x_backup_check", $cambio, "WHERE edo = 2 and td= " . $b["td"]);

	     	} // tipo de sistema

	    } // foreach
    } /// num_rows


     $a->close();

exit();



// ../../system/bdbackup/backup/
?>