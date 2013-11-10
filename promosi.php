<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Promosi - ReadMe shop</title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/promosi.css" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
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
                    if ($found > 0) {                        
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
                        echo "<form id='formlogin' class='right' action='promosi.php' method='post'>";
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
                    echo "<form id='formlogin' class='right' action='promosi.php' method='post'>";
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
                    <li><a class="navi" href="produk.php">Produk </a></li>
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
                <h1>Promo ReadMe Shop</h2>                
                <?php 
                    require("koneksi.php");
                    $sql = "SELECT id,judul,berlaku,gambar,deskripsi FROM promo";
                    $result = mysqli_query($koneksi,$sql);

                    while ($data = mysqli_fetch_assoc($result)) {
                    echo "<hr/><div class='grid_6' >
                        <img class='img_promo' src=".$data['gambar'].">
                        </div>";
                    echo "<div class='grid_18 info_promo' >";
                    echo "<span class='info_promo_judul'>".$data['judul']."</span><br>";
                    echo "<span class='info_promo_berlaku'>Berlaku sampai : ".$data['berlaku']."</span><br>";
                    echo "<span class='info_promo_deskripsi'>Deskripsi : <br>".$data['deskripsi'];
                    echo "</div>";
                    echo "<div class='clear'></div>";
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
		    <ul class="center">
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
		    <ul class="center">
			<li><a class="textfooterinfo" href="produk.php">Produk</a></li>
                        <li><a class="textfooterinfo" href="#">Produk Baru</a></li>
                        <li><a class="textfooterinfo" href="#">Produk Terlaris</a></li>
                        <li><a class="textfooterinfo" href="promosi.php">Promosi</a></li>
                    </ul>
		</div>
                <div class="grid_4">
		    <p class="textfootertitle center">Gabung Yuk</p>
		    <ul class="center">
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
		    <ul class="center">
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
