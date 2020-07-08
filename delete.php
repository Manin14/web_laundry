<?php 
include "database.php";

$query = "DELETE FROM transaksi WHERE id='$_GET[id_var]' ";
$data = $db->prepare($query);

$execute = $data->execute();

 	if ($execute == true) {
 		    echo "
                    <script> 
                            alert('Data Berhasil Dihapus');
                            document.location.href = 'index.php';
                    </script>
        	     ";
			
			}else{
				echo " <script> 
                            alert('Data Gagal Dihapus');
                            document.location.href = 'index.php';
                    </script>
                  ";
				
			}


// // setelah semua di eksekusi, tendang user ke halaman form.php
// header("location: index.php");

 ?>