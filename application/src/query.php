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

	if($_GET["modal"] == "redes"){
	echo '<script type="text/javascript" src="assets/js/query/perfil.js?v='.$numero.'"></script>';
	}





} // termina modal

elseif($_SESSION["caduca"] != 0) {
echo '<script type="text/javascript" src="assets/js/query/noacceso.js?v='.$numero.'"></script>';
} 



elseif(isset($_GET["user"])) {
echo '<script type="text/javascript" src="system/user/login.js?v='.$numero.'"></script>';
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
elseif(isset($_GET["myempresa"])) {
echo '<script type="text/javascript" src="assets/js/query/empresa.js?v='.$numero.'"></script>';
echo '<script type="text/javascript" src="assets/js/query/paginador.js?v='.$numero.'"></script>';
}
elseif(isset($_GET["proasig"])) {
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
elseif(isset($_GET["provendidos"])) {
echo '<script type="text/javascript" src="assets/js/query/correlativo.js?v='.$numero.'"></script>';
echo '<script type="text/javascript" src="assets/js/query/paginador.js?v='.$numero.'"></script>';
} 




elseif(isset($_GET["historial"])) {
echo '<script type="text/javascript" src="assets/js/query/historial.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["todaslascitas"])) {
echo '<script type="text/javascript" src="assets/js/query/historial.js?v='.$numero.'"></script>';
} 


elseif(isset($_GET["download"])) {
echo '<script type="text/javascript" src="assets/js/query/download.js?v='.$numero.'"></script>';
} 

/////////////// api
elseif(isset($_GET["addbd"])) {
echo '<script type="text/javascript" src="assets/js/query/api.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["addcimages"])) {
echo '<script type="text/javascript" src="assets/js/query/api.js?v='.$numero.'"></script>';
} 
elseif(isset($_GET["addtimages"])) {
echo '<script type="text/javascript" src="assets/js/query/api.js?v='.$numero.'"></script>';
} 




else{
/// lo que llevara index

		if($index == TRUE){
		echo '<script type="text/javascript" src="assets/js/query/index.js?v='.$numero.'"></script>';
		}
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
    $(window).on("load", function () {
        $('#mdb-preloader').fadeOut('fast');
    });


function Notificaciones(){ // Ver notificaciones
        $.ajax({
            url: "application/src/routes.php?op=50",
            method: "POST",
            success: function(data){
                $("#notificaciones").html(data);         
            }
        });
}

Notificaciones();

</script>
