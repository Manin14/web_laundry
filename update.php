<?php 	
  
  include "database.php";

	$query = "UPDATE transaksi SET nama='$_POST[nama]',notelp='$_POST[no_telp]', alamat='$_POST[alamat]',berat='$_POST[berat]',bayar='$_POST[total_bayar]' WHERE id='$_POST[id]' ";
	$data = $db->prepare($query);
	$execute = $data->execute();

	if ($execute == true) {
 		    echo "
                    <script> 
                            alert('Data Berhasil Diubah');
                            document.location.href = 'index.php';
                    </script>
        	     ";
			
			}else{
				echo " <script> 
                            alert('Data Gagal Diubah');
                            document.location.href = 'index.php';
                    </script>
                  ";
				
			}


	
 ?>