<?php
include 'Function/function.php';
$produk = getAllData("data_produk", "");
?>
<a class='btn btn-success' href="?pages=Tambahproduk">Tambah Produk</a>
<div class="product-container">
<?php
    foreach ($produk as $a => $p) {
    $foto = $conn->query("SELECT foto FROM foto_produk WHERE id_produk='{$p['id_produk']}' LIMIT 1");
    $f = $foto->fetch_assoc();
    $gambar = $f ? $f['foto'] : 'noimage.png'; // jika tidak ada foto
    echo "<div class='product-card'>
    <div ><img src='assets/Images/produk/$gambar' class='product-image'>
    </div>
    <h3 class='product-name'>{$p['nama_produk']}</h3>
    <p class='product-price'>{$p['harga']}</p>
    <a class='btn btn-secondary btn-sm' href='?pages=dproduk&id={$p['id_produk']}''>Detail</a>
    <a class='btn btn-warning btn-sm' href='?pages=Editproduk&id={$p['id_produk']}'>Edit</a>
    <button class='btn btn-danger btn-sm'
    data-bs-toggle='modal'
    data-bs-target='#modalHapus'
    data-id='{$p['id_produk']}'>
    Hapus
    </button>
    </div>";
    } 
?>
<!-- <img src='assets/images/{$p['foto']}' alt=""> -->
</div>
<div class="modal fade" id="modalHapus">
 <div class="modal-dialog">
  <form action="" method="POST" class="modal-content">
  <div class="modal-header">
       <h5 class="modal-title">Hapus Produk?</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
  </div>
  <div class="modal-body">
       <input type="hidden" name="id_produk">
       <p>Apakah Anda Yakin Ingin Menghapus Produk Ini?</p>
  </div>
  <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
       <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
  </div>
  </form>
 </div>
</div>

<?php
if (isset($_POST['hapus'])) {
$id = $_POST['id_produk'];
$foto = $conn->query("SELECT * FROM foto_produk WHERE id_produk='$id'");
while ($f = $foto->fetch_assoc()) unlink('assets/Images/produk/' . $f['foto']);
deleteData("foto_produk", ['id_produk' => $id]);
deleteData("data_produk", ['id_produk' => $id]);
echo "<script>location.href='?pages=produk'</script>";
}("Location: ?pages=produk");
?>

<script>
var modalHapus = document.getElementById('modalHapus')
modalHapus.addEventListener('show.bs.modal', function (event) {
  var btn = event.relatedTarget
  var id  = btn.getAttribute('data-id')

  modalHapus.querySelector('input[name="id_produk"]').value = id
})

</script>
