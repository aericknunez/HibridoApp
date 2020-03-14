$(document).ready(function(){



/// modal de los productos vendidos
    $("body").on("click","#vendidos",function(){ 
        
        $('#ModalVendidos').modal('show');
        
        var producto = $(this).attr('producto');
        var empresa = $(this).attr('empresa');
        var codigo = $(this).attr('codigo');
        var op = $(this).attr('op');
        var dataString = 'op='+op+'&producto='+producto+'&empresa='+empresa+'&codigo='+codigo;

        $.ajax({
            type: "POST",
            url: "application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#vista").html('<div class="row justify-content-md-center" ><img src="assets/img/load.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#vista").html(data); // lo que regresa de la busquea         
            }
        });
    });




    $("body").on("click","#activarcodigo",function(){ 

        var producto = $(this).attr('producto');
        var empresa = $(this).attr('empresa');
        var codigo = $(this).attr('codigo');
        var op = $(this).attr('op');
        var dataString = 'op='+op+'&producto='+producto+'&empresa='+empresa+'&codigo='+codigo;

        $.ajax({
            type: "POST",
            url: "application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#vista").html('<div class="row justify-content-md-center" ><img src="assets/img/load.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#vista").html(data); // lo que regresa de la busquea    
                CargarTablaProductos();     
            }
        });
        $('#ModalVendidos').modal('hide');
    });


    $("body").on("click","#desactivarcodigo",function(){ 
        
        var producto = $(this).attr('producto');
        var empresa = $(this).attr('empresa');
        var codigo = $(this).attr('codigo');
        var op = $(this).attr('op');
        var dataString = 'op='+op+'&producto='+producto+'&empresa='+empresa+'&codigo='+codigo;

        $.ajax({
            type: "POST",
            url: "application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#vista").html('<div class="row justify-content-md-center" ><img src="assets/img/load.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#vista").html(data); // lo que regresa de la busquea 
                CargarTablaProductos();       
            }
        });
        $('#ModalVendidos').modal('hide');
    });


    $("body").on("click","#activar",function(){ 
        
        var producto = $(this).attr('producto');
        var clave = $(this).attr('clave');
        var codigo = $(this).attr('codigo');
        var empresa = $(this).attr('empresa');
        var correlativo = $(this).attr('correlativo');
        var op = $(this).attr('op');
        var dataString = 'op='+op+'&producto='+producto+'&empresa='+empresa+'&correlativo='+correlativo+'&clave='+clave+'&codigo='+codigo;

        $.ajax({
            type: "POST",
            url: "application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#vista").html('<div class="row justify-content-md-center" ><img src="assets/img/load.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#vista").html(data); // lo que regresa de la busquea     
                CargarTablaProductos();    
            }
        });
        $('#ModalVendidos').modal('hide');
    });




function CargarTablaProductos(){
        var iden = 1;
        var orden = "id";
        var dir = "asc";
        var op = 43;
        var dataString = 'op='+op+'&iden='+iden+'&orden='+orden+'&dir='+dir;

        $.ajax({
            type: "POST",
            url: "application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#contenido").html('<div class="row justify-content-md-center" ><img src="assets/img/load.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#contenido").html(data); // lo que regresa de la busquea         
            }
        });
}






}); // termina query