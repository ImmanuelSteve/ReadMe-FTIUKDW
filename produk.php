<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Produk - ReadMe shop</title>
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
        <div class="container_24" >           
                <!-- Kolom kiri-->
                <div class="grid_6">                
                    <dl>
                        <dt class="merek center"><a class="nodecor" href="#">Merek</a></dt>
                        <dd class="noleft center">
                            <ul>
                                <li class="list_merek"> <a class="nodecor" href="#">Sony</a> </li>
                                <li class="list_merek"> <a class="nodecor" href="#">Samsung</a> </li>
                                <li class="list_merek"> <a class="nodecor" href="#">Apple</a> </li>
                                <li class="list_merek"> <a class="nodecor" href="#">HTC</a> </li>
                                <li class="list_merek"> <a class="nodecor" href="#">Oppo</a> </li>
                                <li class="list_merek"> <a class="nodecor" href="#">Lenovo</a> </li>
                            </ul>
                        </dd>
                    </dl>
                </div>                      

                <!-- Kolom Kanan -->
                <?php
                        require("koneksi.php");
                        $sql = "SELECT id,nama,hargaString,gambar,stok,ratting FROM produk";
                        $result = mysqli_query($koneksi,$sql);
                        echo "<div class='grid_18'><div id='produk'>";
                         while($data = mysqli_fetch_assoc($result)){
                            $gambar = $data['gambar'];
                            echo "<div id='produk_item'>";
                            echo "<div class='produk_image center'><img src='$gambar'/></div>";
                            echo "<h3 class='center'>".$data['nama']."</h3>";
                            echo "<div class='ratting '>";
                            for($i=0; $i<$data['ratting'] ; $i++){
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
                                <a class='detail nodecor produk_menu' href='produk_detail.html'>Detail</a>
                                <a class='beli nodecor produk_menu' href='#'>Beli</a>
                                </div>";
                            echo "</div><hr/></div>";
                        }
                        echo "</div></div>";
                        mysqli_close($koneksi);
                    ?>
                  
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
