$(document).ready(function(){

		$('.datepicker').pickadate({
		  weekdaysShort: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
		  weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
		  monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre',
		  'Noviembre', 'Diciembre'],
		  monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
		  'Nov', 'Dic'],
		  showMonthsShort: true,
		  formatSubmit: 'dd-mm-yyyy',
		  close: 'Cancel'
		})
    

    $(document).ready(function() { // para que funcionen los select
    $('.mdb-select').materialSelect();
    });







	$('#btn-perfil').click(function(e){ /// agregar datos
	e.preventDefault();
	$.ajax({
			url: "application/src/routes.php?op=10",
			method: "POST",
			data: $("#form-perfil").serialize(),
			beforeSend: function () {
				$('#btn-perfil').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
	        },
			success: function(data){
				$('#btn-perfil').html('Guardar').removeClass('disabled');	      
				$("#form-perfil").trigger("reset");
				$("#msj").html(data);
			}
		})
	});



/// subir foto
    $("#btn-img").click(function (event) {
        event.preventDefault();
        var form = $('#form-img')[0];
        var data = new FormData(form);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "application/src/routes.php?op=11",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
				$('#btn-img').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
	       		$('#borrar-img').addClass('disabled');	       		
	        },
            success: function (data) {
            	$('#btn-img').html('Subir Foto').removeClass('disabled');
            	$('#borrar-img').html('Eliminar').removeClass('disabled');
                $("#contenido-img").html(data);
                $("#form-img").trigger("reset");
            },
        });
    });


	$("body").on("click","#borrar-img",function(){ // borrar la image
	var op = $(this).attr('op');
		    $.post("application/src/routes.php", {op:op}, function(data){
			$("#contenido-img").html(data);
	   	 });
	});





function EsconderDui(){
	$("#dui").hide();
}

function EsconderNit(){
	$("#nit").hide();
}

EsconderDui();
EsconderNit();

	$("body").on("click","#dui-ver",function(){ 
		$("#dui").show();
		$("#dui-msj").hide();
	});

	$("body").on("click","#nit-ver",function(){ 
		$("#nit").show();
		$("#nit-msj").hide();
	});

	$("body").on("click","#dui-hid",function(){ 
		$("#dui").hide();
		$("#dui-msj").show();
	});

	$("body").on("click","#nit-hid",function(){ 
		$("#nit").hide();
		$("#nit-msj").show();
	});


/// subir dui
    $("#btn-dui").click(function (event) {
        event.preventDefault();
        var form = $('#form-dui')[0];
        var data = new FormData(form);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "application/src/routes.php?op=13",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
				$('#btn-dui').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');   		
	        },
            success: function (data) {
            	$('#btn-dui').html('Subir Documento').removeClass('disabled');
            	$("#dui").hide();
				$("#dui-msj").show();
                $("#dui-msj").html(data);
                $("#form-dui").trigger("reset");
            },
        });
    });


/// subir nit
    $("#btn-nit").click(function (event) {
        event.preventDefault();
        var form = $('#form-nit')[0];
        var data = new FormData(form);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "application/src/routes.php?op=13",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function () {
				$('#btn-nit').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');   		
	        },
            success: function (data) {
            	$('#btn-nit').html('Subir NIT').removeClass('disabled');
            	$("#nit").hide();
				$("#nit-msj").show();
                $("#nit-msj").html(data);
                $("#form-nit").trigger("reset");
            },
        });
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





}); // termina query