<?php
	session_start();
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
                $query = "DELETE FROM readmesh_readmeshop.produk where id = ".$_GET['id'];
            }else if($_SESSION['actionlogin']=="edittestimoniadmin.php"){
                $query = "DELETE FROM testimoni where id = ".$_GET['id'];
            }else if($_SESSION['actionlogin']=="editulasanadmin.php"){
                $query = "DELETE FROM review where id = ".$_GET['id'];
            }
            if(mysqli_query($koneksi,$query)){
		header("location:".$_SESSION['actionlogin']."");
                $_SESSION['berhasil']="Berhasil di hapus dari database";
            }
        }else{
            header("location:".$_SESSION['actionlogin']."");
            $_SESSION['gagal']="Anda bukan Admin. Anda tidak bisa menghapus data yang ada database";
        }
        mysqli_close($koneksi);
?>