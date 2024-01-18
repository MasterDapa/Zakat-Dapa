<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Proses Zakat</title>
</head>
<body>
    <div class="container">
        <h2>Proses Zakat</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jenisZakat = $_POST["jenis_zakat"];
            $jumlahHarta = $_POST["jumlah_harta"];
            $wajibBayar = $_POST["wajib_bayar"];

            // Simpan data atau lakukan operasi lain sesuai kebutuhan
            // Misalnya, simpan data ke database atau lakukan perhitungan lebih lanjut

            // Menampilkan informasi pada nota
            echo "<p>Jenis Zakat: $jenisZakat</p>";
            echo "<p>Jumlah Harta: $jumlahHarta</p>";
            echo "<p>Status Wajib Bayar: $wajibBayar</p>";

            // Tambahkan informasi lain sesuai kebutuhan
        }
        ?>

        <p>Terima kasih atas sumbangan zakat Anda.</p>
        <a href="indeks.php">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
