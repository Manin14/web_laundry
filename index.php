<?php 	

$c='';
 //  if (isset($_POST['hitung'])){

  	
	
	// $a = $_POST['berat'];

	// $c = $a * 6000; 
 //    echo $c;
  
 //  }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title> web laundry</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="perhitungan.js" >	</script>
</head>
<body>

	<h4>  TAMBAH DATA </h4>
  
  <form method="POST" action="insert.php">
	
	Nama : <input type="text" name="nama"  required="" /> <br>
	No Telepon : <input type="text" name="no_telp"  required="" /> <br>
	Alamat : <textarea name="alamat"  required=""> </textarea> <br>
	Berat : <input type="text" name="berat" id="berat" required="" />
	  <br>
	Total Bayar : <input type="text"   name="total_bayar" value= "<?php echo $c; ?>" required="" id="hasil" /> 

	<button type="submit" class="simpan" name="simpan"> Simpan </button>
</form>

<button type="button" name="hitung" onclick="xx();"> Hitung </button>
<!-- tabel -->
<hr>	
<table border="1">
	 <thead>	
	  <tr>	
	     <th> Nomor </th>
	     <th> Nama </th>
	     <th> No Telepon </th>
         <th> Alamat </th>
         <th> Berat </th>
         <th> Total Bayar </th>
         <th> Hapus </th>
         <th> Ubah </th>

	  </tr>
	</thead>


		<tbody>
		<?php 	
            include "database.php";

            $query = "SELECT * FROM transaksi";
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
			     <td><?php echo $person->berat; 	 ?></td>
			     <td><?php echo $person->bayar; 	 ?></td>


            <td> <a id="hapus" class="hapus" href="delete.php?id_var=<?php echo $person->id ?>"> Hapus </a> </td>
            <td> <a class="ubah" href="ubah.php?id_var=<?php echo $person->id ?>"> Ubah </a> </td>
			  </tr>

          <?php  $no++; } 	

           ?>
	
	  
	</tbody>
</table>

</body>
</html>