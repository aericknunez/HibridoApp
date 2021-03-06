<?php 
class Empresas{

	public function __construct() { 
     } 


  public function CompruebaExistencia($key){ // comprueba si existe o no el producto
    $db = new dbConn();
    $a = $db->query("SELECT * FROM empresa WHERE id = '".$key."' and username='".$_SESSION["username"]."'");
    if($a->num_rows > 0) return TRUE;
    else return FALSE;
    $a->close();
  }


     public function AddDatos($data){
     	$db = new dbConn();
     	if($data["nombre"] != NULL and $data["encargado"] != NULL){
	     	if($data["iden"] == NULL){ // insertar
	     		$this->Insertar($data);
	     	} else { // actualizar
	     		$this->Actualizar($data);
	     	}
     	} else {
		        Alerts::Alerta("error","Error!","faltan datos importante!");
		}
     }



	public function Actualizar($data){
		$db = new dbConn();
		    
		    $cambio = array();
		    $cambio["nombre"] = $data["nombre"];
		    $cambio["encargado"] = $data["encargado"];
		    $cambio["pais"] = $data["pais"];
		    $cambio["departamento"] = $data["departamento"];
		    $cambio["municipio"] = $data["municipio"];
		    $cambio["direccion"] = $data["direccion"];
		    $cambio["rugro"] = $data["rugro"];
		    $cambio["giro"] = $data["giro"];
		    $cambio["telefono"] = $data["telefono"];
		    $cambio["telefono2"] = $data["telefono2"];
		    $cambio["whatsapp"] = $data["whatsapp"];
		    $cambio["email"] = $data["email"];
		    $cambio["comentarios"] = $data["comentarios"];
		    $cambio["edo"] = 1;

		    if ($db->update("empresa", $cambio, "WHERE id='".$data["iden"]."'")) {
		        Alerts::Alerta("success","Actualizado!","Actualizado correctamente!");
		        echo '<script>
					window.location.href="?verempresa&key='.$data["iden"].'"
				</script>';
		    } else {
		        Alerts::Alerta("error","Error!","Sucedio un error!");
		    }
	    
	}



