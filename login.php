<?php
    require("koneksi.php");
    require("PasswordHash.php");
    if (!empty($_SESSION['user'])) {
        echo "<div id='login' class='grid_20'>";
        echo "<form id='formlogin' class='right' action='logout.php' method='post'>";
        echo "<img class='ava left' src='images/avatar.jpg' width: '64px' height='64px'>";
        echo "<span id='penyapa'>Selamat Datang, <br/><a href='#'>".$_SESSION['user']."</a></span></br>";
        echo "<input class='right logout' id='buttonlogin' type='submit' value='Keluar'>";
        echo "</form></div>";
        echo "<div class='clear'></div>";
    }
    else if (isset($_POST['username']) && isset($_POST['password'])) {
        $email= $_POST['username'];
        //buat variabel t_haster
        $t_hasher = new PasswordHash(8, FALSE);
        $correct = $_POST['password'];
        $sql = "SELECT nama_pengguna,password FROM pengguna WHERE email= ?";
        /* create a prepared statement */
        $stmt = mysqli_prepare($koneksi, $sql);
        /* bind parameters for markers */
        mysqli_stmt_bind_param($stmt, "s", $email);
        /* execute query */
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $found = mysqli_stmt_num_rows($stmt);
        //echo"$found";
        if($found === 1) {
            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $namapengguna,$password);
            /* fetch value */
            mysqli_stmt_fetch($stmt);
            //cek apakah password hash di database sama dengan password asli yg diinput user
            $check = $t_hasher->CheckPassword($correct, $password);
            //echo"$password"; echo"$namapengguna";
            if($check){
                $_SESSION['user'] = $namapengguna;
                if($_SESSION['actionlogin'] == "daftar.php"){
                    header("location:index.php");
                }
                else{
                    echo "<div id='login' class='grid_20'>";
                    echo "<form id='formlogin' class='right' action='logout.php' method='post'>";
                    echo "<img class='ava left' src='images/avatar.jpg' width: '64px' height='64px'>";
                    echo "<span id='penyapa'>Selamat Datang, <br/><a href='#'>".$_SESSION['user']."</a></span></br>";
                    echo "<input class='right logout' id='buttonlogin' type='submit' value='Keluar'>";
                    echo "</form></div>";
                    echo "<div class='clear'></div>";
                }
            }
            else {
                echo "<div id='login' class='grid_20'>";
                echo "<form id='formlogin' class='right' action='".$_SESSION['actionlogin']."' method='post'>";
                echo "<input type='text' name='username' placeholder='email'>";
                echo "<input type='password' name='password' placeholder='kata sandi'>";
                echo "<input id='buttonlogin' type='submit' value='Masuk'>";
                echo "<br/>Periksalah email dan kata sandi Anda
                <br/>Belum punya akun <a href='daftar.php'>daftar disini</a>";
                echo "</form></div>";
                echo "<div class='clear'></div>";
            }
        }
        else {
            echo "<div id='login' class='grid_20'>";
            echo "<form id='formlogin' class='right' action='".$_SESSION['actionlogin']."' method='post'>";
            echo "<input type='text' name='username' placeholder='email'>";
            echo "<input type='password' name='password' placeholder='kata sandi'>";
            echo "<input id='buttonlogin' type='submit' value='Masuk'>";
            echo "<br/>Periksalah email dan kata sandi Anda
            <br/>Belum punya akun <a href='daftar.php'>daftar disini</a>";
            echo "</form></div>";
            echo "<div class='clear'></div>";
        }
    }
    else {
        echo "<div id='login' class='grid_20'>";
        echo "<form id='formlogin' class='right' action='".$_SESSION['actionlogin']."' method='post'>";
        echo "<input type='text' name='username' placeholder='email'>";
        echo "<input type='password' name='password' placeholder='kata sandi'>";
        echo "<input id='buttonlogin' type='submit' value='Masuk'>";
        echo "<br/>Belum punya akun <a href='daftar.php'>daftar disini</a>";
        echo "</form></div>";
        echo "<div class='clear'></div>";
    }
    unset($t_hasher);
    mysqli_close($koneksi);
?>