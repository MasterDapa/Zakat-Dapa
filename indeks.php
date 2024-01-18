<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script>
        function updateFormElements(jenis) {
            var modalAwalLabel = document.getElementById("modal_awal_label");
            var modalAwalInput = document.getElementById("modal_awal");
            var keuntunganSetahunLabel = document.getElementById("keuntungan_setahun_label");
            var keuntunganSetahunInput = document.getElementById("keuntungan_setahun");
            var jumlahHartaLabel = document.getElementById("jumlah_harta_label");
            var jumlahHartaInput = document.getElementById("jumlah_harta");

            // Reset visibility for all elements
            modalAwalLabel.style.display = "none";
            modalAwalInput.style.display = "none";
            keuntunganSetahunLabel.style.display = "none";
            keuntunganSetahunInput.style.display = "none";
            jumlahHartaLabel.style.display = "block"; // Default: Show jumlah harta label
            jumlahHartaInput.style.display = "block"; // Default: Show jumlah harta input

            switch (jenis) {
                case "penghasilan":
                    break; // No additional changes needed for penghasilan
                case "dagangan":
                    modalAwalLabel.style.display = "block";
                    modalAwalInput.style.display = "block";
                    keuntunganSetahunLabel.style.display = "block";
                    keuntunganSetahunInput.style.display = "block";
                    jumlahHartaLabel.style.display = "none"; // Hide jumlah harta label
                    jumlahHartaInput.style.display = "none"; // Hide jumlah harta input
                    break;
                case "emas":
                    jumlahHartaLabel.innerText = "Jumlah Emas (gr):";
                    break;
                default:
                    break; // No additional changes needed for other cases
            }
        }

        function formatInputAsNumber(inputId) {
            var inputElement = document.getElementById(inputId);
            inputElement.value = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
        }

        function addRpPrefix(inputId) {
            var inputElement = document.getElementById(inputId);
            if (inputElement.value !== "") {
                inputElement.value = "Rp. " + inputElement.value.replace(/\D/g, '');
            }
        }
    </script>
    <title>Kalkulator Zakat</title>
</head>
<body>
    <div class="header">
        <img src="logo.png" alt="Logo" class="logo">
        <h1>Kalkulator Zakat</h1>
    </div>

    <div class="container">
        <h2>Pilih Jenis Zakat</h2>
        <form method="post" action="proses.php">

            <!-- Gambar yang dapat diklik -->
            <div id="gambar-container">
                <img src="uang.jpeg" alt="Penghasilan" onclick="updateFormElements('penghasilan')">
                <img src="tabungan.png" alt="Tabungan" onclick="updateFormElements('tabungan')">
                <img src="dagangan.png" alt="Dagangan" onclick="updateFormElements('dagangan')">
                <img src="emas.jpeg" alt="Emas" onclick="updateFormElements('emas');">
            </div>

            <!-- Additional fields for 'dagangan' -->
            <br>
            <label id="modal_awal_label" for="modal_awal" style="display:none">Modal Awal:</label>
            <input type="text" name="modal_awal" id="modal_awal" style="display:none" placeholder="Modal Awal (Rp.)" oninput="formatInputAsNumber('modal_awal'); addRpPrefix('modal_awal');">
            
            <label id="keuntungan_setahun_label" for="keuntungan_setahun" style="display:none">Keuntungan Setahun:</label>
            <input type="text" name="keuntungan_setahun" id="keuntungan_setahun" style="display:none" placeholder="Keuntungan Setahun (Rp.)" oninput="formatInputAsNumber('keuntungan_setahun'); addRpPrefix('keuntungan_setahun');">
            
            <!-- Jumlah Harta -->
            <br>
            <label id="jumlah_harta_label" for="jumlah_harta">Jumlah Harta (Rp.):</label>
            <input type="text" name="jumlah_harta" id="jumlah_harta" placeholder="Jumlah Harta (Rp.)" oninput="formatInputAsNumber('jumlah_harta'); addRpPrefix('jumlah_harta');">
            
            <!-- Status Wajib Bayar -->
            <br>
            <label for="status_wajib_bayar">Status Wajib Bayar:</label>
            <span id="status_wajib_bayar"></span>
            <br>

            <!-- Submit Button -->
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
