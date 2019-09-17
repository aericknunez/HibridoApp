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



    $('#hora').pickatime({
    // 12 or 24 hour
    twelvehour: true,
    });



	$('#btn-historial').click(function(e){ /// agregar datos
	e.preventDefault();
	$.ajax({
			url: "application/src/routes.php?op=40",
			method: "POST",
			data: $("#form-historial").serialize(),
			beforeSend: function () {
				$('#btn-historial').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
	        },
			success: function(data){
				$('#btn-historial').html('Guardar').removeClass('disabled');	      
				$("#form-historial").trigger("reset");
				$("#contenido-historial").html(data);
			}
		})
	});




/// llamar modal ver
    $("body").on("click","#xver",function(){ 
        
        $('#ModalVer').modal('show');
        
        var key = $(this).attr('key');

        $('#visita').attr("value",key);
        
    });



    $('#btn-estado').click(function(e){ /// agregar datos
    e.preventDefault();
    $.ajax({
            url: "application/src/routes.php?op=41",
            method: "POST",
            data: $("#form-estado").serialize(),
            beforeSend: function () {
                $('#btn-estado').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
            },
            success: function(data){
                $('#btn-estado').html('Guardar').removeClass('disabled');          
                $("#form-estado").trigger("reset");
                $("#contenido-historial").html(data);
            }
        })
    });













}); // termina query