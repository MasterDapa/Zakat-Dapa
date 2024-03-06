<?php
include "proses.php";
// Proses form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenisZakat = $_POST["jenis_zakat"];
    $jumlahHarta = $_POST["jumlah_harta"];

    $notaGenerator = new NotaZakat();
    $nota = $notaGenerator->generateNota($jenisZakat, $jumlahHarta);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script>
        function showIncome() {
            document.getElementById("income-container").style.display = "block";
            document.getElementById("savings-container").style.display = "none";
            document.getElementById("trading-container").style.display = "none";
            document.getElementById("gold-container").style.display = "none";
            document.getElementById("jenis_zakat").value = "penghasilan";
            updateJumlahHarta("penghasilan");
        }

        function showSavings() {
            document.getElementById("income-container").style.display = "none";
            document.getElementById("savings-container").style.display = "block";
            document.getElementById("trading-container").style.display = "none";
            document.getElementById("gold-container").style.display = "none";
            document.getElementById("jenis_zakat").value = "tabungan";
            updateJumlahHarta("tabungan");

        }

        function showTrading() {
            document.getElementById("income-container").style.display = "none";
            document.getElementById("savings-container").style.display = "none";
            document.getElementById("trading-container").style.display = "block";
            document.getElementById("gold-container").style.display = "none";
            document.getElementById("jenis_zakat").value = "dagangan";
            updateJumlahHarta("dagangan");
        }

        function showGold() {
            document.getElementById("income-container").style.display = "none";
            document.getElementById("savings-container").style.display = "none";
            document.getElementById("trading-container").style.display = "none";
            document.getElementById("gold-container").style.display = "block";
            document.getElementById("jenis_zakat").value = "emas";
            updateJumlahHarta("emas");
        }

        function updateJumlahHarta(jenis) {
            var inputJumlahHarta = document.getElementById("jumlah_harta");
            var inputWajibBayar = document.getElementById("wajib_bayar");
            var jenisZakatInput = document.getElementById("jenis_zakat");

            jenisZakatInput.value = jenis; // Set jenis_zakat input field

            switch (jenis) {
                case "penghasilan":
                    inputJumlahHarta.placeholder = "Total Penghasilan (Rp.)";
                    break;
                case "tabungan":
                    inputJumlahHarta.placeholder = "Saldo Tabungan (Rp.)";
                    break;
                case "dagangan":
                    inputJumlahHarta.placeholder = "Total Dagangan (Rp.)";
                    break;
                case "emas":
                    inputJumlahHarta.placeholder = "Total Emas (gr)";
                    break;
                default:
                    inputJumlahHarta.placeholder = "Jumlah Harta";
            }
        }

        function formatCurrency(element) {
            // Format angka dengan menambahkan "Rp." di depannya
            var value = element.value.replace(/[^\d]/g, '');
            if (value.length > 0) {
                value = "Rp. " + Number(value).toLocaleString();
            }
            element.value = value;

            // Update hidden input field for jumlah_harta
            var inputJumlahHarta = document.getElementById("jumlah_harta");
            inputJumlahHarta.value = Number(value.replace(/[^\d]/g, ''));
        }
    </script>
    <title>Kalkulator Zakat</title>
</head>

