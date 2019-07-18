<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Rekap Kasus</title>
<style type="text/css">
body { margin:50px;background-image:url(../Image/Bottom_texture.jpg);}
div { border:1px dashed #666; background-color:#CCC; padding:10px;}
</style>
</head>
<body>
<div>
<?php
include "../koneksi.php";
$id_kasus=$_REQUEST['id_kasus2'];
$tema=$_REQUEST['tema'];
$budget=$_REQUEST['budget'];
$varian=$_REQUEST['varian'];
$vendor=$_REQUEST['vendor'];
$paket=$_REQUEST['paket'];
$query=mysql_query("UPDATE data_kasus SET id_kasus='$id_kasus',tema='$tema',budget='$budget',varian='$varian',vendor='$vendor',paket='$paket' WHERE id_kasus='$id_kasus'")or die(mysql_error());
if($query){
	echo "<center><font color='#0000ff'>DATA BERHASIL DIUPDATE..!</font></center>";
	echo "<center><a href='../admin/haladmin.php?top=kasus.php'>OK</a></center>";
	//header("location: ../admin/haladmin.php?top=kasus.php");
	}else{
		echo "<center><font color='#ff0000'>DATA TIDAK DAPAT DI UPDATE..!</font></center>";
		echo "<center><a href='../admin/haladmin.php?top=kasus.php'>Kembali</a></center>";
		}
?></div>
</body>
</html>