<?php
$pages=isset($_GET['pages'])?$_GET['pages']:'';

switch ($pages) {
    case 'register':
        include "Pages/Session/register.php";
        break;
    case 'login':
        include "Pages/Session/login.php";
        break;
    case 'home':
        include "Pages/Home/home.php";
        break;
    case 'store':
        include "Pages/Store/store.php";
        break;
    case 'dproduk':
        include "Pages/Detail Produk/detail_produk.php";
        break;
    default:
        include "Pages/Home/home.php";
        break;
}
?>