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
<h2>Data Kriteria</h2><hr>
<div class="konten">
<?php
//include "inc.connect/connect.php"; 
include "../koneksi.php";
//$kdpaket = $_REQUEST['kdpaket'];
//$kdpilihan= $_REQUEST['kd_pilihan'];
?>
<form id="form1" name="form1" method="post" action="simpangejala.php" enctype="multipart/form-data"><div>
  <table class="tab" width="528" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">

      <tr bgcolor="#FFFFFF">
        <td>Pilih Kriteria</td>
        <td><label>
        <select name="kriteria" id="kriteria">
          <option value="NULL">[ Daftar Kriteria ]</option>
          <?php 
	$sqlp = "SELECT * FROM kriteria ORDER BY kriteria_id";
	$qryp = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datap=mysql_fetch_array($qryp)) {
		if ($datap['kriteria_id']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[kriteria_nama]' $cek>$datap[kriteria_id]&nbsp;|&nbsp;$datap[kriteria_nama]</option>";
	}
  ?>
        </select>
        </label></td>
     </tr>
	 
	 <tr bgcolor="#FFFFFF">
        <td>Pilih Sub Kriteria</td>
        <td><label>
        <select name="sub_kriteria" id="sub_kriteria">
          <option value="NULL">[ Daftar Sub Kriteria ]</option>
          <?php 
	$sqlp = "SELECT * FROM sub_kriteria ORDER BY sub_id";
	$qryp = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datap=mysql_fetch_array($qryp)) {
		if ($datap['sub_id']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[sub_nama]' $cek>$datap[kriteria_nama]&nbsp;|&nbsp;$datap[sub_nama]</option>";
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
    <td width="55"><strong>Kriteria</strong></td>
	<td width="55"><strong>Sub Kriteria</strong></td>
    <td width="30"><strong>Edit</strong></td>
    <td width="10"><strong>Hapus</strong></td>
  </tr>
    <?php
	//include("inc.connect/connect.php");
	include "../koneksi.php";
	$sql = "SELECT * FROM gejala ORDER BY kd_pilihan";
	$qry = mysql_query($sql,$koneksi) or die ("SQL Error".mysql_error());
	$no=0;
	while ($data = mysql_fetch_array ($qry)) {
	$no++;
   ?>

  <tr>
    <td><?php echo $data['kd_pilihan']; ?></td>
	<td><?php echo $data['kriteria_nama']; ?></td>
    <td><?php echo $data['sub_nama']; ?></td>
    <td><a title="Edit Kriteria" href="edgejala.php?kdubah=<?php echo $data['kd_pilihan'];?>"><img src="image/edit.jpeg" width="16" height="16" border="0"></a></td>
    <td><a title="Hapus Kriteria" style="cursor:pointer;" onclick="return konfirmasi('<?php echo $data['kd_pilihan'];?>');"><img src="image/hapus.jpeg" width="16" height="16" ></a></td>
  </tr>
  <?php
  } ?>
</table>
</div>
</body>
</html>