	public function Insertar($data){
		$db = new dbConn();
		    $datos = array();
		    $datos["nombre"] = $data["nombre"];
		    $datos["encargado"] = $data["encargado"];
		    $datos["pais"] = $data["pais"];
		    $datos["departamento"] = $data["departamento"];
		    $datos["municipio"] = $data["municipio"];
		    $datos["direccion"] = $data["direccion"];
		    $datos["fecha"] = date("d-m-Y");
		    $datos["hora"] = date("H:i:s");
        $datos["fechaF"] = Fechas::Format(date("d-m-Y"));
		    $datos["rugro"] = $data["rugro"];
		    $datos["giro"] = $data["giro"];
		    $datos["telefono"] = $data["telefono"];
		    $datos["telefono2"] = $data["telefono2"];
		    $datos["whatsapp"] = $data["whatsapp"];
		    $datos["email"] = $data["email"];
		    $datos["comentarios"] = $data["comentarios"];
		    $datos["username"] = $_SESSION["username"];
		    $datos["edo"] = 1;
			    if ($db->insert("empresa", $datos)) {
			    	$i = $db->insert_id();
			        Alerts::Alerta("success","Agregado!","Datos Agregados!");
			        echo '<script>
					window.location.href="?verempresa&key='.$i.'"
				</script>';
			    } else {
			    	 Alerts::Alerta("error","Error!","No se agragaron los datos!");
			    }
	}



public function AllEmpresas($npagina, $orden, $dir){
      $db = new dbConn();

  $limit = 12;
  $adjacents = 2;
  if($npagina == NULL) $npagina = 1;
  $a = $db->query("SELECT * FROM empresa");
  $total_rows = $a->num_rows;
  $a->close();

  $total_pages = ceil($total_rows / $limit);
  
  if(isset($npagina) && $npagina != NULL) {
    $page = $npagina;
    $offset = $limit * ($page-1);
  } else {
    $page = 1;
    $offset = 0;
  }

if($dir == "desc") $dir2 = "asc";
if($dir == "asc") $dir2 = "desc";
$op = 35; // opcion a donde se redirige la pginacion

 $a = $db->query("SELECT * FROM empresa order by ".$orden." ".$dir." limit $offset, $limit");
      
      if($a->num_rows > 0){
          echo '<div class="table-responsive"><table class="table table-sm table-striped">
        <thead>
          <tr>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="nombre" dir="'.$dir2.'">Nombre</a></th>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="encargado" dir="'.$dir2.'">Encargado</a></th>
            <th class="th-sm">Lugar</th>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="edo" dir="'.$dir2.'">Estado</a></th>
            <th class="th-sm">Ver</th>
          </tr>
        </thead>
        <tbody>';
        foreach ($a as $b) {
          echo '<tr>
                      <td>'.$b["nombre"].'</td>
                      <td>'.$b["encargado"].'</td>
                      <td>'.$b["municipio"].', '.Helpers::Departamento($b["departamento"]).', '.Helpers::Pais($b["pais"]).'</td>
                      <td>'.Helpers::EdoEmpresa($b["edo"]).'</td>
                      <td><a id="xver" op="36" key="'. $b["id"] .'"><i class="fas fa-search fa-lg green-text"></i></a></td>
                    </tr>';
        }
        echo '</tbody>
        </table></div>';
      }
        $a->close();

  if($total_pages <= (1+($adjacents * 2))) {
    $start = 1;
    $end   = $total_pages;
  } else {
    if(($page - $adjacents) > 1) {  
      if(($page + $adjacents) < $total_pages) {  
        $start = ($page - $adjacents); 
        $end   = ($page + $adjacents); 
      } else {              
        $start = ($total_pages - (1+($adjacents*2))); 
        $end   = $total_pages; 
      }
    } else {
      $start = 1; 
      $end   = (1+($adjacents * 2));
    }
  }
echo $total_rows . " Registros encontrados";
   if($total_pages > 1) { 

$page <= 1 ? $enable = 'disabled' : $enable = '';
    echo '<ul class="pagination pagination-sm justify-content-center">
    <li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="1" orden="'.$orden.'" dir="'.$dir.'">&lt;&lt;</a>
      </li>';
    
    $page>1 ? $pagina = $page-1 : $pagina = 1;
    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$pagina.'" orden="'.$orden.'" dir="'.$dir.'">&lt;</a>
      </li>';

    for($i=$start; $i<=$end; $i++) {
      $i == $page ? $pagina =  'active' : $pagina = '';
      echo '<li class="page-item '.$pagina.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$i.'" orden="'.$orden.'" dir="'.$dir.'">'.$i.'</a>
      </li>';
    }

    $page >= $total_pages ? $enable = 'disabled' : $enable = '';
    $page < $total_pages ? $pagina = ($page+1) : $pagina = $total_pages;
    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$pagina.'" orden="'.$orden.'" dir="'.$dir.'">&gt;</a>
      </li>';

    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$total_pages.'" orden="'.$orden.'" dir="'.$dir.'">&gt;&gt;</a>
      </li>

      </ul>';
     }  // end pagination 
  } // termina productos


public function ModalEmpresa($empresa){
      $this->VerEmpresa($empresa);
      $this->VerUsuarioEmpresa($empresa);
      $this->VerEmpAsig($empresa,1);

  }



