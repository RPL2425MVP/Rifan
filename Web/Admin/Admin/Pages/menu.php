<?php
$pages=isset($_GET['pages'])?$_GET['pages']:'';

switch ($pages) {
    case 'produk':
        include "Pages/Produk/produk.php";
        break;
    case 'Tambahproduk':
        include "Pages/Produk/tambah_produk.php";
        break;
    case 'Editproduk':
        include "Pages/Produk/edit_produk.php";
        break;
    case 'dproduk':
        include "Pages/Produk/detail_produk.php";
        break;
    case 'kategori':
        include "Pages/Kategori/kategori.php";
        break;
    default:
        include "Pages/Dashboard/dashboard.php";
        break;
}
?>