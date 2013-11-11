<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Cari - ReadMe shop</title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/produk.css" />
    <script language="JavaScript" type="text/javascript" src="js/jquery-2.0.3.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/produk.js"></script>
</head>

<body>
     <!-- header begin -->
    <div id="header">
        <div class="container_24">
            <div class="grid_4">
                <img src="images/readmeshoplogo.png" height="100" width="110"/>
            </div>
            <?php include ("koneksi.php");
                if (!empty($_SESSION['user'])) {
                    echo "<div id='login' class='grid_20'>";
                    echo "<form id='formlogin' class='right' action='logout.php' method='post'>";
                    echo "<img class='ava left' src='images/avatar.jpg' width: '64px' height='64px'>";
                    echo "<span id='penyapa'>Selamat Datang, <br/><a href='#'>".$_SESSION['user']."</a></span></br>";
                    echo "<input class='right logout' id='buttonlogin' type='submit' value='Keluar'>";
                    echo "</form></div>";
                    echo "<div class='clear'></div>";
                }
                else if (isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $query_string = "SELECT CONCAT(nama_depan,' ',nama_belakang),password FROM pengguna WHERE CONCAT(nama_depan,' ',nama_belakang)='".$username."'AND password='".$password."'";
                    $result = mysqli_query($koneksi,$query_string) or die(mysqli_error($koneksi));
                    $found = mysqli_num_rows($result);
                    if ($found > 0 ) {                        
                        $_SESSION['user'] = $username;
                        echo "<div id='login' class='grid_20'>";
                        echo "<form id='formlogin' class='right' action='logout.php' method='post'>";
                        echo "<img class='ava left' src='images/avatar.jpg' width: '64px' height='64px'>";
                        echo "<span id='penyapa'>Selamat Datang, <br/><a href='#'>".$username."</a></span></br>";
                        echo "<input class='right logout' id='buttonlogin' type='submit' value='Keluar'>";
                        echo "</form></div>";
                        echo "<div class='clear'></div>";
                    }
                    else {
                        echo "<div id='login' class='grid_20'>";
                        echo "<form id='formlogin' class='right' action='cari.php' method='post'>";
                        echo "<input type='text' name='username' placeholder='nama pengguna'>";
                        echo "<input type='password' name='password' placeholder='kata sandi'>";
                        echo "<input id='buttonlogin' type='submit' value='Masuk'>";
                        echo "<br/>Periksalah nama pengguna dan kata sandi Anda
                        <br/>Belum punya akun <a href='daftar.php'>daftar disini</a>";
                        echo "</form></div>";
                        echo "<div class='clear'></div>";
                    }
                }
                else {
                    echo "<div id='login' class='grid_20'>";
                    echo "<form id='formlogin' class='right' action='cari.php' method='post'>";
                    echo "<input type='text' name='username' placeholder='nama pengguna'>";
                    echo "<input type='password' name='password' placeholder='kata sandi'>";
                    echo "<input id='buttonlogin' type='submit' value='Masuk'>";
                    echo "<br/>Belum punya akun <a href='daftar.php'>daftar disini</a>";
                    echo "</form></div>";
                    echo "<div class='clear'></div>";
                }
                mysqli_close($koneksi);
             ?>
            
            <div class="grid_24" id="header_nav">
                <ul id="nav">
                    <li><a class="navi" href="index.php">Beranda</a> </li>
                    <li><a class="navi aktif" href="produk.php">Produk </a></li>
                    <li><a class="navi" href="promosi.php">Promosi </a></li>
                    <li><a class="navi" href="tentangkami.php">Tentang kami </a></li>
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
                <div class="grid_6 noleft" id="kategori">
                    <dt class="grid_6 judulkategori">
                        <p><a href="#">Merek</a></p>
                    </dt>
                    <dd class="grid_6 isikategori">
                        <ul>
                            <li><a href="#">Apple</a></li>
                            <li><a href="#">BlackBerry</a></li>
                            <li><a href="#">HTC</a></li>
                            <li><a href="#">Huawei</a></li>
                            <li><a href="#">Lenovo</a></li>
                            <li><a href="#">LG</a></li>
                            <li><a href="#">Nokia</a></li>
                            <li><a href="#">Samsung</a></li>
                            <li><a href="#">Sony</a></li>
                            <li><a href="#">ZTE</a></li>
                        </ul>
                    </dd>
                    <dt class="grid_6 judulkategori">
                        <p><a href="#">Harga</a></p>
                    </dt>
                    <dd class="grid_6 isikategori">
                        <ul>
                            <li><a href="#">di bawah 1 juta</a></li>
                            <li><a href="#">1 juta sampai 2 juta</a></li>
                            <li><a href="#">2 juta sampai 3 juta</a></li>
                            <li><a href="#">3 juta sampai 4 juta</a></li>
                            <li><a href="#">di atas 4 juta</a></li>
                        </ul>
                    </dd>
                     <dt class="grid_6 judulkategori">
                        <p><a href="#">Tipe Simcard</a></p>
                    </dt>
                    <dd class="grid_6 isikategori">
                        <ul>
                            <li><a href="#">GSM</a></li>
                            <li><a href="#">CDMA Phone</a></li>
                            <li><a href="#">Dual Simcard</a></li>
                        </ul>
                    </dd>
                </div>
                <!-- Kolom Kanan -->
                <div class="grid_18 right noright"><div id="produk">
                <div>
                    <h1>Hasil Pencarian</h2>
                </div>
                 <?php
                     require("koneksi.php");
                     if(isset($_POST['search']) || isset($_SESSION['cari'])){
                        if(isset($_POST['search'])){
                            $cari = $_POST['search'];
                            $_SESSION['cari'] = $cari;
                        }else if(isset($_SESSION['cari'])){
                            $cari = $_SESSION['cari'];
                        }
                
                         //non case sensitive
                         strtoupper($cari);
                         strip_tags($cari);
                         trim($cari);
                         $sql = "SELECT * FROM produk WHERE upper(nama) LIKE'%$cari%'";
                         $result = mysqli_query($koneksi,$sql);
                         $cek=mysqli_num_rows($result);
                         if($cek > 0){
                         while($data = mysqli_fetch_assoc($result)){
                            $gambar = $data['gambar'];
                            echo "<div id='produk_item'>";
                            echo "<div class='produk_image center'><a href=produkdetail.php?id=".$data['id']."><img src='$gambar'/></a></div>";
                            echo "<h3 class='center'>".$data['nama']."</h3>";
                            echo "<div class='ratting '>";
                            for($i=0; $i<$data['nilai'] ; $i++){
                                echo "<img src='images/star.jpg' width=30px height=30px/>";
                            }
                            echo "</div>";
                            echo "<div class='produk_keterangan'>";
                            echo "<span id='harga'>Rp ".$data['hargaString']."</span>";
                            if($data['stok'] > 0){
                                echo "<span class='availability'>Tersedia</span>";    
                            }
                            else {
                                echo "<span class='availability'>Tidak Tersedia</span>";
                                }
                            echo "<div class='clear'></div>";
                            echo "<div class='command'>
                                <a class='detail nodecor produk_menu' href=produkdetail.php?id=".$data['id'].">Detail</a>
                                <a class='beli nodecor produk_menu' href='#'>Beli</a>
                                </div>";
                            echo "</div><hr/></div>";
                        }
                         }
                         else{
                             echo"<div id='textnotfound'>Data tidak ditemukan</div>";
                         }
                     }
                     mysqli_close($koneksi);
                 ?>
                </div>
        </div>
    </div>
    <!-- content end -->

   <!-- footer begin -->
    <div id="footer">
        <div class="container_24">
            <div class="grid_24" id="footerarea">
                <div class="grid_4 footerleft">
		    <p class="textfootertitle center">Merek Kami</p>
		    <ul class="center hover">
			<li><a class="textfooterinfo" href="#">Apple</a></li>
                        <li><a class="textfooterinfo" href="#">BlackBerry</a></li>
                        <li><a class="textfooterinfo" href="#">HTC</a></li>
                        <li><a class="textfooterinfo" href="#">Huawei</a></li>
                        <li><a class="textfooterinfo" href="#">Lenovo</a></li>
                        <li><a class="textfooterinfo" href="#">LG</a></li>
                        <li><a class="textfooterinfo" href="#">Nokia</a></li>
                        <li><a class="textfooterinfo" href="#">Samsung</a></li>
                        <li><a class="textfooterinfo" href="#">Sony</a></li>
                        <li><a class="textfooterinfo" href="#">ZTE</a></li>
                    </ul>
		</div>
                <div class="grid_4">
		    <p class="textfootertitle center">Link</p>
		    <ul class="center hover">
			<li><a class="textfooterinfo" href="produk.php">Produk</a></li>
                        <li><a class="textfooterinfo" href="#">Produk Baru</a></li>
                        <li><a class="textfooterinfo" href="#">Produk Terlaris</a></li>
                        <li><a class="textfooterinfo" href="promosi.php">Promosi</a></li>
                    </ul>
		</div>
                <div class="grid_4">
		    <p class="textfootertitle center">Gabung Yuk</p>
		    <ul class="center hover">
			<li><a class="textfooterinfo textfooterbig" href="http://www.facebook.com" target="blank">Facebook</a></li>
                        <li><a class="textfooterinfo textfooterbig" href="http://www.instagram.com" target="blank">Instagram</a></li>
                        <li><a class="textfooterinfo textfooterbig" href="http://www.twitter.com" target="blank">Twitter</a></li>
                    </ul>
		</div>
                 <div class="grid_6">
		    <p class="textfootertitle center">HOTLINE</p>
		    <ul class="center">
			<li class="texthotline textfooterbig">Contact us :</li>
                        <li class="texthotline textfooterbig">+62 81 234 567 89</li>
                         <li class="texthotline">Untuk informasi lebih lanjut</li>
                    </ul>
		</div>
                 <div class="grid_5">
		    <p class="textfootertitle center">Jasa Pengiriman</p>
		    <ul class="center hover">
			<li><a class="textfooterinfo" href="http://www.jne.co.id" target="blank">
                            <img src="images/JNE.png">
                        </a></li>
                        <li><a class="textfooterinfo" href="http://www.posindonesia.co.id" target="blank">
                            <img src="images/POS.jpg">
                        </a></li>
                        <li><a class="textfooterinfo" href="http://www.tiki-online.com" target="blank">
                            <img src="images/TIKI.png">
                        </a></li>
                    </ul>
		</div>
            </div>
            <div class="grid_24" id="copyright">
                <p id="copyrighttext" class="center">
                    Copyright @2013 ReadmeShop All Right Reserved
                </p>
            </div>
            
            <div class="clear"></div>
        
        </div>
    </div>
    <!-- footer end -->

</body>
</html>
