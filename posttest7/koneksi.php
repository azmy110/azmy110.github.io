<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "servicesdb";

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Hapus echo "Koneksi berhasil"; karena ini bisa mengganggu output JSON
?>