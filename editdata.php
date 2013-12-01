<?php
    session_start();
    require("koneksi.php");
    if(isset($_GET['id'])){
        if($_SESSION['user']!=1){
            header("location:index.php");
        }else{
                $id_produk = $_GET['id'];
                $sql = "SELECT * FROM produk,detail WHERE produk.id = '".$id_produk."'AND detail.id = '".$id_produk."'";
                $result = mysqli_query($koneksi,$sql);
                $edit = mysqli_fetch_assoc($result);
                //print_r($data);
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
                $_SESSION['actionlogin'] = "editdata.php";
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
                <h1>Ubah Produk ReadMe Shop</h1>
                <div class="tambahadmin">
		    <form method="post" action="tambahdata.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value=<?php echo $edit['id']; ?>>
                        <input type="hidden" name="gambaredit" value=<?php echo $edit['gambar']; ?>>
                        <table>
			    <tr>
				<td colspan=3 class="bold">Informasi Produk</td>
			    </tr>
			    <tr>
				<td>Nama</td>
				<td> : </td>
				<td><input type="text" name="nama" value=<?php echo "'" .$edit['nama']. "'"; ?>/></td>
			    </tr>
			    <tr>
				<td>Merek</td>
				<td> : </td>
				<td><input type="text" name="merek" value=<?php echo "'" .$edit['merek']. "'"; ?>/></td>
			    </tr>
			     <tr>
				<td>Gambar (JPG)</td>
				<td> : </td>
				<td><?php echo"<img src='".$edit['gambar']."' width=150 height=170/>"?><br><input type="file" name="upload" size="60"></td>
			    </tr>
			    <tr>
				<td>Harga</td>
				<td> : </td>
				<td><input type="text" name="harga" value=<?php echo "'" .$edit['harga']. "'"; ?>/></td>
			    </tr>
			    <tr>
				<td>Stok</td>
				<td> : </td>
				<td><input type="text" name="stok" value=<?php echo "'" .$edit['stok']. "'"; ?>/></td>
			    </tr>
                            <tr>
				<td>Terjual</td>
				<td> : </td>
				<td><input type="text" name="terjual" value=<?php echo "'" .$edit['terjual']. "'"; ?>/></td>
			    </tr>
			    <tr>
				<td>Nilai / Ratting</td>
                                <td>: </td>
                                <td>
                                    <select name='nilai'>
                                        <!--<option value=<?php echo "'" .$edit['nilai']. "'"; ?>><?php echo "" .$edit['nilai']. ""; ?></option>;-->
                                        <option value='1'>1</option>;
                                        <option value='2'>2</option>;
                                        <option value='3'>3</option>;
                                        <option value='4'>4</option>;
                                        <option value='5'>5</option>;
				    </select>
                                </td>
			    </tr>
			    <tr>
				<td>Produk</td>
                                <td>: </td>
                                <td>
                                    <select name='produk'>
                                   <!-- <option value=<?php echo "'" .$edit['status']. "'"; ?>><?php echo "Produk " .$edit['status']. ""; ?></option>;-->
				    <option value='unggulan'>Produk Unggulan</option>;
				    <option value='baru'>Produk Baru</option>;
                                    <option value='standar'>Produk Standar</option>;
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
				<textarea name="tipesim" rows="1" cols="50"><?php echo $edit['Tipe_SimCard']; ?></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Jaringan Data</td>
				<td valign="top">:</td>
				<td>
				<textarea name="jaringandata" rows="1" cols="50"><?php echo $edit['Jaringan_Data']; ?></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Jaringan Telepon</td>
				<td valign="top">:</td>
				<td>
				<textarea name="jaringantelepon" rows="1" cols="50"><?php echo $edit['Jaringan_Telepon']; ?></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Prosesor</td>
				<td valign="top">:</td>
				<td>
				<textarea name="prosesor" rows="1" cols="50"><?php echo $edit['Prosesor']; ?></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">RAM</td>
				<td valign="top">:</td>
				<td>
				<textarea name="ram" rows="1" cols="50"><?php echo $edit['RAM']; ?></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Memori</td>
				<td valign="top">:</td>
				<td>
				<textarea name="memori" rows="1" cols="50"><?php echo $edit['Media_Penyimpanan']; ?></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">GPU</td>
				<td valign="top">:</td>
				<td>
				<textarea name="gpu" rows="1" cols="50"><?php echo $edit['GPU']; ?></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Layar</td>
				<td valign="top">:</td>
				<td>
				<textarea name="layar" rows="1" cols="50"><?php echo $edit['Layar']; ?></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Kamera</td>
				<td valign="top">:</td>
				<td>
				<textarea name="kamera" rows="1" cols="50"><?php echo $edit['Kamera']; ?></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Baterai</td>
				<td valign="top">:</td>
				<td>
				<textarea name="baterai" rows="1" cols="50"><?php echo $edit['Baterai']; ?></textarea>
				</td>
			    </tr>
			    <tr>
				<td valign="top">Fitur Tambahan</td>
				<td valign="top">:</td>
				<td>
				<textarea name="fiturtambahan" rows="2" cols="50"><?php echo $edit['Fitur_Tambahan']; ?></textarea>
				</td>
			    </tr>
			</table><br>
			<input class="buttonTambahOk" type="submit" name="edit" value="OK" />
		    </form><br>
		</div>
            </div>
        </div>
    </div>
    <!-- content end -->

    <!-- footer begin -->
    <?php
        require("footer.php");
        }
        mysqli_close($koneksi);
    ?>
    <!-- footer end -->
</body>
</html>
