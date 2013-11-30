<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="Description" content="readmeshop.com, gadget, smartphone, toko online, online shop, toko gadget"/>
    <title>ReadMe Shop</title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/beranda.css" />
    <link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/js-image-slider.js" type="text/javascript"></script>
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
            <!--login-->
            <?php
                $_SESSION['actionlogin'] = "index.php";
                include("login.php");
            ?>

            <?php include ("myCart.php") ?>

            <div class="grid_24" id="header_nav">
                <ul class="lavaLamp">
                    <li class="current"><a href="index.php">Beranda</a> </li>
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
            <div class="grid_24" id= "iklanutama">
                <div id="sliderFrame">
                    <div id="slider">
                        <a href="promosi.html" target="_blank">
                            <img src="images/iklan-utama-1.jpg" alt="Selamat datang di ReadMe shop" />
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
                        $sql = "SELECT id,nama,harga,gambar FROM produk WHERE status='unggulan'";
                        $result = mysqli_query($koneksi,$sql);
                         while($data = mysqli_fetch_assoc($result)){
                            $gambar = $data['gambar'];
                            echo"<div class='grid_5 produk'>";
                            echo"<div class='grid_5 divgambarproduk'><a href=produkdetail.php?id=".$data['id']."><img class='gambarproduk' src='$gambar'/></a></div>";
                            echo"<div class='grid_5'><p class='textnamaproduk center'>".$data['nama']."</p>";
                            echo"<p class='texthargaproduk center'>Rp. ".number_format($data['harga'])."</p></div>";
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
                        $sql = "SELECT id,nama,harga,gambar FROM produk WHERE status='baru'";
                        $result = mysqli_query($koneksi,$sql);
                         while($data = mysqli_fetch_assoc($result)){
                            $gambar = $data['gambar'];
                            echo"<div class='grid_5 produk'>";
                            echo"<div class='grid_5 divgambarproduk'><a href=produkdetail.php?id=".$data['id']."><img class='gambarproduk' src='$gambar'/></a></div>";
                            echo"<div class='grid_5'><p class='textnamaproduk center'>".$data['nama']."</p>";
                            echo"<p class='texthargaproduk center'>Rp. ".number_format($data['harga'])."</p></div>";
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
    <?php
        require("footer.php");
    ?>
    <!-- footer end -->

</body>
</html>