   public function VerUsuarioEmpresa($empresa){ // Usuario que agrego la empresa
   $db = new dbConn();

    $a = $db->query("SELECT perfil.nombre, perfil.email, perfil.municipio FROM perfil, empresa WHERE perfil.username=empresa.username and empresa.id='$empresa'");
    if($a->num_rows){
      echo '<h3>Usuario Responsable</h3>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">E-mail</th>
            <th scope="col">Lugar</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($a as $b) {
        echo '<td>'. Encrypt::Decrypt($b["nombre"], $_SESSION["secret_key"]) .'</td>
            <td>'. Encrypt::Decrypt($b["email"], $_SESSION["secret_key"]) .'</td>
            <td>'. Encrypt::Decrypt($b["municipio"], $_SESSION["secret_key"]) .'</td>';   
      echo '</tr>';
      } echo '</tbody>
        </table>';
  } else {
    Alerts::Mensajex("No se han asinado Usuarios a este producto","danger");
  }
    $a->close();
 }



public function VerEmpresa($empresa, $btn = NULL){
      $db = new dbConn();
  if ($r = $db->select("*", "empresa", "WHERE id = '".$empresa."'")) { 
$iden = $r["id"];
$nombre = $r["nombre"];
$encargado = $r["encargado"];
$pais = $r["pais"];
$departamento = $r["departamento"];
$municipio = $r["municipio"];
$direccion = $r["direccion"];
$rugro = $r["rugro"];
$giro = $r["giro"];
$telefono = $r["telefono"];
$telefono2 = $r["telefono2"];
$whatsapp = $r["whatsapp"];
$email = $r["email"];
$comentarios = $r["comentarios"];
$edo = $r["edo"];
$username = $r["username"];

  }  unset($r);
echo '<blockquote class="blockquote bq-danger">
              <p class="bq-title">'.$nombre.'</p>
              <p>'.$comentarios.'</p>
            </blockquote>

    <ul class="list-group list-group-flush">
      <li class="list-group-item d-flex justify-content-between align-items-center"><span> Encargado: </span> <span class="pro-detail">'.$encargado.'</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><span> Lugar: </span> <span class="pro-detail">'.$municipio. ", ". Helpers::Departamento($departamento) .", " . Helpers::Pais($pais).'</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><span> Dirección: </span> <span class="pro-detail">'.$direccion.'</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><span> Rugro: </span> <span class="pro-detail">'. Helpers::Rugro($rugro) .'</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><span> Giro: </span> <span class="pro-detail">'.$giro.'</span></li>';
      if($btn != NULL or $_SESSION["tipo_cuenta"] == 1 or $_SESSION["username"] == $username){
      echo '<li class="list-group-item d-flex justify-content-between align-items-center"><span> E-mail: </span> <span class="pro-detail">'.$email.'</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><span> Teléfonos: </span> <span class="pro-detail">'.$telefono. ", " . $telefono2 .'</span></li>
      <li class="list-group-item d-flex justify-content-between align-items-center"><span> WhatsApp: </span> <span class="pro-detail">'.$whatsapp.'</span></li>';
      }
      echo '<li class="list-group-item d-flex justify-content-between align-items-center"><span> Estado: </span> <span class="pro-detail">'.Helpers::EdoEmpresa($edo).'</span></li>

    </ul>

      <div class="row">
            <div class="col-md-6 my-6 md-form text-left">
         

        </div>
        <div class="col-md-6 my-6 md-form text-right">';
         if($btn != NULL or $_SESSION["tipo_cuenta"] == 1 or $_SESSION["username"] == $username){
         	echo '<a class="btn btn-success btn-rounded btn-sm my-4" href="?empresa&key='.$iden.'"><i class="fas fa-user mr-1"></i> Modificar Infomación </a>';
         }

        echo '</div>
      </div>';

	}

























	public function AddEmp($data){
		$db = new dbConn();
		if($data["opx"] != NULL){
		    		
		    		if($data["opx"] == 1){ //insertar
		    			$datos = array();
					    $datos["producto"] = $data["producto"];
					    $datos["empresa"] = $data["empresa"];
					    $datos["fecha"] = date("d-m-Y");
					    $datos["hora"] = date("H:i:s");
              $datos["fechaF"] = Fechas::Format(date("d-m-Y"));
					    $datos["edo"] = 1;
						    if ($db->insert("producto_empresa", $datos)) {
						        Alerts::Alerta("success","Agregado!","Datos Agregados!");
						    } else {
						    	 Alerts::Alerta("error","Error!","No se agragaron los datos!");
						    }
						} else { // eliminar
							if ($db->delete("producto_empresa", "WHERE empresa='".$data["empresa"]."' and  producto='".$data["producto"]."'")) {
						        Alerts::Alerta("success","Agregado!","Producto Eliminado correctamente!");
						    } else {
						        Alerts::Alerta("error","Error!","Error en la eliminacion del producto!");
						    } 
						}
		} else {
		        Alerts::Alerta("error","Error!","faltan datos importante!");
		}
		$this->VerEmp($data["empresa"]);
	}





