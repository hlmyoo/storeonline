<?php

if($_POST){

    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $telp=$_POST['telp'];

    

    if(empty($nama)){
        echo "<script>alert('nama  tidak boleh kosong');location.href='register_masyarakat.php';</script>";
    } elseif(empty($username)){

        echo "<script>alert('username tidak boleh kosong');location.href='register_masyarakat.php';</script>";
    } elseif(empty($password)){

        echo "<script>alert('password tidak boleh kosong');location.href='register_masyarakat.php';</script>";
    } elseif(empty($telp)){
        echo "<script>alert('telp tidak boleh kosong');location.href='register_masyarakat.php';</script>";
    }else{

        include "koneksi.php";

        $insert=mysqli_query($conn,"insert into masyarakat (nama, username, password, telp) value ('".$nama."', '".$username."', '".$password."', '".$telp."')") or die(mysqli_error($conn));

        if($insert){
            echo "<script>alert('Sukses menambahkan akun');location.href='register_masyarakat.php';</script>";
            header("location: login_masyarakat.php");
        } else {
            echo "<script>alert('Gagal menambahkan akun');location.href='register_masyarakat.php';</script>";
        }
    }
}
?>