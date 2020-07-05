$(document).ready(function() {

	// ketika ketik seuatu di keyword
	$('#keyword').on('keyup', function() {
      
       $('#container').load('index.php?keyword=' + $('#keyword').val());
	});

});