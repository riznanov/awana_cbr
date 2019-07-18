<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function validasi(form){
	if(form.kd_paket.value==""){
		alert("Masukkan kode paket..!");
		form.kd_gejala.focus(); return false;
		}else if(form.paket.value==""){
		alert("Masukkan paket..!");
		form.gejala.focus(); return false;	
		}
		form.submit();
	}
function konfirmasi(kd_paket){
	var kd_hapus=kd_paket;
	var url_str;
	url_str="hpspaket.php?kdhapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?"+kd_hapus);
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	}
</script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#propinsi").change(function(){
    var propinsi = $("#propinsi").val();
    $.ajax({
        url: "ambilkota.php",
        data: "propinsi="+propinsi,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kota").html(msg);
        }
    });
  });
});

</script>
</head>
<body>
<h2>Tambah Data Paket</h2>
<form name="form3" onSubmit="return validasi(this);" method="post" action="simpanpaket.php">
<br></br>
<table>
  <tr>
    <td> </td>
  </tr>
  
   <tr>
    <td>Nama Paket </td>
    <td>:</td>
    <td>
      <textarea name="paket" rows="2" cols="40" id="paket"></textarea>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
        <td>Nama Vendor</td>
		 <td>:</td>
        <td><label>
        <select name="vendor" id="vendor" rows="5" cols="70" >
          <option value="NULL">[ Daftar Vendor ]</option>
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
		echo "<option value='$datap[kd_vendor]' '$cek>$datap[kd_vendor]&nbsp;|&nbsp;$datap[nama_vendor]</option>";
	}
  ?>
        </select>
        </label></td>
     </tr>

    <tr bgcolor="#FFFFFF">
        <td>Tema</td>
		<td>:</td>
        <td><select name="tema" id="tema">
        <option value="0">[Pilih Tema]</option>
        <option value="Jawa">Jawa</option>
        <option value="Nasional">Nasional</option>
        <option value="Internasional">Internasional</option>
        </select></td>
    </tr>
	
	<tr bgcolor="#FFFFFF">
        <td>Budget</td>
		 <td>:</td>
        <td><select name="budget" id="budget" rows="5" cols="70">
        <option value="0">[Pilih Budget]</option>
        <option value="Low">Low</option>
        <option value="Meduim">Meduim</option>
        <option value="High">High</option>
        </select></td>
     </tr>
	  
  <tr>
    <td>Harga 100 Porsi</td>
    <td>:</td>
    <td>
      <textarea name="harga" rows="2" cols="40" id="harga"></textarea>
    </td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input name="simpan" type="submit" id="simpan" value="Simpan">
      <input type="reset" name="reset" value="Reset">
    </td>
  </tr>
</table>
</form>
          
<table width="95%" border="1" align="center" cellpadding="1" cellspacing="0">
  <tr align="center">
    <td width="85"><strong>No</strong></td>
    <td width="305"><strong>Nama Paket</strong></td>
    <td width="305"><strong>Nama Vendor</strong></td>
	<td width="305"><strong>Tema</strong></td>
	<td width="305"><strong>Budget</strong></td>
	<td width="205"><strong>Harga 100 Porsi</strong></td>
    <td width="50"><strong>Edit</strong></td>
    <td width="50"><strong>Hapus</strong></td>
  </tr>
  <tr>
    <?php
	//include("inc.connect/connect.php");
  include "../koneksi.php";
	$sql= mysql_query ("SELECT data_paket.kd_paket, data_paket.nama_paket, data_paket.harga, data_paket.tema, data_paket.budget, data_vendor.kd_vendor, data_vendor.nama_vendor AS nama_vendor FROM data_paket,data_vendor WHERE data_vendor.kd_vendor=data_paket.kd_vendor")or die(mysql_error());
	$no=0;
	while ($data = mysql_fetch_array ($sql)) {
	$no++;
   ?>

  <tr> 
    <td><?php echo $no; ?></td>
	<td><?php echo $data['nama_paket']; ?></td>
	<td><?php echo $data['nama_vendor']; ?></td>
	<td><?php echo $data['tema']; ?></td>
	<td><?php echo $data['budget']; ?></td>
	<td>Rp.<?php echo number_format($data['harga']) ?>,-</td>
	
    <td><a title="Edit paket" href="edpaket.php?kdubah=<?php echo $data['kd_paket'];?>"><img src="image/edit.jpeg" width="16" height="16" border="0"></a></td>
    <td><a title="Hapus paket" style="cursor:pointer;" onclick="return konfirmasi('<?php echo $data['kd_paket'];?>');"><img src="image/hapus.jpeg" width="16" height="16" ></a></td>
  </tr>
  <?php
  } ?>
</table>
<p>&nbsp; </p>
</body>
</html>