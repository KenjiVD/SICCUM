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
})