<?php 
    require 'koneksi.php';

    $product_id = $_GET['id'];
    $action = $_GET['action'];

    if ($product_id && !productExsists($product_id)) {
        die (mysql_error());
    }

    switch ($action) {
        case 'add':
            $_SESSION['cart'][$product_id]++;
            break;
        case 'remove':
            $_SESSION['cart'][$product_id]--;
            if ($_SESSION['cart'][$product_id] == 0) {
                unset($_SESSION['cart'][$product_id]);
            }
            break;
        case 'empty':
            unset($_SESSION['cart']);
            break;
    }
 ?>