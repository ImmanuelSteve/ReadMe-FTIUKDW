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
                $_SESSION['actionlogin'] = "editulasanadmin.php";
                include("login.php");
            ?>
            <div class="grid_24" id="header_nav">
                <ul class="lavaLamp">
                    <li><a href="penggunaadmin.php">Pengguna</a> </li>
                    <li><a href="editprodukadmin.php">Produk</a> </li>
                    <li><a href="edittestimoniadmin.php">Testimoni</a></li>
                    <li class="current"><a href="editulasanadmin.php">Ulasan</a></li>
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
                <h1>Ulasan Produk ReadMe Shop</h1>
                <button class="buttonadmin"><a class="nodecor white" href="tambah_data.php">Tambah Ulasan</a></button><br><br>
                <div id="table">
                <table class="center" border="1">
                    <tr id="thead">
			<td>No</td>
                        <td>Id Produk</td>
                        <td>Id Pengguna</td>
                        <td>Waktu</td>
                        <td>Isi</td>
                        <td colspan=2>Pilihan</td>
		    </tr>
		    <?php
                        require("koneksi.php");
                        $sql = "Select * from review";
                        $result = mysqli_query($koneksi,$sql);
                        $counter=0;
                        while($data = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<td>".++$counter."</td>";
                            echo "<td>".$data['id_produk']."</td>";
                            echo "<td>".$data['id_pengguna']."</td>";
                            echo "<td>".$data['waktu']."</td>";
                            echo "<td class='justify'>".$data['isi']."</td>";
                            echo "<td><a href=edit_data.php?id=".$data['id'].">Edit</a></td>";
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
