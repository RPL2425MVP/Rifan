<?php 
require 'Function/function.php';

$id = $_GET['id'];
$produk = getDataById("data_produk", ["id_produk" => $id]);

// Ambil foto produk
$fotos = query("SELECT * FROM foto_produk WHERE id_produk = '$id'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $produk['nama_produk'] ?></title>
    <style>
        .product-img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 12px;
        }
        .thumb-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            border: 2px solid transparent;
        }
        .thumb-img:hover {
            border: 2px solid #0d6efd;
        }
        .color-box, .size-box {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .color-box:hover, .size-box:hover {
            background: #d6d6d6;
        }
    </style>
</head>
<body>
<br>
<div class="row g-5">
    
    <!-- ================= LEFT IMAGE SECTION ================= -->
    <div class="col-md-6">

        <!-- Foto utama -->
        <img id="mainImage" 
             src="assets/Images/produk/<?= $fotos[0]['foto'] ?>" 
             class="product-img shadow">

        <!-- Thumbnail foto -->
        <div class="d-flex gap-2 mt-3">
            <?php foreach($fotos as $f) : ?>
                <img src="assets/Images/produk/<?= $f['foto'] ?>" 
                     class="thumb-img"
                     onclick="document.getElementById('mainImage').src=this.src">
            <?php endforeach; ?>
        </div>

    </div>

    <!-- ================= RIGHT DETAIL SECTION ================= -->
    <div class="col-md-6">

        <h1 class="fw-bold"><?= $produk['nama_produk'] ?></h1>

        <div class="text-warning mb-2">★★★★★ <span class="text-muted fs-6">2 Reviews</span></div>

        <h2 class="fw-bold text-dark">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></h2>

        <h5>Warna</h5>
        <div class="d-flex gap-2 mb-3">
            <div class="color-box"></div>
            <div class="color-box bg-dark"></div>
        </div>

        <h5>Ukuran</h5>
        <div class="d-flex gap-2 mb-4">
            <?php for($i=39; $i<=43; $i++): ?>
                <div class="size-box"><?= $i ?></div>
            <?php endfor; ?>
        </div>

    </div>
    <div class="mt-5">
      <h4>Deskripsi</h4>
      <p><?= $produk['deskripsi'] ?></p>
    </div>
    <div class="mt-5">
    <h4>Reviews</h4>
    <div class="mt-3 border-bottom pb-3">
      <strong>Rian</strong> <small class="text-muted">2 hari yang lalu</small>
      <div class="text-warning">★★★★★</div>
      <p>Lorem Ipsum juhndo kelos nmessi uyuy</p>
    </div>

    <div class="mt-3 border-bottom pb-3">
      <strong>Isac</strong> <small class="text-muted">3 hari yang lalu</small>
      <div class="text-warning">★★☆☆☆</div>
      <p>Lorem Ipsum juhndo kelos nmessi uyuy</p>
    </div>

    <div class="mt-4">
      <h3 class="fw-bold d-flex align-items-center">4 <span class="ms-2 text-warning">★★★★☆</span></h3>
      <div class="mt-3">
        <div class="d-flex align-items-center">5★ <div class="flex-grow-1 mx-2 bg-warning" style="height:6px;"></div>1</div>
        <div class="d-flex align-items-center">4★ <div class="flex-grow-1 mx-2 bg-secondary" style="height:6px;"></div>0</div>
        <div class="d-flex align-items-center">3★ <div class="flex-grow-1 mx-2 bg-secondary" style="height:6px;"></div>0</div>
        <div class="d-flex align-items-center">2★ <div class="flex-grow-1 mx-2 bg-warning" style="height:6px;"></div>1</div>
        <div class="d-flex align-items-center">1★ <div class="flex-grow-1 mx-2 bg-secondary" style="height:6px;"></div>0</div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
