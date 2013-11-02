<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Produk - ReadMe shop</title>
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/produk.css" />
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
            
                <!-- Kolom kiri-->
                <div class="grid_6" id="category">

                    <!-- Cart-->
                    <div class="grid_6" id="cart">
                        <div class="grid_2" id="cart_img">
                            <a href="#"><img src="images/cart.png" height=35px width=35px display=inline/></a>
                        </div>
                        <div class="grid_4" id="cart_info">
                            total barang : <br/>
                            total biaya :
                        </div>
                    </div>
                    
                    <div class="clear"></div>

                    <!-- kategori-->
                    <div class="grid_6" id="kategori">
                        <div class="judul">Merek</div>
                        <div class="merk"><a href="#">Samsung</a></div> 
                        <div class="merk"><a href="#">Nokia</a></div> 
                        <div class="merk"><a href="#">HTC</a></div> 
                        <div class="merk"><a href="#">Sony</a></div> 
                        <div class="merk"><a href="#">Leenovo</a></div> 
                        <div class="merk"><a href="#">Oppo</a></div> 
                    </div>
                </div>


                <!-- Kolom kanan -->
                <!-- Advance Search-->
                <div class="grid_18" id="adv_search">
                    <div class "grid_9" id="page_address">Produk</div>
                    <div class="grid_4" id="adv_search_command">
                        <div class="grid_3" id="kriteria"><a href="#">Kriteria</a></div>
                        <div class="clear"></div>
                        <div class="grid_3" id="sort"><a href="#">Urutkan</a></div>
                    </div>
                </div>
    
    
                <!-- Produk -->
                <?php
                        require("koneksi.php");
                        $sql = "SELECT id,nama,hargaString,gambar,stok,ratting FROM produk";
                        $result = mysqli_query($koneksi,$sql);
                        echo "<div class='grid_18' id='produk'>";
                         while($data = mysqli_fetch_assoc($result)){
                            echo "<div class='grid_6_item'>";
                            echo "<div class='produk_image'><img src=".$data['gambar']."/></div>";
                            echo "<h3>".$data['nama']."</h3>";
                            echo "<div clas='ratting'>";
                            for($i=0; $i<$data['ratting'] ; $i++){
                                echo "<img src='images/star.jpg' width=30px height=30px/>";
                            }
                            echo "</div>";
                            echo "<div class='produk_keterangan'>";
                            echo "<span class='harga'>Rp ".$data['hargaString']."</span>";
                            if($data['stok'] > 0){
                                echo "<span class='availability'>Tersedia</span>";    
                            }
                            else {
                                echo "<span class='availability'>Tidak Tersedia</span>";
                                }
                            echo "<div class='clear'></div>";
                            echo "<div class='command'>
                                <a class='detail' href='produk_detail.html'>Detail</a>
                                <a class='beli' href='#'>Beli</a>
                                </div>";
                            echo "</div><hr/></div>";
                        }
                        echo "</div>";
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
