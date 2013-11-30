<?php
    session_start();
    if(isset($_POST['tambah'])){
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
        if($check){
            $valid = TRUE;
            if($_SESSION['actionlogin']=="edittestimoniadmin.php"){
                if(!empty($_POST['tambah'])){
                    if(trim($_POST['isi'])==""){
                       $valid = FALSE;
                    }
                    if($valid){
                        $isitestimoni = $_POST['isi'];
                        $query = "INSERT into testimoni VALUES 
                        (NULL,'".$_SESSION['user']."',CURRENT_TIMESTAMP,'".$isitestimoni."')";
                        if(mysqli_query($koneksi,$query)){
                            header("location:".$_SESSION['actionlogin']."");
                            $_SESSION['berhasil']="Berhasil di tambah ke database";
                        }else{
                            header("location:default.html");
                        }
                    }else{
                        header("location:".$_SESSION['actionlogin']."");
                        $_SESSION['gagal']="Gagal di tambah ke database. Pastikan semua inputan terisi";
                    } 
                }
            }else if($_SESSION['actionlogin']=="editulasanadmin.php"){
                if(trim($_POST['isi'])==""){
                    $valid = FALSE;
                }
                if(trim($_POST['produk'])==""){
                    $valid = FALSE;
                }
                if($valid)
                {
                    $isireview = $_POST['isi'];
                    $id_produk = $_POST['produk'];
                    $query = "INSERT into review VALUES 
                    (NULL,'".$id_produk."','".$_SESSION['user']."',CURRENT_TIMESTAMP,'".$isireview."')";
                    if(mysqli_query($koneksi,$query)){
                        header("location:".$_SESSION['actionlogin']."");
                        $_SESSION['berhasil']="Berhasil di tambah ke database";
                    }else{
                        header("location:default.html");
                    }
                }else{
                    header("location:".$_SESSION['actionlogin']."");
                    $_SESSION['gagal']="Gagal di tambah ke database. Pastikan semua inputan terisi";
                } 
            }
        }else{
            header("location:".$_SESSION['actionlogin']."");
            $_SESSION['gagal']="Anda bukan Admin. Anda tidak bisa menambahkan data ke database";
        }
        mysqli_close($koneksi);
    }
?>