<?php
    session_start();
    require("koneksi.php");
    $valid = TRUE;
    
    if(!empty($_POST['daftar'])){
        if(trim($_POST['namapengguna'])=="")
	{
	    $valid = FALSE;
	    $error_namapengguna = 1;
	}
        if(!preg_match("/^([a-z0-9_\.]+)@([a-z0-9\-]+\.)+[a-z]{2,6}$/i",$_POST['email']))
	{
	    $valid = FALSE;
	    $error_email = 1;
	}
        if(trim($_POST['katasandi'])=="")
	{
            $valid = FALSE;
	    $error_katasandi = 1;
        }
        if(trim($_POST['ulangkatasandi'])=="")
	{
	    $valid = FALSE;
	    $error_ulangkatasandi = 1;
	}
        if(trim($_POST['katasandi']) != trim($_POST['ulangkatasandi']))
	{
            $valid = FALSE;
	    $error_katasandi1 = 1;
        }
        if(trim($_POST['alamat'])=="")
	{
	    $valid = FALSE;
	    $error_alamat = 1;
	}
        if(trim($_POST['kota'])=="")
	{
	    $valid = FALSE;
	    $error_kota = 1;
	}
        if(trim($_POST['telepon'])=="")
	{
	    $valid = FALSE;
	    $error_telepon = 1;
	}
        if(strlen($_POST['telepon'])>0 && !is_numeric($_POST['telepon']))
	{
	    $valid = FALSE;
	    $error_telepon1 = 1;
	}
        if($valid)
	{
	    $namapengguna = $_POST['namapengguna'];
	    $email = $_POST['email'];
            require_once("PasswordHash.php");
            $t_hasher = new PasswordHash(8, FALSE);
            $katasandi = $_POST['katasandi'];
            $hash = $t_hasher->HashPassword($katasandi);
	    $alamat = $_POST['alamat'];
            $kota = $_POST['kota'];
            $telepon = $_POST['telepon'];
	    $query = "INSERT into pengguna VALUES 
	    ('','".$namapengguna."','".$email."','".$hash."','".$alamat."','".$kota."','".$telepon."')";
	
	    if(mysqli_query($koneksi,$query)){
                echo "<script type='text/javascript'>alert('Daftar berhasil!');</script>";
                //header("location:index.php");
                //header("location:http://readmeshop.revti.com/index.php");
            }
        }
    }
    mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="Description" content="readmeshop.com, gadget, smartphone, toko online, online shop, toko gadget"/>
    <title>Daftar - ReadMe Shop</title>
   <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/daftar.css" />
    <script type="text/javascript" src="js/jquery-1.2.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/jquery.lavalamp.min.js"></script>
    <script type="text/javascript" src="js/lamp.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>
</head>

<body>
     <!-- header begin -->
    <div id="header">
        <div class="container_24">
            <div class="grid_4">
                <img src="images/readmeshoplogo.png" height="100" width="110"/>
            </div>
            <?php
                $_SESSION['actionlogin'] = "daftar.php";
                include("login.php");
             ?>
             
             <?php include ("myCart.php") ?>
            
            <div class="clear"></div>
            
            <div class="grid_24" id="header_nav">
                <ul class="lavaLamp">
                    <li><a href="index.php">Beranda</a> </li>
                    <li><a href="produk.php">Produk </a></li>
                    <li><a href="promosi.php">Promosi </a></li>
                    <li><a href="tentangkami.php">Tentang kami </a></li>
                </ul>
                <div id="formsearch" class="grid_6">
                    <form accept-charset="utf-8" method="post" action="cari.php">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="textsearch" type="search" required x-moz-errormessage="Inputan jangan kosong !" size="22" value="" name="search" placeholder="cari produk"></input>
                                </td>
                                <td>
                                    <input id="buttonsearch" type="submit" style="cursor:pointer;" value="" name=""></input>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
            
            <div class="clear"></div>
        
        </div>
    </div>
    <!-- header end -->
    
    <!-- content begin -->
    <div id="content">
        <div class="container_24">
            <div id="contentarea" class="grid_24">
                <div class="grid_18">
                    <h1 id="buatakun">Buat akun Anda</h1>
                </div>
                <div class="clear"></div>
                <form method="POST" action="daftar.php">
                    <div class="grid_18" id="informasiumum">
                        <h3>INFORMASI UMUM</h3>
                     </div>
                    <div class="clear"></div>
                    <div class="grid_18" id="formdaftar">
                        <ul>
                            <li>
                                    <label class="grid_5">Nama Pengguna*</label>
                                    <div class="grid_11">
                                        <input type="text" name="namapengguna" value=<?php if($valid == FALSE) echo "'".$_POST['namapengguna']."'"; ?>></input>
                                        <?php if(isset($error_namapengguna)) echo "Nama Pengguna Tidak Boleh Kosong";?>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Email*</label>
                                    <div class="grid_11">
                                        <input type="text" name="email" value=<?php if($valid == FALSE) echo "'".$_POST['email']."'"; ?>></input>
                                        <?php if(isset($error_email)) echo "Email Tidak Valid";?>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Kata Sandi*</label>
                                    <div class="grid_11">
                                        <input type="password" name="katasandi" value=<?php if($valid == FALSE) echo "'".$_POST['katasandi']."'"; ?>></input>
                                        <?php if(isset($error_katasandi)) echo "Kata Sandi Tidak Boleh Kosong";?>
                                        <?php if(isset($error_katasandi1)) echo "Kata Sandi Harus Sama";?>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Ulangi Kata Sandi*</label>
                                    <div class="grid_11">
                                        <input type="password" name="ulangkatasandi" value=<?php if($valid == FALSE) echo "'".$_POST['ulangkatasandi']."'"; ?>></input>
                                        <?php if(isset($error_ulangkatasandi)) echo "Ulangi Kata Sandi Tidak Boleh Kosong";?>
                                        <?php if(isset($error_katasandi1)) echo "Kata Sandi Harus Sama";?>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Alamat*</label>
                                    <div class="grid_11">
                                        <input type="text" name="alamat" value=<?php if($valid == FALSE) echo "'".$_POST['alamat']."'"; ?>></input>
                                        <?php if(isset($error_alamat)) echo "Alamat Tidak Boleh Kosong";?>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Kota*</label>
                                    <div class="grid_11">
                                        <input type="text" name="kota" value=<?php if($valid == FALSE) echo "'".$_POST['kota']."'"; ?>></input>
                                        <?php if(isset($error_kota)) echo "Kota Tidak Boleh Kosong";?>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Telepon*</label>
                                    <div class="grid_11">
                                        <input type="text" name="telepon" value=<?php if($valid == FALSE) echo "'".$_POST['telepon']."'"; ?>></input>
                                        <?php if(isset($error_telepon)) echo "Nomor Telepon Tidak Boleh Kosong";?>
                                        <?php if(isset($error_telepon1)) echo "Nomor Telepon Harus Angka";?>
                                    </div>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <div class="grid_18">
                        <input type="submit" name="daftar" id="buttondaftar" value="Daftar!"></input>
                        *Harus diisi
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- content end -->

  <!-- footer begin -->
    <?php
        require("footer.php");
    ?>
    <!-- footer end -->
</body>

</html>
