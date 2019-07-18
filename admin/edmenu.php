<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Edit Data Menu</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link href="../Image/icon.png" rel='shortcut icon'>
<script type="text/javascript">
function validasi(form){
	if(form.menu.value==""){
		alert("Masukkan Menu..!");
		form.menu.focus(); return false;
		}
	form.submit();
	}
</script>
</head>
<body>
<?php
#Baca variabel URL (if register global ON)
//include "connect/config.php";
//include "inc.connect/connect.php" ;
include "../koneksi.php";
$kdubah = $_REQUEST['kdubah'];
if($kdubah !="") {
	#menampilkan data
	$sql = "SELECT * FROM data_menu WHERE kd_menu='$kdubah'";
	$qry = mysql_query ($sql, $koneksi)
			or die ("SQL ERROR".mysql_error());
	$data = mysql_fetch_array($qry);
	
	#samakan dengan variabel form
	$kd_menu = $data['kd_menu'];
	$menu = $data['nama_menu'];
}
?>
<form id="form1" name="form1" onSubmit="return validasi(this);" method="post" action="edsimmenu.php" target="_self">
<table style="border:1px solid #CCC; margin-top:150px;" width="509" border="0" cellpadding="3" cellspacing="0" align="center">
  <tr>
    <td height="22" colspan="3" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="39" colspan="3" valign="top"><div align="center"><span class="style38"><strong>Edit Menu </strong></span></div></td>
    </tr>
	<tr>
    <td width="160" valign="top"><span class="style35">Kode Menu</span></td>
    <td width="9">:</td>
    <td width="326" valign="top">
      <label>
      <input name="kd_menu" type="text" id="kd_menu" size="1" value="<?php echo $kd_menu; ?>" disabled="disabled">
        <input name="kd_menu2" type="hidden" id="kd_menu2" value="<?php echo "$kd_menu"; ?>">
        </label>    
	</td>
  </tr>
  <tr valign="top">
    <td valign="top">Nama Menu</td>
    <td>:</td>
    <td valign="top">
      <label>
        <textarea name="menu" id="menu" cols="45" rows="5"><?php echo "$menu"; ?></textarea>
        </label>    </td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><input type="submit" name="simpan" id="simpan" value="Update" />
      <a href="haladmin.php?top=datamenu.php"><input type="button" name="batal" id="batal" value="Batal" /></a></td>
  </tr>
  <tr>
    <td valign="top"><span class="style36"></span></td>
    <td>&nbsp;</td>
    <td valign="top">
      <label></label>
      <label></label></td>
  </tr>
</table>
</form>
</body>
</html>
