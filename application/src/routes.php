<?php
include_once '../common/Helpers.php'; // [Para todo]
include_once '../includes/variables_db.php';
include_once '../common/Mysqli.php';
$db = new dbConn();
include_once '../includes/DataLogin.php';
$seslog = new Login();
$seslog->sec_session_start();





include_once '../common/Alerts.php';
include_once '../common/Fechas.php';
include_once '../common/Encrypt.php';







/// usuarios

if($_REQUEST["op"]=="0"){ // redirecciona despues de registrar a llenar datos
	include_once '../includes/DataLogin.php';
	$seslog->Register($_POST);
exit();
}


// filtros para cuando no hay session abierta
if ($seslog->login_check() != TRUE) {
echo '<script>
	window.location.href="application/includes/logout.php"
</script>';
exit();
} 

if($_SESSION["user"] == NULL and $_SESSION["td"] == NULL){
echo '<script>
	window.location.href="application/includes/logout.php"
</script>';
exit();
}
//


if($_REQUEST["op"]=="1"){ // cambia el password
include_once '../../system/user/Usuarios.php';
$usuarios = new Usuarios;
$passw1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_STRING);
$passw2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_STRING);
$usuarios->CompararPass($passw1, $passw2); 
}


if($_REQUEST["op"]=="2"){ // terminar usuario
	if($_POST["nombre"] != NULL && $_POST["tipo"] != NULL){
	include_once '../../system/user/Usuarios.php';
	$usuarios = new Usuarios;
	$usuarios->TerminarUsuario(Helpers::Mayusculas($_POST["nombre"]),$_POST["tipo"],sha1($_POST["user"]));	
	} else {
	Alerts::Alerta("error","Error!","Faltan Datos!");	
	}
}



if($_REQUEST["op"]=="3"){ // terminar actualizar
	if($_POST["nombre"] != NULL && $_POST["tipo"] != NULL){
	include_once '../../system/user/Usuarios.php';
	$usuarios = new Usuarios;
	$usuarios->ActualizarUsuario(Helpers::Mayusculas($_POST["nombre"]),$_POST["tipo"],sha1($_POST["user"]));	
	} else {
	Alerts::Alerta("error","Error!","Faltan Datos!");	
	}
}


if($_REQUEST["op"]=="4"){ // cambiar avatar
include_once '../../system/user/Usuarios.php';
	$usuarios = new Usuarios;
	$usuarios->CambiarAvatar($_REQUEST["iden"],$_REQUEST["user"]);
}



if($_REQUEST["op"]=="5"){ // pregunta si elimina el usuario
include_once '../../system/user/Usuarios.php';
$usuarios = new Usuarios;
Alerts::EliminarUsuario($_REQUEST["iden"], $_REQUEST["username"]);

}


if($_REQUEST["op"]=="6"){ // elimina el usuario
include_once '../../system/user/Usuarios.php';
$usuarios = new Usuarios;
$usuarios->EliminarUsuario($_REQUEST["iden"], $_REQUEST["username"]);
}





////////// perfil

if($_REQUEST["op"]=="10"){  // agregar datos de perfil
include_once '../../system/perfil/Perfiles.php';
	$perfil = new Perfiles;
	$perfil->AddDatos($_POST);
}




/// subir foto
if($_REQUEST["op"]=="11"){
include("../common/Imagenes.php");
	$imagen = new upload($_FILES['archivo']);
include_once '../../system/perfil/Perfiles.php';
	$perfil = new Perfiles;

	if($imagen->uploaded) {
		if($imagen->image_src_y > 800 or $imagen->image_src_x > 800){ // si ancho o alto es mayir a 800
			$imagen->image_resize         		= true; // default is true
			$imagen->image_ratio        		= true; // para que se ajuste dependiendo del ancho definido
			$imagen->image_x              		= 800; // para el ancho a cortar
			$imagen->image_y              		= 800; // para el alto a cortar
		}
		$imagen->file_new_name_body   		= Helpers::TimeId(); // agregamos un nuevo nombre	
		$imagen->process('../../assets/img/avatar/');	

		$perfil->SaveFotoPerfil($imagen->file_dst_name);
	} 

		$foto = $perfil->GetFotoPerfil($_SESSION["username"]);
        echo '<img src="assets/img/avatar/'.$foto.'" alt="User Photo" class="z-depth-1 mb-3 img-fluid" />';

}






