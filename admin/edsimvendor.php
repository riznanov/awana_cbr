<?php
include "../koneksi.php";
	$kd_vendor = $_REQUEST['kd_vendor2'];
	$vendor = $_REQUEST['vendor'];
	$sql = "UPDATE data_vendor SET nama_vendor='$vendor' WHERE kd_vendor='$kd_vendor'";
	$result=mysql_query($sql)	or die ("SQL Error".mysql_error());
	if($result){
		echo "<center>Data Telah Berhasil Diubah</center>";
		echo "<center><a href='haladmin.php?top=datavendor.php'>OK</a></center>";
		}else{
		echo"<table style='margin-top:150px;' align='center'><tr><td>";
		echo"<div style='width:500px; height:50px auto; border:1px dashed #CCC; padding:3px 3px 3px 3px;'>";
		echo "<center><font color='#ff0000'>Data tidak dapat di Update..!</strong></font></center><br>";
		echo "<center><a href='../admin/haladmin.php?top=datavendor.php'>Kembali</a></center>";
		echo"</div>";
		echo"</td></tr></table>";
		}
?>