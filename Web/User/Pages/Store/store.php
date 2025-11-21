<?php 
require 'Function/function.php';

// Ambil semua produk
$kategori = getAllData("kategori", "");
$produk = query("
    SELECT * FROM data_produk
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .product-card {
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            padding: 10px;
            background: #fff;
            transition: .2s;
        }
        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .product-img {
            width: 100%;
            height: 160px;
            border-radius: 10px;
            object-fit: cover;
            background: #000;
        }
        .discount-badge {
            position: absolute;
            top: 8px;
            left: 8px;
            background: #6fe3ff;
            color: #fff;
            padding: 4px 10px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
        }
        .sidebar {
            background: #f2f2f2;
            padding: 20px;
            border-radius: 8px;
        }
    </style>

</head>
<body>
<br>
<div class="row">

    <!-- =================== SIDEBAR =================== -->
    <div class="col-md-3">
        <div class="sidebar shadow-sm">
            <h5 class="fw-bold">Filter</h5>

            <div class="mb-3">
                <label for="simpleinput" class="form-label">kategori</label>
                <select class="form-control" id="choices-single-default" name="id_kategori">
                    <?php
                    foreach ($kategori as $a => $s) {
                        echo "<option value='{$s['id_kategori']}'>{$s['nama_kategori']}</option>";
                    }
                    ?>
                </select>
            </div>

            <h6 class="fw-bold">Harga</h6>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="harga">
                <label class="form-check-label">Tinggi → Kecil</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="harga">
                <label class="form-check-label">Kecil → Tinggi</label>
            </div>
        </div>
    </div>

    <!-- =================== LIST PRODUK =================== -->
    <div class="col-md-9">

        <!-- search bar -->
        <div class="d-flex justify-content-center mb-4">
            <div class="input-group" style="width: 60%;">
                <input type="text" class="form-control" placeholder="Cari Produk...">
                <button class="btn btn-primary"><i class="bi bi-search"></i></button>
            </div>
        </div>

        <div class="row g-4">

            <?php foreach($produk as $p): ?>

                <?php 
                    // ambil foto pertama produk
                    $foto = query("SELECT * FROM foto_produk WHERE id_produk = '{$p['id_produk']}' LIMIT 1");
                    $gambar = $foto ? $foto[0]['foto'] : "noimg.png";
                ?>

                <div class="col-6 col-md-4 col-lg-3">

                    <a href="?pages=dproduk&id=<?= $p['id_produk'] ?>" style="text-decoration: none; color:black;">
                        <div class="product-card position-relative">

                            <!-- Diskon -->
                            <!-- <span class="discount-badge">50%</span> -->

                            <!-- Gambar produk -->
                            <img src="../Admin/Admin/assets/Images/produk/<?= $gambar ?>" class="product-img">

                            <!-- Nama Produk -->
                            <div class="mt-2 fw-bold"><?= $p['nama_produk'] ?></div>

                            <!-- Harga -->
                            <div class="text-dark">Rp. <?= number_format($p['harga'], 0, ',', '.') ?></div>

                        </div>
                    </a>

                </div>

            <?php endforeach; ?>

        </div>
    </div>

</div>

</body>
</html>
