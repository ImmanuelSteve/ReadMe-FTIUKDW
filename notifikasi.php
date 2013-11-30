<?php
    if(!empty($_SESSION['berhasil'])){
        echo"<div id='berhasil'>";
        echo"".$_SESSION['berhasil']."";
        echo"</div>";
        $_SESSION['berhasil']="";
    }else if(!empty($_SESSION['gagal'])){
        echo"<div id='gagal'>";
        echo"".$_SESSION['gagal']."";
        echo"</div>";
        $_SESSION['gagal']="";
    }
?>