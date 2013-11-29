<?php
    session_start();
    require("koneksi.php");
    
    $valid = TRUE;
    
    if(!empty($_POST['tambahtestimoni'])){
        if(trim($_POST['isitestimoni'])=="")
	{
	    $valid = FALSE;
	    $error_tambahtestimoni = 1;
	}
        if($valid)
	{
	    $isitestimoni = $_POST['isitestimoni'];
            $query = "INSERT into testimoni VALUES 
            (NULL,'".$_SESSION['user']."',CURRENT_TIMESTAMP,'".$isitestimoni."')";
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
    <title>Testimoni - ReadMe Shop</title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/testimoni.css" />
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
                $_SESSION['actionlogin'] = "testimoni.php";
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
                <h1>Testimoni Readme Shop</h1>
                <?php 
                    require("koneksi.php");
                    $sql = "SELECT nama_pengguna, waktu, isi FROM testimoni, pengguna WHERE pengguna.id = testimoni.id_pengguna";
                    $result = mysqli_query($koneksi,$sql);
                    $found = mysqli_num_rows($result);
                    echo"<hr/>";
                    if($found > 0){
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "<div class='grid_18'>";
                            echo"<p id='titletestimoni'>".$data['nama_pengguna']." / ".$data['waktu']."</p>";
                            echo"<p>".$data['isi']."</p>";
                            echo "</div><div class='clear'></div>";
                        }
                    }
                    else{
                        echo "<div class='grid_18'>";
                        echo"<p>Belum ada testimoni</p>";
                        echo "</div><div class='clear'></div>";
                    }
                    if(isset($_SESSION['user'])){
                        echo"<form method='POST' action='#contentarea'>";
                        echo"<br><textarea id='isitestimoni' name='isitestimoni'></textarea><br><br>";
                        if(isset($error_tambahtestimoni)) echo"Input Tidak Boleh Kosong<br><br>";
                        echo"<input id='buttontestimoni' name='tambahtestimoni' type='submit' value='Tambahkan Testimoni'>";
                        echo"</form>";
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
