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
    <script type="text/javascript" src="js/admin.js"></script>
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
                $_SESSION['actionlogin'] = "edittestimoniadmin.php";
                include("login.php");
            ?>
            <div class="grid_24" id="header_nav">
                <ul class="lavaLamp">
		    <li><a href="laporantransaksiadmin.php">Laporan Transaksi</a> </li>
		    <li><a href="penggunaadmin.php">Pengguna</a> </li>
                    <li><a href="editprodukadmin.php">Produk</a> </li>
                    <li class="current"><a href="edittestimoniadmin.php">Testimoni</a></li>
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
		<?php require("notifikasi.php"); ?>
                <h1>Testimoni ReadMe Shop</h1>
                <input type="submit" class="buttonadmin" value="Tambah Testimoni"/><br><br>
                <div class="tambahadmin">
		    <form method="post" action="tambahdata.php">
			<table>
			    <tr>
				<td colspan=3 class="bold">Tambah Testimoni</td>
			    </tr>
			    <tr>
				<td valign="top">Isi Testimoni</td>
				<td valign="top">:</td>
				<td>
				<textarea name="isi" rows="5" cols="45"></textarea>
				</td>
			    </tr>
			</table><br>
			<input class="buttonTambahOk" type="submit" name="tambah" value="OK" />
		    </form><br>
		</div>
		<div id="table">
		<table class="center">
                    <tr id="thead">
			<td>No</td>
                        <td>Id Pengguna</td>
                        <td>Waktu</td>
                        <td>Isi</td>
                        <td>Pilihan</td>
		    </tr>
		    <?php
                        require("koneksi.php");
                        $sql = "Select * from testimoni";
                        $result = mysqli_query($koneksi,$sql);
                        $counter=0;
			while($data = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<td>".++$counter."</td>";
                            echo "<td>".$data['id_pengguna']."</td>";
                            echo "<td>".$data['waktu']."</td>";
                            echo "<td class='justify'>".$data['isi']."</td>";
                            echo "<td><a href=hapusdata.php?id=".$data['id']." onClick=\"return confirm('Yakin Mau dihapus datanya ?')\">Hapus</a></td>";
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
