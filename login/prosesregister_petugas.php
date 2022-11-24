<?php

if($_POST){

    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];

    

    if(empty($nama)){
        echo "<script>alert('nama  tidak boleh kosong');location.href='register_masyarakat.php';</script>";
    } elseif(empty($username)){

        echo "<script>alert('username tidak boleh kosong');location.href='register_masyarakat.php';</script>";
    } elseif(empty($password)){

        echo "<script>alert('password tidak boleh kosong');location.href='register_masyarakat.php';</script>";
    } elseif(empty($level)){
        echo "<script>alert('level tidak boleh kosong');location.href='register_masyarakat.php';</script>";
    }else{

        include "koneksi.php";

        $insert=mysqli_query($conn,"insert into petugas (nama_petugas, username, password, level) value ('".$nama."', '".$username."', '".md5($password)."', '".$level."')") or die(mysqli_error($conn));

        if($insert){
            echo "<script>alert('Sukses menambahkan akun');location.href='register_petugas.php';</script>";
            header("location: login_masyarakat.php");
        } else {
            echo "<script>alert('Gagal menambahkan akun');location.href='register_petugas.php';</script>";
        }
    }
}
?>