   public function VerEmp($empresa, $btn = NULL){ // listado de usuarios
   $db = new dbConn();

    $a = $db->query("SELECT * FROM producto WHERE edo = 1");
    if($a->num_rows){
    	echo '<table class="table table-striped table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Producto</th>
            <th scope="col">Rugro</th>';
            if($btn == NULL){ echo '<th scope="col">Opción</th>'; }
			echo '</tr>
			  </thead>
			  <tbody>';
			  $n = 1;
	    foreach ($a as $b) {
	    	$ax = $db->query("SELECT * FROM producto_empresa WHERE producto = '".$b["id"]."' and empresa = '".$empresa."'"); $canti = $ax->num_rows;
			if($canti > 0) { $src = "2"; $c = "red-text"; $ba = "badge-danger"; $fa= "fa-window-close";} else { $src = "1"; $c = "black-text"; $ba = "badge-success"; $fa = "fa-check"; }
			$ax->close(); 

	    	echo '<tr class="'.$c.'">
			      <th scope="row">'.$n ++.'</th>
			      <td>'. $b["producto"] .'</td>
            <td>'. Helpers::Rugro($b["rugro"]) .'</td>';
			      if($btn == NULL){
              if($canti == 0){ // estas comprobaciones son para que no se elimine si ya cambio el estado de activo
                echo '<td> <a id="emp-op" op="37" opx="'. $src .'" empresa="'. $empresa .'" producto="'. $b["id"] .'"><span class="badge '.$ba.'"><i class="fas '.$fa.'" aria-hidden="true"></i></span></a></td>';
              } else {
                if ($r = $db->select("edo", "producto_empresa", "WHERE producto = '".$b["id"]."' and empresa = '".$empresa."'")) { $edox = $r["edo"]; } unset($r); 

                    if($edox == 1){
                    echo '<td> <a id="emp-op" op="37" opx="'. $src .'" empresa="'. $empresa .'" producto="'. $b["id"] .'"><span class="badge '.$ba.'"><i class="fas '.$fa.'" aria-hidden="true"></i></span></a></td>';
                  } else {
                    echo '<td><span class="badge badge-secondary"><i class="fas '.$fa.'" aria-hidden="true"></i></span></td>';
                  }
              }
              
            }
			echo '</tr>';
	    } echo '</tbody>
				</table>';
	}
    $a->close();
 }



