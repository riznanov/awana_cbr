<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data Relasi</title>
</head>

<body>
<h3>Edit Data Relasi</h3><hr />
<form id="form1" name="form1" method="post" action="update_relasi.php" enctype="multipart/form-data"><div>
  <table width="359" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#DBEAF5">
      <tr>
        <td colspan="2"><div align="center"><b>&nbsp;</b></div></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>Kode</td>
        <td><label>
        <select name="TxtKdPenyakit" id="TxtKdPenyakit">
          <option value="NULL">[ Daftar Paket ]</option>
          <?php 
	$sqlp = "SELECT * FROM data_paket ORDER BY kd_paket";
	$qryp = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datap=mysql_fetch_array($qryp)) {
		if ($datap['kd_paket']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[kd_paket]' $cek>$datap[kd_paket]&nbsp;|&nbsp;$datap[nama_paket]</option>";
	}
  ?>
        </select><?php $id_relasi=$_GET['id_relasi'];?>
        </label><input name="textrelasi" type="hidden" value="<?php echo $id_relasi?>" /></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td width="124">Kriteria</td>
        <td width="224">
          <select name="TxtKdGejala" id="TxtKdGejala">
            <option value="NULL">[ Daftar Kriteria]</option>
            <?php 
	$sqlp = "SELECT * FROM gejala ORDER BY kd_pilihan";
	$qryg = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datag=mysql_fetch_array($qryg)) {
		if ($datag['kd_pilihan']==$kdpilihan) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datag[kd_pilihan]' $cek>$datag[kd_pilihan]&nbsp;|$datag[kriteria_nama]&nbsp;|&nbsp;$datag[sub_nama]</option>";
	}
  ?>
          </select>
         </td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>Bobot</td>
        <td><select name="txtbobot" id="txtbobot">
        <option value="0">[ Bobot Penyakit ]</option>
        <option value="0.7">0.7 | Bobot Tema</option>
        <option value="0.9">0.9 | Bobot Budget</option>
        <option value="0.5">0.5 | Bobot Varian</option>
		<option value="0.8">0.8 | Bobot Vendor</option>
        </select></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="Update" /><input type="button" value="Kembali" onclick="self.history.back();" /></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>