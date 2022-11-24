<?php
    include "koneksi.php";

    $id_produk = $_GET['id_produk'];
    $folder = "foto/";

    // mendapatkan data barang yang diubah
    $sql = "select * from produk where id_produk='$id_produk'";
    # eksekusi perintah SQL
    $query = mysqli_query($koneksi, $sql);
    # konversi ke array
    $barang = mysqli_fetch_array($query);

    # proses hapus file yg lama
    $path = $folder.$produk["foto_produk"];

    # cek eksistensi file yg akan dihapus
    if (file_exists($path)) {
        # jika file yg lama ada, maka kita hapus
        unlink($path);
    }

    $sql = "DELETE FROM produk where id_produk = '$id_produk'";

    $result = mysqli_query($koneksi,$sql);

    if ($result) {
        echo "<script>alert('Berhasil');location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');</script>";
        echo mysqli_error($koneksi);
    }
?>