<body onload="showIncome()">
    <div class="header">
        <h1>Kalkulator Zakat</h1>
        <img src="logo.png" alt="Logo" class="logo">
    </div>

    <div class="container">
        <h2>Pilih Jenis Zakat</h2>
        <form method="post" action="">
            <div id="gambar-container">
                <img src="uang.png" alt="Penghasilan" onclick="showIncome()">
                <span>Penghasilan</span>
                <img src="tabungan.png" alt="Tabungan" onclick="showSavings()">
                <span>Tabungan</span>
                <img src="dagangan.png" alt="Dagangan" onclick="showTrading()">
                <span>Dagangan</span>
                <img src="emas.png" alt="Emas" onclick="showGold()">
                <span>Emas</span>
            </div>

            <!-- Penghasilan -->
            <div id="income-container">
                <label for="income-type">Pilih Periode:</label>
                <select name="income-type" id="income-type">
                    <option value="monthly">Per Bulan</option>
                    <option value="yearly">Per Tahun</option>
                </select>
                <br>
                <label for="income-amount">Jumlah Penghasilan:</label>
                <input type="text" name="income-amount" id="income-amount" placeholder="Masukkan Jumlah Penghasilan Anda" oninput="formatCurrency(this)">
                <br>
                <label for="initial-capital">Pengeluaran:</label>
                <input type="text" name="initial-capital" id="initial-capital" placeholder="Masukkan Jumah Pengeluaran Anda" oninput="formatCurrency(this)">
                <br>
                <label for="annual-profit">Pendapatan Lain (Bonus,THR):</label>
                <input type="text" name="annual-profit" id="annual-profit" placeholder="Opsional" oninput="formatCurrency(this)">
            </div>

            <!-- Tabungan -->
            <div id="savings-container" style="display: none;">
                <label for="savings-amount">Saldo Anda:</label>
                <input type="text" name="savings-amount" id="savings-amount" placeholder="Masukkan Jumlah Tabungan Anda" oninput="formatCurrency(this)">
                <br>
                <label for="annual-profit">Bunga (jika ada):</label>
                <input type="text" name="annual-profit" id="annual-profit" placeholder="Opsional" oninput="formatCurrency(this)">
            </div>

            <!-- Dagangan -->
            <div id="trading-container" style="display: none;">
                <label for="initial-capital">Modal Awal:</label>
                <input type="text" name="initial-capital" id="initial-capital" placeholder="Masukkan Jumah Modal Anda" oninput="formatCurrency(this)">
                <br>
                <label for="annual-profit">Keuntungan Setahun:</label>
                <input type="text" name="annual-profit" id="annual-profit" placeholder="Masukkan Keuntungan Anda" oninput="formatCurrency(this)">
                <br>
                <label for="annual-profit">Kerugian:</label>
                <input type="text" name="annual-profit" id="annual-profit" placeholder="Opsional" oninput="formatCurrency(this)">
                <br>
                <label for="annual-profit">Piutang Dagang:</label>
                <input type="text" name="annual-profit" id="annual-profit" placeholder="Opsional" oninput="formatCurrency(this)">
                <br>
                <label for="annual-profit">Utang Jatuh Tempo:</label>
                <input type="text" name="annual-profit" id="annual-profit" placeholder="Opsional" oninput="formatCurrency(this)">
            </div>

            <!-- Emas -->
            <div id="gold-container" style="display: none;">
                <label for="gold-amount">Jumlah Emas:</label>
                <input type="text" name="gold-amount" id="gold-amount" placeholder="Masukkan Total Berat Emas">
            </div>

            <!-- Hidden Input Fields -->
            <input type="hidden" name="jenis_zakat" id="jenis_zakat">
            <input type="hidden" name="jumlah_harta" id="jumlah_harta">
            <input type="hidden" name="wajib_bayar" id="wajib_bayar">

            <!-- Submit Button -->
            <input type="submit" value="Submit" name="Submit">
        </form>

        <?php if (isset($_POST["Submit"])) : ?>
            <div class="nota">
                <h1>Nota Zakat</h1>
                <?php if ($nota["Jenis Zakat"] == "Penghasilan") : ?>
                    <p class="modal_awal">Jumlah Penghasilan : <?= number_format($nota["Jumlah Harta"]) ?></p>
                    <p class="jml_harta">Pengeluaran : <?= number_format($nota["Pengeluaran"]) ?></p>
                    <p class="jml_sumbangan">Jumlah Sumbangan : <?= number_format($nota["Jumlah Sumbangan"]) ?></p>
                    <p class="wajib_bayar"><?= $nota["Wajib Bayar"] ?></p>
                    <p class="terimakasih"><?= $nota["Ucapan Terimakasih"] ?></p>
                    <a href="">Kembali</a>
                <?php elseif ($nota["Jenis Zakat"] == "Dagangan") : ?>
                    <p class="modal_awal">Modal Awal : <?= number_format($nota["Modal Awal"]) ?></p>
                    <p class="jml_harta">Jumlah Harta : <?= number_format($nota["Jumlah Harta"]) ?></p>
                    <p class="jml_sumbangan">Jumlah Sumbangan : <?= number_format($nota["Jumlah Sumbangan"]) ?></p>
                    <p class="wajib_bayar"><?= $nota["Wajib Bayar"] ?></p>
                    <p class="terimakasih"><?= $nota["Ucapan Terimakasih"] ?></p>
                    <a href="">Kembali</a>
                <?php elseif ($nota["Jenis Zakat"] == "Emas") : ?>
                    <p class="jml_harta">Jumlah Harta : <?= $nota["Jumlah Harta"] ?></p>
                    <p class="jml_sumbangan_gr">Jumlah Sumbangan (gr) : <?= $nota["Jumlah Sumbangan (gr)"] ?></p>
                    <p class="jml_sumbangan_gr">Jumlah Sumbangan (Rp) : <?= number_format($nota["Jumlah Sumbangan (Rp.)"]) ?></p>
                    <p class="wajib_bayar"><?= $nota["Wajib Bayar"] ?></p>
                    <p class="terimakasih"><?= $nota["Ucapan Terimakasih"] ?></p>
                    <a href="">Kembali</a>
                <?php else : ?>
                    <p class="jml_harta">Jumlah Harta : <?= number_format($nota["Jumlah Harta"]) ?></p>
                    <p class="jml_sumbangan">Jumlah Sumbangan : <?= number_format($nota["Jumlah Sumbangan"]) ?></p>
                    <p class="wajib_bayar"><?= $nota["Wajib Bayar"] ?></p>
                    <p class="terimakasih"><?= $nota["Ucapan Terimakasih"] ?></p>
                    <a href="">Kembali</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    
</body>

</html>