/// Eliminar imagen
if($_REQUEST["op"]=="12"){ // agrega primeros datos del producto
include_once '../../system/perfil/Perfiles.php';
	$perfil = new Perfiles;		
	
	$perfil->BorrarImagen();

	$foto = $perfil->GetFotoPerfil($_SESSION["username"]);
    echo '<img src="assets/img/avatar/'.$foto.'" alt="User Photo" class="z-depth-1 mb-3 img-fluid" />';

}



/// subir foto
if($_REQUEST["op"]=="13"){
include("../common/Imagenes.php");
	$imagen = new upload($_FILES['archivo']);
include_once '../../system/perfil/Perfiles.php';
	$perfil = new Perfiles;

	if($imagen->uploaded) {
		if($imagen->image_src_y > 800 or $imagen->image_src_x > 800){ // si ancho o alto es mayir a 800
			$imagen->image_resize         		= true; // default is true
			$imagen->image_ratio        		= true; // para que se ajuste dependiendo del ancho definido
			$imagen->image_x              		= 800; // para el ancho a cortar
			$imagen->image_y              		= 800; // para el alto a cortar
		}
		$imagen->file_new_name_body   		= Helpers::TimeId(); // agregamos un nuevo nombre	
		$imagen->process('../../assets/img/documentos/');	

		$perfil->SubirDocumento($imagen->file_dst_name, $_POST["documento"]);
	} 

}

/// Redirecciona a perfil si no hay datos aun
if($_REQUEST["op"]=="14"){ 
$_SESSION["config_edo"] = 1;

echo '<script>
	window.location.href="?perfil"
</script>';
exit();
}



/// ver perfil
if($_REQUEST["op"]=="15"){ // Muestra todo el perfil
include_once '../../system/perfil/Perfiles.php';
	$perfil = new Perfiles;		
	
	$perfil->VerPerfil();

}

/// Busca departamento
if($_REQUEST["op"]=="16"){ // 
include_once '../../system/perfil/Perfiles.php';
	$perfil = new Perfiles;		
	$perfil->VerDepartamentos($_POST["id"]);
}

if($_REQUEST["op"]=="17"){  // Insertar Redes Sociales
include_once '../../system/perfil/Perfiles.php';
	$perfil = new Perfiles;
	$perfil->InsertarRed($_POST);
}




/// agrego empresa
if($_REQUEST["op"]=="20"){ // 
include_once '../../system/empresa/Empresas.php';
	$empresa = new Empresas();		
	$empresa->AddDatos($_POST);
}


/// agrego producto
if($_REQUEST["op"]=="25"){ // 
include_once '../../system/producto/Productos.php';
	$producto = new Productos();		
	$producto->AddDatos($_POST);
}

// subir archivo
if($_REQUEST["op"]=="26"){
include("../common/Imagenes.php");
	$documento = new upload($_FILES['archivo']);
include_once '../../system/producto/Productos.php';
	$producto = new Productos;

	if($documento->uploaded) {
		if($documento->image_src_y > 800 or $documento->image_src_x > 800){ // si ancho o alto es mayir a 800
			$documento->image_resize         		= true; // default is true
			$documento->image_ratio        		= true; // para que se ajuste dependiendo del ancho definido
			$documento->image_x              		= 800; // para el ancho a cortar
			$documento->image_y              		= 800; // para el alto a cortar
		}
		$documento->file_new_name_body   		= Helpers::TimeId(); // agregamos un nuevo nombre	
		$documento->process('../../assets/archivos/');	

		$producto->SubirDocumento($documento->file_dst_name, $_POST["producto"], $_POST["nombre"], $_POST["descripcion"]);

		/// notifi
		include_once '../../system/notificaciones/Notifi.php';
		$not = new Notifi(); // 1 producto, 2 cita hoy, 3 descarga
		$not->AddNotifi("Nuevo Archivo Agregado", 3);
	} 

}


/// borrar producto
if($_REQUEST["op"]=="27"){ // 
include_once '../../system/producto/Productos.php';
	$producto = new Productos();		
	$producto->DelArchivo($_POST);
}