   public function VerEmpAsig($empresa, $nam = NULL){ // listado de usuarios
   $db = new dbConn();

    $a = $db->query("SELECT producto, edo FROM producto_empresa WHERE empresa = '$empresa' and edo = 1");
    if($a->num_rows){
      if($nam == 1){
      echo '<h3>Productos Asignados</h3>';
      }
      echo '<table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Estado</th></tr>
        </thead>
        <tbody>';
        $n = 1;
      foreach ($a as $b) {
            if ($r = $db->select("producto, rugro", "producto", "WHERE id = '".$b["producto"]."'")) { 
                $producto = $r["producto"]; } unset($r);  
        echo '<tr class="'.$c.'">
            <th scope="row">'.$n ++.'</th>
            <td>'. $producto .'</td>
            <td>'. Helpers::EdoProAsig($b["edo"]) .'</td>
            </tr>';
      } echo '</tbody>
        </table>';
  }
    $a->close();
 }



public function MyEmpresas($npagina, $orden, $dir){
      $db = new dbConn();

  $limit = 12;
  $adjacents = 2;
  if($npagina == NULL) $npagina = 1;
  $a = $db->query("SELECT * FROM empresa WHERE username = '".$_SESSION["username"]."'");
  $total_rows = $a->num_rows;
  $a->close();

  $total_pages = ceil($total_rows / $limit);
  
  if(isset($npagina) && $npagina != NULL) {
    $page = $npagina;
    $offset = $limit * ($page-1);
  } else {
    $page = 1;
    $offset = 0;
  }

if($dir == "desc") $dir2 = "asc";
if($dir == "asc") $dir2 = "desc";
$op = 34; // opcion a donde se redirige la pginacion

 $a = $db->query("SELECT * FROM empresa WHERE username = '".$_SESSION["username"]."' order by ".$orden." ".$dir." limit $offset, $limit");
      
      if($a->num_rows > 0){
          echo '<div class="table-responsive"><table class="table table-sm table-striped">
        <thead>
          <tr>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="nombre" dir="'.$dir2.'">Nombre</a></th>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="encargado" dir="'.$dir2.'">Encargado</a></th>
            <th class="th-sm d-none d-md-block">Lugar</th>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="edo" dir="'.$dir2.'">Estado</a></th>
            <th class="th-sm">Ver</th>
          </tr>
        </thead>
        <tbody>';
        foreach ($a as $b) {
          echo '<tr>
                      <td>'.$b["nombre"].'</td>
                      <td>'.$b["encargado"].'</td>
                      <td  class="d-none d-md-block">'.$b["municipio"].', '.Helpers::Departamento($b["departamento"]).', '.Helpers::Pais($b["pais"]).'</td>
                      <td>'.Helpers::EdoEmpresa($b["edo"]).'</td>
                      <td><a id="xver" op="36" key="'. $b["id"] .'"><i class="fas fa-search fa-lg green-text"></i></a></td>
                    </tr>';
        }
        echo '</tbody>
        </table></div>';
      }
        $a->close();

  if($total_pages <= (1+($adjacents * 2))) {
    $start = 1;
    $end   = $total_pages;
  } else {
    if(($page - $adjacents) > 1) {  
      if(($page + $adjacents) < $total_pages) {  
        $start = ($page - $adjacents); 
        $end   = ($page + $adjacents); 
      } else {              
        $start = ($total_pages - (1+($adjacents*2))); 
        $end   = $total_pages; 
      }
    } else {
      $start = 1; 
      $end   = (1+($adjacents * 2));
    }
  }
echo $total_rows . " Registros encontrados";
   if($total_pages > 1) { 

$page <= 1 ? $enable = 'disabled' : $enable = '';
    echo '<ul class="pagination pagination-sm justify-content-center">
    <li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="1" orden="'.$orden.'" dir="'.$dir.'">&lt;&lt;</a>
      </li>';
    
    $page>1 ? $pagina = $page-1 : $pagina = 1;
    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$pagina.'" orden="'.$orden.'" dir="'.$dir.'">&lt;</a>
      </li>';

    for($i=$start; $i<=$end; $i++) {
      $i == $page ? $pagina =  'active' : $pagina = '';
      echo '<li class="page-item '.$pagina.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$i.'" orden="'.$orden.'" dir="'.$dir.'">'.$i.'</a>
      </li>';
    }

    $page >= $total_pages ? $enable = 'disabled' : $enable = '';
    $page < $total_pages ? $pagina = ($page+1) : $pagina = $total_pages;
    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$pagina.'" orden="'.$orden.'" dir="'.$dir.'">&gt;</a>
      </li>';

    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$total_pages.'" orden="'.$orden.'" dir="'.$dir.'">&gt;&gt;</a>
      </li>

      </ul>';
     }  // end pagination 
  } // termina productos












////////////empresa y productos asignadoa a cada una
public function MyProducts($npagina, $orden, $dir){
      $db = new dbConn();

  $limit = 12;
  $adjacents = 2;
  if($npagina == NULL) $npagina = 1;
  $a = $db->query("SELECT * FROM empresa WHERE username = '".$_SESSION["username"]."'");
  $total_rows = $a->num_rows;
  $a->close();

  $total_pages = ceil($total_rows / $limit);
  
  if(isset($npagina) && $npagina != NULL) {
    $page = $npagina;
    $offset = $limit * ($page-1);
  } else {
    $page = 1;
    $offset = 0;
  }

if($dir == "desc") $dir2 = "asc";
if($dir == "asc") $dir2 = "desc";
$op = 38; // opcion a donde se redirige la pginacion

 $a = $db->query("SELECT * FROM empresa WHERE username = '".$_SESSION["username"]."' order by ".$orden." ".$dir." limit $offset, $limit");
      
      if($a->num_rows > 0){
          echo '<div class="table-responsive"><table class="table table-sm table-striped">
        <thead>
          <tr>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="nombre" dir="'.$dir2.'">Nombre</a></th>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="encargado" dir="'.$dir2.'">Encargado</a></th>
            <th class="th-sm d-none d-md-block">Lugar</th>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="edo" dir="'.$dir2.'">Estado</a></th>
          </tr>
        </thead>
        <tbody>';
        foreach ($a as $b) {
          echo '<tr>
                      <td>'.$b["nombre"].'</td>
                      <td>'.$b["encargado"].'</td>
                      <td  class="d-none d-md-block">'.$b["municipio"].', '.Helpers::Departamento($b["departamento"]).', '.Helpers::Pais($b["pais"]).'</td>
                      <td>'.Helpers::EdoEmpresa($b["edo"]).'</td>
                    </tr>';
            $this->VerEmpProduct($b["id"]);
        }
        echo '</tbody>
        </table></div>';
      }
        $a->close();

  if($total_pages <= (1+($adjacents * 2))) {
    $start = 1;
    $end   = $total_pages;
  } else {
    if(($page - $adjacents) > 1) {  
      if(($page + $adjacents) < $total_pages) {  
        $start = ($page - $adjacents); 
        $end   = ($page + $adjacents); 
      } else {              
        $start = ($total_pages - (1+($adjacents*2))); 
        $end   = $total_pages; 
      }
    } else {
      $start = 1; 
      $end   = (1+($adjacents * 2));
    }
  }
echo $total_rows . " Registros encontrados";
   if($total_pages > 1) { 

$page <= 1 ? $enable = 'disabled' : $enable = '';
    echo '<ul class="pagination pagination-sm justify-content-center">
    <li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="1" orden="'.$orden.'" dir="'.$dir.'">&lt;&lt;</a>
      </li>';
    
    $page>1 ? $pagina = $page-1 : $pagina = 1;
    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$pagina.'" orden="'.$orden.'" dir="'.$dir.'">&lt;</a>
      </li>';

    for($i=$start; $i<=$end; $i++) {
      $i == $page ? $pagina =  'active' : $pagina = '';
      echo '<li class="page-item '.$pagina.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$i.'" orden="'.$orden.'" dir="'.$dir.'">'.$i.'</a>
      </li>';
    }

    $page >= $total_pages ? $enable = 'disabled' : $enable = '';
    $page < $total_pages ? $pagina = ($page+1) : $pagina = $total_pages;
    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$pagina.'" orden="'.$orden.'" dir="'.$dir.'">&gt;</a>
      </li>';

    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$total_pages.'" orden="'.$orden.'" dir="'.$dir.'">&gt;&gt;</a>
      </li>

      </ul>';
     }  // end pagination 
  } // termina productos




