<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($_SESSION["td"] == 0){
$numero = rand(1,9999999999);	
} else {
$numero = 1;	
}

//$numero = 1;

if(isset($_GET["modal"])) { 
echo '
	<script>
		$(document).ready(function()
		{
		  $("#' . $_GET["modal"] . '").modal("show");
		});
	</script>
	';


	if($_GET["modal"] == "registrar"){
	echo '<script type="text/javascript" src="assets/js/query/login.js?v='.$numero.'"></script>';
	}
	if($_GET["modal"] == "newpass"){
	echo '<script type="text/javascript" src="assets/js/query/user.js?v='.$numero.'"></script>';
	}
	if($_GET["modal"] == "userupdate"){
	echo '<script type="text/javascript" src="assets/js/query/user.js?v='.$numero.'"></script>';
	}
	if($_GET["modal"] == "avatar"){
	echo '<script type="text/javascript" src="assets/js/query/user.js?v='.$numero.'"></script>';
	}
	if($_GET["modal"] == "conf_config"){
	echo '<script type="text/javascript" src="assets/js/query/conf_config.js?v='.$numero.'"></script>';
	}
	if($_GET["modal"] == "conf_root"){
	echo '<script type="text/javascript" src="assets/js/query/conf_config.js?v='.$numero.'"></script>';
	}
	if($_GET["modal"] == "img_negocio"){
	echo '<script type="text/javascript" src="assets/js/query/img_negocio.js?v='.$numero.'"></script>';
	}




} // termina modal

elseif($_SESSION["caduca"] != 0) {
echo '<script type="text/javascript" src="assets/js/query/noacceso.js?v='.$numero.'"></script>';
} 



elseif(isset($_GET["user"])) {
echo '<script type="text/javascript" src="assets/js/query/user.js?v='.$numero.'"></script>';
} 


elseif(isset($_GET["perfil"])) {
echo '<script type="text/javascript" src="assets/js/query/perfil.js?v='.$numero.'"></script>';
} 


elseif(isset($_GET["empresa"])) {
echo '<script type="text/javascript" src="assets/js/query/empresa.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["empresas"])) {
echo '<script type="text/javascript" src="assets/js/query/empresa.js?v='.$numero.'"></script>';
echo '<script type="text/javascript" src="assets/js/query/paginador.js?v='.$numero.'"></script>';
}

elseif(isset($_GET["producto"])) {
echo '<script type="text/javascript" src="assets/js/query/producto.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["productos"])) {
echo '<script type="text/javascript" src="assets/js/query/producto.js?v='.$numero.'"></script>';
echo '<script type="text/javascript" src="assets/js/query/paginador.js?v='.$numero.'"></script>';
} 



else{
/// lo que llevara index
echo '<script type="text/javascript" src="assets/js/query/index.js?v='.$numero.'"></script>';

}
	
?>

<script>
	

	$("body").on("click","#cambiar",function(){ // borrar la image
	var op = $(this).attr('op');
		    $.post("application/src/routes.php", {op:op}, function(data){
			$("#msj-cambiar").html(data);
	   	 });
	});

// preloader
    // $(window).on("load", function () {
    //     $('#mdb-preloader').fadeOut('fast');
    // });

<?php if($index == TRUE){ ?>
function VerPerfil(){ // Extrae los datos del perfil cuando es invocada la funcion
        $.ajax({
            url: "application/src/routes.php?op=15",
            method: "POST",
            success: function(data){
                $("#perfil").html(data);         
            }
        });
}

VerPerfil();

<?php } ?>

</script>