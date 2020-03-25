$(document).ready(function()
{

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


// db_sync
	$('#btn-new-hash').click(function(e){ /// agregar datos
	e.preventDefault();
	$.ajax({
			url: "application/src/routes.php?op=100",
			method: "POST",
			data: $("#form-new-hash").serialize(),
			beforeSend: function () {
				$('#btn-new-hash').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
	        },
			success: function(data){
				$('#btn-new-hash').html('Guardar').removeClass('disabled');	      
				$("#form-new-hash").trigger("reset");
				$("#contenido").html(data);
			}
		})
	});


$("#form-new-hash").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
if (e.which == 13) {
return false;
}
});


    $("body").on("click","#eliminardb",function(){ 
        
        var hash = $(this).attr('hash');
        var op = $(this).attr('op');
        var dataString = 'op='+op+'&hash='+hash;

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
    });


    $("body").on("click","#cambiaredo",function(){ 
        
        var edo = $(this).attr('edo');
        var sistema = $(this).attr('sistema');
        var op = $(this).attr('op');
        var td = $(this).attr('td');
        var hash = $(this).attr('hash');
        var dataString = 'op='+op+'&edo='+edo+'&td='+td+'&hash='+hash+'&sistema='+sistema;

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
    });



    $("body").on("click","#cimagen",function(){ 
        
        var img = $(this).attr('img');
        var cat = $(this).attr('cat');
        var t = $(this).attr('t');
        var op = $(this).attr('op');
        var dataString = 'op='+op+'&img='+img+'&cat='+cat+'&t='+t;

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
    });







});