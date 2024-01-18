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
    // Pastikan nilai $_POST["jenis_zakat"] dan $_POST["jumlah_harta"] ada sebelum digunakan
    $jenisZakat = isset($_POST["jenis_zakat"]) ? $_POST["jenis_zakat"] : "";
    $jumlahHarta = isset($_POST["jumlah_harta"]) ? $_POST["jumlah_harta"] : "";

    // Menghitung jumlah sumbangan dan menyimpan ke variable
    $jumlahSumbangan = 0;
    switch ($jenisZakat) {
        case "penghasilan":
        case "tabungan":
        case "emas":
            $jumlahSumbangan = floatval($jumlahHarta) * 0.025;
            break;
        case "dagangan":
            $modalAwal = floatval($_POST["initial-capital"]);
            $keuntunganSetahun = floatval($_POST["annual-profit"]);
            $jumlahSumbangan = ($keuntunganSetahun - $modalAwal) * 0.025;
            break;
    }

    // Jika jenis zakat adalah emas, tambahkan informasi tambahan
    if ($jenisZakat === "emas") {
        $totalSumbangan = $jumlahSumbangan * 1073000;
        echo "<p>Jumlah Sumbangan (Rp.): Rp. " . number_format($totalSumbangan, 0, ',', '.') . "</p>";
    }

    // Menampilkan informasi pada nota
    echo "<p>Jenis Zakat: $jenisZakat</p>";
    echo "<p>Jumlah Harta: $jumlahHarta</p>";
    echo "<p>Jumlah Sumbangan: Rp. " . number_format($jumlahSumbangan, 0, ',', '.') . "</p>";

    // Tampilkan ucapan terima kasih dan tombol kembali ke Halaman Utama
    echo "<p>Terima kasih atas sumbangan zakat Anda.</p>";
    echo '<a href="indeks.php">Kembali ke Halaman Utama</a>';
}
?>
    </div>
</body>
</html>
