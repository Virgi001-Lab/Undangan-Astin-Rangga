<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "db_komentar";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data
$result = $conn->query("SELECT * FROM entries ORDER BY created_at DESC");
$entries = [];
while ($row = $result->fetch_assoc()) {
    $entries[] = $row;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($entries);
?>