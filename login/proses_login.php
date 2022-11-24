<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='".$username."' and password='".md5($password)."' ");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['status']=="petugas"){

		// buat session login dan username
		$_SESSION['username'] = $data['username'];
		$_SESSION['status'] = "petugas";
		$_SESSION['status_login']=true;
		// alihkan ke halaman dashboard admin
		header("location: ../petugas/index.php");

	// cek jika user login sebagai pegawai
	}else if($data['level']=="user"){
		// buat session login dan username
		$_SESSION['username'] = $data['username'];
		$_SESSION['level'] = "user";
		$_SESSION['status_login']=true;
		// alihkan ke halaman dashboard pegawai
		header("location:../user/index.php");

	}
	else{
		echo "salah";
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

	
}else{
	echo "salah";
	header("location:index.php?pesan=gagal");
}



?>