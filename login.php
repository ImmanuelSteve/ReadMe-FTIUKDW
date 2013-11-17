<?php
    require("koneksi.php");
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
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query_string = "SELECT nama_pengguna,email,password FROM pengguna WHERE email='".$username."'AND password='".$password."'";
        $result = mysqli_query($koneksi,$query_string) or die(mysqli_error($koneksi));
        $found = mysqli_num_rows($result);
        $data = mysqli_fetch_assoc($result);
        if ($found > 0 ) {
            $_SESSION['user'] = $data['nama_pengguna'];
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
        echo "<br/>Belum punya akun <a href='daftar.php'>daftar disini</a>";
        echo "</form></div>";
        echo "<div class='clear'></div>";
    }
    mysqli_close($koneksi);
?>