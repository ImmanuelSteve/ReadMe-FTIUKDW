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
                $_SESSION['actionlogin'] = "editprodukadmin.php";
                include("login.php");
            ?>
            <div class="grid_24" id="header_nav">
                <ul class="lavaLamp">
		    <li><a href="penggunaadmin.php">Pengguna</a> </li>
                    <li class="current"><a href="editprodukadmin.php">Produk</a> </li>
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
		<?php require("notifikasi.php"); ?>
                <h1>Produk ReadMe Shop</h1>
                <input type="submit" class="buttonadmin" value="Tambah Produk"/><br><br>
                <div class="tambahadmin">
		    <form method="post" action="tambahdata.php" enctype="multipart/form-data">
			<table>
			    <tr>
				<td colspan=3 class="bold">Informasi Produk</td>
			    </tr>
			    <tr>
				<td>Nama</td>
				<td> : </td>
				<td><input type="text" name="nama"/></td>
			    </tr>
			    <tr>
				<td>Merek</td>
				<td> : </td>
				<td><input type="text" name="merek"/></td>
			    </tr>
			     <tr>
				<td>Gambar</td>
				<td> : </td>
				<td><input type="file" name="upload" size="60"></td>
			    </tr>
			    <tr>
				<td>Harga</td>
				<td> : </td>
				<td><input type="text" name="harga"/></td>
			    </tr>
			    <tr>
				<td>Stok</td>
				<td> : </td>
				<td><input type="text" name="stok"/></td>
			    </tr>
			    <tr>
				<td>Nilai / Ratting</td>
				<td> : </td>
				<td><input type="text" name="merek"/></td>
			    </tr>
			    <tr>
				<td>Produk</td>
                                <td>: </td>
                                <td>
                                    <select name='produk'>
                                    echo"<option value=''>Pilih Status</option>";
				    echo"<option value='unggulan'>Produk Unggulan</option>";
				    echo"<option value='baru'>Produk Baru</option>";
				    </select>
                                </td>
			    </tr>
			</table><br>
			
			<table>
			    <tr>
				<td colspan=3 class="bold">Spesifikasi Produk</td>
			    </tr>
			    <tr>
				<td valign="top">Tipe Sim Card</td>
				<td valign="top">:</td>
				<td>
				<textarea name="tipesim" rows="1" cols="50"></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Jaringan Data</td>
				<td valign="top">:</td>
				<td>
				<textarea name="jaringandata" rows="1" cols="50"></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Jaringan Telepon</td>
				<td valign="top">:</td>
				<td>
				<textarea name="jaringantelepon" rows="1" cols="50"></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Prosesor</td>
				<td valign="top">:</td>
				<td>
				<textarea name="prosesor" rows="1" cols="50"></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">RAM</td>
				<td valign="top">:</td>
				<td>
				<textarea name="ram" rows="1" cols="50"></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Memori</td>
				<td valign="top">:</td>
				<td>
				<textarea name="memori" rows="1" cols="50"></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">GPU</td>
				<td valign="top">:</td>
				<td>
				<textarea name="gpu" rows="1" cols="50"></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Layar</td>
				<td valign="top">:</td>
				<td>
				<textarea name="layar" rows="1" cols="50"></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Kamera</td>
				<td valign="top">:</td>
				<td>
				<textarea name="kamera" rows="1" cols="50"></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Baterai</td>
				<td valign="top">:</td>
				<td>
				<textarea name="baterai" rows="1" cols="50"></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Fitur Tambahan</td>
				<td valign="top">:</td>
				<td>
				<textarea name="fiturtambahan" rows="2" cols="50"></textarea>
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
			<td>Id Produk</td>
                        <td>Gambar</td>
                        <td>Merek</td>
                        <td>Nama</td>
                        <td>Harga</td>
                        <td>Stok</td>
                        <td>Nilai</td>
                        <td>Waktu</td>
                        <td>Terjual</td>
                        <td>Status</td>
                        <td colspan=2>Pilihan</td>
		    </tr>
		    <?php
                        require("koneksi.php");
                        $sql = "Select * from produk";
                        $result = mysqli_query($koneksi,$sql);
			$counter=0;
                        while($data = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<td>".++$counter."</td>";
			    echo "<td>".$data['id']."</td>";
                            echo "<td><img src='".$data['gambar']."' width=150 height=170/></td>";
                            echo "<td>".$data['merek']."</td>";
                            echo "<td>".$data['nama']."</td>";
                            echo "<td>".number_format($data['harga'])."</td>";
                            echo "<td>".$data['stok']."</td>";
                            echo "<td>".$data['nilai']."</td>";
                            echo "<td>".$data['waktu_peluncuran']."</td>";
                            echo "<td>".$data['terjual']."</td>";
                            echo "<td>".$data['status']."</td>";
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
