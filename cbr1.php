

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
                    if (!isset($_POST['button'])) {
                        ?>
                        <form name="form1" method="post" action="">
                            <br>
                            <table align="center" width="600" border="1" cellspacing="0" cellpadding="5">
                                <tr>
                                    <td id="ignore" bgcolor="#DBEAF5" width="300"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font size="2">GEJALA</font> </font></strong></div></td>
                                    <?php
                                    $q = mysql_query("select * from gejala ORDER BY kd_pilihan"); // tampilkan semua gejala
                                    while ($r = mysql_fetch_array($q)) {
                                        ?>        
                                    <tr>
                                        <td width="600"> 
                                            <input id="gejala<?php echo $r['kd_pilihan']; ?>" name="gejala<?php echo $r['kd_pilihan']; ?>" type="checkbox" value="true">
                                            <?php echo $r['sub_nama']; ?></strong><br/>                
                                        </td>
                                    </tr>
                                <?php } ?>	
                                <tr>
                                    <td><input type="submit" name="button" value="Proses"></td>
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

                                $querybasiskasus = "SELECT * FROM relasi ORDER BY no_relasi, kd_paket, kd_pilihan";
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


                                    // $hitung = mysql_query("SELECT g.nama_gejala , sum(bk.bobot) FROM gejala g, basis_kasus bk WHERE g.kd_pilihan = '$databasiskasus[kd_pilihan]' GROUP BY g.nama_gejala");
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
                            <table width="300" border="0" cellpadding="5" cellspacing="1" bgcolor="#000099">
                                <?php
                                $querygejala = mysql_query("SELECT * FROM gejala ORDER BY kd_pilihan ASC");

                                while ($datagejala = mysql_fetch_array($querygejala)) {
                                    if (@$_POST['gejala' . $datagejala['kd_pilihan']] == 'true') {
                                        ?>        
                                        <tr>
                                            <td bgcolor="#FFFFFF"> 
                                                <?php echo $datagejala['sub_nama']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                //------------------------------------------------------------------------------------------------------------------------
                                ?>
                            </table> 

                            <br/><br/> <strong>---------------------------------------------------------------------------------------------------------------------</strong>   <br/><br/>


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
                                $querygejala = mysql_query("SELECT * FROM gejala ORDER BY kd_pilihan ASC");
                                while ($datagejala = mysql_fetch_array($querygejala)) {
                                    if (@$_POST['gejala' . $datagejala['kd_pilihan']] == 'true') {

                                     $jml_gejala_dipilih++;

// cari disini                          //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
                                        // SELECT bk.no_kasus, sum(g.bobot) FROM basis_kasus bk, gejala g WHERE bk.no_kasus = '2' and g.id_gejala = bk.id_gejala
                                        //$querybasiskasus = mysql_query("SELECT * , sum(g.bobot) FROM basis_kasus WHERE no_kasus = '$datakasus[no_kasus]'");
                                        $menghitungbobot = mysql_query("SELECT bk.no_relasi, sum(g.bobot) as total FROM relasi bk, gejala g WHERE bk.no_relasi = '$datakasus[no_relasi]' and g.kd_pilihan = bk.id_pilihan");
                                        //      $totalhasil = mysql_fetch_array($ka);
                                        $querybasiskasus = mysql_query("SELECT * FROM relasi bk, gejala g WHERE bk.no_relasi = '$datakasus[no_relasi]' and g.kd_pilihan = bk.kd_pilihan and NOT (bobot = 0.5)");
                                        $jml_gejala_kasus = 0;
										
                                         while ($databasiskasus = mysql_fetch_array($querybasiskasus)) {
                                            $jml_gejala_kasus++;
                                            // apabila id gejala sama dengan yang dipilih
                                            if ($datagejala['kd_pilihan'] == $databasiskasus['kd_pilihan']) {
                                                // ambil bobot untuk gejala tersebut
                                                $jml_gejala_cocok++;
												$bobotcocok += $databasiskasus['bobot']; 
												
//                                                for ($i = 0; $i < $jml_gejala_cocok; $i++) {
//                                                $bot = $databasiskasus['bobot'];
//                                                }  

                                            }
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
