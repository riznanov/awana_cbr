<html>
<head>
<title>Hapus Menu</title>
<body>
<?php
include "../koneksi.php";
$kdhapus = $_GET['kdhapus'];
if ($kdhapus!="") {
	$sql = "DELETE FROM data_menu WHERE kd_menu='$kdhapus'";
	$result=mysql_query($sql)	or die ("SQL Error". mysql_error());
	if($result){
		echo "<center>Data telah dihapus..!</center>";
		echo "<center><a href='haladmin.php?top=datamenu.php'><strong>OK</strong></a></center>";
		}else{
			echo"<table style='margin-top:150px;' align='center'><tr><td>";
			echo"<div style='width:500px; height:50px auto; border:1px dashed #CCC; padding:3px 3px 3px 3px;'>";
			echo "<center><font color='#ff0000'>Data tidak dapat dihapus..!</strong></font></center><br>";
			echo "<center><a href='../admin/haladmin.php?top=datamenu.php'>Kembali</a></center>";
			echo"</div>";
			echo"</td></tr></table>";
			}
}
?>
</body>
</head>
</html>