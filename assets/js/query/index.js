$(document).ready(function(){


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





}); // termina query