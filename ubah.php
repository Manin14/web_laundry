<?php 	

	include "database.php";

	$query = "SELECT * FROM transaksi WHERE id='$_GET[id_var]' ";
	$data = $db->prepare($query);
	$data->execute();

	$person = $data->fetch(PDO::FETCH_OBJ);

	// header("location: form.php");
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>	UBAH DATA </title>
 	<script type="text/javascript" src="perhitungan.js" >	</script>
 	<style type="">
 		
 		button {
 			 background-color: lightblue;
		       border-radius: 5px;
		       margin-top: 10px;
	 		}
 	</style>
 </head>
 <body>

 	<h3> UBAH DATA	</h3>

		<!-- arahka action ke file update.php -->
		<form method="post" action="update.php"> 

		    <!-- ambil id nya dengan type tekt hidden, untuk membawa id -->
			<input type="hidden" name="id" value="<?php echo $person->id ?>">
			
			Nama : <input type="text" name="nama" value="<?php echo $person->nama?>" /> <br>
			No Telpon : <input type="text" name="no_telp" value="<?php echo $person->notelp?>" /> <br>
			Alamat : <textarea name="alamat"> <?php echo $person->alamat?> </textarea> <br>
			Berat : <input type="text" name="berat" id="berat" value="<?php echo $person->berat?>" />  <label>Kg X 6000</label> <br>
			 <button type="button" name="hitung" onclick="xx();" id="hitung" class="hitung"> Hitung </button> <br>
			Total Bayar : <input type="text" name="total_bayar" id="hasil" value="<?php echo $person->bayar?>" /> <br>

			<button type="submit" class="ubah"> Ubah Data </button>
		</form>


		
 </body>
 </html>

