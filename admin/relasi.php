<html>
<head>
<style type="text/css">
p {text-indent:0pt;}
</style>
<script type="text/javascript">
function konfirmasi(id_relasi){
	var kd_hapus=id_relasi;
	var url_str;
	url_str="hapus_relasi.php?id_relasi="+kd_hapus;
	var r=con<html>
<head>
<style type="text/css">
p {text-indent:0pt;}
</style>
<script type="text/javascript">
function konfirmasi(id_relasi){
	var kd_hapus=id_relasi;
	var url_str;
	url_str="hapus_relasi.php?id_relasi="+kd_hapus;
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
<h2>Data Relasi </h2><hr>
<div class="konten">
<?php
//include "inc.connect/connect.php"; 
include "../koneksi.php";
//$kdpaket = $_REQUEST['kdpaket'];
//$kdpilihan= $_REQUEST['kd_pilihan'];
?>
<form id="form1" name="form1" method="post" action="relasisim.php" enctype="multipart/form-data"><div>
  <table class="tab" width="528" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
      <tr bgcolor="#FFFFFF">
        <td>Pilih Paket</td>
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
        </select>
        </label></td>
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
        <option value="0">[ Bobot Kriteria ]</option>
        <option value="0.7">0.7 | Bobot Tema</option>
        <option value="0.9">0.9 | Bobot Budget</option>
        <option value="0.5">0.5 | Bobot Varian</option>
		<option value="0.8">0.8 | Bobot Vendor</option>
        </select></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="Simpan" /></td>
      </tr>
    </table>
  </div>
</form>
<table width="85%" border="0" cellpadding="5" cellspacing="1" bordercolor="#F0F0F0" >
  <tr>
    <td width="50"><strong>No</strong></td>
    <td width="80"><strong>Kriteria</strong></td>
	<td width="80"><strong>Paket</strong></td>
	 <td width="80"><strong></strong></td>
    <td width="800"><strong></strong><span style="float:right; margin-right:25px;"><strong></strong></span></td>
    </tr>
    <?php
    $query=mysql_query("SELECT relasi.kd_pilihan,relasi.kd_paket,data_paket.kd_paket,data_paket.nama_paket AS paket FROM relasi,data_paket WHERE data_paket.kd_paket=relasi.kd_paket GROUP BY relasi.kd_paket")or die(mysql_error());
	$no=0;
	while($row=mysql_fetch_array($query)){
	$idpaket=$row['kd_paket'];
	$no++;
	?>
  <tr bgcolor="#FFFFFF" bordercolor="#333333">
    <td valign="top"><?php echo $no;?></td>
    <td valign="top">
	<?php
    //$query2=mysql_query("SELECT relasi.kd_gejala,gejala.kd_gejala FROM relasi,gejala WHERE gejala.kd_gejala='$idpenyakit'")or die(mysql_error());
	//$query2=mysql_query("SELECT relasi.kd_gejala FROM relasi WHERE relasi.kd_penyakit='$idpenyakit'")or die(mysql_error());
	$query2=mysql_query("SELECT relasi.id_relasi,relasi.kd_pilihan,relasi.bobot,relasi.kd_paket,gejala.sub_nama AS sub_nama, gejala.kriteria_nama AS kriteria_nama FROM relasi,gejala WHERE relasi.kd_paket='$idpaket' AND gejala.kd_pilihan=relasi.kd_pilihan")or die(mysql_error());
	while ($row2=mysql_fetch_array($query2)){
		$kd_pil=$row2['kd_pilihan'];
		$kd_pak=$row2['kd_paket'];
		echo "<table width='300%' border='5' cellpadding='5' cellspacing='1' bordercolor='#F0F0F0' bgcolor='#DBEAF5'>";
		echo "<tr bgcolor='#FFFFFF' bordercolor='#333333'>";
		echo "<td width='50'>$row2[kriteria_nama]</td>";
		echo "<td width='300'>$row2[sub_nama]</td>";
		echo "<td width='50'>$row2[bobot]</td>";
		echo "<td width='20'><a title='Edit Relasi' href='haladmin.php?top=edit_relasi.php&id_relasi=$row2[id_relasi]'>Edit</a></td>";
		echo "<td width='20'><a title='Hapus Relasi' style='cursor:pointer;' onclick='return konfirmasi($row2[id_relasi])'>Hapus</a></td>";
		echo "</tr>";
		echo "</table>";
		}
	?>   
<br /></td>
    <td>
      <?php echo $row['paket'];?>
      </strong></td>
    </tr><?php } ?>
</table>
</div>
</body>
</html>