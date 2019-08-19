  <?php
    $no_kasus_hasil = array();
    $id_paket_hasil = array();
    $nama_paket_hasil = array();
    $nilai_hasil = array();

	//Query Kasus
     $i = 0;
     $querykasus = mysql_query("SELECT no_relasi, SUM( bobot ) AS total FROM relasi GROUP BY no_relasi ORDER BY no_relasi ASC");
     while ($datakasus = mysql_fetch_array($querykasus)) {
         $no_kasus_hasil[$i] = $datakasus['no_relasi'];
         $jml_pilihan_dipilih = 0;
         $jml_pilihan_kasus = 0;
         $jml_pilihan_cocok = 0;
         $bobotcocok = 0;
                                            
     //menampilkan kriteria yang dipilih
     $querypilihan = mysql_query("SELECT kd_pilihan FROM pilihan WHERE sub_nama in ('".$k1."','".$k2."','".$k3."','".$k4."')");
     while ($datapilihan = mysql_fetch_array($querypilihan)) {
         $jml_pilihan_dipilih++;
         $menghitungbobot = mysql_query("SELECT bk.no_relasi, sum(g.bobot) as total FROM relasi bk, pilihan g WHERE bk.no_relasi = '$datakasus[no_relasi]' and g.kd_pilihan = bk.id_pilihan");                               
         $querybasiskasus = mysql_query("SELECT * FROM relasi bk, pilihan g WHERE bk.no_relasi = '$datakasus[no_relasi]' and g.kd_pilihan = bk.kd_pilihan and NOT (bobot = 0)");
         $jml_pilihan_kasus = 0;
         while ($databasiskasus = mysql_fetch_array($querybasiskasus)) {
              $jml_pilihan_kasus++;
             // apabila kode pilihan sama dengan yang dipilih
                if ($datapilihan['kd_pilihan'] == $databasiskasus['kd_pilihan']) {
                 // ambil bobot untuk pilihan tersebut
                   $jml_pilihan_cocok++;
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
        $i++;
    }
                
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
?>