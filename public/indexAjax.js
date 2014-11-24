$(document).ready(function(){
	 setInterval(function() {
	 	$.ajax({
	 		url: "solicitar/NPermisos",
	 		type: 'GET',
          	success: function(data) {
            	$('#numpermisos').html(data);
          	},
          	error: function(jqXHR, textStatus, error) {
	            console.log( "error: " + jqXHR.responseText);
	        }
	 	});
	 }, 500);	
	$("#Envio").click(function() {
		$.ajax({
			data : {"nivel" : $("#nivel").val()},
			url: "seleccionar/nivel",
	 		type: 'POST',
          	success: function(response) {
            	$('#content-table').html(response);
          	},
          	error: function(jqXHR, textStatus, error) {
	            console.log( "error: " + jqXHR.responseText);
	        }
		});
	}); 
	$("#EnvioC").click(function() {
		$.ajax({
			data : {"nivel" : $("#nivel").val(),"idAlumno" : $("#idalumno").val()},
			url: "seleccionar/nivel",
	 		type: 'POST',
          	success: function(response) {
            	$('#content-table').html(response);
          	},
          	error: function(jqXHR, textStatus, error) {
	            console.log( "error: " + jqXHR.responseText);
	        }
		});
	}); 
})