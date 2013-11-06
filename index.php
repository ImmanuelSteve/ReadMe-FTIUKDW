<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>ReadMe shop</title>
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/beranda.css" />
    <link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/js-image-slider.js" type="text/javascript"></script>
</head>

<body>
    <!-- header begin -->
    <div id="header">
        <div class="container_24">
            <div class="grid_4">
                <img src="images/readmeshoplogo.png" height="100" width="110"/>
            </div>
            <div id="login" class="grid_20">
                <form id="formlogin" class="right">
                    <input type="text" name="username" placeholder="nama pengguna">
                    <input type="password" name="password" placeholder="kata sandi">
                    <input id="buttonlogin" type="submit" value="Masuk">
                     <br/>Belum punya akun <a href="daftar.html">daftar disini</a>
                </form>
            </div>
            
            <div class="clear"></div>
            
            <div class="grid_24" id="header_nav">
                <ul id="nav">
                    <li><a class="navi" href="index.php">Beranda</a> </li>
                    <li><a class="navi" href="produk.php">Produk </a></li>
                    <li><a class="navi" href="promosi.php">Promosi </a></li>
                    <li><a class="navi" href="tentangkami.html">Tentang kami </a></li>
                </ul>
                <div id="formsearch" class="grid_6">
                    <form accept-charset="utf-8" method="post" action="index.php">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="textsearch" type="search" required x-moz-errormessage="Inputan jangan kosong !" size="24" value="" name="search" placeholder="pencarian"></input>
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
            <div class="grid_24" id= "iklanutama">
                <div id="sliderFrame">
                    <div id="slider">
                        <a href="promosi.html" target="_blank">
                            <img src="images/iklan-utama-1.jpg" alt="Welcome to ReadMe Shop" />
                        </a>
                        <img src="images/iklan-utama-2.jpg" alt="" />
                        <img src="images/iklan-utama-3.jpg" alt="" />
                        <img src="images/iklan-utama-4.jpg" alt="" />
                        <img src="images/iklan-utama-5.jpg" />
                    </div>
                 </div>
            </div>
            
            <div class="clear"></div>
            <div class="grid_24" id="dotslider"></div>
            <div class="clear"></div>
            <div class="grid_24" id="contentarea" >
                <div class="grid_23">
                     <h3 class ="textproduk">
                        PRODUK UNGGULAN
                    </h3>
                </div>
                <div class="grid_23 kumpulanproduk">
                    <?php
                        require("koneksi.php");
                        $sql = "SELECT id,nama,hargaString,gambar FROM produk WHERE status='unggulan'";
                        $result = mysqli_query($koneksi,$sql);
                         while($data = mysqli_fetch_assoc($result)){
                            $gambar = $data['gambar'];
                            echo"<div class='grid_5 produk'>";
                            echo"<div class='grid_5 divgambarproduk'><a href=index.php?id=".$data['id']."><img class='gambarproduk' src='$gambar'/></a></div>";
                            echo"<div class='grid_5 detailproduk'><p class='textnamaproduk center'>".$data['nama']."</p>";
                            echo"<p class='texthargaproduk center'>Rp. ".$data['hargaString'].",00</p></div>";
                            echo"</div>";
                        }
                        mysqli_close($koneksi);
                    ?>
                </div>
                <div class="grid_23">
                     <h3 class ="textproduk">
                        PRODUK BARU
                    </h3>
                </div>
                <div class="grid_23 kumpulanproduk">
                    <?php
                        require("koneksi.php");
                        $sql = "SELECT id,nama,hargaString,gambar FROM produk WHERE status='baru'";
                        $result = mysqli_query($koneksi,$sql);
                         while($data = mysqli_fetch_assoc($result)){
                            $gambar = $data['gambar'];
                            echo"<div class='grid_5 produk'>";
                            echo"<div class='grid_5 divgambarproduk'><a href=index.php?id=".$data['id']."><img class='gambarproduk' src='$gambar'/></a></div>";
                            echo"<div class='grid_5 detailproduk'><p class='textnamaproduk center'>".$data['nama']."</p>";
                            echo"<p class='texthargaproduk center'>Rp. ".$data['hargaString'].",00</p></div>";
                            echo"</div>";
                        }
                        mysqli_close($koneksi);
                    ?>
                </div>
                   
                <div class="clear"></div>
                
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
