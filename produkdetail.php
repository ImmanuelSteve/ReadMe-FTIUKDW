<?php
    session_start();
    require("koneksi.php");
    
    $valid = TRUE;
    
    if(!empty($_POST['tambahreview'])){
        if(trim($_POST['isireview'])=="")
	{
	    $valid = FALSE;
	    $error_tambahreview = 1;
	}
        if($valid)
	{
	    $isireview = $_POST['isireview'];
            $query = "INSERT into review VALUES 
            (NULL,'".$_SESSION['idProduk']."','".$_SESSION['user']."',CURRENT_TIMESTAMP,'".$isireview."')";
            if(mysqli_query($koneksi,$query)){

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
        
        - ReadMe Shop
    </title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/produk.css" />
    <link rel="stylesheet" href="css/produkdetail.css" />
    <script language="JavaScript" type="text/javascript" src="js/jquery-1.2.3.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/produk.js"></script>
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
                $_SESSION['actionlogin'] = "produkdetail.php";
                include("login.php");
            ?>
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
                <?php
                    require("koneksi.php");
                    if(isset($_GET['id']) || isset($_SESSION['idProduk'])){
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $_SESSION['idProduk'] = $id;
                        }elseif(isset($_SESSION['idProduk'])){
                            $id = $_SESSION['idProduk'];
                        }
                        $sql = "SELECT nama,hargaString,gambar,stok FROM produk WHERE id='".$id."'";
                        $result = mysqli_query($koneksi,$sql);
                        while($data = mysqli_fetch_assoc($result)){
                            echo"<div class='grid_17' id='detailproduk1'>";
                                echo"<div class='grid_17' id='namaproduk'><p>".$data['nama']."</p></div>";
                                echo"<div class='grid_7'>";
                                    echo"<div class='grid_6 center' id='gambarproduk'>";
                                        echo"<img src='".$data['gambar']."' width='220px'/>";
                                    echo"</div>";
                                echo"</div>";
                                echo"<div class='grid_7'>";
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
                            <li > <a class="tabbutton" name="tab1" > Spesifikasi </a></li>
                            <li > <a class="tabbutton" name="tab2" > Ulasan </a></li>
                    </ul>
                    <div id="isiTab">
                        <?php
                            require("koneksi.php");
                            if(isset($_SESSION['idProduk'])){
                                $sql = "SELECT * FROM detail WHERE id='".$_SESSION['idProduk']."'";
                                $result = mysqli_query($koneksi,$sql)or die(mysqli_error($koneksi));
                                $found = mysqli_num_rows($result);
                                if($found > 0){
                                    while($data = mysqli_fetch_assoc($result)){
                                        echo"<div id='tab1'><table>";
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
                                        echo"</table></div>";
                                    }
                                }
                                else{
                                    echo"<div id='tab1'>Spesifikasi belum ada</div>";
                                }
                            }
                            else{
                                echo"<div id='tab1'>Spesifikasi belum ada</div>";
                            }
                            echo "<div id='tab2'><p class='bold'>Ulasan sebelumnya :</p><hr>";
                            if(isset($_SESSION['idProduk'])){
                                $sql = "SELECT review.waktu, review.isi , pengguna.nama_pengguna FROM review,pengguna WHERE review.id_produk='".$_SESSION['idProduk']."' AND pengguna.id = review.id_pengguna";
                                $result = mysqli_query($koneksi,$sql)or die("Maaf Server sedang dalam perawatan, coba beberapa saat lagi :D");
                                $found = mysqli_num_rows($result);
                                if($found>0){
                                    while ($data = mysqli_fetch_assoc($result)) {
                                        echo"<p id='titlereview'>".$data['nama_pengguna']." / ".$data['waktu']."</p>";
                                        echo"<p>".$data['isi']."</p>";
                                    }
                                    echo"<hr>";
                                }
                                else{
                                    echo"Belum ada ulasan<hr>";
                                }
                            }
                            if(!empty($_SESSION['user']) && isset($_SESSION['idProduk'])){
                                    $sql = "SELECT id_pengguna FROM review where id_pengguna = '".$_SESSION['user']."' AND id_produk = '".$_SESSION['idProduk']."'";
                                    $result = mysqli_query($koneksi,$sql)or die("Maaf Server sedang dalam perawatan, coba beberapa saat lagi :D");
                                    $found = mysqli_num_rows($result);
                                    if($found < 1){
                                        echo"<form method='POST' action='#tab2'>";
                                        echo"<br><textarea id='isireview' name='isireview'></textarea><br><p class='bold'>*Anda hanya bisa memberi ulasan produk ini satu kali saja</p><br>";
                                        if(isset($error_tambahreview)) echo"Input Tidak Boleh Kosong<br><br>";
                                        echo"<input id='buttonreview' name='tambahreview' type='submit' value='Tambahkan Ulasan'>";
                                        echo"</form>";
                                        echo "<br></div>";
                                    }
                                    else{
                                        echo "<p class='bold'>Anda sudah pernah memberikan review sebelumnya</p><br></div>";
                                    }
                            }
                            else{
                                echo "<br></div>";
                            }
                            mysqli_close($koneksi);
                        ?>
                    </div>
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
