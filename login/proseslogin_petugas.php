<?php
    if($_POST){
        $username = $_POST['username'];
        $password = $_POST['password'];

        include "koneksi.php";
        $query_login=mysqli_query($koneksi,"SELECT * FROM user where 
        username = '".$username."' and password = '".md5($password)."'");

        if (mysqli_num_rows($query_login)>0) {
            $data_login = mysqli_fetch_array($query_login);
            session_start();
            $_SESSION['id_user']=$data_login['id_user'];
            $_SESSION['nama']=$data_login['nama'];
            $_SESSION['status'] = "petugas";
		    $_SESSION['status_login']=true;
            echo "<script>alert('Sukses Login');location.href='../petugas/index.php';</script>";
        }
        else{
            echo "<script>alert('login gagal');location.href='index.php';</script>";
        }
    }

?>