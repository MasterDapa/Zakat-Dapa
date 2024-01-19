<?php
class NotaZakat {
    public function generateNota($jenisZakat, $jumlahHarta) {
        $result = [];

        switch ($jenisZakat) {
            case "penghasilan":
                $jumlahSumbangan = $jumlahHarta * 0.025;
                $result = [
                    "Jenis Zakat" => "Penghasilan",
                    "Jumlah Harta" => $jumlahHarta,
                    "Jumlah Sumbangan" => $jumlahSumbangan,
                    "Ucapan Terimakasih" => "Terima kasih atas sumbangan Zakat Penghasilan Anda.",
                ];
                break;

            case "tabungan":
                $jumlahSumbangan = $jumlahHarta * 0.025;
                $result = [
                    "Jenis Zakat" => "Dagangan",
                    "Jumlah Harta" => $jumlahHarta,
                    "Jumlah Sumbangan" => $jumlahSumbangan,
                    "Ucapan Terimakasih" => "Terima kasih atas sumbangan Zakat Tabungan Anda.",
                ];
                break;

            case "dagangan":
                $modalAwal = $_POST["modal_awal"];
                $keuntunganSetahun = $_POST["keuntungan_setahun"];
                $jumlahHarta = $keuntunganSetahun - $modalAwal;
                $jumlahSumbangan = $jumlahHarta * 0.025;
                $result = [
                    "Jenis Zakat" => "Dagangan",
                    "Modal Awal" => $modalAwal,
                    "Jumlah Harta" => $jumlahHarta,
                    "Jumlah Sumbangan" => $jumlahSumbangan,
                    "Ucapan Terimakasih" => "Terima kasih atas sumbangan Zakat Dagangan Anda.",
                ];
                break;

            case "emas":
                $jumlahSumbangan = $jumlahHarta * 0.025;
                $jumlahSumbanganRp = $jumlahSumbangan * 1104000;
                $result = [
                    "Jenis Zakat" => "Emas",
                    "Jumlah Harta" => $jumlahHarta,
                    "Jumlah Sumbangan (gr)" => $jumlahSumbangan,
                    "Jumlah Sumbangan (Rp.)" => $jumlahSumbanganRp,
                    "Ucapan Terimakasih" => "Terima kasih atas sumbangan Zakat Emas Anda.",
                ];
                break;
        }

        return $result;
    }
}

// Proses form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenisZakat = $_POST["jenis_zakat"];
    $jumlahHarta = $_POST["jumlah_harta"];

    $notaGenerator = new NotaZakat();
    $nota = $notaGenerator->generateNota($jenisZakat, $jumlahHarta);

    // Tampilkan nota atau simpan di database sesuai kebutuhan
    print_r($nota);
}
?>
