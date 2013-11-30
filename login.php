<?php
    require("koneksi.php");
    require("PasswordHash.php");
    if(!empty($_SESSION['user'])) {
        echo "<div id='login' class='grid_20'>";
        echo "<form id='formlogin' class='right' action='logout.php' method='post'>";
        echo "<img class='ava left' src='images/avatar.jpg' width: '64px' height='64px'>";
        $sql = "SELECT password,nama_pengguna FROM pengguna WHERE id ='".$_SESSION['user']."'";
        $result = mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_assoc($result);
        $t_hasher = new PasswordHash(8, FALSE);
        $check=0;
        if($_SESSION['user']==1){
        $check = $t_hasher->CheckPassword($_SESSION['password'],$data['password']);
        }
        if($check==1){
            echo "<span id='penyapa'>Selamat datang,<br><a href='editprodukadmin.php'>".$data['nama_pengguna']."</a></span></br>";
        }else{
        echo "<span id='penyapa'>Selamat Datang, <br/><a href='profil.php'>".$data['nama_pengguna']."</a></span></br>";
        }
        echo "<input class='right logout' id='buttonlogin' type='submit' value='Keluar'>";
        echo "</form></div>";
        echo "<div class='clear'><br><br></div>";
    }
    else if (isset($_POST['username']) && isset($_POST['password'])) {
        $email= $_POST['username'];
        //buat variabel t_haster
        $t_hasher = new PasswordHash(8, FALSE);
        $correct = $_POST['password'];
        $sql = "SELECT id,nama_pengguna,password FROM pengguna WHERE email= ?";
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
            mysqli_stmt_bind_result($stmt,$id_pengguna,$nama_pengguna,$password);
            /* fetch value */
            mysqli_stmt_fetch($stmt);
            //cek apakah password hash di database sama dengan password asli yg diinput user
            $check = $t_hasher->CheckPassword($correct, $password);
            //echo"$password"; echo"$namapengguna";
            if($check){
                $_SESSION['user'] = $id_pengguna;
                if($_SESSION['user'] == 1){
                    $_SESSION['password']= $correct;
                    header("location:editprodukadmin.php");
                }
                else if($_SESSION['actionlogin'] == "daftar.php"){
                    header("location:index.php");
                }
                else{
                    echo "<div id='login' class='grid_20'>";
                    echo "<form id='formlogin' class='right' action='logout.php' method='post'>";
                    echo "<img class='ava left' src='images/avatar.jpg' width: '64px' height='64px'>";
                    echo "<span id='penyapa'>Selamat Datang, <br/><a href='profil.php'>".$nama_pengguna."</a></span></br>";
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