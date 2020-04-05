<?
if(is_numeric($_REQUEST["x"]) and is_numeric($_REQUEST["type"])){

/// obtener las basas de datos que se deben sincronizar
/// valido para todos los sistema y el td
/// x = td && type = sistema

include_once '../application/common/Helpers.php';
include_once '../application/includes/variables_db.php';
include_once '../application/common/Mysqli.php';
$db = new dbConn();
include_once '../application/includes/DataLogin.php';

$seslog = new Login();
$seslog->sec_session_start();

    $a = $db->query("SELECT hash FROM system_dbsync");
		$data = array();
		$i=0;
 
    while($row = mysqli_fetch_array($a))
    {      
        $hash = $row["hash"];
           $ax = $db->query("SELECT * FROM system_dbuser WHERE hash = '$hash' and sistema = ". $_REQUEST["type"]." and td = ". $_REQUEST["x"]."");
           if($ax->num_rows > 0){
                    $az = $db->query("SELECT * FROM system_dbsuccess WHERE hash = '$hash' and sistema = ". $_REQUEST["type"]." and td = ". $_REQUEST["x"]."");
                    if($az->num_rows == 0){
                        $data[$i] = $row;
                        $i++;
                    } $az->close();
           } $ax->close();
    }


 $a->close();






if($_POST["validate"] == "1"){

      if(isset($_POST["type"]) and isset($_POST["x"]) and isset($_POST["hash"])){ // para insertar los datos de solicitud a la base de datos

      $datos = array();
      $datos["hash"] = $_POST["type"];
      $datos["sistema"] = $_POST["type"];
      $datos["edo"] = 2;
      $datos["fecha"] = date("d-m-Y");
      $datos["hora"] = date("H:i:s");
      $datos["td"] = $_POST["x"];
      if($db->insert("system_dbsuccess", $datos)) {
        $data[] = array(
          'success' =>  '1'
        );
      } else {
        $data[] = array(
          'success' =>  '0'
        );
      }

 }
}




echo json_encode($data);
}
?>