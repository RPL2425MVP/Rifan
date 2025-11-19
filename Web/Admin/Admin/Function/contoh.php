<form action="proses_tambah_user.php" method="POST">
    <label>ID User</label><br>
    <input type="text" name="id_user"><br><br>

    <label>Nama</label><br>
    <input type="text" name="nama"><br><br>

    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Simpan</button>
</form>
<?php
require "crud.php";  // memanggil function CRUD

$data = [
    "id_user"  => $_POST['id_user'],
    "nama"     => $_POST['nama'],
    "email"    => $_POST['email'],
    "password" => $_POST['password']
];

insertData("account_user", $data);

header("Location: list_user.php");
?>




<?php
require "crud.php";
$users = getAllData("account_user", "ORDER BY nama ASC");
?>

<a href="form_tambah_user.php">Tambah User</a><br><br>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th><th>Nama</th><th>Email</th><th>Aksi</th>
</tr>

<?php while($u = $users->fetch_assoc()): ?>
<tr>
    <td><?= $u['id_user'] ?></td>
    <td><?= $u['nama'] ?></td>
    <td><?= $u['email'] ?></td>
    <td>
        <a href="form_edit_user.php?id=<?= $u['id_user'] ?>">Edit</a> |
        <a href="hapus_user.php?id=<?= $u['id_user'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>



<?php
require "crud.php";
$user = getDataById("account_user", ["id_user" => $_GET['id']]);
?>

<form action="proses_edit_user.php" method="POST">
    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

    <label>Nama</label><br>
    <input type="text" name="nama" value="<?= $user['nama'] ?>"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?= $user['email'] ?>"><br><br>

    <button type="submit">Update</button>
</form>
<?php
require "crud.php";
$user = getDataById("account_user", ["id_user" => $_GET['id']]);
?>

<form action="proses_edit_user.php" method="POST">
    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

    <label>Nama</label><br>
    <input type="text" name="nama" value="<?= $user['nama'] ?>"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?= $user['email'] ?>"><br><br>

    <button type="submit">Update</button>
</form>
<?php
require "crud.php";

$data = [
    "nama"  => $_POST['nama'],
    "email" => $_POST['email']
];

updateData(
    "account_user",
    $data,
    ["id_user" => $_POST['id_user']]
);

header("Location: list_user.php");
?>



<?php
require "crud.php";

deleteData(
    "account_user",
    ["id_user" => $_GET['id']]
);

header("Location: list_user.php");
?>
