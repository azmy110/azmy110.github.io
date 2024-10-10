<?php
$servername = "localhost"; // Ganti jika menggunakan server berbeda
$username = "root"; // Ganti jika Anda menggunakan username yang berbeda
$password = ""; // Ganti dengan password Anda jika ada
$dbname = "servicesdb";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
