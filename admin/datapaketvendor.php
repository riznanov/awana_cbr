<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function validasi(form){
	if(form.kd_pilihan.value==""){
		alert("Masukkan kode kriteria..!");
		form.kd_pilihan.focus(); return false;
		}else if(form.menu.value==""){
		alert("Masukkan kriteria..!");
		form.gejala.focus(); return false;	
		}
		form.submit();
	}
function konfirmasi(kd_pilihan){
	var kd_hapus=kd_pilihan;
	var url_str;
	url_str="hpskriteria.php?kdhapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?"+kd_hapus);
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	}
</script>
</head>
<body>
<h2>Data Paket</h2><hr>
<div class="konten">
<?php
//include "inc.connect/connect.php"; 
include "../koneksi.php";
//$kdpaket = $_REQUEST['kdpaket'];
//$kdpilihan= $_REQUEST['kd_pilihan'];
?>
<form name="form3" onSubmit="return validasi(this);" method="post" action="simpanpaket.php">
  <table class="tab" width="528" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">

      <tr bgcolor="#FFFFFF">
        <td>Nama Paket </td>
    <td>:</td>
    <td>
      <textarea name="paket" rows="2" cols="40" id="paket"></textarea>
     </tr>
	 
	 <tr bgcolor="#FFFFFF">
        <td>Nama Vendor</td>
		 <td>:</td>
        <td><label>
        <select name="TxtKdVendor" id="TxtKdVendor" rows="5" cols="70" >
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
		echo "<option value='$datap[kd_vendor]' '$cek>$datap[kd_vendor]&nbsp;|&nbsp;$datap[nama_vendor]</option>";
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
<table width="75%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr align="center">
    <td width="30"><strong>No</strong></td>
    <<td width="305"><strong>Nama paket</strong></td>
    <td width="305"><strong>Nama Vendor</strong></td>
	<td width="205"><strong>Harga 100 Porsi</strong></td>
    <td width="30"><strong>Edit</strong></td>
    <td width="10"><strong>Hapus</strong></td>
  </tr>
    <?php
	//include("inc.connect/connect.php");
	include "../koneksi.php";
	$sql = "SELECT * FROM data_paket ORDER BY kd_paket";
	$qry = mysql_query($sql,$koneksi) or die ("SQL Error".mysql_error());
	$no=0;
	while ($data = mysql_fetch_array ($qry)) {
	$no++;
   ?>

  <tr>
    <td><?php echo $no; ?></td>
	<td><?php echo $data['nama_paket']; ?></td>
    <td><?php echo $data['nama_vendor']; ?></td>
    <td><a title="Edit Kriteria" href="edgejala.php?kdubah=<?php echo $data['kd_pilihan'];?>"><img src="image/edit.jpeg" width="16" height="16" border="0"></a></td>
    <td><a title="Hapus Kriteria" style="cursor:pointer;" onclick="return konfirmasi('<?php echo $data['kd_pilihan'];?>');"><img src="image/hapus.jpeg" width="16" height="16" ></a></td>
  </tr>
  <?php
  } ?>
</table>
</div>
</body>
</html>




$sql= mysql_query ("SELECT data_paket.kd_paket, data_paket.nama_paket, data_paket.harga, data_vendor.kd_vendor, data_vendor.nama_vendor AS nama_vendor FROM data_paket,data_vendor WHERE data_vendor.kd_vendor=data_paket.kd_vendor GROUP BY data_paket.kd_vendor")or die(mysql_error());
	$no=0;
	while ($data = mysql_fetch_array ($sql)) {
	$no++;