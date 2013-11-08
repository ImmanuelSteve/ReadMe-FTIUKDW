<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        <?php
            require("koneksi.php");
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT nama FROM produk WHERE id='".$id."'";
                $result = mysqli_query($koneksi,$sql);
                while($data = mysqli_fetch_assoc($result)){
                    echo $data["nama"];    
                }            
            }
            else{
                echo"Produk Detail";
            }
            mysqli_close($koneksi);
        ?>    
        
        - ReadMe shop
    </title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/produk.css" />
    <link rel="stylesheet" href="css/produkdetail.css" />
    <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="js/menu-produk.js"></script>
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
                    <li><a class="navi" href="produk.php">Produk</a></li>
                    <li><a class="navi" href="promosi.php">Promosi </a></li>
                    <li><a class="navi" href="tentangkami.html">Tentang kami </a></li>
                </ul>
                <div id="formsearch" class="grid_6">
                    <form accept-charset="utf-8" method="post" action="cari.php">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="textsearch" type="search" required x-moz-errormessage="Inputan jangan kosong !" size="24" value="" name="search" placeholder="cari produk"></input>
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
                    <div class="grid_6 judulkategori">
                        <p><a href="#">Merek</a></p>
                    </div>
                    <div class="grid_6 isikategori">
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
                    </div>
                    <div class="grid_6 judulkategori">
                        <p><a href="#">Harga</a></p>
                    </div>
                    <div class="grid_6 isikategori">
                        <ul>
                            <li><a href="#">di bawah 1 juta</a></li>
                            <li><a href="#">1 juta sampai 2 juta</a></li>
                            <li><a href="#">2 juta sampai 3 juta</a></li>
                            <li><a href="#">3 juta sampai 4 juta</a></li>
                            <li><a href="#">di atas 4 juta</a></li>
                        </ul>
                    </div>
                     <div class="grid_6 judulkategori">
                        <p><a href="#">Tipe Simcard</a></p>
                    </div>
                    <div class="grid_6 isikategori">
                        <ul>
                            <li><a href="#">GSM</a></li>
                            <li><a href="#">CDMA Phone</a></li>
                            <li><a href="#">Dual Simcard</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                    require("koneksi.php");
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $sql = "SELECT nama,hargaString,gambar,stok FROM produk WHERE id='".$id."'";
                        $result = mysqli_query($koneksi,$sql);
                        while($data = mysqli_fetch_assoc($result)){
                            echo"<div class='grid_7' id='detailproduk1'>";
                                echo"<div class='grid_7' id='namaproduk'><p>".$data['nama']."</p></div>";
                                echo"<div class='grid_6 center' id='gambarproduk'>";
                                    echo"<img src='".$data['gambar']."' width='220px'/>";
                                echo"</div>";
                            echo"</div>";
                            echo"<div class='grid_6'>";
                                echo"<div class='grid_6' id='detailproduk2'>";
                                    echo"<div class='grid_6' id='hargaproduk'><p>Harga : Rp.".$data['hargaString']."</p></div>";
                                    if($data['stok']>0){
                                        echo"<div class='grid_6' id='statusproduk'><p>Status : tersedia</p></div>";
                                    }else{
                                        echo"<div class='grid_6' id='statusproduk'><p>Status : tidak tersedia</p></div>";
                                    }
                                echo"</div>";
                                echo"<form method='GET' action='produkdetail.php' id='formbeli'>";
                                echo"<input type='hidden' name ='id' value='".$id."'>";
                                echo"<label>Warna : </label>
                                <select name='warna'>
                                    <option value='putih'>Putih</option>
                                    <option value='hitam'>Hitam</option>
                                    <option value='biru'>Biru</option>
                                </select>
                                <br/><br/>";
                                echo"<label>Jumlah : </label>
                                <input type='text' name='jumlah' value='1'/>
                                <br/><br/>";
                                echo"<input id='buttonbeli' type='submit' value='Beli'/>";
                                echo"</form>";
                            echo"</div>";
                        }  
                    }
                    else{
                        echo"<div class='grid_17' id='detailproduk1'>";
                            echo"Data tidak ditemukan";    
                        echo"</div>";
                    }
                    mysqli_close($koneksi);
                ?>
                <div class="clear"></div>
                <div class="grid_6"><p></p></div>
                <div class="grid_17" id="mid">
                    <ul id="tabs">
                            <li> <a name="tab1" href="#" > Spesifikasi </a></li>
                            <li> <a name="tab2" href="#" > Review </a></li>
                            <li> <a name="tab3" href="#" > Komentar </a></li>
                    </ul>
                    <div id="isiTab"> 
                        <div id="tab1">Spesifikasi di sini</div>
                        <div id="tab2">Belum ada review</div>
                        <div id="tab3">Belum ada komentar</div>
                    </div>
                </div>
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
