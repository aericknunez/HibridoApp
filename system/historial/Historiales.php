<?php 
class Historiales{

	public function __construct() { 
     } 

   


   public function AddHis($data){
   $db = new dbConn();
		if($data["empresa"] != NULL and $data["fecha_submit"] != NULL){

	    $datos = array();
	    $datos["empresa"] = $data["empresa"];
	    $datos["username"] = $_SESSION["username"];
	    $datos["detalles"] = $data["datalles"];
	    $datos["fecha"] = $data["fecha_submit"];
	    $datos["hora"] = $data["hora"];
	    $datos["fechaF"] = Fechas::Format($data["fecha_submit"]);
	    $datos["edo"] = 1;
		    if ($db->insert("visitas", $datos)) {
		        Alerts::Alerta("success","Agregado!","Datos Agregados!");
		    } else {
		    	 Alerts::Alerta("error","Error!","No se agragaron los datos!");
		    }
		} else {
		        Alerts::Alerta("error","Error!","Faltan datos importantes!");
		}
		$this-> VerCitas();
	}






   public function VerCitas($empresa = NULL){ // historial citas
   $db = new dbConn();

	if($empresa == NULL){
		$a = $db->query("SELECT * FROM visitas WHERE username = '".$_SESSION["username"]."' order by id desc");
	} else {
		$a = $db->query("SELECT * FROM visitas WHERE empresa = '$empresa' and username = '".$_SESSION["username"]."' order by id desc");
	}
    
    if($a->num_rows){
   //   echo '<h3>Citas Registradas</h3>';
      
      echo '<div class="table-responsive"><table class="table table-striped table-sm">
        <thead>
          <tr>';
          if($empresa == NULL){ echo '<th scope="col">Empresa</th>'; } else { echo '<th scope="col">#</th>'; }
            
        echo '<th scope="col">Detalles</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($a as $b) {
        	
        $n = 1;
        if($empresa == NULL){
		    if ($r = $db->select("nombre", "empresa", "WHERE id = '". $b["empresa"] ."'")) { 
		        echo '<td>'. $r["nombre"] .'</td>';
		    }  

		} else { echo '<td>'. $n++ .'</td>';}
       
       echo '<td>'. $b["detalles"] .'</td>
            <td>'. $b["fecha"] .' | '. $b["hora"] .'</td> 
            <td><a id="xver" key="'. $b["id"] .'" estado="'. $b["edo"] .'">'. Helpers::EdoCita($b["edo"]) .'</a></td>';   
      echo '</tr>';
      	$this->VerDetalles($b["id"]);
      } echo '</tbody>
        </table></div>';
  } else {
    Alerts::Mensajex("No se han registrado citas","danger");
  }
    $a->close();
 }




   public function CambiarEdo($data){
   $db = new dbConn();
		if($data["visita"] != NULL and $data["edo"] != NULL){

	    $datos = array();
	    $datos["visita"] = $data["visita"];
	    $datos["detalles"] = $data["datalles"];
	    $datos["fecha"] = date("d-m-Y");
	    $datos["hora"] = date("H:i:s");
		    if ($db->insert("visitas_detalles", $datos)) {

    		   $cambio = array();
			   $cambio["edo"] = $data["edo"];
			   $db->update("visitas", $cambio, "WHERE id='".$data["visita"]."'");


		        Alerts::Alerta("success","Agregado!","Datos Agregados!");
		    } else {
		    	 Alerts::Alerta("error","Error!","No se agragaron los datos!");
		    }
		} else {
		        Alerts::Alerta("error","Error!","Faltan datos importantes!");
		}
		$this-> VerCitas();
	}


   public function VerDetalles($cita){
   $db = new dbConn();

    $a = $db->query("SELECT * FROM visitas_detalles WHERE visita = '".$cita."' order by id desc");
    foreach ($a as $b) {

    	echo '<tr class="cyan lighten-5"><td colspan="3">'. $b["detalles"] .'</td>
    		  <td><small>'. $b["fecha"] .' <cite title="Source Title">'. $b["hora"] .'</cite></small></td></tr>';
    } $a->close();

	}


   public function EdoForm($data){

	   		if($data["estado"] == 1){
	   			echo '<select class="browser-default custom-select" id="edo" name="edo">';
			        echo '<option selected disabled>* Estado</option>';       
			        echo '<option '; if($edo == 1) echo "selected "; echo 'value="1">Activo</option>';
			        echo '<option '; if($edo == 2) echo "selected "; echo 'value="2">Cancelado</option>';
			        echo '<option '; if($edo == 3) echo "selected "; echo 'value="3">Realizado</option>';
			    echo '</select>';
	   		}
	   		if($data["estado"] == 2){
	   			echo '<select class="browser-default custom-select" id="edo" name="edo">';
			        echo '<option '; if($edo == 2) echo "selected "; echo 'value="2">Cancelado</option>';
			    echo '</select>';
	   		}
	   		if($data["estado"] == 3){
	   			echo '<select class="browser-default custom-select" id="edo" name="edo">';
			        echo '<option '; if($edo == 3) echo "selected "; echo 'value="3">Realizado</option>';
			    echo '</select>';
	   		}
	}












   public function TodasLasCitas(){ // historial citas
   $db = new dbConn();


	$a = $db->query("SELECT * FROM visitas order by id desc");

    
    if($a->num_rows){
   //   echo '<h3>Citas Registradas</h3>';
      
      echo '<div class="table-responsive"><table class="table table-striped table-sm">
        <thead>
          <tr>';
         echo '<th scope="col">Empresa</th>';
          echo '<th scope="col">Usuario</th>';
               
        echo '<th scope="col">Detalles</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($a as $b) {
        	
        $n = 1;

		    if ($r = $db->select("nombre", "empresa", "WHERE id = '". $b["empresa"] ."'")) { 
		        echo '<td>'. $r["nombre"] .'</td>';
		    }  

		    if ($r = $db->select("nombre", "perfil", "WHERE username = '". $b["username"] ."'")) { 
		        echo '<td>'. Encrypt::Decrypt($r["nombre"],$_SESSION['secret_key']) .'</td>';
		    }  
       
       echo '<td>'. $b["detalles"] .'</td>
            <td>'. $b["fecha"] .' | '. $b["hora"] .'</td> 
            <td><a id="xver" key="'. $b["id"] .'" estado="'. $b["edo"] .'">'. Helpers::EdoCita($b["edo"]) .'</a></td>';   
      echo '</tr>';
      	$this->VerDetalles($b["id"]);
      } echo '</tbody>
        </table></div>';
  } else {
    Alerts::Mensajex("No se han registrado citas","danger");
  }
    $a->close();
 }







} // fin de la clase

 ?>

