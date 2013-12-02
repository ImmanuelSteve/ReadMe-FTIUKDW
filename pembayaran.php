<?php
    session_start();
    require("koneksi.php");
    $valid = TRUE;
    
    if(!empty($_SESSION['user']) && isset($_POST['confirm'])) {
        if(trim($_POST['pangirim'])=="")
    {
        $valid = FALSE;
    }
        if(trim($_POST['alamat'])=="")
    {
        $valid = FALSE;
    }
        if(trim($_POST['kota'])=="")
    {
        $valid = FALSE;
    }
        if(trim($_POST['telepon'])=="")
    {
        $valid = FALSE;
    }
        if(strlen($_POST['telepon'])>0 && !is_numeric($_POST['telepon']))
    {
        $valid = FALSE;
    }
        if($valid)
    {
        $pengirim = $_POST['pangirim'];
        $alamat = $_POST['alamat'];
        $kota_id = $_POST['kota'];
        $telepon = $_POST['telepon'];
        $jasa = $_POST['kota'];
        $query_harga = "SELECT kota_tujuan, harga FROM pengiriman WHERE id = ".$kota_id."";
        $result_harga = mysqli_query($koneksi, $query_harga) or die(mysql_error());
        $data_pengiriman = mysqli_fetch_assoc($result_harga) or die(mysql_error());
        $kota = $data_pengiriman['kota_tujuan'];
        $total_harga = $_SESSION['total'] + $data_pengiriman['harga'];
        $query = "INSERT INTO `nota`(`id_nota`, `id_pengguna`, `tanggal_transaksi`, `pengirim`, `tujuan`, `kota`, `telepon`, `total_harga`, `id_pengiriman`)
        VALUES (NULL,'".$_SESSION['user']."',CURRENT_TIMESTAMP,'".$pengirim."','".$alamat."','".$kota."','".$telepon."','".$total_harga."','".$kota_id."')";
        if(mysqli_query($koneksi,$query)){
                echo "<script type='text/javascript'>alert('Daftar berhasil!');</script>";
                header("location:index.php");
                //header("location:http://readmeshop.revti.com/index.php");
            }
    }
    }
    mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="Description" content="readmeshop.com, gadget, smartphone, toko online, online shop, toko gadget"/>
    <title>Pembayaran - ReadMe Shop</title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/pembayaran.css" />
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
            <?php
                $_SESSION['actionlogin'] = "pembayaran.php";
                include("login.php");
             ?>
             
             <?php include ("myCart.php") ?>
            
            <div class="clear"></div>
            
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
                
                <!-- cek sudah login belom -->
                <?php if(!empty($_SESSION['user'])) { ?>
                <div class="grid_18">
                    <h1 id="buatakun">Keranjang Belanjaan Anda</h1>
                </div>
                <div class="clear"></div>
                <div class="grid_18">
                    <table id="pembayaran" border='1'>
                        <tbody>
                            <!-- cek session cart start -->
                            <?php 
                            include 'koneksi.php';
                            if (!empty($_SESSION['cart'])) { 
                                $total = 0;
                                // perulangan start
                                foreach ($_SESSION['cart'] as $product_id => $quantity) {
                                    $sql = "SELECT id, gambar, nama, harga FROM produk WHERE id = '".$product_id."'";
                                    $result = mysqli_query($koneksi,$sql) or die(mysql_error());

                                    $data = mysqli_fetch_assoc($result) or die(mysql_error());
                                    $found = mysqli_num_rows($result) or die(mysql_error());
                                    //check ada produk e nggak
                                    if ( $found > 0) {
                                        $line_cost = $data['harga'] * $quantity; //harga perline
                                        $total = $total + $line_cost; //total cost
                                        $_SESSION['total'] = $total;
                                    }
                            ?>

                            <tr>
                                <td>
                                    <?php echo $quantity; ?>
                                </td>
                                <td>
                                    <a href="<?php echo "produk.php?action=remove&id=".$data['id'].""; ?>"><img src="images/icon_close.gif"></a>
                                </td>
                                <td>
                                    <img src="<?php echo $data['gambar']; ?>" width="125px" height="150px">
                                </td>
                                <td>
                                    <a href="produkdetail.php?id=<?php echo $data['id']?>"><?php echo $data['nama']; ?></a>
                                </td>
                                <td>
                                    Rp <?php echo number_format($data['harga']); ?>
                                </td>
                                
                            </tr>

                            <?php } ?> <!-- perulangan end -->
                            
                            <tr>
                                <td colspan='4'>
                                    <strong>Total Harga</strong>
                                </td>
                                <td>
                                    <strong>Rp <?php echo number_format($total); ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                             
                            <?php } else { ?> <!-- cek session end -->

                            <tr>
                                <td colspan="5">
                                    <span class="center">Belum ada barang di keranjang belanja.</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                            <?php } ?> <!-- else end -->

                </div>
                <div class="clear"></div><br>
                <!-- ambil data dari tabel pengguna -->
                <?php 
                    $sql = "SELECT * FROM pengguna WHERE id = ".$_SESSION['user']."";
                    $result = mysqli_query($koneksi,$sql);

                    $data = mysqli_fetch_assoc($result) or die(mysql_error());                    
                 ?>

                <div class="grid_18">
                    <h1 id="buatakun">Informasi Akun</h1>
                </div>

                <div class="clear"></div>
                <form method="POST" action="pembayaran.php">
                    <div class="grid_18" id="informasiumum">                        
                        <h3>Informasi Data Akun <?php echo $data['nama_pengguna'] ?></h3>
                     </div>
                    <div class="clear"></div>
                    <div class="grid_18" id="formdaftar">
                        <ul>
                            <li>
                                    <label class="grid_5">Nama Pengirim*</label>
                                    <div class="grid_11">
                                        <input type="text" name="pangirim" value="<?php echo $data['nama_pengguna'] ?>"></input>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Email</label>
                                    <div class="grid_11">
                                        <label><?php echo $data['email']; ?></label>
                                        <input type="hidden" name="email" value="<?php $data['email']; ?>">
                                    </div>
                            </li>                            
                            <li>
                                    <label class="grid_5">Kota*</label>
                                    <div class="grid_11">
                                        <select name="kota">
                                            <option value="">Pilih Pengiriman</option>
                                            <?php 
                                                $sql2 = "SELECT * FROM pengiriman";
                                                $result2 = mysqli_query($koneksi,$sql2);
                                             
                                                while($data2 = mysqli_fetch_assoc($result2)) { 
                                                    echo"<option value='".$data2['id']."'>".$data2['kota_tujuan']." - ".$data2['nama']." - Rp ".number_format($data2['harga'])."</option>";                                       
                                                }
                                            ?>
                                        </select>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Alamat Pengiriman*</label>
                                    <div class="grid_11">
                                        <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></input>
                                    </div>
                            </li>
                            <li>
                                    <label class="grid_5">Telepon*</label>
                                    <div class="grid_11">
                                        <input type="text" name="telepon" value="<?php echo $data['telepon'] ?>"></input>
                                    </div>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <!-- payment method -->
                    <div class="grid_18" id="method">
                        <h1 id="buatakun">Metode Pembayaran</h1>
                        <input type="radio" name="method" value="1"><img src="images/cash_on_delivery.png" width="180px" height="90px" title="Cash on Delivery"></input>
                        <input type="radio" name="method" value="2"><img src="images/credit-cards-icon.png" width="180px" height="90px" title="Transfer melalui Bank"></input>
                    </div>
                    <div class="clear"></div>
                    <div class="grid_18">
                        <input type="checkbox" name="syarat" value=""><a href="kondisi.php" target="blank">Syarat dan Kondisi</a><br>
                    </div>
                    <div class="clear"></div>
                    <div class="grid_18">
                        <input type="submit" name="confirm" id="buttondaftar" value="Oke!"></input>
                        *Harus diisi
                    </div>
                </form>
                
                <?php   mysqli_close($koneksi); } else { ?> <!-- session login cek end --> 
                <!-- else session login cek -->
                <div class="grid_18">
                    <h1 id="gagal">Silahkan masuk ke akun Anda terlebih dahulu.</h1>
                </div>

                <?php }?>
                
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
