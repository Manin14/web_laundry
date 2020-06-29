<?php
include "database.php"; //ambil file database

$query = "INSERT INTO transaksi VALUES ('','$_POST[nama]','$_POST[no_telp]','$_POST[alamat]','$_POST[berat]','$_POST[total_bayar]')"; //query nya

// persiapkan data dan query nya
$data = $db->prepare($query);

// lalu eksekusi
$execute = $data->execute();

if ($execute) {
	// lalu arahkan ke mana setelah data tersimpan, pake header
	header("location:index.php?notifikasi=1");
}else{
	header("location:index.php?notifikasi=0");
}
