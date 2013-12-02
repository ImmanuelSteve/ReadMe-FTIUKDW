<?php
session_start();
require('koneksi.php');
	print_r($_POST);
  print_r($_FILES['upload']);
	$nama = $_POST['nama'];
	$email = $_POST['email'];	
  $alamat = $_POST['alamat'];
  $kota = $_POST['kota'];
  $telp = $_POST['telepon'];
  $dir = 'images/user/';
  $id = $_SESSION['user'];



    $uploadfile = $dir . $_FILES['upload']['name'];
    if(($_FILES["upload"]["type"] != "image/png")||($_FILES["upload"]["type"] != "image/jpg"))
    {
      if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile))
      {
        $path = $dir . $_FILES['upload']['name'];
        $sql = "UPDATE pengguna SET nama_pengguna = '$nama' , email = '$email', alamat = '$alamat', kota = '$kota', telepon = '$telp', gambar='$path'  where id = $id";
          $mysqli = new mysqli("localhost", "readmesh_readsh", "5hAHfL6GFwzKqymu", "readmesh_readmeshop");
          $res =  $mysqli->query($sql);
          echo $mysqli->affected_rows;

          if($mysqli->affected_rows != -1){
            header("Location: profil.php");
          }
          else{
            echo "sory ya";
          }
        echo "sukses upload";
      }
        
      else
        echo "gagal upload";
    }
    else
      echo "file upload tidak berekstensi .jpg atau .png";

?>
