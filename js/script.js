$(document).ready(function(){

  
  
   $('#cari').on('keyup', function(){ //buat event ketika keyword ditulis
      

      //ajax menggunakan load
       //$('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

       //ajax menggunakan get
       $.get('ajax/load.php?cari=' + $('#cari').val(), function(data) {
         $('#container').html(data);
        

      });

   });

});