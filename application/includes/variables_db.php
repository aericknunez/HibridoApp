<?php
date_default_timezone_set('America/El_Salvador');

if(Helpers::ServerDomain() == TRUE){

define("HOST", "db5001929171.hosting-data.io"); 			//35.225.56.157 The host you want to connect to. 
define("USER", "dbu1000577"); 			// The database username. 
define("PASSWORD", "Caca007125-"); 	// The database password.
define("DATABASE", "dbs1579005");
  

} else {

define("HOST", "localhost"); 			//35.225.56.157 The host you want to connect to. 
define("USER", "root"); 			// The database username. 
define("PASSWORD", "erick"); 	// The database password. 
define("DATABASE", "hibridoapp"); 

}

define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");
define("SECURE", FALSE);    // For development purposes only!!!!

// para el sistema
define("BASE_URL", "https://app.hibridosv.com/");
define("BASEPATH", "https://app.hibridosv.com/");	
define("EMAIL", "aerick.nunez@gmail.com");	

?>