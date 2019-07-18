<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Edit Data Paket</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link href="../Image/icon.png" rel='shortcut icon'>
<script type="text/javascript">
function validasi(form){
	if(form.paket.value==""){
		alert("Masukkan paket..!");
		form.paket.focus(); return false;
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
	$sql = "SELECT * FROM data_paket WHERE kd_paket='$kdubah'";
	$qry = mysql_query ($sql, $koneksi)
			or die ("SQL ERROR".mysql_error());
	$data = mysql_fetch_array($qry);
	
	#samakan dengan variabel form
	$kd_paket = $data['kd_paket'];
	$paket = $data['nama_paket'];
	$kd_vendor = $data['kd_vendor'];
	$tema = $data['tema'];
	$budget = $data['budget'];
	$harga = $data['harga'];
}
?>
<form id="form1" name="form1" onSubmit="return validasi(this);" method="post" action="edsimpaket.php" target="_self">
<table style="border:1px solid #CCC; margin-top:150px;" width="509" border="0" cellpadding="3" cellspacing="0" align="center">
  <tr>
    <td height="22" colspan="3" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="39" colspan="3" valign="top"><div align="center"><span class="style38"><strong>Edit paket </strong></span></div></td>
    </tr>
	<tr>
    <td width="160" valign="top"><span class="style35">Kode Paket</span></td>
    <td width="9">:</td>
    <td width="326" valign="top">
      <label>
      <input name="kd_paket" type="text" id="kd_paket" size="1" value="<?php echo $kd_paket; ?>" disabled="disabled">
        <input name="kd_paket2" type="hidden" id="kd_paket2" value="<?php echo "$kd_paket"; ?>">
        </label>    
	</td>
  </tr>
  <tr valign="top">
    <td valign="top">Nama paket</td>
    <td>:</td>
    <td valign="top">
      <label>
        <textarea name="paket" id="paket" cols="45" rows="5"><?php echo "$paket"; ?></textarea>
        </label>    </td>
  </tr>
  <tr valign="top">
        <td>Nama Vendor</td>
		 <td>:</td>
         <td valign="top"><label>
        <select name="kd_vendor" id="kd_vendor" cols="45" rows="5">
          <option><?php echo "$kd_vendor"; ?></option>
          <?php 
	$sqlp = "SELECT * FROM data_vendor ORDER BY kd_vendor";
	$qryp = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datap=mysql_fetch_array($qryp)) {
		if ($datap['kd_vendor']) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[nama_vendor]' '$cek>$datap[kd_vendor]&nbsp;|&nbsp;$datap[nama_vendor]</option>";
	}
  ?>
        </select>
        </label></td>
     </tr>
	 <tr valign="top">
        <td>Tema</td>
		<td>:</td>
        <td><select name="tema" id="tema" cols="45" rows="5">
        <option><?php echo "$tema"; ?></option>
        <option value="Jawa">Jawa</option>
        <option value="Nasional">Nasional</option>
        <option value="Internasional">Internasional</option>
        </select></td>
    </tr>
	<tr valign="top">
        <td>Budget</td>
		 <td>:</td>
        <td><select name="budget" id="budget" cols="45" rows="5">
        <option><?php echo "$budget"; ?></option>
        <option value="Low">Low</option>
        <option value="Meduim">Meduim</option>
        <option value="High">High</option>
        </select></td>
     </tr>
  <tr valign="top">
    <td valign="top">Harga 100 Porsi</td>
    <td>:</td>
    <td valign="top">
      <label>
        <textarea name="harga" id="harga" cols="45" rows="5"><?php echo "$harga"; ?></textarea>
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
      <a href="haladmin.php?top=datapaket.php"><input type="button" name="batal" id="batal" value="Batal" /></a></td>
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
