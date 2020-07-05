<?php 
include "database.php"; //ambil file database
$query = "SELECT * FROM transaksi WHERE id='$_GET[id_var]' ";
$data = $db->prepare($query);

$data->execute();

$person = $data->fetch(PDO::FETCH_OBJ);

// buat variabel baru untuk menampung nilainya
$nama=$person->nama;
$notelp=$person->notelp;
$alamat=$person->alamat;
$berat=$person->berat;
$bayar=$person->bayar;

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$keluaran='

          <!DOCTYPE html>
		 <html>
		 <head>
		 	<title>	DAFTAR DATA TANSAKSI </title>
		 	<link rel="stylesheet" type="text/css" href="css/cetak_struk.css">
		 </head>
		 <body>
          
          <h3> STRUK TRANSAKSI </h3>
          <h4> Dapoer Laundry Ajip 26 </h4>
          <h6> Jl. Raya Gandoang , Cileungsi, Bogor </h6>
          <h6> No Telp. 086984747693 </h6>

          <hr>
		 </body>
		 </html>

         ';


$mpdf->WriteHTML($keluaran);




$mpdf->WriteHTML('Nama ='.$nama.'');
$mpdf->WriteHTML('No Telpon ='.$notelp.'');
$mpdf->WriteHTML('Alamat='.$alamat.'');
$mpdf->WriteHTML('Berat='.$berat.' Kg');
$mpdf->WriteHTML('Total Bayar = Rp. '.$bayar.'');

$mpdf->WriteHTML('<hr>');

$mpdf->WriteHTML('<h6> Terima Kasih </h6>');





$mpdf->Output();


 ?>

 

 
 