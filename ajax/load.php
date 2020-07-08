<?php 
include "../database.php";

$cari=$_GET['cari'];

$query = "SELECT * FROM transaksi 
                 WHERE
               nama LIKE '%$cari%' OR notelp LIKE '%$cari%'
               ORDER BY id DESC " ;

   $data = $db->prepare($query);
   $data->execute();

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title> load </title>
 	<link rel="stylesheet" type="text/css" href="../style.css">
 </head>
 <body>
 
 </body>
 </html>

 <div class="sss" id="container" style="width: 100%">
<table border="1" cellspacing="0" class="scroll" id="s">
	 <thead>	
	  <tr>	
	     <th> Nomor </th>
	     <th> Nama </th>
	     <th> No Telepon </th>
         <th> Alamat </th>
         <th> Berat (Kg) </th>
         <th> Total Bayar </th>
         <th> Hapus </th>
         <th> Ubah </th>
         <th> Cetak </th>
        
         <th></th>

	  </tr>
	</thead>


		<tbody>
		<?php 	
            include "../database.php";

           
            $data = $db->prepare($query);
            $data->execute();
 	        
        
 	        $no=1; 

            while ($person = $data->fetch(PDO::FETCH_OBJ)){

            
           
          ?>

             
              <tr>	
			     <td> <?php echo $no; 	 ?> </td>
			     <td><?php echo $person->nama; 	 ?></td>
			     <td><?php echo $person->notelp; 	 ?></td>
			     <td><?php echo $person->alamat; 	 ?> </td>
			     <td><?php echo $person->berat; 	 ?> Kg </td>
			     <td><?php echo $person->bayar; 	 ?></td>


            <td> <a id="hapus" class="hapus" href="delete.php?id_var=<?php echo $person->id ?>"  onclick="return confirm('Yakin ingin menghapus data')"> Hapus </a> </td>

            <td> <a class="ubah" href="ubah.php?id_var=<?php echo $person->id ?>"> Ubah </a> </td>

             <td> <a class="cetak" href="cetak.php?id_var=<?php echo $person->id ?>" target="_blank"> Cetak </a> </td>
			  

          <?php  $no++; } 	

           ?>
	
	  
	</tbody>
</table>
</div>	