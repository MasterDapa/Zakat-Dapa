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
        }

        function showSavings() {
            document.getElementById("income-container").style.display = "none";
            document.getElementById("savings-container").style.display = "block";
            document.getElementById("trading-container").style.display = "none";
            document.getElementById("gold-container").style.display = "none";
        }

        function showTrading() {
            document.getElementById("income-container").style.display = "none";
            document.getElementById("savings-container").style.display = "none";
            document.getElementById("trading-container").style.display = "block";
            document.getElementById("gold-container").style.display = "none";
        }

        function showGold() {
            document.getElementById("income-container").style.display = "none";
            document.getElementById("savings-container").style.display = "none";
            document.getElementById("trading-container").style.display = "none";
            document.getElementById("gold-container").style.display = "block";
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
        <div id="gambar-container">
            <img src="uang.jpeg" alt="Penghasilan" onclick="showIncome()">
            <img src="tabungan.png" alt="Tabungan" onclick="showSavings()">
            <img src="dagangan.png" alt="Dagangan" onclick="showTrading()">
            <img src="emas.jpeg" alt="Emas" onclick="showGold()">
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
            <input type="text" name="income-amount" id="income-amount" placeholder="Masukkan Angka Nominal" oninput="formatCurrency(this)">
        </div>

        <!-- Tabungan -->
        <div id="savings-container" style="display: none;">
            <label for="savings-amount">Saldo Anda:</label>
            <input type="text" name="savings-amount" id="savings-amount" placeholder="Masukkan Angka Nominal" oninput="formatCurrency(this)">
        </div>

        <!-- Dagangan -->
        <div id="trading-container" style="display: none;">
            <label for="initial-capital">Modal Awal:</label>
            <input type="text" name="initial-capital" id="initial-capital" placeholder="Masukkan Angka Nominal" oninput="formatCurrency(this)">
            <br>
            <label for="annual-profit">Keuntungan Setahun:</label>
            <input type="text" name="annual-profit" id="annual-profit" placeholder="Masukkan Angka Nominal" oninput="formatCurrency(this)">
        </div>

        <!-- Emas -->
        <div id="gold-container" style="display: none;">
            <label for="gold-amount">Jumlah Emas:</label>
            <input type="text" name="gold-amount" id="gold-amount" placeholder="Masukkan Angka Nominal">
        </div>

        <!-- Submit Button -->
        <input type="submit" value="Submit">
    </div>

    <script>
        function formatCurrency(element) {
            // Format angka dengan menambahkan "Rp." di depannya
            var value = element.value.replace(/[^\d]/g, '');
            if (value.length > 0) {
                value = "Rp. " + Number(value).toLocaleString();
            }
            element.value = value;
        }
    </script>
</body>
</html>
