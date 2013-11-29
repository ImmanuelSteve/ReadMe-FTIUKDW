<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="Description" content="readmeshop.com, gadget, smartphone, toko online, online shop, toko gadget"/>
    <title>Bandingkan Produk - ReadMe Shop</title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/compare.css" />
    <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
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
            <!--login-->
            <?php
                $_SESSION['actionlogin'] = "compare.php";
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
            <div id="contentarea" class="grid_24">
                <h1>Bandingkan Produk</h1>
                <form action="#contentarea" method="post">
                    <div class="grid_11 dropdown">
                        <label>Produk 1 : </label>
                        <select name='produk1'>
                            <?php
                                require("koneksi.php");
                                $sql = "SELECT id,nama FROM produk where id = '".$_POST['produk1']."'";
                                $result = mysqli_query($koneksi,$sql)or die(mysqli_error($koneksi));
                                $found = mysqli_num_rows($result);
                                $data = mysqli_fetch_assoc($result);
                                if($found == 1){
                                    echo"<option value='".$data['id']."'>".$data['nama']."</option>";
                                }else{
                                    echo"<option value=''></option>";
                                }
                                $sql = "SELECT id,nama FROM produk";
                                $result = mysqli_query($koneksi,$sql)or die(mysqli_error($koneksi));
                                while($data = mysqli_fetch_assoc($result)){
                                    if($data['id'] === $_POST['produk1']){
                                        continue;
                                    }else{
                                        echo"<option value='".$data['id']."'>".$data['nama']."</option>";
                                    }
                                }
                                mysqli_close($koneksi);
                            ?>
                        </select>
                    </div>
                    <div class = "grid_11 dropdown">
                        <label id="labelproduk2">Produk 2 : </label>
                        <select name='produk2'>
                            <?php
                                require("koneksi.php");
                                $sql = "SELECT id,nama FROM produk where id = '".$_POST['produk2']."'";
                                $result = mysqli_query($koneksi,$sql)or die(mysqli_error($koneksi));
                                $found = mysqli_num_rows($result);
                                $data = mysqli_fetch_assoc($result);
                                if($found == 1){
                                    echo"<option value='".$data['id']."'>".$data['nama']."</option>";
                                }else{
                                    echo"<option value=''></option>";
                                }
                                $sql = "SELECT id,nama FROM produk";
                                $result = mysqli_query($koneksi,$sql)or die(mysqli_error($koneksi));
                                while($data = mysqli_fetch_assoc($result)){
                                    if($data['id'] === $_POST['produk2']){
                                        continue;
                                    }else{
                                        echo"<option value='".$data['id']."'>".$data['nama']."</option>";
                                    }
                                }
                                mysqli_close($koneksi);
                            ?>
                        </select>
                        <input id="buttonbandingkan" type="submit" name="compare" value="Bandingkan">
                    </div>
                </form>
                <div class="grid_11 isiproduk">
                        <?php
                            require("koneksi.php");
                            if(!empty($_POST['produk1']) || !empty($_POST['compare'])){
                                $sql = "SELECT id,gambar FROM produk WHERE id='".$_POST['produk1']."'";
                                $result = mysqli_query($koneksi,$sql);
                                while($data = mysqli_fetch_assoc($result)){
                                    $gambar = $data['gambar'];
                                    echo "<div class='grid_5 foto center'><a href=produkdetail.php?id=".$data['id']."><img src='$gambar'/></a></div>";
                                }
                                echo"<div class='clear'></div>";
                                $sql = "SELECT * FROM detail WHERE id='".$_POST['produk1']."'";
                                $result = mysqli_query($koneksi,$sql)or die(mysqli_error($koneksi));
                                $found = mysqli_num_rows($result);
                                if($found > 0){
                                    while($data = mysqli_fetch_assoc($result)){
                                        echo"<table>";
                                        echo"<tbody>";
                                        echo"<tr><td>Tipe Sim Card</td><td>: </td>";
                                        echo"<td>".$data['Tipe_SimCard']."</td></tr>";
                                        echo"<tr><td>Jaringan Data</td><td>: </td>";
                                        echo"<td>".$data['Jaringan_Data']."</td></tr>";
                                        echo"<tr><td>Jaringan Telepon</td><td>: </td>";
                                        echo"<td>".$data['Jaringan_Telepon']."</td></tr>";
                                        echo"<tr><td>Prosesor</td><td>: </td>";
                                        echo"<td>".$data['Prosesor']."</td></tr>";
                                        echo"<tr><td>RAM</td><td>: </td>";
                                        echo"<td>".$data['RAM']."</td></tr>";
                                        echo"<tr><td>Memori</td><td>: </td>";
                                        echo"<td>".$data['Media_Penyimpanan']."</td></tr>";
                                        echo"<tr><td>GPU</td><td>: </td>";
                                        echo"<td>".$data['GPU']."</td></tr>";
                                        echo"<tr><td>Layar</td><td>: </td>";
                                        echo"<td>".$data['Layar']."</td></tr>";
                                        echo"<tr><td>Kamera</td><td>: </td>";
                                        echo"<td>".$data['Kamera']."</td></tr>";
                                        echo"<tr><td>Baterai</td><td>: </td>";
                                        echo"<td>".$data['Baterai']."</td></tr>";
                                        echo"<tr><td>Fitur Tambahan</td><td>: </td>";
                                        echo"<td>".$data['Fitur_Tambahan']."</td></tr>";
                                        echo"</tbody>";
                                        echo"</table>";
                                    }
                                }
                                else{
                                    echo"<br>";
                                }
                            }
                            mysqli_close($koneksi);
                        ?>
                </div>
                <div class="grid_11 isiproduk">
                        <?php
                            require("koneksi.php");
                            if(!empty($_POST['produk2']) || !empty($_POST['compare'])){
                                $sql = "SELECT id,gambar FROM produk WHERE id='".$_POST['produk2']."'";
                                $result = mysqli_query($koneksi,$sql);
                                while($data = mysqli_fetch_assoc($result)){
                                    $gambar = $data['gambar'];
                                    echo "<div class='grid_5 foto center'><a href=produkdetail.php?id=".$data['id']."><img src='$gambar'/></a></div>";
                                }
                                echo"<div class='clear'></div>";
                                $sql = "SELECT * FROM detail WHERE id='".$_POST['produk2']."'";
                                $result = mysqli_query($koneksi,$sql)or die(mysqli_error($koneksi));
                                $found = mysqli_num_rows($result);
                                if($found > 0){
                                    while($data = mysqli_fetch_assoc($result)){
                                        echo"<table>";
                                        echo"<tbody>";
                                        echo"<tr><td>Tipe Sim Card</td><td>: </td>";
                                        echo"<td>".$data['Tipe_SimCard']."</td></tr>";
                                        echo"<tr><td>Jaringan Data</td><td>: </td>";
                                        echo"<td>".$data['Jaringan_Data']."</td></tr>";
                                        echo"<tr><td>Jaringan Telepon</td><td>: </td>";
                                        echo"<td>".$data['Jaringan_Telepon']."</td></tr>";
                                        echo"<tr><td>Prosesor</td><td>: </td>";
                                        echo"<td>".$data['Prosesor']."</td></tr>";
                                        echo"<tr><td>RAM</td><td>: </td>";
                                        echo"<td>".$data['RAM']."</td></tr>";
                                        echo"<tr><td>Memori</td><td>: </td>";
                                        echo"<td>".$data['Media_Penyimpanan']."</td></tr>";
                                        echo"<tr><td>GPU</td><td>: </td>";
                                        echo"<td>".$data['GPU']."</td></tr>";
                                        echo"<tr><td>Layar</td><td>: </td>";
                                        echo"<td>".$data['Layar']."</td></tr>";
                                        echo"<tr><td>Kamera</td><td>: </td>";
                                        echo"<td>".$data['Kamera']."</td></tr>";
                                        echo"<tr><td>Baterai</td><td>: </td>";
                                        echo"<td>".$data['Baterai']."</td></tr>";
                                        echo"<tr><td>Fitur Tambahan</td><td>: </td>";
                                        echo"<td>".$data['Fitur_Tambahan']."</td></tr>";
                                        echo"</tbody>";
                                        echo"</table>";
                                    }
                                }
                                else{
                                    echo"<br>";
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
