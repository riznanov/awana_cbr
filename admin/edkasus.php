<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Rekap Kasus</title>
</head>

<body>
<h3>Edit Rekap Kasus</h3><hr />
<?php
include "../koneksi.php";
$kdubah = $_GET['kdubah'];
if($kdubah !="") {
	#menampilkan data
	$sql = "SELECT * FROM data_kasus WHERE id_kasus='$kdubah'";
	$qry = mysql_query ($sql, $koneksi)
			or die ("SQL ERROR".mysql_error());
	$data = mysql_fetch_array($qry);
	
	#samakan dengan variabel form
	$id_kasus = $data['id_kasus'];
	$tema = $data['tema'];
	$budget = $data['budget'];
	$varian = $data['varian']; 
	$vendor = $data['vendor'];
	$paket = $data['paket'];
}

?>
<form id="form1" name="form1" method="post" action="edsimkasus.php" enctype="multipart/form-data"><div>
  <table width="359" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#DBEAF5">
      <tr>
        <td colspan="2"><div align="center"><b>&nbsp;</b></div></td>
      </tr>
      <tr>
		<td width="160" valign="top"><span class="style35">No Kasus</span></td>
		<td width="9">:</td>
		<td width="326" valign="top">
		  <label>
		  <input name="id_kasus" type="text" id="id_kasus" size="1" value="<?php echo $id_kasus; ?>" disabled="disabled">
		   <input name="id_kasus2" type="hidden" id="id_kasus2" value="<?php echo "$id_kasus"; ?>">
			</label>   
		</td>
	</tr>
	<tr valign="top">
    <td valign="top">Tema</td>
		<td><select name ="tema"  id="tema"     cols="45" rows="5">              
		<option ><?php echo "$tema"; ?></option>
        <option value="Jawa">Jawa</option>
        <option value="Nasional">Nasional</option>
        <option value="Internasional">Internasional</option>
        </select></td>
	</tr>
	
	<tr valign="top">
    <td valign="top">Budget</td>
        <td><select name="budget" id="budget" cols="45" rows="5">
		<option><?php echo "$budget"; ?></option>
        <option value="Low">Low</option>
        <option value="Medium">Meduim</option>
        <option value="High">High</option>
        </select></td>
    </tr>
	
	<tr valign="top">
	<td valign="top">Varian</td>

    <td><select name="varian" id="varian" cols="45" rows="5">
		<option ><?php echo "$varian"; ?></option>
        <option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
        </select></td>
	</tr>
	
	<tr valign="top">
	  <td valign="top">Pilih Vendor</td>
        <td><label>
        <select name="vendor" id="vendor" cols="45" rows="5">
         <option ><?php echo "$vendor"; ?></option>
          <?php 
	$sqlp = "SELECT * FROM data_vendor ORDER BY kd_vendor";
	$qryp = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datap=mysql_fetch_array($qryp)) {
		if ($datap['kd_vendor']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[nama_vendor]' $cek>$datap[kd_vendor]&nbsp;|&nbsp;$datap[nama_vendor]</option>";
	}
  ?>
        </select>
        </label></td>
	</tr>
	
	<tr valign="top">
	<td valign="top">Pilih Paket</td>
        <td><label>
        <select name="paket" id="paket" cols="45" rows="5">
          <option><?php echo "$paket"; ?></option>
          <?php 
	$sqlp = "SELECT * FROM data_paket ORDER BY kd_paket";
	$qryp = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datap=mysql_fetch_array($qryp)) {
		if ($datap['kd_paket']==$kdpaket) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[nama_paket]' $cek>$datap[kd_paket]&nbsp;|&nbsp;$datap[nama_paket]</option>";
	}
  ?>
        </select>
        </label></td>
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