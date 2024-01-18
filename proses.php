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
            $wajibBayar = $_POST["status_wajib_bayar"];

            // Set default values for modal_awal and keuntungan_setahun
            $modalAwal = 0;
            $keuntunganSetahun = 0;
            $jumlahHarta = $_POST["jumlah_harta"];

            // Check if modal_awal and keuntungan_setahun are set in $_POST
            if (isset($_POST["modal_awal"])) {
                $modalAwal = $_POST["modal_awal"];
            }

            if (isset($_POST["keuntungan_setahun"])) {
                $keuntunganSetahun = $_POST["keuntungan_setahun"];
            }

            // Calculate jumlah sumbangan based on jenis zakat
            $jumlahSumbangan = 0;

            switch ($jenisZakat) {
                case "penghasilan":
                    $jumlahSumbangan = $jumlahHarta * 0.025; // 2.5% dari penghasilan
                    break;
                case "tabungan":
                    $jumlahSumbangan = $jumlahHarta * 0.025; // 2.5% dari tabungan
                    break;
                case "dagangan":
                    // Untuk dagangan, jumlah sumbangan dihitung berdasarkan keuntungan
                    $jumlahSumbangan = ($jumlahHarta - $modalAwal + $keuntunganSetahun) * 0.025;
                    break;
                case "emas":
                    // Untuk emas, jumlah sumbangan dihitung berdasarkan harga emas
                    $hargaEmas = 1073000; // Harga emas per gram
                    $jumlahSumbangan = $jumlahHarta * $hargaEmas;
                    break;
                default:
                    $jumlahSumbangan = 0; // Default value
            }

            // Tampilkan informasi pada nota
            echo "<p>Jenis Zakat: $jenisZakat</p>";
            echo "<p>Jumlah Harta: $jumlahHarta</p>";
            echo "<p>Status Wajib Bayar: $wajibBayar</p>";

            // Tampilkan jumlah sumbangan
            echo "<p>Jumlah Sumbangan: Rp. " . number_format($jumlahSumbangan, 2) . "</p>";

            // Tambahkan informasi lain sesuai kebutuhan
        }
        ?>

        <p>Terima kasih atas sumbangan zakat Anda.</p>
        <a href="indeks.php">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
