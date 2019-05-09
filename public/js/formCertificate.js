$(document).ready(function(){

	$('#fecha').datetimepicker({format: 'DD/MM/YYYY'});
	var errorLabel = $('#alert-no-exists');
	var userInput  = $('#usuario');
	var idInput    = $("#invisible_id");
	$("#cedula").change(function(){
 
	var cedula   = parseInt($(this).val());
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
	        	type     : 'POST',
                url      : ajaxPath,
                dataType : 'json',
                data: {
                	documento: cedula	
                },
	        success: function(data){
				userInput.val('');
				idInput.val('');
				if(data!=''){
					var idUser         = data[0].id;
					var nombre         = data[0].primerNombre;
					var segNombre      = data[0].segundoNombre;
					var apellido       = data[0].primerApellido;
					var segApellido    = data[0].segundoApellido;
					var nombreCompleto = String(nombre + ' ' + segNombre + ' ' + apellido + ' ' + segApellido).toUpperCase();
					errorLabel.fadeOut();
					userInput.val(nombreCompleto);
					idInput.val(idUser);
				}else{
					errorLabel.fadeIn();
				}
	    	},
	    	error: function (data) {
            	console.log('Error:', data);
        	}
        });
	});

})