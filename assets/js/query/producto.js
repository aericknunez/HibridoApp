$(document).ready(function(){


    $('#btn-producto').click(function(e){ /// agregar datos
    e.preventDefault();
    $.ajax({
            url: "application/src/routes.php?op=25",
            method: "POST",
            data: $("#form-producto").serialize(),
            beforeSend: function () {
                $('#btn-producto').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
            },
            success: function(data){
                $('#btn-producto').html('Guardar').removeClass('disabled');       
                $("#form-producto").trigger("reset");
                $("#msj").html(data);
            }
        })
    });




/// subir archivo
    $("#btn-archivo").click(function (event) {
        event.preventDefault();
        var form = $('#form-archivo')[0];
        var data = new FormData(form);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "application/src/routes.php?op=26",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
				$('#btn-archivo').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
      		
	        },
            success: function (data) {
            	$('#btn-archivo').html('Subir Foto').removeClass('disabled');
                $("#contenido-archivo").html(data);
                $("#form-archivo").trigger("reset");
            },
        });
    });




    $("body").on("click","#eliminar-d",function(){
        var op = $(this).attr('op');
        var iden = $(this).attr('iden');
        var archivo = $(this).attr('archivo');
        var producto = $(this).attr('producto');
        var dataString = 'op='+op+'&iden='+iden+'&archivo='+archivo+'&producto='+producto;

        $.ajax({
            type: "POST",
            url: "application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#contenido-archivo").html('<div class="row justify-content-md-center" ><img src="assets/img/load.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#contenido-archivo").html(data); // lo que regresa de la busquea 
            }
        });
    });                 




/// agregar Precios
    $('#btn-precio').click(function(e){ /// agregar datos
    e.preventDefault();
    $.ajax({
            url: "application/src/routes.php?op=28",
            method: "POST",
            data: $("#form-precio").serialize(),
            beforeSend: function () {
                $('#btn-precio').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
            },
            success: function(data){
                $('#btn-precio').html('Agregar Precio').removeClass('disabled');       
                $("#form-precio").trigger("reset");
                $("#contenido-precios").html(data);
            }
        })
    });



    $("body").on("click","#eliminar-p",function(){
        var op = $(this).attr('op');
        var iden = $(this).attr('iden');
        var producto = $(this).attr('producto');
        var dataString = 'op='+op+'&iden='+iden+'&producto='+producto;

        $.ajax({
            type: "POST",
            url: "application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#contenido-precios").html('<div class="row justify-content-md-center" ><img src="assets/img/load.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#contenido-precios").html(data); // lo que regresa de la busquea 
            }
        });
    });      




/// llamar modal ver
    $("body").on("click","#xver",function(){ 
        
        $('#ModalVer').modal('show');
        
        var key = $(this).attr('key');
        var op = $(this).attr('op');
        var dataString = 'op='+op+'&key='+key;

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

        $('#btn-pro').attr("href",'?producto&key='+key);
        
    });




/// asigna usuario
    $("body").on("click","#user-op",function(){
        var op = $(this).attr('op');
        var username = $(this).attr('username');
        var opx = $(this).attr('opx');
        var producto = $(this).attr('producto');
        var dataString = 'op='+op+'&username='+username+'&opx='+opx+'&producto='+producto;

        $.ajax({
            type: "POST",
            url: "application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#usuarios").html('<div class="row justify-content-md-center" ><img src="assets/img/load.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#usuarios").html(data); // lo que regresa de la busquea 
            }
        });
    });  







}); // termina query