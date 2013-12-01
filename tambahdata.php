<?php
    session_start();
    if($_SESSION['user']!=1){
	header("location:index.php");
    }
    if(isset($_POST['tambah']) || isset($_POST['edit'])){
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
            if($_SESSION['actionlogin']=="editprodukadmin.php" || $_SESSION['actionlogin']=="editdata.php"){
                if(!empty($_POST['tambah']) || !empty($_POST['edit'])){
                    //informasi produk
                    if(trim($_POST['nama'])==""){
                       $valid = FALSE;
                    }
                    if(trim($_POST['merek'])==""){
                       $valid = FALSE;
                    }
                    //upload gambar
                    $dir = 'images/';
                    if($_FILES['upload']['size'] != 0){
                        $uploadfile = $dir.$_FILES['upload']['name'];
                        if(($_FILES["upload"]["type"] != 'images/jpg')){
                            $valid = TRUE;
                        }else{
                            $valid = FALSE;
                        }
                    }else{
                        if( $_SESSION['actionlogin']=="editdata.php"){
                            $uploadfile = $_POST['gambaredit'];
                        }else{
                            $valid = FALSE;
                        }
                    }
                    if(trim($_POST['harga'] =="") || (strlen($_POST['harga'])>0 && !is_numeric($_POST['harga']))){
                       $valid = FALSE;
                    }
                    if(trim($_POST['stok'] =="") || (strlen($_POST['stok'])>0 && !is_numeric($_POST['stok']))){
                       $valid = FALSE;
                    }
                    if(trim($_POST['nilai'] =="") || (strlen($_POST['nilai'])>0 && !is_numeric($_POST['nilai']))){
                       $valid = FALSE;
                    }
                    if( $_SESSION['actionlogin']=="editdata.php"){
                        if(trim($_POST['terjual'] =="") || (strlen($_POST['terjual'])>0 && !is_numeric($_POST['terjual']))){
                           $valid = FALSE;
                        }else{
                           $terjual = $_POST['terjual'];
                        }
                    }
                    if(trim($_POST['produk'])==""){
                       $valid = FALSE;
                    }
                    
                    //spesifikasi produk
                    if(trim($_POST['tipesim'])==""){
                       $valid = FALSE;
                    }
                    if(trim($_POST['jaringandata'])==""){
                       $valid = FALSE;
                    }
                    if(trim($_POST['jaringantelepon'])==""){
                       $valid = FALSE;
                    }
                    if(trim($_POST['ram'])==""){
                       $valid = FALSE;
                    }
                    if(trim($_POST['memori'])==""){
                       $valid = FALSE;
                    }
                    if(trim($_POST['gpu'])==""){
                       $valid = FALSE;
                    }
                    if(trim($_POST['layar'])==""){
                       $valid = FALSE;
                    }
                    if(trim($_POST['kamera'])==""){
                       $valid = FALSE;
                    }
                    if(trim($_POST['baterai'])==""){
                       $valid = FALSE;
                    }
                    if(trim($_POST['fiturtambahan'])==""){
                       $valid = FALSE;
                    }
                    if($valid){
                        if($_FILES['upload']['size'] != 0){
                            if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile)){
                                //header("location:".$_SESSION['actionlogin']."");
                                //$_SESSION['berhasil']="".$uploadfile."";
                            }else{
                                header("location:".$_SESSION['actionlogin']."");
                                $_SESSION['gagal']="Upload gambar gagal !";
                            }
                        }
                        //informasi produk
                        $nama = $_POST['nama'];
                        $merek = $_POST['merek'];
                        $gambar = $uploadfile;
                        $harga = $_POST['harga'];
                        $stok = $_POST['stok'];
                        $nilai = $_POST['nilai'];
                        $status = $_POST['produk'];
                        if($_SESSION['actionlogin']=="editprodukadmin.php"){
                            $query = "INSERT into produk VALUES 
                            (NULL,'".$merek."','".$nama."','".$harga."','".$gambar."','".$stok."','".$nilai."',CURRENT_TIMESTAMP,0,'".$status."')";
                        }else if($_SESSION['actionlogin']=="editdata.php"){
                            $id = $_POST['id'];
                            $query = "UPDATE produk SET merek = '".$merek."', nama = '".$nama."',harga = '".$harga."',gambar = '".$gambar."',stok = '".$stok."',nilai = '".$nilai."',terjual = '".$terjual."',status = '".$status."' WHERE id = " .$id;
                        }
                        //spesifikasi produk
                        $tipesim = $_POST['tipesim'];
                        $jaringandata = $_POST['jaringandata'];
                        $jaringantelepon = $_POST['jaringantelepon'];
                        $prosesor = $_POST['prosesor'];
                        $ram = $_POST['ram'];
                        $memori = $_POST['memori'];
                        $gpu = $_POST['gpu'];
                        $layar = $_POST['layar'];
                        $kamera = $_POST['kamera'];
                        $baterai = $_POST['baterai'];
                        $fiturtambahan = $_POST['fiturtambahan'];
                        if($_SESSION['actionlogin']=="editprodukadmin.php"){
                            $query2 = "INSERT into detail VALUES 
                            (NULL,'".$tipesim."','".$jaringandata."','".$jaringantelepon."','".$prosesor."','".$ram."','".$memori."','".$gpu."','".$layar."','".$kamera."','".$baterai."','".$fiturtambahan."')";
                        }else if($_SESSION['actionlogin']=="editdata.php"){
                            $id = $_POST['id'];
                            $query2 = "UPDATE detail SET Tipe_SimCard = '".$tipesim."', Jaringan_Data = '".$jaringandata."',Jaringan_Telepon = '".$jaringantelepon."',Prosesor = '".$prosesor."',RAM = '".$ram."',Media_Penyimpanan = '".$memori."',GPU = '".$gpu."',Layar = '".$layar."',Kamera = '".$kamera."',Baterai = '".$baterai."',Fitur_Tambahan = '".$fiturtambahan."' WHERE id = " .$id;
                        }
                        if(mysqli_query($koneksi,$query) && mysqli_query($koneksi,$query2)){
                            if($_SESSION['actionlogin']=="editdata.php"){
                                header("location:editprodukadmin.php");
                                $_SESSION['berhasil']="Berhasil di perbaharui ke database";
                            }else{
                                header("location:".$_SESSION['actionlogin']."");
                                $_SESSION['berhasil']="Berhasil di tambah ke database";
                            }
                        }else{
                            header("location:default.html");
                        }
                    }else{
                        if($_SESSION['actionlogin']=="editdata.php"){
                                header("location:editprodukadmin.php");
                                 $_SESSION['gagal']="Gagal di perbaharui ke database. Pastikan semua inputan terisi";
                        }else{
                            header("location:".$_SESSION['actionlogin']."");
                            $_SESSION['gagal']="Gagal di tambah ke database. Pastikan semua inputan terisi";
                        }
                    } 
                }
            }else if($_SESSION['actionlogin']=="edittestimoniadmin.php"){
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