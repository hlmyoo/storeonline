<?php
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    
   
    

    $temp = $_FILES['foto_produk']['tmp_name'];
    $type = $_FILES['foto_produk']['type'];
    $size = $_FILES['foto_produk']['size'];
    $name = rand(0,9999).$_FILES['foto_produk']['name'];
    $folder = "foto/";

    include "koneksi.php";

    if($size < 2048000 and ($type == "image/jpeg" or $type == "image/png" or $type == "image/jpg"))
    {
        move_uploaded_file($temp, $folder . $name);

        $sql = "INSERT INTO `produk` (`nama_produk`, `deskripsi`, `harga`, `foto_produk`) VALUES ('$nama_produk', '$deskripsi', '$harga', '$name')";
                
                $insert=mysqli_query($koneksi, $sql);

        if($insert){
            echo "<script>alert('Berhasil');
            location.href='index.php';</script>";
        } else {
            echo "<script>alert('Gagal');
            location.href='tambah_barang.php';</script>";
            // die ('Gagal!' .mysqli_error($koneksi));
        }
    }
    else {
        echo "<script>alert('File tidak sesuai');
        location.href='tambah_barang.php';</script>";
    }

?>