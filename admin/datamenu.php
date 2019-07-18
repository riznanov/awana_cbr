<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function validasi(form){
	if(form.kd_menu.value==""){
		alert("Masukkan kode menu..!");
		form.kd_gejala.focus(); return false;
		}else if(form.menu.value==""){
		alert("Masukkan menu..!");
		form.gejala.focus(); return false;	
		}
		form.submit();
	}
function konfirmasi(kd_menu){
	var kd_hapus=kd_menu;
	var url_str;
	url_str="hpsmenu.php?kdhapus="+kd_hapus;
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
<h2>Tambah Data Menu</h2>
<form name="form3" onSubmit="return validasi(this);" method="post" action="simpanmenu.php">
<br></br>
<table class="tab" width="477" border="0" align="center">
  <tr>
    <td colspan="3"><div align="center"></div></td>
  </tr>
   <tr>
    <td>Nama Menu </td>
    <td>:</td>
    <td>
      <textarea name="menu" rows="2" cols="40" id="menu"></textarea>
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
          
<table width="75%" border="1" align="center" cellpadding="1" cellspacing="0">
  <tr align="center">
    <td width="85"><strong>No</strong></td>
    <td width="505"><strong>Nama Menu</strong></td>
    <td width="50"><strong>Edit</strong></td>
    <td width="50"><strong>Hapus</strong></td>
  </tr>
  <tr>
    <?php
	//include("inc.connect/connect.php");
	include "../koneksi.php";
	$sql = "SELECT * FROM data_menu ORDER BY nama_menu ASC";
	$qry = mysql_query($sql,$koneksi) or die ("SQL Error".mysql_error());
	$no=0;
	while ($data = mysql_fetch_array ($qry)) {
	$no++;
   ?>

  <tr> 
    <td><?php echo $data['kd_menu']; ?></td>
	<td><?php echo $data['nama_menu']; ?></td>
    <td><a title="Edit menu" href="edmenu.php?kdubah=<?php echo $data['kd_menu'];?>"><img src="image/edit.jpeg" width="16" height="16" border="0"></a></td>
    <td><a title="Hapus menu" style="cursor:pointer;" onclick="return konfirmasi('<?php echo $data['kd_menu'];?>');"><img src="image/hapus.jpeg" width="16" height="16" ></a></td>
  </tr>
  <?php
  } ?>
</table>
<p>&nbsp; </p>
</body>
</html>