<?php
    $id_produk= $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
   
    

    $temp = $_FILES['foto_produk']['tmp_name'];
    $type = $_FILES['foto_produk']['type'];
    $size = $_FILES['foto_produk']['size'];
    $name = rand(0,9999).$_FILES['foto_produk']['name'];
    $folder = "foto/";

    // echo $id_barang;

    include "koneksi.php";
    // mendapatkan data barang yang diubah
    $sql = "select * from produk where id_produk='$id_produk'";
    # eksekusi perintah SQL
    $query = mysqli_query($koneksi, $sql);
    # konversi ke array
    $produk = mysqli_fetch_array($query);

    # proses hapus file yg lama
    $path = $folder.$barang["foto_produk"];

    # cek eksistensi file yg akan dihapus
    if (file_exists($path)) {
        # jika file yg lama ada, maka kita hapus
        unlink($path);
    }

    # upload file yg baru
    move_uploaded_file($temp, $folder . $name);

    # proses update data yg ada di database
    $sql = "update produk set nama_produk='$nama_produk',
    deskripsi='$deskripsi', harga='$harga', 
    foto_produk='$name' where id_produk='$id_produk'";

    # eksekusi perintah update
    $result = mysqli_query($koneksi,$sql);

    if ($result) {
        echo "<script>alert('Berhasil');location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');</script>";
        echo mysqli_error($koneksi);
    }
    
?>