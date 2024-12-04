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

// Menyimpan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $message = $_POST['message'];
    $attendance = $_POST['attendance'];

    $stmt = $conn->prepare("INSERT INTO entries (name, message, attendance) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $message, $attendance);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>