   public function VerEmpProduct($empresa){ // Productos asignados, clase para MyProducts()
   $db = new dbConn();

    $a = $db->query("SELECT * FROM producto_empresa WHERE empresa = '$empresa'");
    if($a->num_rows){

      foreach ($a as $b) {
            if ($r = $db->select("producto, descripcion", "producto", "WHERE id = '".$b["producto"]."'")) { 
                $producto = $r["producto"]; $descripcion = $r["descripcion"]; } unset($r);  
        echo '<tr class="cyan lighten-5">
            <td scope="row">'.$producto.'</td>
            <td class="d-none d-md-block">'. $descripcion .'</td>
            <td>'. Helpers::EdoProAsig($b["edo"]) .'</td>
            <td><a id="xcambiar" key="'. $b["id"] .'" producto="'. $b["producto"] .'" edo="'. $b["edo"] .'"><i class="fas fa-search fa-lg green-text"></i></a></td>
            </tr>';
      }
  }
    $a->close();
 }




   public function CambiarEdo($data){ // cambia el estado del producto asignado
   $db = new dbConn();
        $cambio = array();
    if($data["edo"] != 0){
            if($data["edo"] == 3){
              $cambio["vfecha"] = date("d-m-Y");
              $cambio["vhora"] = date("H:i:s");
              $cambio["vfechaF"] = Fechas::Format(date("d-m-Y"));
            }
            if($data["edo"] == 4){
              $cambio["pfecha"] = date("d-m-Y");
              $cambio["phora"] = date("H:i:s");
              $cambio["pfechaF"] = Fechas::Format(date("d-m-Y"));
            }
            $cambio["edo"] = $data["edo"];
             if($db->update("producto_empresa", $cambio, "WHERE id='".$data["producto"]."'")){

                Alerts::Alerta("success","Agregado!","Estado Agregado correctamente!");
            } else {
               Alerts::Alerta("error","Error!","No se agragaron los datos!");
            }
      }
   $this->MyProducts(1, "id", "asc");
  }



