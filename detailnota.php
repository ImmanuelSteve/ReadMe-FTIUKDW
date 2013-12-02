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
                <br/><br/>
                    <h1 class="grid_18 infoakun">Detail Nota</h1>
                    <div class= "grid_18" id="riwayat_pembelian">
                    <div id="table">
                    <table class="center" border="1">
                        <tr id="thead" class="bold">
                                <td>No</td>
                                <td>Nama Produk</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                        </tr>
                        <?php
                        require("koneksi.php");
                            $id = $_SESSION['user'];
                            $sql = "SELECT nota.total_harga,barang.*,produk.nama,produk.harga FROM barang, produk,nota WHERE barang.id_nota='".$_GET['id']."' AND barang.id_produk = produk.id AND nota.id_nota = barang.id_nota";
                            $result = mysqli_query($koneksi,$sql);
                            $counter=0;
                            while($data = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>".++$counter."</td>";
                                echo "<td>".$data['nama']."</td>";
                                echo "<td>".$data['jumlah']."</td>";
                                echo "<td>".number_format($data['harga']*$data['jumlah'])."</td>";
                                echo "</tr>";
                            }
                            $sql = "SELECT total_harga FROM nota WHERE id_nota = ".$_GET['id'];
                            $result = mysqli_query($koneksi,$sql);
                            $data = mysqli_fetch_assoc($result);
                            echo "<tr><td colspan='4' class='textright'><strong>Total :</strong> ".number_format($data['total_harga'])."</td></tr>";
                            mysqli_close($koneksi);
                        ?>
                    </table>
                    <br>
                    <span id="buttonkembali"><a href="profil.php">Kembali</a></span>
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
