

<html >
    <head>
        <style type="text/css">
            <!--
            body,td,th {
                font-family: Georgia, Times New Roman, Times, serif;
                font-size: 13px;
                color: #333333;
            }
            .style1 {
                color: #000099;
                font-size: 24px;
            }
            a:link {
                text-decoration: none;
                color: #333333;
            }
            a:visited {
                text-decoration: none;
                color: #333333;
            }
            a:hover {
                text-decoration: underline;
                color: #FF0000;
            }
            a:active {
                text-decoration: none;
                color: #333333;
            }
            .style2 {font-weight: bold}
            -->
        </style>
		</head>
		<script type="text/javascript">
		function pilih(id){
		
		location.replace=("cbr.php?id="+id);
		}
		</script>
    <body>
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000099">
            <tr>
                <td align="center" valign="top" bgcolor="#FFFFFF"><br />
                    <strong>Analisa Menggunakan Sistem Pakar Metode CBR (Case Based Reasoning)</strong><br />
                    <br />
                    <?php
                    if (!isset($_POST['submit'])) {
						
                     ?>
                        <form name="form1" method="post" action="">
                            <br>
                            <table class="tab" width="528" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
							<tr bgcolor="#FFFFFF">
								<td>Tema</td>
								<td><select name="k1" id="k1">
									<option value="0">[Pilih Tema]</option>
									<option value="Jawa">Jawa</option>
									<option value="Nasional">Nasional</option>
									<option value="Internasional">Internasional</option>
							</select>
							</td>
							</tr>
							
                                            
							<tr bgcolor="#FFFFFF">
								<td>Budget</td>
								<td><select name="k2" id="k2">
									<option value="0">[Pilih Budget]</option>
									<option value="Low">Low</option>
									<option value="Medium">Meduim</option>
									<option value="High">High</option>
							</select></td>
							</tr>
							<tr bgcolor="#FFFFFF">
								<td>Varian</td>
								<td><select name="k3" id="k3">
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
								<td>Vendor</td>
								<td><label>
								 <select name="k4" id="k4">
								  <option value="NULL">[ Pilih Vendor ]</option>
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
								<td>&nbsp;</td>
								
								 <td><input type="submit" name="submit" value="Proses"></td>
								
							  </tr>
							</table>
                            <br>
                        </form>
                        <?php
                    } else {
                        ?>
                        <br/><br/> <strong>---------------------------------------------------------------------------------------------------------------------</strong>   <br/><br/>
                        <div id="perhitungan" > 
                            <br/><br/>Kasus Lama:<br/><br/>
                            <table width="700" border="5" cellpadding="5" cellspacing="1" bgcolor="#000099">
                                <tr>
                                    <td width="200" bgcolor="#FFFFFF">Nomor Kasus</td>
                                    <td width="250" bgcolor="#FFFFFF">Nama Paket</td>    
                                    <td width="250" bgcolor="#FFFFFF">Kriteria</td>
                                    <td width="250" bgcolor="#FFFFFF">Bobot</td>
                                    
                                </tr>
                                <?php
                                // ---------------------------------- Mulai dari sini --------------------------------------------------------------

                                $querybasiskasus = "SELECT * FROM relasi ORDER BY id_relasi, kd_paket, kd_pilihan";
                                $no_relasi = "";

								$qry = mysql_query($querybasiskasus, $koneksi) 
									or die ("SQL Error: ".mysql_error());
                                while ($databasiskasus = mysql_fetch_array($qry)) {
                                    $querypaket = mysql_query("SELECT * FROM data_paket WHERE kd_paket = '$databasiskasus[kd_paket]'");
                                    $datapaket = mysql_fetch_array($querypaket);
                                    $querykriteria = mysql_query("SELECT * FROM gejala WHERE kd_pilihan = '$databasiskasus[kd_pilihan]'");
                                    $datakriteria = mysql_fetch_array($querykriteria);

                                    $databobot = mysql_query("SELECT * FROM relasi WHERE kd_pilihan = '$databasiskasus[kd_pilihan]'");
                                    $dabobot = mysql_fetch_array($databobot);


                                    $ka = mysql_query("SELECT no_relasi, SUM(bobot) AS total FROM relasi GROUP BY no_relasi");


                                    // $hitung = mysql_query("SELECT g.nama_gejala , sum(bk.bobot) FROM gejala g, basis_kasus bk WHERE g.id_gejala = '$databasiskasus[id_gejala]' GROUP BY g.nama_gejala");
                                    $hasilhitung = mysql_fetch_array($ka);
                                    ?>

                                    <?php
                                    // -----------------------------------------------------------
                                    // $qry_jumlah_b = mysql_query("SELECT SUM( g.bobot )FROM basis_kasus b, gejala g WHERE b.id_gejala = g.id_gejala GROUP BY b.no_kasus");
                                    $data_b = mysql_fetch_array($ka);
                                    ?>


                                    <tr>
                                        <?php
                                        // cocokan disini 
                                        if ($no_relasi != $databasiskasus['no_relasi']) {
                                            $queryjumlah = mysql_query("SELECT * FROM relasi WHERE no_relasi = '$databasiskasus[no_relasi]'");
                                            $jumlahbaris = mysql_num_rows($queryjumlah);
                                            ?>
                                            <td bgcolor="#FFFFFF" rowspan="<?php echo $jumlahbaris; ?>"> <?php echo $databasiskasus['no_relasi']; ?></td>
                                            <td bgcolor="#FFFFFF" rowspan="<?php echo $jumlahbaris; ?> "> <?php echo $datapaket['nama_paket']; ?></td>
                                            <?php
                                        }
                                        ?>
										
                                        <td bgcolor="#FFFFFF"><?php echo $datakriteria['kriteria_nama'].'  :'.' '.$datakriteria['sub_nama'] ; ?></td>
                                        <td bgcolor="#FFFFFF"><?php echo $databasiskasus['bobot']; ?></td>
                                        <?php
                                        // $nilai[] = $datahitung['bobot'];
                                        //$totalnya = array_sum($nilai);
                                        ?>

                                    </tr>
                                    <?php
                                    $no_relasi = $databasiskasus['no_relasi'];
                                }
                                ?>
                            </table>


                            <?php // --------------------------------------------------------------------------------------------------------------------- ?>
                            <br/><br/> <strong>---------------------------------------------------------------------------------------------------------------------</strong>   <br/><br/>
                            <br/><br/> <strong> Kriteria yang Dipilih : </strong>   <br/><br/>
                            <table width="300" border="5" cellpadding="5" cellspacing="1" bgcolor="#000099">
                                <?php
								
								if(isset($_POST['submit'])){
									 $k1= $_POST['k1'];
									 $k2= $_POST['k2'];
									 $k3= $_POST['k3'];
									 $k4= $_POST['k4'];
									
                                $querygejala = "SELECT sub_nama FROM gejala WHERE sub_nama = '".$k1."'";
								$qry = mysql_query($querygejala, $koneksi) 
									or die ("SQL Error: ".mysql_error());
                                while ($datakriteria = mysql_fetch_array($qry)) {
                                        ?>        
                                        <tr>
                                            <td bgcolor="#FFFFFF"> 
                                                <?php echo "Tema :   ",$datakriteria['sub_nama']; ?>
                                            </td>
									    </tr>
										 
                                        <?php
                                    }
									$querygejala = "SELECT sub_nama FROM gejala WHERE sub_nama = '".$k2."'";
									$qry = mysql_query($querygejala, $koneksi) 
										or die ("SQL Error: ".mysql_error());
									while ($datakriteria = mysql_fetch_array($qry)) {
											?>        
											 <tr>
                                            <td bgcolor="#FFFFFF"> 
                                                <?php echo "Budget :   ", $datakriteria['sub_nama']; ?>
                                            </td>
									    	</tr>
											<?php
                               		 }
								$querygejala = "SELECT sub_nama FROM gejala WHERE sub_nama = '".$k3."'";
								$qry = mysql_query($querygejala, $koneksi) 
									or die ("SQL Error: ".mysql_error());
                                while ($datakriteria = mysql_fetch_array($qry)) {
                                        ?>        
                                        <tr>
                                            <td bgcolor="#FFFFFF"> 
                                                <?php echo "Varian :   ", $datakriteria['sub_nama']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
				                $querygejala = "SELECT sub_nama FROM gejala WHERE sub_nama = '".$k4."'";
								$qry = mysql_query($querygejala, $koneksi) 
									or die ("SQL Error: ".mysql_error());
                                while ($datakriteria = mysql_fetch_array($qry)) {
                                        ?>        
                                        <tr>
                                            <td bgcolor="#FFFFFF"> 
                                                <?php echo "Vendor :   ", $datakriteria['sub_nama']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
								
                           ?>	
                          </table> 

                        <br/><br/> <strong>---------------------------------------------------------------------------------------------------------------------</strong><br><br/>

<br/><br/>Perhitungan :<br/><br/>
                            <?php
                            echo "<table width=\"700\" border=\"0\" cellpadding=\"5\" cellspacing=\"1\" >";

                            echo "<td>No Kasus</td>";
                            echo "<td>Kriteria Cocok</td>";
                            echo "<td>Bobot Cocok</td>";
                            echo "<td>Total Bobot</td>";
                            echo "<td> Jml Kriteria Kasus</td>";
                            echo "<td bgcolor=\"#FFFFFF\">Jml Kriteria Dipilih</td>";
                            echo "<td>Pembagi</td>";
                            echo "<td><strong>Nilai Hasil</strong></td>";

                            echo "</tr>";

                            $no_kasus_hasil = array();
                            $id_paket_hasil = array();
                            $nama_paket_hasil = array();
                            $nilai_hasil = array();

							//Query Kasus
                            $i = 0;
                            $querykasus = mysql_query("SELECT no_relasi, SUM( bobot ) AS total FROM relasi GROUP BY no_relasi ORDER BY no_relasi ASC");
                            while ($datakasus = mysql_fetch_array($querykasus)) {
                                $no_kasus_hasil[$i] = $datakasus['no_relasi'];
                                $jml_gejala_dipilih = 0;
                                $jml_gejala_kasus = 0;
                                $jml_gejala_cocok = 0;
                                $bobotcocok = 0;
								
								//menampilkan kriteria yang dipilih
								    $querygejala = mysql_query("SELECT kd_pilihan FROM gejala WHERE sub_nama in ('".$k1."','".$k2."','".$k3."','".$k4."')");
                                while ($datagejala = mysql_fetch_array($querygejala)) {
									
                                    

                                     $jml_gejala_dipilih++;

                                       
                                        $menghitungbobot = mysql_query("SELECT bk.no_relasi, sum(g.bobot) as total FROM relasi bk, gejala g WHERE bk.no_relasi = '$datakasus[no_relasi]' and g.kd_pilihan = bk.id_pilihan");                                      
                                        $querybasiskasus = mysql_query("SELECT * FROM relasi bk, gejala g WHERE bk.no_relasi = '$datakasus[no_relasi]' and g.kd_pilihan = bk.kd_pilihan and NOT (bobot = 0)");
                                        $jml_gejala_kasus = 0;
										
                                         while ($databasiskasus = mysql_fetch_array($querybasiskasus)) {
                                            $jml_gejala_kasus++;
                                            // apabila id gejala sama dengan yang dipilih
                                            if ($datagejala['kd_pilihan'] == $databasiskasus['kd_pilihan']) {
                                                // ambil bobot untuk gejala tersebut
                                                $jml_gejala_cocok++;
												$bobotcocok += $databasiskasus['bobot']; 

                                            }
                                        }
                                    
                                }
							
							
							//Hasil nilai
                               $hasil = 0;
                                $hasil = $bobotcocok / $datakasus['total'];			
                                $nilai_hasil[$i] = $hasil;

                                $id_paket_hasil[$i] = "";
								
				
							
                                // inisialkan nama paket
                                $nama_paket_hasil[$i] = "";
								$querypaket = mysql_query("SELECT data_paket.* FROM relasi LEFT JOIN data_paket ON relasi.kd_paket = data_paket.kd_paket WHERE no_relasi = '$datakasus[no_relasi]'");
                                if ($datapaket = mysql_fetch_array($querypaket)) {
                                    $id_paket_hasil[$i] = $datapaket['kd_paket'];
                                    $nama_paket_hasil[$i] = $datapaket['nama_paket'];
                                }

                               
							   // echo $datakasus['no_relasi']." = ".$jml_gejala_cocok." / ".$pembagi." = ".$hasil."<br/>";
                               
 							   echo "<td bgcolor=\"#FFFFFF\"><strong>" . $datakasus['no_relasi'] . "</strong></td>";  //No Kasus (good)
                                echo "<td bgcolor=\"#FFFFFF\"><strong>" . $jml_gejala_cocok . " kriteria</strong></td>";  //Kriteria Cocok (good)
								echo "<td bgcolor=\"#FFFFFF\"><strong>" . $bobotcocok . "</strong></td>"; // bobot yang cocok
                                echo "<td bgcolor=\"#FFFFFF\"><strong>" . $datakasus['total'] . "</strong></td>"; // total bobot (good)
                                
                                echo "<td bgcolor=\"#FFFFFF\"><strong>" . $jml_gejala_kasus . "</strong></td>"; // jumlah kriteria kasus (good)
								echo "<td bgcolor=\"#FFFFFF\"><strong>" . $jml_gejala_dipilih . "</strong></td>"; // jumlah kriteria dipilih (good)
                                echo "<td bgcolor=\"#FFFFFF\">" . $bobotcocok . " /<strong>" . $datakasus['total'] . "</strong></td>"; //nilai pembagi (kurang bobot cocok)
								echo "<td bgcolor=\"#FFFFFF\"><strong>" . $hasil . "</td>"; //nilai hasil
                                echo "</tr>";

                                $i++;
                            }
                            echo "</table>";

                            for ($i = 0; $i < count($id_paket_hasil); $i++) {
                                for ($j = $i + 1; $j < count($id_paket_hasil); $j++) {
                                    if ($nilai_hasil[$j] > $nilai_hasil[$i]) {
                                        $tmp_no_kasus = $no_kasus_hasil[$i];
                                        $no_kasus_hasil[$i] = $no_kasus_hasil[$j];
                                        $no_kasus_hasil[$j] = $tmp_no_kasus;

                                        $tmp_id_paket = $id_paket_hasil[$i];
                                        $id_paket_hasil[$i] = $id_paket_hasil[$j];
                                        $id_paket_hasil[$j] = $tmp_id_paket;

                                        // ambil nama paket -----------------------------------------
                                        $tmp_nama_paket = $nama_paket_hasil[$i];
                                        $nama_paket_hasil[$i] = $nama_paket_hasil[$j];
                                        $nama_paket_hasil[$j] = $tmp_nama_paket;



                                        $tmp_nilai = $nilai_hasil[$i];
                                        $nilai_hasil[$i] = $nilai_hasil[$j];
                                        $nilai_hasil[$j] = $tmp_nilai;
                                    }
                                }
                            }


                            echo "<br/>Paket menu yang cocok adalah = " . $nama_paket_hasil[0] . " pada Kasus Nomor " . $no_kasus_hasil[0] . ", dengan Nilai Persentase Terbesar " . round($nilai_hasil[0] * 100, 2) . "<br/>";

                            //for ($i = 0; $i < count($daftar_penyakit); $i++)
                            //{
                            //	echo $daftar_penyakit[$i]."=".$daftar_cf[$i]."<br/>";
                            // algoritmanya disini --------------------------------------------------------------------------------------------}
                            ?>
                        </div>

                        <br/><br/> <strong>---------------------------------------------------------------------------------------------------------------------</strong>   <br/><br/>
                        <br />
                     
                        <br />
                        <br />
                        <table width="500" border="0" cellspacing="1" cellpadding="3" >
                            <tr>
                                <td>Ranking</td>
                                <td>Kasus</td>
                                <td>Nama Paket</td>
                                <td>Nilai Hasil</td>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($id_paket_hasil); $i++) {
                                ?>
                                <tr>
                                    <td bgcolor="#FFFFFF"><?php echo ($i + 1); ?></td>
                                    <td bgcolor="#FFFFFF"><?php echo $no_kasus_hasil[$i]; ?></td>

                                    <td bgcolor="#FFFFFF"><?php echo $nama_paket_hasil[$i]; ?></td> 

                                    <td bgcolor="#FFFFFF"><?php echo round($nilai_hasil[$i] * 100, 2); ?> %</td>
                                </tr>
                                <?php
                            }
                            ?>                                     
                        </table>


                        <br />
                        <br />
                        Paket menu Terpilih = <?php echo $nama_paket_hasil[0]; ?> pada Kasus Nomor <?php echo $no_kasus_hasil[0]; ?>, dengan Nilai Persentase Terbesar = <?php echo round($nilai_hasil[0] * 100, 2); ?> %
                        <br />
                        <br />	
                      <?php
                    }
                    ?>
                </td>
            </tr>

        </table>
    </body>
</html>
