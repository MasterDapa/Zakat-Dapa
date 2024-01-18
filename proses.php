<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Nota Zakat</title>
</head>
<body>
    <div class="container">
        <?php
        // Memeriksa apakah data POST terkirim dan elemen yang dibutuhkan diatur
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jenis_zakat"])) {
            // Memeriksa jenis zakat yang dipilih
            switch ($_POST["jenis_zakat"]) {
                case "penghasilan":
                    // Ambil nilai Jumlah Penghasilan dari POST
                    $jumlah_harta = isset($_POST["income-amount"]) ? $_POST["income-amount"] : 0;

                    // Hitung jumlah sumbangan (2,5% dari Jumlah Penghasilan)
                    $jumlah_sumbangan = $jumlah_harta * 0.025;

                    // Tampilkan nota sesuai dengan jenis zakat
                    echo "<h2>Nota</h2>";
                    echo "<p>Jenis Zakat: Penghasilan</p>";
                    echo "<p>Jumlah Harta: $jumlah_harta</p>";
                    echo "<p>Jumlah Sumbangan: $jumlah_sumbangan</p>";
                    echo "<p>Ucapan Terima Kasih</p>";
                    break;
                
                case "tabungan":
                    // Ambil nilai Saldo Anda dari POST
                    $jumlah_harta = isset($_POST["savings-amount"]) ? $_POST["savings-amount"] : 0;

                    // Hitung jumlah sumbangan (2,5% dari Saldo Anda)
                    $jumlah_sumbangan = $jumlah_harta * 0.025;

                    // Tampilkan nota sesuai dengan jenis zakat
                    echo "<h2>Nota</h2>";
                    echo "<p>Jenis Zakat: Tabungan</p>";
                    echo "<p>Jumlah Harta: $jumlah_harta</p>";
                    echo "<p>Jumlah Sumbangan: $jumlah_sumbangan</p>";
                    echo "<p>Ucapan Terima Kasih</p>";
                    break;

                case "dagangan":
                    // Ambil nilai Modal Awal dan Keuntungan Setahun dari POST
                    $modal_awal = isset($_POST["initial-capital"]) ? $_POST["initial-capital"] : 0;
                    $keuntungan_setahun = isset($_POST["annual-profit"]) ? $_POST["annual-profit"] : 0;

                    // Hitung jumlah sumbangan (2,5% dari Keuntungan Setahun dikurangi Modal Awal)
                    $jumlah_sumbangan = ($keuntungan_setahun - $modal_awal) * 0.025;

                    // Tampilkan nota sesuai dengan jenis zakat
                    echo "<h2>Nota</h2>";
                    echo "<p>Jenis Zakat: Dagangan</p>";
                    echo "<p>Modal Awal: $modal_awal</p>";
                    echo "<p>Jumlah Harta: $keuntungan_setahun</p>";
                    echo "<p>Jumlah Sumbangan: $jumlah_sumbangan</p>";
                    echo "<p>Ucapan Terima Kasih</p>";
                    break;

                case "emas":
                    // Ambil nilai Jumlah Emas dari POST
                    $jumlah_emas = isset($_POST["gold-amount"]) ? $_POST["gold-amount"] : 0;

                    // Hitung jumlah sumbangan (2,5% dari Jumlah Emas)
                    $jumlah_sumbangan = $jumlah_emas * 0.025;

                    // Hitung jumlah sumbangan dalam Rupiah (Rp. 1.104.000 per gram)
                    $jumlah_sumbangan_rp = $jumlah_sumbangan * 1104000;

                    // Tampilkan nota sesuai dengan jenis zakat
                    echo "<h2>Nota</h2>";
                    echo "<p>Jenis Zakat: Emas</p>";
                    echo "<p>Jumlah Harta: $jumlah_emas</p>";
                    echo "<p>Jumlah Sumbangan: $jumlah_sumbangan</p>";
                    echo "<p>Jumlah Sumbangan(Rp.): $jumlah_sumbangan_rp</p>";
                    echo "<p>Ucapan Terima Kasih</p>";
                    break;
                
                default:
                    // Tampilkan pesan kesalahan jika jenis zakat tidak dikenali
                    echo "<p>Error: Jenis Zakat tidak valid</p>";
            }

            // Tambahkan tombol kembali ke Indeks
            echo "<a href='indeks.php'>Kembali ke Indeks</a>";
        } else {
            // Tampilkan pesan jika tidak ada data POST atau data yang dibutuhkan tidak diatur
            echo "<p>Data tidak lengkap</p>";
        }
        ?>
    </div>
</body>
</html>
