<?
/// ingresa los datos del backup solicitado

include_once '../application/common/Helpers.php';
include_once '../application/common/Fechas.php';
include_once '../application/includes/variables_db.php';
include_once '../application/common/Mysqli.php';
$db = new dbConn();
include_once '../application/includes/DataLogin.php';

$seslog = new Login();
$seslog->sec_session_start();



    if(isset($_POST["sistema"]) and isset($_POST["td"])){ // para insertar los datos de solicitud a la base de datos

      $datos = array();
      $datos["sistema"] = $_POST["sistema"];
      $datos["td"] = $_POST["td"];
      $datos["fecha"] = date("d-m-Y");
      $datos["hora"] = date("H:i:s");
      $datos["fechaF"] = Fechas::Format(date("d-m-Y"));
      $datos["edo"] =  1;
      if ($db->insert("x_backup_check", $datos)) {
        $data[] = array(
          'success' =>  '1'
        );
      }
      else
      {
        $data[] = array(
          'success' =>  '0'
        );
      }
    }







if($_REQUEST["action"] == "search" and is_numeric($_REQUEST["x"]) and is_numeric($_REQUEST["type"])){ /// obtener datos de la api si hay respaldos pendientes

    $a = $db->query("SELECT * FROM x_backup_check WHERE sistema = '".$_REQUEST["type"]."' and td = '".$_REQUEST["x"]."' and edo = 1");

    if($a->num_rows > 0){
        $data[] = array(
          'success' =>  '1'
        );
    } else {

          $ax = $db->query("SELECT * FROM x_backup_check WHERE sistema = '".$_REQUEST["type"]."' and td = '".$_REQUEST["x"]."' and edo = 2");

    if($ax->num_rows > 0){
        $data[] = array(
          'success' =>  '2'
        );
    } else {
            $data[] = array(
              'success' =>  '0'
            );  
    }
    $ax->close();
    
    }
    $a->close();
  


}





echo json_encode($data);

?>