/// agrego precio
if($_REQUEST["op"]=="28"){ // 
include_once '../../system/producto/Productos.php';
	$producto = new Productos();		
	$producto->AddPrecio($_POST);
}


/// borrar precio
if($_REQUEST["op"]=="29"){ // 
include_once '../../system/producto/Productos.php';
	$producto = new Productos();		
	$producto->DelPrecio($_POST);
}

if($_REQUEST["op"]=="30"){ 
include_once '../../system/producto/Productos.php';
	$producto = new Productos();	
	$producto->AllProduct($_POST["iden"], $_POST["orden"], $_POST["dir"]);
}

if($_REQUEST["op"]=="31"){ // extrae datos para modal
include_once '../../system/producto/Productos.php';
	$producto = new Productos();	
	$producto->DataModal($_POST["key"]);
}

if($_REQUEST["op"]=="32"){ // extrae datos para modal usuarios asignados
include_once '../../system/producto/Productos.php';
	$producto = new Productos();	
	$producto->DataModal($_POST["key"]);
}

if($_REQUEST["op"]=="33"){ // Asigna usuario al producto
include_once '../../system/producto/Productos.php';
	$producto = new Productos();	
	$producto->AddUserP($_POST);

/// notifi
	if($_POST["opx"] == 1){
	include_once '../../system/notificaciones/Notifi.php';
	$not = new Notifi(); // 1 producto, 2 cita hoy, 3 descarga
	$not->AddNotifi("Nuevo Producto Agregado", 1, $_POST["username"], $_POST["producto"]);
	}
}



if($_REQUEST["op"]=="34"){ 
include_once '../../system/empresa/Empresas.php';
	$empresa = new Empresas();	
	$empresa->MyEmpresas($_POST["iden"], $_POST["orden"], $_POST["dir"]);
}



if($_REQUEST["op"]=="35"){ 
include_once '../../system/empresa/Empresas.php';
	$empresa = new Empresas();	
	$empresa->AllEmpresas($_POST["iden"], $_POST["orden"], $_POST["dir"]);
}



if($_REQUEST["op"]=="36"){ // detalles del modal de empresa
include_once '../../system/empresa/Empresas.php';
	$empresa = new Empresas();	
	$empresa->ModalEmpresa($_POST["key"]);

}

if($_REQUEST["op"]=="37"){ // Agrega productos a la empresa
include_once '../../system/empresa/Empresas.php';
	$empresa = new Empresas();	
	$empresa->AddEmp($_POST);

}


if($_REQUEST["op"]=="38"){ // Ver empresa y productos asignados
include_once '../../system/empresa/Empresas.php';
	$empresa = new Empresas();	
	$empresa->MyProducts($_POST["iden"], $_POST["orden"], $_POST["dir"]);

}

if($_REQUEST["op"]=="39"){ // cambia el estado del producto asignado
include_once '../../system/empresa/Empresas.php';
	$empresa = new Empresas();	
	$empresa->cambiarEdo($_POST);

}

if($_REQUEST["op"]=="390"){ // cambia el estado del producto asignado
include_once '../../system/empresa/Empresas.php';
	$empresa = new Empresas();	
	$empresa->DataForm($_POST);

}
if($_REQUEST["op"]=="391"){ // cambia el estado del producto asignado
include_once '../../system/empresa/Empresas.php';
	$empresa = new Empresas();	
	$empresa->FormData($_POST);

}

/// historial
if($_REQUEST["op"]=="40"){ // Agrega historial a la empresa
include_once '../../system/historial/Historiales.php';
	$historial = new Historiales();	
	$historial->AddHis($_POST);

}

/// historial cambiar historial de cita
if($_REQUEST["op"]=="41"){ // Agrega historial a la empresa
include_once '../../system/historial/Historiales.php';
	$historial = new Historiales();	
	$historial->CambiarEdo($_POST);

}



/// Ver Notiicaciones
if($_REQUEST["op"]=="50"){ // Agrega historial a la empresa
include_once '../../system/notificaciones/Notifi.php';
	$notificaciones = new Notifi();	
	$notificaciones->VerNotifi();

}






/////////
$db->close();
?>