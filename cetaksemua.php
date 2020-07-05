<?php 	
include "database.php"; //ambil file database
$query = "SELECT * FROM transaksi ";
$data = $db->prepare($query);

$data->execute();

$person = $data->fetch(PDO::FETCH_OBJ);

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

// buat variabel
$hasil ='

        <!DOCTYPE html>
		 <html>
		 <head>
		 	<title>	DAFTAR DATA TANSAKSI </title>
		 	<link rel="stylesheet" type="text/css" href="css/print.css">
		 </head>
		 <body>

		 	<h1> DAFTAR DATA TANSAKSI </h1>
		 	<h3> Dapoer Laundry Ajip 26</h3>
		 	<p> Jl.Raya Gandoang Cileungsi Bogor</p>
		    <p>	No Telp. 086984747693 </p>
<hr>
		 	<table class="kepala" border="1">
				<thead >
				 <tr>	
				     <th> Nomor </th>
				     <th> Nama </th>
				     <th> No Telepon </th>
			         <th> Alamat </th>
			         <th> Berat </th>
			         <th> Total Bayar </th>
			        
				  </tr>
				</thead>';
				
			   $no=1;
               while ($person = $data->fetch(PDO::FETCH_OBJ)){
               	  $hasil .= '
                               <tr> 
                                   <td>'. $no++ .'</td>
                                    <td>'. $person->nama .'</td>
                                    <td>'. $person->notelp .'</td>
                                    <td>'. $person->alamat .'</td>
                                    <td>'. $person->berat .'</td>
                                    <td>'. $person->bayar .'</td>
                               </tr>
                         
               	           ';
               }

		$hasil .= '</table>
		 
		 </body>
		 </html>

';



$mpdf->WriteHTML($hasil);

// custom nama file nya
// \Mpdf\Output\Destination::INLINE atau pake 'I'
$mpdf->Output('daftar-data-transaksi', 'I');

 ?>


