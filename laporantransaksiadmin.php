<?php
    session_start();
    if($_SESSION['user']!=1){
	header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="Description" content="readmeshop.com, gadget, smartphone, toko online, online shop, toko gadget"/>
    <title>Admin - ReadMe Shop</title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/admin.css" />
    <script type="text/javascript" src="js/jquery-1.2.3.min.js"></script>
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
                $_SESSION['actionlogin'] = "editulasanadmin.php";
                include("login.php");
            ?>
            <div class="grid_24" id="header_nav">
                <ul class="lavaLamp">
                    <li class="current"><a href="laporantransaksiadmin.php">Laporan Transaksi</a> </li>
                    <li><a href="penggunaadmin.php">Pengguna</a> </li>
                    <li><a href="editprodukadmin.php">Produk</a> </li>
                    <li><a href="edittestimoniadmin.php">Testimoni</a></li>
                    <li><a href="editulasanadmin.php">Ulasan</a></li>
                    <li><a href="index.php">Lihat Halaman Web</a></li>
                </ul>
            <div class="clear"></div>
        </div>
    </div>
    <!-- header end -->
    
    <!-- content begin -->
    <div id="content">
        <div class="container_24">
            <div id="contentarea" class="grid_24">
                <h1>Laporan Transaksi ReadMe Shop</h1>
                <div id="table">
                <table class="center" border="1">
                    <tr id="thead">
			<td>No</td>
                        <td>Tanggal Transaksi</td>
                        <td>Id Pengguna</td>
                        <td>Pengirim</td>
                        <td>Tujuan</td>
                        <td>Kota</td>
                        <td>Telepon</td>
                        <td>Jasa Pengiriman</td>
                        <td>Total Harga</td>
		    </tr>
		    <?php
                        require("koneksi.php");
                        $sql = "SELECT nota.*,pengiriman.nama FROM nota,pengiriman WHERE nota.id_pengiriman=pengiriman.id";
                        $result = mysqli_query($koneksi,$sql);
                        $counter=0;
                        while($data = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<td>".++$counter."</td>";
                            echo "<td>".$data['tanggal_transaksi']."</td>";
                            echo "<td>".$data['id_pengguna']."</td>";
                            echo "<td>".$data['pengirim']."</td>";
                            echo "<td class='tujuan'>".$data['tujuan']."</td>";
                            echo "<td>".$data['kota']."</td>";
                            echo "<td>".$data['telepon']."</td>";
                            echo "<td>".$data['nama']."</td>";
                            echo "<td>Rp. ".number_format($data['total_harga'])."</td>";
                            echo "</tr>";
                        }
                        mysqli_close($koneksi);
		    ?>
		</table>
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
