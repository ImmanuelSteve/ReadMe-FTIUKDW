<?php session_start();
require("koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="Description" content="readmeshop.com, gadget, smartphone, toko online, online shop, toko gadget"/>
    <title>Profil - ReadMe Shop</title>
   <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/profil.css" />
    <script language="JavaScript" type="text/javascript" src="js/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/jquery.lavalamp.min.js"></script>
    <script type="text/javascript" src="js/lamp.js"></script>
</head>

<body>
     <!-- header begin -->
    <div id="header">
        <div class="container_24">
            <div class="grid_4">
                <img src="images/readmeshoplogo.png" height="100" width="110"/>
            </div>
            <?php
                $_SESSION['actionlogin'] = "daftar.php";
                include("login.php");
             ?>
            
            <div class="clear"></div>
            
            <div class="grid_24" id="header_nav">
                <ul class="lavaLamp">
                    <li><a href="index.php">Beranda</a> </li>
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
            <div id="contentarea" class="grid_24">
                <div class="grid_18">
                    <h1 class="infoakun">Akun Anda</h1>
                </div>
                <div class="clear"></div>
                <div class="grid_18" id="informasiumum">
                    <h3>INFORMASI UMUM</h3>
                </div>
                <div class="grid_18" id="informasi_user">
                    <div class="grid_9">
                        <?php
                        $id = $_SESSION['user'];
                        $sql = "SELECT nama_pengguna, alamat,email,kota,telepon,gambar FROM pengguna WHERE id='".$id."'";
                        $mysqli = new mysqli("localhost", "readmesh_readsh", "5hAHfL6GFwzKqymu", "readmesh_readmeshop");
                        $stmt = $mysqli->prepare($sql);
                        $stmt->execute();
                        $stmt->bind_result($nama,$alamat,$email,$kota,$telepon,$gambar);
                        
                        ?>
                        <form action="profil-edit.php" method="post"> 

                        <?php
                        while($stmt->fetch()){
                            ?>
                           <table>
                                <tr>
                                    <td>Nama</td>
                                    <td> : </td>
                                    <td><?php echo $nama;?></td>
                                    <td rowspan=6><?php
                                                    if($gambar === ""){
                                                        $gambar = "images/avatar.jpg";
                                                    }
                                                    ?>
                                                    <img class="boxImg center " src="<?php echo $gambar; ?>" width="150px" height="150px"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td> : </td>
                                    <td><?php echo $alamat;?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> : </td>
                                    <td><?php echo $email;?></td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td> : </td>
                                    <td><?php echo $kota;?></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td> : </td>
                                    <td><?php echo $telepon;?></td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="right" name="save" id="buttonsimpan" value="Ganti"/></td>
                                </tr>
                            </table>


                            <?php
                        }
                        ?>
                        </form>
                        <?php
                    ?>
                    </div>
                    
                </div>

                <div class="clear"></div>
                    <div class= "grid_18" id="riwayat_pembelian">
                    <h1 class="infoakun">Riwayat Pembelian</h1>
                    <div id="table">
                    <table class="center" border="1">
                        <tr id="thead">
                                <td>No</td>
                                <td>No. Nota</td>
                                <td>Tanggal</td>
                                <td>Id Pengguna</td>
                                <td>Nama Pengguna</td>
                                <td>Alamat Tujuan</td>
                                <td>Jasa Pengiriman</td>
                                <td>Total Harga</td>
                        </tr>
                        <?php
                            $sql = "SELECT transaksi.id, transaksi.tanggal_transaksi, pengguna.id, pengguna.nama_pengguna, transaksi.alamat_tujuan, pengiriman.nama, transaksi.total_harga_dibayarkan  
                                FROM pengguna, transaksi, pengiriman
                                WHERE pengguna.id=transaksi.id_pengguna
                                AND pengiriman.id=transaksi.pengiriman
                                AND transaksi.id_pengguna='".$id."'";
                            $mysqli = new mysqli("localhost", "readmesh_readsh", "5hAHfL6GFwzKqymu", "readmesh_readmeshop");
                            $stmt = $mysqli->prepare($sql);
                            $stmt->bind_result($nota,$tanggal,$pengguna,$nama,$alamat,$jasa,$total);
                                $result = mysqli_query($koneksi,$sql);
                                $counter=0;
                                print_r($no_nota);
                                while($stmt->fetch())
                                {
                                    echo "<tr>";
                                    echo "<td>".++$counter."</td>";
                                    echo "<td>".$nota."</td>";
                                    echo "<td>".$tanggal."</td>";
                                    echo "<td>".$pengguna."</td>";
                                    echo "<td class='justify'>".$alamat."</td>";
                                    echo "<td>".$jasa."</td>";
                                    echo "<td>".$total."</td>";
                                    echo "</tr>";
                                }
                                mysqli_close($koneksi);
                        ?>
                    </table>
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
