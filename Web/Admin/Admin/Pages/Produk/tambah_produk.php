<?php
include 'Function/function.php';
$isiid= autonumber("data_produk", "id_produk", 3, "PRDK");
$isiidf= autonumber("foto_produk", "id_foto", 3, "F");
$kategori = getAllData("kategori", "ORDER BY nama_kategori ASC");


if (isset($_POST['simpan'])) {
insertData("data_produk", [
'id_produk' => $_POST['id_produk'],
'nama_produk' => $_POST['nama_produk'],
'id_kategori' => $_POST['id_kategori'],
'jenis' => $_POST['jenis'],
'harga' => $_POST['harga'],
'stok' => $_POST['stok'],
'deskripsi' => $_POST['deskripsi']
]);


$foto = uploadMultiFoto($_FILES['foto'], 'assets/Images/produk');
foreach ($foto as $f) insertData("foto_produk", ['id_foto' => $isiidf, 'id_produk' => $_POST['id_produk'], 'foto' => $f ]);
header("Location: ../../?pages=produk");
}
?>
<form method="post" enctype="multipart/form-data">
<input type="hidden" value="<?php echo$isiid?>" name="id_produk">

<div class="mb-3">
     <label for="simpleinput" class="form-label">Nama Produk</label>
     <input type="text" id="simpleinput" name="nama_produk" class="form-control" placeholder="Masukkan Nama Produk" required>
</div>
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
<div class="mb-3">
     <label for="simpleinput" class="form-label">Jenis</label>
     <input type="text" id="simpleinput" name="jenis" class="form-control" placeholder="Masukkan Nama Jenis" required>
</div>
<div class="mb-3">
     <label for="simpleinput" class="form-label">Harga</label>
     <input type="number" id="simpleinput" name="harga" class="form-control" placeholder="Masukkan Nama Harga" required>
</div>
<div class="mb-3">
     <label for="simpleinput" class="form-label">Stok</label>
     <input type="number" id="simpleinput" name="stok" class="form-control" placeholder="Masukkan Nama Stok" required>
</div>

Deskripsi:<br>
<textarea name="deskripsi"></textarea><br>

<div class="mb-3">
     <label for="simpleinput" class="form-label">Foto Produk</label>
     <input type="file" id="simpleinput" name="foto[]" class="form-control" placeholder="Masukkan Nama Stok"multiple required>
</div>
<button class="btn btn-success" name="simpan">Simpan</button>
</form>