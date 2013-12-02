<?php
	session_start();
        if($_SESSION['user']!=1){
            header("location:index.php");
        }
	require("koneksi.php");
        require("PasswordHash.php");
        $sql = "SELECT password FROM pengguna WHERE id ='".$_SESSION['user']."'";
        $result = mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_assoc($result);
        $t_hasher = new PasswordHash(8, FALSE);
        $check=0;
        if($_SESSION['user']==1){
        $check = $t_hasher->CheckPassword($_SESSION['password'],$data['password']);
        }
        if($check==1){
            if($_SESSION['actionlogin']=="editprodukadmin.php"){
                $query = "DELETE FROM produk WHERE id = ".$_GET['id'];
                $query2 = "DELETE FROM detail WHERE id = ".$_GET['id'];
                $query3 = "DELETE FROM review WHERE id_produk = ".$_GET['id'];
                if(mysqli_query($koneksi,$query) && mysqli_query($koneksi,$query2) && mysqli_query($koneksi,$query3)){
                    header("location:".$_SESSION['actionlogin']."");
                    $_SESSION['berhasil']="Berhasil di hapus dari database";
                }else{
                    header("location:default.html");
                }
            }else if($_SESSION['actionlogin']=="edittestimoniadmin.php"){
                $query = "DELETE FROM testimoni WHERE id = ".$_GET['id'];
                if(mysqli_query($koneksi,$query)){
                    header("location:".$_SESSION['actionlogin']."");
                    $_SESSION['berhasil']="Berhasil di hapus dari database";
                }else{
                    header("location:default.html");
                }
            }else if($_SESSION['actionlogin']=="editulasanadmin.php"){
                $query = "DELETE FROM review WHERE id = ".$_GET['id'];
                if(mysqli_query($koneksi,$query)){
                    header("location:".$_SESSION['actionlogin']."");
                    $_SESSION['berhasil']="Berhasil di hapus dari database";
                }else{
                    header("location:default.html");
                }
            }else if($_SESSION['actionlogin']=="penggunaadmin.php"){
                $query = "DELETE FROM pengguna WHERE id = ".$_GET['id'];
                if(mysqli_query($koneksi,$query)){
                    header("location:".$_SESSION['actionlogin']."");
                    $_SESSION['berhasil']="Berhasil di hapus dari database";
                }else{
                    header("location:default.html");
                }
            }
        }else{
            header("location:".$_SESSION['actionlogin']."");
            $_SESSION['gagal']="Anda bukan Admin. Anda tidak bisa menghapus data yang ada database";
        }
        mysqli_close($koneksi);
?>