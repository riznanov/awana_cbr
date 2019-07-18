<?php
	//cek load
	if(ereg("connect.php", $_SERVER['PHP_SELF']))
	{
		header('Location: index.php');
		exit;
	}
	
	/*Dibawah ini adalah deklarasi variable untuk Koneksi database*/
	$host="localhost";
	$user="root";
	$pass="";
	$dbName="sistempakargigi";
	
	//Jika koneksi gagal atau pemilihan database gagal, maka akan menampilkan informasi server die
	//Tapi jika kedua-duanya berhasil dilakukan, maka akan melakukan perinta-perintah selanjutnya.
	if((!$koneksi=@mysql_pconnect($host, $user, $pass)) or (!@mysql_select_db($dbName, $koneksi)))
	{
		//Variable Server Die, akan digunakan jika koneksi database gagal dilakukan
		include("gagal.php");
		exit;
	}
?>