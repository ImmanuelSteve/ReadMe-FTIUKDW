<?php session_start(); ?>
<!DOCTYPE HTML  >
    <html>
        <head>
            <title>ReadMe Shop - Cart</title>
            <link rel="stylesheet" href="css/960_24_col.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/cart.css" />
            <link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
        </head>
        
        <body>
            <div id="header">
        <div class="container_24">
            <div class="grid_4">
                <img src="images/readmeshoplogo.png" height="100" width="110"/>
            </div>
            <?php include ("koneksi.php");
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $query_string = "SELECT email,password FROM pengguna WHERE email='".$username."'AND password='".$password."'";
                    $result = mysqli_query($koneksi,$query_string) or die(mysqli_error($koneksi));
                    $found = mysqli_num_rows($result);
                    if ($found > 0) {
                        session_start();
                        $_SESSION['user'] = $username;
                        echo "<div id='login' class='grid_20'>";
                        echo "<form id='formlogin' class='right' action='logout.php' method='post'>";
                        echo "<img class='left' src='images/avatar.jpg' width: '64px' height='64px'>";
                        echo "<span id='penyapa'>Selamat Datang, <br/><a href='#'>".$username."</a></span></br>";
                        echo "<input class='right logout' id='buttonlogin' type='submit' value='Keluar'>";
                        echo "</form></div>";
                        echo "<div class='clear'></div>";
                    }
                    else {
                        echo "<div id='login' class='grid_20'>";
                        echo "<form id='formlogin' class='right' action='index.php' method='post'>";
                        echo "<input type='text' name='username' placeholder='nama pengguna'>";
                        echo "<input type='password' name='password' placeholder='kata sandi'>";
                        echo "<input id='buttonlogin' type='submit' value='Masuk'>";
                        echo "<br/>Periksalah nama pengguna dan kata sandi Anda.
                        <br/>Belum punya akun <a href='daftar.html'>daftar disini</a>";
                        echo "</form></div>";
                        echo "<div class='clear'></div>";
                    }
                }
                else {
                    echo "<div id='login' class='grid_20'>";
                    echo "<form id='formlogin' class='right' action='index.php' method='post'>";
                    echo "<input type='text' name='username' placeholder='nama pengguna'>";
                    echo "<input type='password' name='password' placeholder='kata sandi'>";
                    echo "<input id='buttonlogin' type='submit' value='Masuk'>";
                    echo "<br/>Belum punya akun <a href='daftar.html'>daftar disini</a>";
                    echo "</form></div>";
                    echo "<div class='clear'></div>";
                }
             ?>
            
            <div class="grid_24" id="header_nav">
                <ul id="nav">
                    <li><a class="navi" href="index.php">Beranda</a> </li>
                    <li><a class="navi" href="produk.php">Produk </a></li>
                    <li><a class="navi" href="promosi.php">Promosi </a></li>
                    <li><a class="navi" href="tentangkami.html">Tentang kami </a></li>
                </ul>
                <div id="formsearch" class="grid_6">
                    <form>
                        <div id="textsearch" class="grid_4">
                            <input type="text" name="pencarian" placeholder="Pencarian">
                        </div>
                        <div id="buttonsearch" class="grid_1">
                            <input type="image" src="images/search.png" name="submit">
                        </div>
                        <!--<button class"buttonsubmit" type="submit">Cari</button>-->
                    </form>
                </div>
            </div>
            
            <div class="clear"></div>
        
        </div>
    </div>  
        </body>
    </html>
    
