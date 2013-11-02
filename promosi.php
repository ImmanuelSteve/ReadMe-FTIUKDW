<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Promosi - ReadMe shop</title>
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
            <div id="login" class="grid_20">
                <form id="formlogin">
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
            <div class="grid_24" id="copyright">
                <p id="copyrighttext">
                    Copyright @2013 ReadmeShop All Right Reserved
                </p>
            </div>
            
            <div class="clear"></div>
        
        </div>
    </div>
    <!-- footer end -->

</body>
</html>
