<?php 	
  
  include "database.php";

	$query = "UPDATE transaksi SET nama='$_POST[nama]',notelp='$_POST[no_telp]', alamat='$_POST[alamat]',berat='$_POST[berat]',bayar='$_POST[total_bayar]' WHERE id='$_POST[id]' ";
	$data = $db->prepare($query);
	$data->execute();


	header("location: index.php");
 ?>