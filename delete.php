<?php 
include "database.php";

$query = "DELETE FROM transaksi WHERE id='$_GET[id_var]' ";
$data = $db->prepare($query);

$data->execute();

 	if ($execute) {
				// lalu arahkan ke mana setelah data tersimpan, pake header
				header("location:index.php?notif=1");
			}else{
				header("location:index.php?notif=0");
			}


// // setelah semua di eksekusi, tendang user ke halaman form.php
// header("location: index.php");

 ?>