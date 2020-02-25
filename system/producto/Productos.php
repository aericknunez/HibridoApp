<?php 
class Productos{

	public function __construct() { 
     } 


	public function CompruebaExistencia($key){ // comprueba si existe o no 
		$db = new dbConn();
		$a = $db->query("SELECT * FROM producto_usuario WHERE producto = '".$key."' and username = '".$_SESSION["username"]."'");
		if($a->num_rows > 0) return TRUE;
		else return FALSE;
		$a->close();
	}





     public function AddDatos($data){
     	$db = new dbConn();
     	if($data["descripcion"] != NULL and $data["producto"] != NULL){
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
		    $datos = array();
		    $datos["producto"] = $data["producto"];
		    $datos["descripcion"] = $data["descripcion"];
		    $datos["condiciones"] = $data["condiciones"];
		    $datos["rugro"] = $data["rugro"];
		    $datos["fecha"] = date("d-m-Y");
		    $datos["hora"] = date("H:i:s");
		    $datos["caduca"] = date("d-m-Y", strtotime($data["caduca"]));
		    $datos["edo"] = 1;

		    if ($db->update("producto", $datos, "WHERE id='".$data["iden"]."'")) {
		        Alerts::Alerta("success","Actualizado!","Actualizado correctamente!");
		        echo '<script>
					window.location.href="?pro&key='.$data["iden"].'" 
				</script>';
		    } else {
		        Alerts::Alerta("error","Error!","Sucedio un error!");
		    }
	    
	}



	public function Insertar($data){
		$db = new dbConn();
		    $datos = array();
		    $datos["producto"] = $data["producto"];
		    $datos["descripcion"] = $data["descripcion"];
		    $datos["condiciones"] = $data["condiciones"];
		    $datos["rugro"] = $data["rugro"];
		    $datos["fecha"] = date("d-m-Y");
		    $datos["hora"] = date("H:i:s");
		    $datos["caduca"] = date("d-m-Y", strtotime($data["caduca"]));
		    $datos["edo"] = 1;
			    if ($db->insert("producto", $datos)) {
			    	$i = $db->insert_id();
			    	$this->InsertarUsuario($i);
			        Alerts::Alerta("success","Agregado!","Datos Agregados!");
			        echo '<script>
					window.location.href="?pro&key='.$i.'" 
				</script>';
			    } else {
			    	 Alerts::Alerta("error","Error!","No se agragaron los datos!");
			    }
	}


	public function InsertarUsuario($iden){ /// para el que agrega el producto se le asigne automaticamente
		$db = new dbConn();
		    $datos = array();
		    $datos["producto"] = $iden;
		    $datos["username"] = $_SESSION["username"];
		    $datos["fecha"] = date("d-m-Y");
		    $datos["hora"] = date("H:i:s");
		    $datos["edo"] = 1;
			$db->insert("producto_usuario", $datos);
	}


   public function SubirDocumento($file, $producto, $nombre, $descripcion){ // guarda archivo del producto
   $db = new dbConn();
      if($file != NULL and $producto != NULL){
          $datos = array();
          $datos["archivo"] = $file;
          $datos["producto"] = $producto;
          $datos["nombre"] = $nombre;
          $datos["descripcion"] = $descripcion;
          $datos["edo"] = 1;
          if($db->insert("producto_archivos", $datos)){
          	Alerts::Alerta("success","Agregado!","Archivo Agregado correctamente!");
          } else {
          	Alerts::Alerta("error","Error!","Error en la carga del archivo!");
          }
       } else {
		        Alerts::Alerta("error","Error!","faltan datos importante!");
		}
       $this->VerDocumento($producto);
   }



   public function VerDocumento($producto, $del = NULL, $tit = NULL){ // guarda archivo del producto
   $db = new dbConn();

    $a = $db->query("SELECT * FROM producto_archivos WHERE producto = '".$producto."'");
    if($a->num_rows){
    	if($tit != NULL){
    	echo "Documentos asignados al producto";
    	}
    	echo '<table class="table table-striped table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Documento</th>
			      <th scope="col">Descripción</th>';
			      if($del == NULL){ echo '<th scope="col">Eliminar</th>'; }
			echo '</tr>
			  </thead>
			  <tbody>';
			  $n = 1;
	    foreach ($a as $b) {
	    	echo '<tr>
			      <th scope="row">'.$n ++.'</th>
			      <td><a href="download.php?data='. $b["archivo"] .'&name='. $b["nombre"] .'" title="'.$b["descripcion"].'">'. $b["nombre"] .'</td>
			      <td>'. $b["descripcion"] .'</td>';
			      if($del == NULL){ echo '<td> <a id="eliminar-d" op="27" producto="'. $b["producto"] .'" iden="'. $b["id"] .'" archivo="'. $b["archivo"] .'"><span class="badge badge-danger"><i class="fas fa-ban" aria-hidden="true"></i></span></a></td>'; }   
			echo '</tr>';
	    } echo '</tbody>
				</table>';
	} else {
		Alerts::Mensajex("No se han asinado documentos a este producto","danger");
	}
    $a->close();
 }



   public function DelArchivo($data){ // borra archivo del producto
   $db = new dbConn();
   	
	   	if ($db->delete("producto_archivos", "WHERE id='".$data["iden"]."'")) {
	   		$url = "../../assets/archivos/";
	   		if (file_exists($url . $data["archivo"])) {
				@unlink($url . $data["archivo"]);
			} 
	        Alerts::Alerta("success","Agregado!","Archivo Eliminado correctamente!");
	    } else {
	        Alerts::Alerta("error","Error!","Error en la eliminacion del archivo!");
	    } 
  	$this->VerDocumento($data["producto"]);
  }



   public function VerPrecios($producto, $del = NULL, $tit = null){ // guarda archivo del producto
   $db = new dbConn();

    $a = $db->query("SELECT * FROM producto_precios WHERE producto = '".$producto."'");
    if($a->num_rows){
    	if($tit != NULL){
    	echo "Precios asignados al producto";
    	}
    	echo '<table class="table table-striped table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Cantidad</th>
			      <th scope="col">Pts</th>
			      <th scope="col">Descripción</th>
			      <th scope="col">Precio</th>';
			      if($del == NULL){ echo '<th scope="col">Eliminar</th>'; }
			echo '</tr>
			  </thead>
			  <tbody>';
			  $n = 1;
	    foreach ($a as $b) {
	    	echo '<tr>
			      <th scope="row">'.$n ++.'</th>
			      <td>'. $b["cantidad"] .'</td>
			      <td>'. $b["puntos"] .'</td>
			      <td>'. $b["descripcion"] .'</td>
			      <td>'. $b["precio"] .'</td>';
			      if($del == NULL){ echo '<td> <a id="eliminar-p" op="29" producto="'. $b["producto"] .'" iden="'. $b["id"] .'" ><span class="badge badge-danger"><i class="fas fa-ban" aria-hidden="true"></i></span></a></td>'; }   
			echo '</tr>';
	    } echo '</tbody>
				</table>';
	} else {
		Alerts::Mensajex("No se han asinado precios a este producto","danger");
	}
    $a->close();
 }


	public function AddPrecio($data){
		$db = new dbConn();
		if($data["descripcion"] != NULL and $data["precio"] != NULL){
		    $datos = array();
		    $datos["producto"] = $data["producto"];
		    $datos["cantidad"] = $data["cantidad"];
		    $datos["puntos"] = $data["puntos"];
		    $datos["descripcion"] = $data["descripcion"];
		    $datos["precio"] = $data["precio"];
			    if ($db->insert("producto_precios", $datos)) {
			        Alerts::Alerta("success","Agregado!","Datos Agregados!");
			    } else {
			    	 Alerts::Alerta("error","Error!","No se agragaron los datos!");
			    }
		} else {
		        Alerts::Alerta("error","Error!","faltan datos importante!");
		}
		$this->VerPrecios($data["producto"]);
	}


   public function DelPrecio($data){ // borra precio del producto
   $db = new dbConn();
   	
	   	if ($db->delete("producto_precios", "WHERE id='".$data["iden"]."'")) {
	        Alerts::Alerta("success","Agregado!","Archivo Eliminado correctamente!");
	    } else {
	        Alerts::Alerta("error","Error!","Error en la eliminacion del archivo!");
	    } 
  	$this->VerPrecios($data["producto"]);
  }






public function AllProduct($npagina, $orden, $dir){
      $db = new dbConn();

  $limit = 12;
  $adjacents = 2;
  if($npagina == NULL) $npagina = 1;
  $a = $db->query("SELECT * FROM producto_usuario WHERE username = '".$_SESSION["username"]."' and edo = 1");
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
$op = 30; // opcion a donde se redirige la pginacion

 $a = $db->query("SELECT * FROM producto_usuario WHERE username = '".$_SESSION["username"]."' and edo = 1 order by ".$orden." ".$dir." limit $offset, $limit");
      
      if($a->num_rows > 0){
          echo '<div class="table-responsive"><table class="table table-sm table-striped">
        <thead>
          <tr>
            <th class="th-sm">Producto</th>
            <th class="th-sm d-none d-md-block">Descripción</th>
            <th class="th-sm">Rugro</th>
            <th class="th-sm">Estado</th>
            <th class="th-sm">Ver</th>
          </tr>
        </thead>
        <tbody>';
        foreach ($a as $b) {
           $r = $db->select("*", "producto", "WHERE id = '".$b["producto"]."'");
          echo '<tr>
                      <td>'.$r["producto"].'</td>
                      <td class="d-none d-md-block">'.$r["descripcion"].'</td>
                      <td>'.Helpers::Rugro($r["rugro"]).'</td>
                      <td>'.Helpers::EdoProducto($r["edo"]) . '</td>
                      <td><a id="xver" op="31" key="'. $r["id"] .'"><i class="fas fa-search fa-lg green-text"></i></a></td>
                    </tr>';
         unset($r); 
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




   public function VerProducto($producto, $btn = NULL){ // Datos del producto
	 $db = new dbConn();
			     if ($r = $db->select("*", "producto", "WHERE id = '".$producto."'")) { 
			$iden = $r["id"];
			$producto = $r["producto"];
			$rugro = $r["rugro"];
			$caduca = $r["caduca"];
			$edo = $r["edo"];
			$descripcion = $r["descripcion"];
			$condiciones = $r["condiciones"];


			  }  unset($r);
	echo '<blockquote class="blockquote bq-danger">
	<p class="bq-title">'.$producto.'</p>
	<p>'.$descripcion.'</p>
	</blockquote>

	<ul class="list-group list-group-flush">
	<li class="list-group-item d-flex justify-content-between align-items-center"><span> Condiciones: </span> <span class="pro-detail">'.$condiciones.'</span></li>
	<li class="list-group-item d-flex justify-content-between align-items-center"><span> Rugro: </span> <span class="pro-detail">'.Helpers::Rugro($rugro).'</span></li>
	<li class="list-group-item d-flex justify-content-between align-items-center"><span> Fecha de caducidad: </span> <span class="pro-detail">'.$caduca.'</span></li>

	</ul>

	<div class="row">
	<div class="col-md-6 my-6 md-form text-left">


	</div>';
	if($btn != NULL and $_SESSION["tipo_cuenta"] == 1){
		echo '<div class="col-md-6 my-6 md-form text-right">
	<a class="btn btn-success btn-rounded btn-sm my-4" href="?producto&key='.$iden.'"><i class="fas fa-user mr-1"></i> Modificar Infomación </a>';
	}

	echo '</div>
	</div>';
 }




   public function DataModal($producto){ // datos exclusivos del modal
  		$this->VerProducto($producto);
  		$this->VerPrecios($producto,1,1);
  		$this->VerDocumento($producto,1,1);
  }



	public function AddUserP($data){
		$db = new dbConn();
		if($data["opx"] != NULL){
		    		
		    		if($data["opx"] == 1){ //insertar
		    			$datos = array();
					    $datos["producto"] = $data["producto"];
					    $datos["username"] = $data["username"];
					    $datos["fecha"] = date("d-m-Y");
					    $datos["hora"] = date("H:i:s");
					    $datos["edo"] = 1;
						    if ($db->insert("producto_usuario", $datos)) {
						        Alerts::Alerta("success","Agregado!","Datos Agregados!");
						    } else {
						    	 Alerts::Alerta("error","Error!","No se agragaron los datos!");
						    }
						} else { // eliminar
							if ($db->delete("producto_usuario", "WHERE username='".$data["username"]."' and  producto='".$data["producto"]."'")) {
						        Alerts::Alerta("success","Agregado!","Usuario Eliminado correctamente!");
						    } else {
						        Alerts::Alerta("error","Error!","Error en la eliminacion del usuario!");
						    } 
						}
		} else {
		        Alerts::Alerta("error","Error!","faltan datos importante!");
		}
		$this->VerUsuarios($data["producto"]);
	}





   public function VerUsuarios($producto){ // guarda archivo del producto
   $db = new dbConn();

    $a = $db->query("SELECT * FROM perfil WHERE edo = 1");
    if($a->num_rows){
    	echo '<table class="table table-striped table-sm">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Usuario</th>
			      <th scope="col">Eliminar</th>'; 
			echo '</tr>
			  </thead>
			  <tbody>';
			  $n = 1;
	    foreach ($a as $b) {
	    	$ax = $db->query("SELECT * FROM producto_usuario WHERE username = '".$b["username"]."' and producto = '".$producto."' and edo = 1");
			if($ax->num_rows > 0) { $src = "2"; $c = "red-text"; $ba = "badge-danger"; $fa= "fa-ban";} else { $src = "1"; $c = "black-text"; $ba = "badge-success"; $fa = "fa-check"; }
			$ax->close();
	    	echo '<tr class="'.$c.'">
			      <th scope="row">'.$n ++.'</th>
			      <td>'. Encrypt::Decrypt($b["nombre"], $_SESSION["secret_key"]) .'</td>
			      <td> <a id="user-op" op="33" opx="'. $src .'" username="'. $b["username"] .'" producto="'. $producto .'"><span class="badge '.$ba.'"><i class="fas '.$fa.'" aria-hidden="true"></i></span></a></td>';   
			echo '</tr>';
	    } echo '</tbody>
				</table>';
	} else {
		Alerts::Mensajex("No se han asinado Usuarios a este producto","danger");
	}
    $a->close();
 }






} // fin de la clase

 ?>

