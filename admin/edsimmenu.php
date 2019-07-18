<?php
include "../koneksi.php";
	$kd_menu = $_REQUEST['kd_menu2'];
	$menu = $_REQUEST['menu'];
	$sql = "UPDATE data_menu SET nama_menu='$menu' WHERE kd_menu='$kd_menu'";
	$result=mysql_query($sql)	or die ("SQL Error".mysql_error());
	if($result){
		echo "<center>Data Telah Berhasil Diubah</center>";
		echo "<center><a href='haladmin.php?top=datamenu.php'>OK</a></center>";
		}else{
		echo"<table style='margin-top:150px;' align='center'><tr><td>";
		echo"<div style='width:500px; height:50px auto; border:1px dashed #CCC; padding:3px 3px 3px 3px;'>";
		echo "<center><font color='#ff0000'>Data tidak dapat di Update..!</strong></font></center><br>";
		echo "<center><a href='../admin/haladmin.php?top=datamenu.php'>Kembali</a></center>";
		echo"</div>";
		echo"</td></tr></table>";
		}
?>