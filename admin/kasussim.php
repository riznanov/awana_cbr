<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Simpan Relasi</title>
<style type="text/css">
body { margin:50px;background-image:url(../Image/Bottom_texture.jpg);}
div { border:1px dashed #666; background-color:#CCC; padding:10px;}
</style>
</head>
<body>
<div>
<?php 
//include "inc.connect/connect.php"; 
include "../koneksi.php";
# Baca variabel Form (If Register Global ON)
$tema=$_POST['tema'];
$budget=$_POST['budget'];
$varian=$_POST['varian'];
$vendor=$_POST['vendor'];
$paket=$_POST['paket'];

# Validasi Form

$sql_cek = "SELECT * FROM data_kasus WHERE tema='$tema' , budget='$budget' , varian='$varian' , vendor='$vendor' , paket='$paket'";
$rs=mysql_num_rows($sql);
if($rs==0){
	// jika data nol maka simpan data
	$perintah="INSERT INTO data_kasus (tema,budget,varian,vendor,paket) VALUES ('$tema','$budget','$varian','$vendor','$paket')";
	$berhasil=mysql_query($perintah) or die (" Data tidak masuk database / data telah ada ".mysql_error());
	if ($berhasil){
		echo "<center><b>Data Berhasil Disimpan </b></center>";
		header("location: haladmin.php?top=kasus.php");
		}else{
		echo "<center><font color='#ff0000'><strong>Penyimpanan Gagal</strong></font></center><br>";
		echo "<center><a href='/admin/haladmin.php?top=kasus.php'>Kembali</a></center>";
		}
	}else{
	// cek jika data sudah ada
	echo"<table style='margin-top:150px;' align='center'><tr><td>";
	echo"<div style='width:500px; height:50px auto; border:1px dashed #CCC; color:#F90; padding:3px 3px 3px 3px;'>";
	echo "<center><font>Kode Gejala $kd_gejala <strong>Telah ada di database, Masukkan Kode Unik..!</strong></font></center><br>";
	echo "<center><a href='../admin/haladmin.php?top=kasus.php'>Kembali</a></center>";
	echo"</div>";
	echo"</td></tr></table>";
	}
?>
</div>
</body>
</html>

