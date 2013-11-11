<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Daftar - ReadMe shop</title>
   <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/daftar.css" />
</head>

<body>
     <!-- header begin -->
    <div id="header">
        <div class="container_24">
            <div class="grid_4">
                <img src="images/readmeshoplogo.png" height="100" width="110"/>
            </div>
            <?php include ("koneksi.php");
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $query_string = "SELECT CONCAT(nama_depan,' ',nama_belakang),password FROM pengguna WHERE CONCAT(nama_depan,' ',nama_belakang)='".$username."'AND password='".$password."'";
                    $result = mysqli_query($koneksi,$query_string) or die(mysqli_error($koneksi));
                    $found = mysqli_num_rows($result);
                    if ($found > 0 ) {                        
                        $_SESSION['user'] = $username;
                        header('location:index.php');
                    }
                    else {
                        echo "<div id='login' class='grid_20'>";
                        echo "<form id='formlogin' class='right' action='daftar.php' method='post'>";
                        echo "<input type='text' name='username' placeholder='nama pengguna'>";
                        echo "<input type='password' name='password' placeholder='kata sandi'>";
                        echo "<input id='buttonlogin' type='submit' value='Masuk'>";
                        echo "<br/>Periksalah nama pengguna dan kata sandi Anda";
                        echo "</form></div>";
                        echo "<div class='clear'></div>";
                    }
                }
                else {
                    echo "<div id='login' class='grid_20'>";
                    echo "<form id='formlogin' class='right' action='daftar.php' method='post'>";
                    echo "<input type='text' name='username' placeholder='nama pengguna'>";
                    echo "<input type='password' name='password' placeholder='kata sandi'>";
                    echo "<input id='buttonlogin' type='submit' value='Masuk'>";
                    echo "</form></div>";
                    echo "<div class='clear'></div>";
                }
                mysqli_close($koneksi);
             ?>
            
            <div class="clear"></div>
            
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
                <div class="grid_18">
                    <h1 id="buatakun">Buat akun Anda</h1>
                </div>
                <div class="clear"></div>
                <form method="post"action="daftar.php">
                    <div class="grid_18" id="informasiumum">
                        <h3>INFORMASI UMUM</h3>
                     </div>
                    <div class="clear"></div>
                    <div class="grid_18" id="formdaftar">
                        <ul>
                            <li>
                                    <label class="grid_5">Panggilan</label>
                                    <div class="grid_11">
                                        <input id="id_gender1" type="radio" value="1" name="id_gender"></input>
                                        <label> Mr. </label>
                                        <input id="id_gender2" type="radio" value="2" name="id_gender"></input>
                                        <label> Ms. </label>
                                        <input id="id_gender3" type="radio" value="3" name="id_gender"></input>
                                        <label> Miss </label>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Nama Depan*</label>
                                    <div class="grid_11">
                                        <input type="text" value="" name=""></input>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Nama Belakang*</label>
                                    <div class="grid_11">
                                        <input type="text" value="" name=""></input>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Email*</label>
                                    <div class="grid_11">
                                        <input type="text" value="" name=""></input>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Kata Sandi*</label>
                                    <div class="grid_11">
                                        <input type="password" value="" name=""></input>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Ulangi Kata Sandi*</label>
                                    <div class="grid_11">
                                        <input type="password" value="" name=""></input>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Alamat*</label>
                                    <div class="grid_11">
                                        <input type="text" value="" name=""></input>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Kota*</label>
                                    <div class="grid_11">
                                        <input type="text" value="" name=""></input>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Telepon*</label>
                                    <div class="grid_11">
                                        <input type="text" value="" name=""></input>
                                    </div>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <div class="grid_18">
                        <button type="submit" id="buttondaftar">Daftar!</button>
						*Harus diisi
                    </div>
                </form>
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