   public function FormData($data){ // cambia el estado del producto asignado
   $db = new dbConn();

        if ($r = $db->select("edo", "producto_empresa", "WHERE id = '".$data["key"]."'")) { 
          return $r["edo"];
        }  unset($r);  
    }


   public function DataForm($data){ // cambia el estado del producto asignado

      $edo = $this->FormData($data);

        if($edo == 1){
        echo '<select class="browser-default custom-select" id="edo" name="edo">'; 
        echo '<option selected disabled>* Estado</option>';
        echo '<option '; if($edo == 1) { echo 'selected '; } echo 'value="1">Activo</option>';
        echo '<option '; if($edo == 2) { echo 'selected '; } echo 'value="2">En Proceso</option>';
        echo '<option '; if($edo == 3) { echo 'selected '; } echo 'value="3">Vendido</option>';
        echo '<option '; if($edo == 4) { echo 'selected '; } echo 'value="4">Pagado</option>';
        echo '<option '; if($edo == 5) { echo 'selected '; } echo 'value="5">Eliminar</option>';
        echo '</select>';          
        }
        if($edo == 2){
        echo '<select class="browser-default custom-select" id="edo" name="edo">'; 
        echo '<option selected disabled>* Estado</option>';
        echo '<option '; if($edo == 2) { echo 'selected '; } echo 'value="2">En Proceso</option>';
        echo '<option '; if($edo == 3) { echo 'selected '; } echo 'value="3">Vendido</option>';
        echo '<option '; if($edo == 4) { echo 'selected '; } echo 'value="4">Pagado</option>';
        echo '<option '; if($edo == 5) { echo 'selected '; } echo 'value="5">Eliminar</option>';
        echo '</select>';          
        }
        if($edo == 3){
        echo '<select class="browser-default custom-select" id="edo" name="edo">'; 
        echo '<option selected disabled>* Estado</option>';
        echo '<option '; if($edo == 3) { echo 'selected '; } echo 'value="3">Vendido</option>';
        echo '<option '; if($edo == 4) { echo 'selected '; } echo 'value="4">Pagado</option>'; 
        echo '</select>';       
        }               
        if($edo == 4){
        echo '<select class="browser-default custom-select" id="edo" name="edo">'; 
        echo '<option selected disabled>* Estado</option>';
        echo '<option '; if($edo == 4) { echo 'selected '; } echo 'value="4">Pagado</option>';  
        echo '</select>';    
        }         
        if($edo == 5){
        Alerts::Mensajex("Este producto ha sido eliminado!","warning");      
        } 

  }









////////////empresa y productos asignadoa a cada una
public function ProductosVendidos($npagina, $orden, $dir){
      $db = new dbConn();

  $limit = 12;
  $adjacents = 2;
  if($npagina == NULL) $npagina = 1;
  if($_SESSION["tipo_cuenta"] == 1){
  $a = $db->query("SELECT * FROM producto_empresa WHERE edo = '3' or edo = '4'");
  } else {
  $a = $db->query("SELECT * FROM producto_empresa WHERE edo = '3' or edo = '4' and correlativo != '0'");
  }

  $total_rows = $a->num_rows;
  $a->close();

  $total_pages = ceil($total_rows / $limit);
  
  if(isset($npagina) && $npagina != NULL) {
    $page = $npagina;
    $offset = $limit * ($page-1);
  } else {
    $page = 1;
    $offset = 0;
  }

if($dir == "desc") $dir2 = "asc";
if($dir == "asc") $dir2 = "desc";
$op = 43; // opcion a donde se redirige la pginacion

  if($_SESSION["tipo_cuenta"] == 1){
 $a = $db->query("SELECT * FROM producto_empresa WHERE edo = '3' or edo = '4' order by ".$orden." ".$dir." limit $offset, $limit");      
  } else {
 $a = $db->query("SELECT * FROM producto_empresa WHERE edo = '3' or edo = '4' and correlativo != '0' order by ".$orden." ".$dir." limit $offset, $limit");         
  }

      if($a->num_rows > 0){
          echo '<div class="table-responsive"><table class="table table-sm table-striped">
        <thead>
          <tr>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="producto" dir="'.$dir2.'">Producto</a></th>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="empresa" dir="'.$dir2.'">Empresa</a></th>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="vfecha" dir="'.$dir2.'">Vendido</a></th>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="pfecha" dir="'.$dir2.'">Pagado</a></th>
            <th class="th-sm"><a id="paginador" op="'.$op.'" iden="1" orden="edo" dir="'.$dir2.'">Estado</a></th>
            <th>OP</th>
          </tr>
        </thead>
        <tbody>';
        foreach ($a as $b) {
          if($b["correlativo"] == 2){
            $edo = '<i class="fas fa-ban fa-lg red-text"></i>';
          } else {
            $edo = '<a id="vendidos" producto="'. $b["producto"] .'" empresa="'. $b["empresa"] .'" codigo="'. $this->CodigoProducto($b["producto"]) .'" op="44"><i class="fas fa-cogs fa-lg green-text"></i></a>';
          }
          echo '<tr>
                      <td>'.$this->NombreProducto($b["producto"]).'</td>
                      <td>'.$this->NombreEmpresa($b["empresa"]).'</td>
                      <td>'.$b["vfecha"].'</td>
                      <td>'.$b["pfecha"].'</td>
                      <td>'.Helpers::EdoProAsig($b["edo"]).'</td>
                      <td>'.$edo.'</td>
                    </tr>';
        }
        echo '</tbody>
        </table></div>';
      }
        $a->close();

  if($total_pages <= (1+($adjacents * 2))) {
    $start = 1;
    $end   = $total_pages;
  } else {
    if(($page - $adjacents) > 1) {  
      if(($page + $adjacents) < $total_pages) {  
        $start = ($page - $adjacents); 
        $end   = ($page + $adjacents); 
      } else {              
        $start = ($total_pages - (1+($adjacents*2))); 
        $end   = $total_pages; 
      }
    } else {
      $start = 1; 
      $end   = (1+($adjacents * 2));
    }
  }
echo $total_rows . " Registros encontrados";
   if($total_pages > 1) { 

$page <= 1 ? $enable = 'disabled' : $enable = '';
    echo '<ul class="pagination pagination-sm justify-content-center">
    <li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="1" orden="'.$orden.'" dir="'.$dir.'">&lt;&lt;</a>
      </li>';
    
    $page>1 ? $pagina = $page-1 : $pagina = 1;
    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$pagina.'" orden="'.$orden.'" dir="'.$dir.'">&lt;</a>
      </li>';

    for($i=$start; $i<=$end; $i++) {
      $i == $page ? $pagina =  'active' : $pagina = '';
      echo '<li class="page-item '.$pagina.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$i.'" orden="'.$orden.'" dir="'.$dir.'">'.$i.'</a>
      </li>';
    }

    $page >= $total_pages ? $enable = 'disabled' : $enable = '';
    $page < $total_pages ? $pagina = ($page+1) : $pagina = $total_pages;
    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$pagina.'" orden="'.$orden.'" dir="'.$dir.'">&gt;</a>
      </li>';

    echo '<li class="page-item '.$enable.'">
        <a class="page-link" id="paginador" op="'.$op.'" iden="'.$total_pages.'" orden="'.$orden.'" dir="'.$dir.'">&gt;&gt;</a>
      </li>

      </ul>';
     }  // end pagination 
  } // termina productos





   public function NombreProducto($key){ 
   $db = new dbConn();

        if ($r = $db->select("producto", "producto", "WHERE id = '".$key."'")) { 
          return $r["producto"];
        }  unset($r);  
    }


   public function NombreEmpresa($key){ 
   $db = new dbConn();

        if ($r = $db->select("nombre", "empresa", "WHERE id = '".$key."'")) { 
          return $r["nombre"];
        }  unset($r);  
    }

   public function CodigoProducto($key){ 
   $db = new dbConn();

        if ($r = $db->select("codigo", "producto", "WHERE id = '".$key."'")) { 
          return $r["codigo"];
        }  unset($r);  
    }
















} // fin de la clase

 ?>