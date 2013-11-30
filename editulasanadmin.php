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
		<?php require("notifikasi.php"); ?>
                <h1>Ulasan Produk ReadMe Shop</h1>
                <input type="submit" class="buttonadmin" value="Tambah Ulasan"/><br><br>
                <div class="tambahadmin">
		    <form method="post" action="tambahdata.php">
			<table>
                            <tr>
				<td colspan=3 class="bold">Tambah Ulasan</td>
			    </tr>
                            <tr>
                                <td>Produk</td>
                                <td>: </td>
                                <td>
                                    <select name='produk'>
                                    <?php
                                        require("koneksi.php");
                                        $sql = "SELECT id,nama FROM produk where id = '".$_POST['produk1']."'";
                                        $result = mysqli_query($koneksi,$sql)or die(mysqli_error($koneksi));
                                        $found = mysqli_num_rows($result);
                                        $data = mysqli_fetch_assoc($result);
                                        if($found == 1){
                                            echo"<option value='".$data['id']."'>".$data['nama']."</option>";
                                        }else{
                                            echo"<option value=''>Pilih Produk</option>";
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
                                </td>
                            </tr>
			    <tr>
				<td valign="top">Isi Ulasan</td>
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
                <table class="center" border="1">
                    <tr id="thead">
			<td>No</td>
                        <td>Id Produk</td>
                        <td>Id Pengguna</td>
                        <td>Waktu</td>
                        <td>Isi</td>
                        <td>Pilihan</td>
		    </tr>
		    <?php
                        require("koneksi.php");
                        $sql = "SELECT * FROM review";
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
