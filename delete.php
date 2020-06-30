<?php 
include "database.php";

$query = "DELETE FROM transaksi WHERE id='$_GET[id_var]' ";
$data = $db->prepare($query);

$data->execute();

 

// setelah semua di eksekusi, tendang user ke halaman form.php
header("location: index.php");

 ?>