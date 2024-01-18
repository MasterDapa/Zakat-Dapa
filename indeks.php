<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script>
        function selectJenisZakat(jenis) {
            var selectJenisZakat = document.getElementById("jenis_zakat");
            selectJenisZakat.value = jenis;
            updateJumlahHarta(jenis);
        }

        function updateJumlahHarta(jenis) {
            var inputJumlahHarta = document.getElementById("jumlah_harta");
            var inputWajibBayar = document.getElementById("wajib_bayar");

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

            // Logika untuk menentukan status "Wajib Bayar" atau "Tidak Wajib Bayar tapi Bisa Infaq"
            var jumlahHarta = parseFloat(inputJumlahHarta.value);
            var wajibBayar = false;

            if (jenis === "penghasilan" && jumlahHarta > 91545000) {
                wajibBayar = true;
            } else if (jenis === "tabungan" && jumlahHarta > 46750000) {
                wajibBayar = true;
            } else if (jenis === "dagangan") {
                var modalAwal = parseFloat(prompt("Masukkan Modal Awal Dagangan (Rp.)"));
                if (jumlahHarta - modalAwal > 0) {
                    wajibBayar = true;
                }
            } else if (jenis === "emas" && jumlahHarta > 85) {
                wajibBayar = true;
            }

            inputWajibBayar.value = wajibBayar ? "Wajib Bayar" : "Tidak Wajib Bayar tapi Bisa Infaq";
        }
    </script>
    <title>Kalkulator Zakat</title>
</head>
<body>
    <div class="header">
        <h1>Kalkulator Zakat</h1>
        <img src="logo.png" alt="Logo" class="logo">
    </div>

    <div class="container">
        <h2>Pilih Jenis Zakat</h2>
        <form method="post" action="proses.php">
            <label for="jenis_zakat">Jenis Zakat:</label>
            <select name="jenis_zakat" id="jenis_zakat" onchange="updateJumlahHarta(this.value)">
                <option value="penghasilan">Penghasilan (Rp.)</option>
                <option value="tabungan">Tabungan (Rp.)</option>
                <option value="dagangan">Dagangan (Rp.)</option>
                <option value="emas">Emas (gr)</option>
            </select>

            <!-- Gambar yang dapat diklik -->
            <div id="gambar-container">
                <img src="uang.jpeg" alt="Penghasilan" onclick="selectJenisZakat('penghasilan')">
                <img src="tabungan.png" alt="Tabungan" onclick="selectJenisZakat('tabungan')">
                <img src="dagangan.png" alt="Dagangan" onclick="selectJenisZakat('dagangan')">
                <img src="emas.jpeg" alt="Emas" onclick="selectJenisZakat('emas')">
            </div>

            <!-- Jumlah Harta -->
            <br>
            <label for="jumlah_harta">Jumlah Harta:</label>
            <input type="text" name="jumlah_harta" id="jumlah_harta" placeholder="Jumlah Harta">
            
            <!-- Status Wajib Bayar -->
            <label for="wajib_bayar">Status Wajib Bayar:</label>
            <input type="text" name="wajib_bayar" id="wajib_bayar" readonly>
            <br>

            <!-- Submit Button -->
            <input type="submit" value="Submit">
        </form>
    </div>

    <div class="footer">
        <p>by Master Dava</p>
    </div>
</body>
</html>
