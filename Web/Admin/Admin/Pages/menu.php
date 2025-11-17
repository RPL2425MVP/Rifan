<?php
$pages=isset($_GET['pages'])?$_GET['pages']:'';

switch ($pages) {
    case 'produk':
        include "Pages/Produk/produk.php";
        break;
    case 'produk':
        include "Pages/Home/produk.php";
        break;
    case 'produk':
        include "Pages/Home/produk.php";
        break;
    default:
        include "Pages/Dashboard/dashboard.php";
        break;
}
?>