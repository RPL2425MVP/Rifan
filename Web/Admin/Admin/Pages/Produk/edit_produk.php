<?php
include 'Function/function.php';
$isiidf= autonumber("foto_produk", "id_foto", 0, "F00");

$id = $_GET['id'];
$p = getDataById("data_produk", ['id_produk' => $id]);
$kategori = getAllData("kategori", "ORDER BY nama_kategori ASC");
$foto = $conn->query("SELECT * FROM foto_produk WHERE id_produk='$id'");



if (isset($_POST['update'])) {
updateData("data_produk", [
'nama_produk' => $_POST['nama_produk'],
'id_kategori' => $_POST['id_kategori'],
'jenis' => $_POST['jenis'],
'harga' => $_POST['harga'],
'stok' => $_POST['stok'],
'deskripsi' => $_POST['deskripsi'],
'updated_at' => date('Y-m-d H:i:s')
], ['id_produk' => $id]);


$newFoto = uploadMultiFoto($_FILES['foto'], 'assets/Images/produk');
foreach ($newFoto as $f) insertData("foto_produk", ['id_foto' => $isiidf,'id_produk' => $id, 'foto' => $f]);


header("Location: ../../?pages=produk");
}
?>
<form method="post" enctype="multipart/form-data">

<div class="mb-3">
     <label for="simpleinput" class="form-label">Nama Produk</label>
     <input type="text" id="simpleinput" name="nama_produk" class="form-control" value="<?= $p['nama_produk'] ?>" required>
</div>
<div class="mb-3">
    <label for="simpleinput" class="form-label">kategori</label>
    <select class="form-control" id="choices-single-default" name="id_kategori">
    <?php
     foreach ($kategori as $a => $s) {
        echo "<option value='{$s['id_kategori']}'";if($p == $s['id_kategori'])echo " selected ";echo">{$s['nama_kategori']}</option>";
     }
    ?>
    </select>
</div>
<div class="mb-3">
     <label for="simpleinput" class="form-label">Jenis</label>
     <input type="text" id="simpleinput" name="jenis" class="form-control" value="<?= $p['jenis'] ?>" required>
</div>
<div class="mb-3">
     <label for="simpleinput" class="form-label">Harga</label>
     <input type="number" id="simpleinput" name="harga" class="form-control" value="<?= $p['harga'] ?>" required>
</div>
<div class="mb-3">
     <label for="simpleinput" class="form-label">Stok</label>
     <input type="number" id="simpleinput" name="stok" class="form-control" value="<?= $p['stok'] ?>" required>
</div>

Deskripsi:<br>
<textarea name="deskripsi"><?= $p['deskripsi'] ?></textarea><br>


<h4>Foto Lama</h4>
<?php while ($f = $foto->fetch_assoc()) { ?>
<img src="assets/images/produk/<?= $f['foto'] ?>" width="100">
<?php } ?>
<br>
<div class="mb-3">
     <label for="simpleinput" class="form-label">Foto Baru</label>
     <input type="file" id="simpleinput" name="foto[]" class="form-control" placeholder="Masukkan Nama Stok"multiple>
</div>
<button class="btn btn-success" name="update">Simpan</button>
</form>