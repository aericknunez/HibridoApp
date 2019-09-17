$(document).ready(function(){



	$('#btn-empresa').click(function(e){ /// agregar datos
	e.preventDefault();
	$.ajax({
			url: "application/src/routes.php?op=20",
			method: "POST",
			data: $("#form-empresa").serialize(),
			beforeSend: function () {
				$('#btn-empresa').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
	        },
			success: function(data){
				$('#btn-empresa').html('Guardar').removeClass('disabled');	      
				$("#form-empresa").trigger("reset");
				$("#msj").html(data);
			}
		})
	});



//// cambiar pais
    $("#pais").change(function()
    {
        var id=$(this).val();
        var dataString = 'id='+ id;
    
        $.ajax
        ({
            type: "POST",
            url: "application/src/routes.php?op=16", // obterngo departamento
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#dep").html(html);
            } 
        });
    });







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





    $("body").on("click","#emp-op",function(){
        var op = $(this).attr('op');
        var empresa = $(this).attr('empresa');
        var opx = $(this).attr('opx');
        var producto = $(this).attr('producto');
        var dataString = 'op='+op+'&empresa='+empresa+'&opx='+opx+'&producto='+producto;

        $.ajax({
            type: "POST",
            url: "application/src/routes.php",
            data: dataString,
            beforeSend: function () {
               $("#empresas").html('<div class="row justify-content-md-center" ><img src="assets/img/load.gif" alt=""></div>');
            },
            success: function(data) {            
                $("#empresas").html(data); // lo que regresa de la busquea 
            }
        });
    });  





    $("body").on("click","#xcambiar",function(){ // para cambiar el estado del producto asignado
        
        $('#ModalCambiar').modal('show');
        
        var key = $(this).attr('key');

        $('#producto').attr("value",key);
        $('#btn-pro').attr("href",'?pro&key='+key);
        
    });


    $('#btn-estado').click(function(e){ /// agregar datos
    e.preventDefault();
    $.ajax({
            url: "application/src/routes.php?op=39",
            method: "POST",
            data: $("#form-estado").serialize(),
            beforeSend: function () {
                $('#btn-estado').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
            },
            success: function(data){
                $('#btn-estado').html('Guardar').removeClass('disabled');          
                $("#form-estado").trigger("reset");
                $('#ModalCambiar').modal('hide');
                $("#contenido").html(data);
            }
        })
    });











}); // termina query