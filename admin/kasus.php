<html>
<head>
<style type="text/css">
p {text-indent:0pt;}
</style>
<script type="text/javascript">
function konfirmasi(id_kasus){
	var kd_hapus=id_kasus;
	var url_str;
	url_str="hapus_kasus.php?id_kasus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data Kasus "+kd_hapus);
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	}
</script>
</head>
<body>
<h2>Data Kasus </h2><hr>
<div class="konten">
<?php
//include "inc.connect/connect.php"; 
include "../koneksi.php";
//$kdpaket = $_REQUEST['kdpaket'];
//$kdpilihan= $_REQUEST['kd_pilihan'];
?>
<form id="form1" name="form1" method="post" action="kasussim.php" enctype="multipart/form-data"><div>
  <table class="tab" width="528" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">

      <tr bgcolor="#FFFFFF">
        <td>Tema</td>
        <td><select name="tema" id="tema">
        <option value="0">[Pilih Tema]</option>
        <option value="Jawa">Jawa</option>
        <option value="Nasional">Nasional</option>
        <option value="Internasional">Internasional</option>
        </select></td>
      </tr>
	  <tr bgcolor="#FFFFFF">
        <td>Budget</td>
        <td><select name="budget" id="budget">
        <option value="0">[Pilih Budget]</option>
        <option value="Low">Low</option>
        <option value="Medium">Meduim</option>
        <option value="High">High</option>
        </select></td>
      </tr>
	  <tr bgcolor="#FFFFFF">
        <td>Varian Menu</td>
        <td><select name="varian" id="varian">
        <option value="0">[Pilih Varian Menu]</option>
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
	  <tr bgcolor="#FFFFFF">
        <td>Pilih Vendor</td>
        <td><label>
        <select name="vendor" id="vendor">
          <option value="NULL">[ Daftar Vendor ]</option>
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
	 
	 <tr bgcolor="#FFFFFF">
        <td>Pilih Paket</td>
        <td><label>
        <select name="paket" id="paket">
          <option value="NULL">[ Daftar Paket ]</option>
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
        <td><input type="submit" name="Submit" value="Simpan" /></td>
      </tr>
    </table>
  </div>
</form>
<table width="95%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr align="center">
    <td width="505"><strong>Kasus</strong></td>
    <td width="505"><strong>Tema</strong></td>
	<td width="505"><strong>Budget</strong></td>
	<td width="505"><strong>Varian</strong></td>
	<td width="505"><strong>Vendor</strong></td>
	<td width="505"><strong>Paket</strong></td>
    <td width="50"><strong>Edit</strong></td>
    <td width="50"><strong>Hapus</strong></td>
  </tr>
    <?php
	//include("inc.connect/connect.php");
	include "../koneksi.php";
	$sql = "SELECT * FROM data_kasus ORDER BY id_kasus";
	$qry = mysql_query($sql,$koneksi) or die ("SQL Error".mysql_error());
	$no=0;
	while ($data = mysql_fetch_array ($qry)) {
	$no++;
   ?>

  <tr>
    <td>Kasus <?php echo $data['id_kasus']; ?></td>
	<td><?php echo $data['tema']; ?></td>
    <td><?php echo $data['budget']; ?></td>
	<td><?php echo $data['varian']; ?></td>
    <td><?php echo $data['vendor']; ?></td>
	<td><?php echo $data['paket']; ?></td>
    <td><a title="Edit Kasus" href="edkasus.php?kdubah=<?php echo $data['id_kasus'];?>"><img src="image/edit.jpeg" width="16" height="16" border="0"></a></td>
    <td><a title="Hapus Kasus" style="cursor:pointer;" onclick="return konfirmasi('<?php echo $data['id_kasus'];?>');"><img src="image/hapus.jpeg" width="16" height="16" ></a></td>
  </tr>
  <?php
  } ?>
</table>
</div>
</body>
</html>