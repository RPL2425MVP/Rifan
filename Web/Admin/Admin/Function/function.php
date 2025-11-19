<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "penjualan_online";
$conn = mysqli_connect ($host, $user, $password, $dbname);

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $kotak = [];
    while($kotaks = mysqli_fetch_assoc($result)) {
        $kotak[] = $kotaks;
    }
    return $kotak;
}

function autonumber($tabel, $kolom, $lebar = 0, $awalan){
    global $conn;
    // proses auto number 

    $auto = mysqli_query($conn, "SELECT $kolom FROM $tabel ORDER BY $kolom DESC LIMIT 1") or
    die(mysqli_error($conn));

    $jumlah_record = mysqli_num_rows($auto);
    if ($jumlah_record == 0)
        $nomor = 1;

    else{
        $row = mysqli_fetch_array($auto);
        $nomor = intval(substr($row[0], strlen($awalan))) + 1;
    }
    if ($lebar > 0) 
        $angka = $awalan . str_pad($nomor, $lebar, "0", STR_PAD_LEFT);
    else
        $angka = $awalan . $nomor;
    return $angka;
}

//Create
function insertData($table, $data)
{
    global $conn;
    $fields = implode(",", array_keys($data));
    $values = "'" . implode("','", array_values($data)) . "'";
    $query  = "INSERT INTO $table ($fields) VALUES ($values)";
    return $conn->query($query);
}

//Read
function getAllData($table, $order = "")
{
    global $conn;
    $query = "SELECT * FROM $table $order";
    return $conn->query($query);
}

function getDataById($table, $where)
{
    global $conn;
    $condition = key($where) . "='" . $where[key($where)] . "'";
    $query = "SELECT * FROM $table WHERE $condition";
    return $conn->query($query)->fetch_assoc();
}

//Update
function updateData($table, $data, $where)
{
    global $conn;
    $setQuery = "";
    foreach ($data as $key => $value) {
        $setQuery .= "$key='$value',";
    }
    $setQuery = rtrim($setQuery, ",");

    $condition = key($where) . "='" . $where[key($where)] . "'";

    $query = "UPDATE $table SET $setQuery WHERE $condition";
    return $conn->query($query);
}

//Delete
function deleteData($table, $where)
{
    global $conn;
    $condition = key($where) . "='" . $where[key($where)] . "'";
    $query = "DELETE FROM $table WHERE $condition";
    return $conn->query($query);
}

// === upload multiple foto ===
function uploadMultiFoto($files, $folder) {
$result = [];
foreach ($files['name'] as $i => $name) {
if ($name == '') continue;
$tmp = $files['tmp_name'][$i];
$newName = time() . '-' . rand(1000,9999) . '-' . $name;
move_uploaded_file($tmp, "$folder/$newName");
$result[] = $newName;
}
return $result;
}
?>
