<?php


   include "database.php"; //ambil file database

   // ambil data tiap elemen
   $nama = htmlspecialchars($_POST["nama"]);
   $no_telp = htmlspecialchars($_POST["no_telp"]);
   $alamat = htmlspecialchars($_POST["alamat"]);
   $berat = htmlspecialchars($_POST["berat"]);
   $total_bayar = htmlspecialchars($_POST["total_bayar"]);

	// $query = "INSERT INTO transaksi VALUES ('','$_POST[nama]','$_POST[no_telp]','$_POST[alamat]','$_POST[berat]','$_POST[total_bayar]')"; //query nya

	$query = "INSERT INTO transaksi VALUES ('','$nama','$no_telp','$alamat','$berat','$total_bayar')"; //query nya

	// persiapkan data dan query nya
	$data = $db->prepare($query);

	// lalu eksekusi
	$execute = $data->execute();



		if ($execute == true) {
                echo "
                    <script> 
                            alert('Data Berhasil Disimpan');
                            document.location.href = 'index.php';
                    </script>
        	     ";
				
			}else{
				echo " <script> 
                            alert('Data Gagal Disimpan');
                            document.location.href = 'index.php';
                    </script>
                  ";
				
			}
	


      
 ?>




