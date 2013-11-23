<?php session_start();
require("koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="Description" content="readmeshop.com, gadget, smartphone, toko online, online shop, toko gadget"/>
    <title>Profil - ReadMe shop</title>
   <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/daftar.css" />
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
                    <h1 id="buatakun">Akun Anda</h1>
                </div>
                <div class="clear"></div>
                <div class="grid_18" id="informasiumum">
                    <h3>INFORMASI UMUM</h3>
                </div>
                <div class="grid_18" id="informasi_user">
                    <div class="grid_13">
                        <?php
                        $id = $_SESSION['user'];
                        $sql = "SELECT nama_pengguna, alamat,email,kota,telepon FROM pengguna WHERE id='".$id."'";
                        $mysqli = new mysqli("localhost", "readmesh_readsh", "5hAHfL6GFwzKqymu", "readmesh_readmeshop");
                        $stmt = $mysqli->prepare($sql);
                        $stmt->execute();
                        $stmt->bind_result($nama,$alamat,$email,$kota,$telepon);
                        while($stmt->fetch()){
                            ?>
                            <ul>
                                <li>
                                        <label class="grid_3">Nama</label>
                                        <div class="grid_9">
                                            <input type="text" name="nama" value="<?php echo$nama; ?>" ></input>
                                        </div>
                                </li>
                                <li>
                                        <label class="grid_3">Email</label>
                                        <div class="grid_9">
                                            <input type="text" name="email" value="<?php echo$email; ?>" ></input>
                                        </div>
                                </li>
                                <li>
                                        <label class="grid_3">Alamat</label>
                                        <div class="grid_9">
                                            <input type="text" name="alamat" value="<?php echo$alamat; ?>" ></input>
                                        </div>
                                </li>
                                <li>
                                        <label class="grid_3">Kota</label>
                                        <div class="grid_9">
                                            <input type="text" name="kota" value="<?php echo$kota; ?>" ></input>
                                        </div>
                                </li>
                                <li>
                                        <label class="grid_3">Telepon</label>
                                        <div class="grid_9">
                                            <input type="text" name="telepon" value="<?php echo$telepon; ?>" ></input>
                                        </div>
                                </li>
                            </ul>


                            <?php
                        }
                        
                    ?>
                    </div>
                    <div class="grid_4 right">
                        <?php
                        echo "<img class='ava left' src='images/avatar.jpg' width: '150px' height='150px' >";
                        ?>
                        <input type="submit" name="simpan" id="buttonsimpan" value="Ganti"></input>
                    </div>
                </div>
                <div class="clear"></div>
                    <div class="grid_18">
                        <input type="submit" name="simpan" id="buttonsimpan" value="Simpan"></input>
                        <input type="submit" name="kembali" id="buttonkembali" value="Kembali"></input>
                    </div>    
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
