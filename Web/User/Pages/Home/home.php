<?php
include 'Function/function.php';
$produkNew = getAllData("data_produk", "ORDER BY created_at DESC LIMIT 6");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Assets/Images/slide1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="Assets/Images/slide2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <h2 class="section-title">Produk Terbaru</h2>
    <div class="product-container">
        
            

            
    <?php
    foreach ($produkNew as $a => $p) {
    $foto = $conn->query("SELECT foto FROM foto_produk WHERE id_produk='{$p['id_produk']}' LIMIT 1");
    $f = $foto->fetch_assoc();
    $gambar = $f ? $f['foto'] : 'noimage.png'; // jika tidak ada foto
    echo "
    <a style='text-decoration:none; color:black' href='?pages=dproduk&id={$p['id_produk']}''>
    <div class='product-card'>
    <div><img src='../Admin/Admin/assets/Images/produk/$gambar' class='product-image'>
    </div>
    <h3 class='product-name'>{$p['nama_produk']}</h3>
    <p class='product-price'>Rp.{$p['harga']}</p>
    </div>
    </a>
    ";
    } 
?>
    </div>
<h2 class="section-title">Produk Terlaris</h2>
<div class="product-container">
        
        <?php
    foreach ($produkNew as $a => $p) {
    $foto = $conn->query("SELECT foto FROM foto_produk WHERE id_produk='{$p['id_produk']}' LIMIT 1");
    $f = $foto->fetch_assoc();
    $gambar = $f ? $f['foto'] : 'noimage.png'; // jika tidak ada foto
    echo "<div class='product-card'>
    <div><img src='../Admin/Admin/assets/Images/produk/$gambar' class='product-image'>
    </div>
    <h3 class='product-name'>{$p['nama_produk']}</h3>
    <p class='product-price'>Rp.{$p['harga']}</p>
    </div>";
    } 
?>
    </div>

    <section class="placeholder-section">
        <div class="placeholder-grid">
            <div class="placeholder-box"><img src="Assets/Images/banner1.jpg" alt="" class="placeholder-box"></div>
            <div class="placeholder-box"><img src="Assets/Images/banner2.jpg" alt="" class="placeholder-box"></div>
            <div class="placeholder-box"><img src="Assets/Images/banner3.jpg" alt="" class="placeholder-box"></div>
            <div class="placeholder-box"><img src="Assets/Images/banner4.jpg" alt="" class="placeholder-box"></div>
        </div>
    </section>
</div>
</body>
</html>