<?php 
require 'Function/function.php';
$kategori = getAllData("kategori", "");
?>
<div class="card">
                                   <div class="card-body">
                                        <h5 class="card-title mb-1 anchor" id="responsive">
                                             Data Kategori<a class="anchor-link" href="#responsive">#</a>
                                        </h5>
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah Kategori
                                        </button>
                                        <div class="table-responsive">
                                             <table class="table table-hover table-centered">
                                                  <thead class="table-light">
                                                       <tr>
                                                            <th>ID</th>
                                                            <th>Nama Kategori</th>
                                                            <th>Action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <?php
                                                       foreach ($kategori as $a => $s) {
                                                            echo "<tr>";
                                                                 echo "<td>{$s['id_kategori']}</td>";
                                                                 echo "<td>{$s['nama_kategori']}</td>";
                                                                 echo "<td><button class='btn btn-success btn-sm'
                                                                      data-bs-toggle='modal'
                                                                      data-bs-target='#modalEdit'
                                                                      data-id='{$s['id_kategori']}'
                                                                      data-nama='{$s['nama_kategori']}'>
                                                                      Edit
                                                                      </button>
                                                                      <button class='btn btn-danger btn-sm'
                                                                      data-bs-toggle='modal'
                                                                      data-bs-target='#modalHapus'
                                                                      data-id='{$s['id_kategori']}'>
                                                                      Hapus
                                                                      </button>

                                                                      </td>
                                                                 ";
                                                            echo "</tr>"; 
                                                       }
                                                       ?>
                                                  </tbody>
                                             </table>
                                             <!-- Edit -->
                                             <div class="modal fade" id="modalEdit">
                                              <div class="modal-dialog">
                                                  <form action="" method="POST" class="modal-content">
                                                  <div class="modal-header">
                                                       <h5 class="modal-title">Edit Kategori</h5>
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                       <input type="hidden" id="edit_id" name="id_kategori">
                                                       <label>Nama Kategori</label>
                                                       <input type="text" id="edit_nama" name="nama_kategori" class="form-control" required>
                                                  </div>
                                                  <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                       <button type="submit" name="update" class="btn btn-success">Update</button>
                                                  </div>
                                                  </form>
                                              </div>
                                             </div>

                                             <!-- Tambah -->
                                             <div class="modal fade" id="modalTambah">
                                              <div class="modal-dialog">
                                                  <form action="" method="POST" class="modal-content">
                                                  <div class="modal-header">
                                                       <h5 class="modal-title">Tambah Kategori</h5>
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                       <label>Nama Kategori</label>
                                                       <input type="text" name="nama_kategori" class="form-control" required>
                                                  </div>
                                                  <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                       <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                                                  </div>
                                                  </form>
                                              </div>
                                             </div>

                                             <!-- Hapus -->
                                             <div class="modal fade" id="modalHapus">
                                              <div class="modal-dialog">
                                                  <form action="" method="POST" class="modal-content">
                                                  <div class="modal-header">
                                                       <h5 class="modal-title">Hapus Kategori?</h5>
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                       <input type="hidden" name="id_kategori">
                                                       <p>Apakah Anda Yakin Ingin Menghapus Kategori Ini?</p>
                                                  </div>
                                                  <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                       <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                                  </div>
                                                  </form>
                                              </div>
                                             </div>

<?php
if (isset($_POST['update'])) {
    updateData("kategori", [
        "nama_kategori" => $_POST['nama_kategori']
    ], [
        "id_kategori" => $_POST['id_kategori']
    ]);
    echo "<script>location.href='?pages=kategori'</script>";
}

$isiid= autonumber("kategori", "id_kategori", 0, "KTG00");
if (isset($_POST['simpan'])) {
    insertData("kategori", [
        "id_kategori"   => $isiid,
        "nama_kategori" => $_POST['nama_kategori']
    ]);
    echo "<script>location.href='?pages=kategori'</script>";
}

if (isset($_POST['hapus'])) {
    deleteData("kategori", [
        "id_kategori" => $_POST['id_kategori']
]);
    echo "<script>location.href='?pages=kategori'</script>";
}
?>
<script>
var modalEdit = document.getElementById('modalEdit')
modalEdit.addEventListener('show.bs.modal', function (event) {
    var btn  = event.relatedTarget
    var id   = btn.getAttribute('data-id')
    var nama = btn.getAttribute('data-nama')

    modalEdit.querySelector('#edit_id').value = id
    modalEdit.querySelector('#edit_nama').value = nama
})

var modalHapus = document.getElementById('modalHapus')
modalHapus.addEventListener('show.bs.modal', function (event) {
  var btn = event.relatedTarget
  var id  = btn.getAttribute('data-id')

  modalHapus.querySelector('input[name="id_kategori"]').value = id
})

</script>
                                        </div>
                                   </div> <!-- end card body -->