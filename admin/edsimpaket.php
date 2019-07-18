<?php
include "../koneksi.php";
	$kd_paket = $_POST['kd_paket2'];
	$paket = $_POST['paket'];
	$harga = $_POST['harga'];
	$kd_vendor= $_POST['kd_vendor'];
	$tema = $_POST['tema'];
	$budget = $_POST['budget'];
	
	$sql = "UPDATE data_paket SET nama_paket='$paket', harga='$harga', kd_vendor='$kd_vendor', tema= '$tema', budget= '$budget' WHERE kd_paket='$kd_paket'";
	$result=mysql_query($sql)	or die ("SQL Error".mysql_error());
	if($result){
		echo "<center>Data Telah Berhasil Diubah</center>";
		echo "<center><a href='haladmin.php?top=datapaket.php'>OK</a></center>";
		}else{
		echo"<table style='margin-top:150px;' align='center'><tr><td>";
		echo"<div style='width:500px; height:50px auto; border:1px dashed #CCC; padding:3px 3px 3px 3px;'>";
		echo "<center><font color='#ff0000'>Data tidak dapat di Update..!</strong></font></center><br>";
		echo "<center><a href='../admin/haladmin.php?top=datapaket.php'>Kembali</a></center>";
		echo"</div>";
		echo"</td></tr></table>";
		}
?>