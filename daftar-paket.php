<div class="art-post">
<div class="art-post-body">
<div class="art-post-inner art-article">

<h3 class="art-postheader">DAFTAR PAKET YANG TERSEDIA DI AWANA WEDDING ORGANIZER</h3>
<div class="art-postcontent">
<table width="75%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr align="center" bgcolor="#CCCC99" align="center">
 
  <tr> 
    <td width="20"><strong>No</strong></td>
	<td width="85"><strong>Nama Paket</strong></td>
	<td width="85"><strong>Vendor</strong></td>
	<td width="85"><strong>Tema</strong></td>
	<td width="85"><strong>Budget</strong></td>
	<td width="85"><strong>Harga 100 Porsi</strong></td>
  </tr>
  <?php 
	$sql= mysql_query ("SELECT data_paket.kd_paket, data_paket.nama_paket, data_paket.harga, data_paket.tema, data_paket.budget, data_vendor.kd_vendor, data_vendor.nama_vendor AS nama_vendor FROM data_paket,data_vendor WHERE data_vendor.kd_vendor=data_paket.kd_vendor")or die(mysql_error());
	$no=0;
	while ($data=mysql_fetch_array($sql)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td><div align="center"><?php echo $no; ?></div> </td>
	<td><?php echo $data['nama_paket']; ?></td>
	<td><?php echo $data['nama_vendor']; ?></td>
	<td><?php echo $data['tema']; ?></td>
	<td><?php echo $data['budget']; ?></td>
	<td>Rp.<?php echo number_format($data['harga']) ?>,-</td>
	
  </tr>
  <?php
  }
  ?>
</table>
</div>
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>