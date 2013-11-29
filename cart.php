<?php 
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
    }

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        //action yang akan dilakukan
        switch ($action) {
            case 'add':
                $_SESSION['cart'][$product_id]++;
                header("location:produk.php");
                break;
            case 'remove':
                $_SESSION['cart'][$product_id]--;
                if ($_SESSION['cart'][$product_id] == 0) {
                    unset($_SESSION['cart'][$product_id]);
                    header("location:produk.php");
                }
                break;
            case 'empty':
                unset($_SESSION['cart']);
                header("location:produk.php");
                break;
        }
    }  
 ?>