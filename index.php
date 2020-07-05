

			<?php
			// dari rifky
         	$notifikasi = "";  //untuk notif alert
         


			if (isset($_GET['notifikasi'])) {
				$code = $_GET['notifikasi'];
				switch ($code) {
					case 1:
						$notifikasi = "<script>alert('Data berhasil disimpan')</script>";
						break;

					default:
						$notifikasi = "<script>alert('Data gagal Disimpan')</script>";
						break;
				}
			}
			echo $notifikasi;

			// alert hapus
			$notif = "";  //untuk notif alert
         


			if (isset($_GET['notif'])) {
				$code = $_GET['notif'];
				switch ($code) {
					case 1:
						$notif = "<script>alert('Data gagal dihapus')</script>";
						break;

					default:
						$notif = "<script>alert('Data berhasil Dihapus')</script>";
						break;
				}
			}
			echo $notif;
			?>

<!DOCTYPE html>
<html>
<head>
	<title> web laundry</title>
	
	

	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="perhitungan.js" >	</script>

	

	
</head>
<body>
           


	<h4>  TAMBAH DATA </h4>
  
  <form method="POST" action="insert.php">
	
	Nama : <input type="text" name="nama"  required="" /> <br>
	No Telepon : <input type="text" name="no_telp"  required="" /> <br>
	Alamat : <textarea name="alamat"  required=""> </textarea> <br>
	Berat : <input type="text" name="berat" id="berat" required="" /> <label>Kg X 6000</label>
	  <br>
	  <button type="button" name="hitung" onclick="xx();" id="hitung" class="hitung"> Hitung </button> <br>

	Total Bayar : <input type="text"   name="total_bayar" required="" id="hasil" placeholder=" Berat X 6000"/> <br>

	 <button type="submit" class="simpan" name="simpan" > Simpan </button> 
</form>



<!-- tabel -->
<hr>
  <a class="cetaksemua" href="cetaksemua.php" target="_blank"> Cetak Semua Data</a>
  <input type="text" name="cari2" id="keyword" placeholder=" Cari Data : Masukan Nama atau No telpon" style="width:300px;"> 

	  <!-- cari dari gthub -->
	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus="" placeholder="Masukan nama , no telp" autocomplete="off">
		<button type="submit" > Cari </button>

		
	</form>

	<?php 
	include "database.php";

	$query = "SELECT * FROM transaksi WHERE nama LIKE '$_POST[keyword]%' ";

	$data = $db->prepare($query);
	$data->execute();

    $person = $data->fetch(PDO::FETCH_OBJ);



	 ?>

  <hr>	

	

<table class="kepala" border="1">
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
         <th> Cetak</th>
         
         <th></th>

	  </tr>
	</thead>

</table>
<div class="sss" id="container">
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
            include "database.php";

            $query = "SELECT * FROM transaksi ORDER BY id DESC";
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

</body>
</html>