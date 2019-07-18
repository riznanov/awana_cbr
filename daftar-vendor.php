<div class="art-post">
<div class="art-post-body">
<div class="art-post-inner art-article">
<h3 class="art-postheader">DAFTAR VENDOR YANG TERSEDIA DI AWANA WEDDING ORGANIZER</h3>

<div class="art-postcontent">
<table width="75%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr align="center" bgcolor="#CCCC99" align="center">
  <tr> 
    <td width="10" align="center" ><strong>No</strong></td>
	<td width="30" align="center" ><strong>Nama Vendor</strong></td>
  </tr>
  <?php 
	$sql = "SELECT * FROM data_vendor ORDER BY kd_vendor";
	$qry = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
	$no=0;
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td><?php echo $no; ?></td>
	<td><?php echo $data['nama_vendor']; ?></td>
	
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