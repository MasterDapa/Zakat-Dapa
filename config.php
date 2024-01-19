<?php
$host = "localhost"; // Ganti dengan host Anda
$username = "root"; // Ganti dengan username Anda
$password = ""; // Ganti dengan password Anda
$database = "nama_database"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
