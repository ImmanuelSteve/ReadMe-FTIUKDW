<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="Description" content="readmeshop.com, gadget, smartphone, toko online, online shop, toko gadget"/>
    <title>Cari - ReadMe Shop</title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/produk.css" />
    <script language="JavaScript" type="text/javascript" src="js/jquery-1.2.3.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/produk.js"></script>
    <script type="text/javascript" src="js/jquery.lavalamp.min.js"></script>
    <script type="text/javascript" src="js/lamp.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>   

<body>
     <!-- header begin -->
    <div id="header">
        <div class="container_24">
            <div class="grid_4">
                <img src="images/readmeshoplogo.png" height="100" width="110"/>
            </div>
             <!--login-->
            <?php
                $_SESSION['actionlogin'] = "cari.php";
                include("login.php");
            ?>
            <?php include ("myCart.php") ?>
            <div class="grid_24" id="header_nav">
                <ul class="lavaLamp">
                    <li><a href="index.php">Beranda</a> </li>
                    <li class="current"><a href="produk.php">Produk </a></li>
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
                <div class="grid_6 noleft" id="kategori">
                    <dt class="grid_6 judulkategori">
                        <p><a href="#">Merek</a></p>
                    </dt>
                    <dd class="grid_6 isikategori">
                        <ul>
                            <?php
                                $url = "produk.php";
                                
                            ?>
                            <li><a href="<?php echo $url . "?merk=apple";?>">Apple</a></li>
                            <li><a href="<?php echo $url . "?merk=BlackBerry"; ?> ">BlackBerry</a></li>
                            <li><a href="<?php echo $url . "?merk=HTC"; ?> ">HTC</a></li>
                            <li><a href="<?php echo $url . "?merk=Huawei"; ?> ">Huawei</a></li>
                            <li><a href="<?php echo $url . "?merk=Lenovo"; ?> ">Lenovo</a></li>
                            <li><a href="<?php echo $url . "?merk=LG"; ?> ">LG</a></li>
                            <li><a href="<?php echo $url . "?merk=Nokia"; ?> ">Nokia</a></li>
                            <li><a href="<?php echo $url . "?merk=Samsung"; ?> " > Samsung</a></li>
                            <li><a href="<?php echo $url . "?merk=Sony"; ?> ">Sony</a></li>
                            <li><a href="<?php echo $url . "?merk=ZTE"; ?> ">ZTE</a></li>
                        </ul>
                    </dd>
                    <dt class="grid_6 judulkategori">
                        <p><a href="#">Harga</a></p>
                    </dt>
                    <dd class="grid_6 isikategori">
                        <ul>
                            <li><a href="<?php echo $url . "?harga=1000000";?>">di bawah 1 juta</a></li>
                            <li><a href="<?php echo $url . "?harga=2000000";?>">1 juta sampai 2 juta</a></li>
                            <li><a href="<?php echo $url . "?harga=3000000";?>">2 juta sampai 3 juta</a></li>
                            <li><a href="<?php echo $url . "?harga=4000000";?>">3 juta sampai 4 juta</a></li>
                            <li><a href="<?php echo $url . "?harga=99999999";?>">di atas 4 juta</a></li>
                        </ul>
                    </dd>
                     <dt class="grid_6 judulkategori">
                        <p><a href="#">Tipe Simcard</a></p>
                    </dt>
                    <dd class="grid_6 isikategori">
                        <ul>
                            <li><a href="<?php echo $url . "?tipe=GSM";?>">GSM</a></li>
                            <li><a href="<?php echo $url . "?tipe=CDMA";?>">CDMA Phone</a></li>
                            <li><a href="<?php echo $url . "?tipe=Dual";?>">Dual Simcard</a></li>
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
                            echo "<div class='produk_image center'><a href=produkdetail.php?id=".$data['id']."><img src='$gambar' width=140 height = 170/></a></div>";
                            echo "<h3 class='center'>".$data['nama']."</h3>";
                            echo "<div class='ratting '>";
                            for($i=0; $i<$data['nilai'] ; $i++){
                                echo "<img src='images/star.jpg' width=30px height=30px/>";
                            }
                            echo "</div>";
                            echo "<div class='produk_keterangan'>";
                            echo "<span id='harga'>Rp ".number_format($data['harga'])."</span>";
                            if($data['stok'] > 0){
                                echo "<span class='availability'>Tersedia</span>";    
                            }
                            else {
                                echo "<span class='availability'>Tidak Tersedia</span>";
                                }
                            echo "<div class='clear'></div>";
                            echo "<div class='command'>
                                <a class='detail nodecor produk_menu' href=produkdetail.php?id=".$data['id'].">Detail</a>
                                <a class='beli nodecor produk_menu' href='produk.php?action=add&id=".$data['id']."'>Beli</a>
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
    <?php
        require("footer.php");
    ?>
    <!-- footer end -->

</body>
</html>
