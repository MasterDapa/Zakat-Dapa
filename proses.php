<?php
class NotaZakat
{
    public function generateNota($jenisZakat, $jumlahHarta)
    {
        function hapusKarakterNonDigit($string)
        {
            return trim(preg_replace("/[^0-9]/", "", $string));
        }

        $result = [];

        switch ($jenisZakat) {
            case "penghasilan":
                $jumlahSumbangan = (int) hapusKarakterNonDigit($_POST["income-amount"]) * 0.025;
                $result = [
                    "Jenis Zakat" => "Penghasilan",
                    "Jumlah Harta" => $jumlahHarta,
                    "Jumlah Sumbangan" => $jumlahSumbangan,
                    "Wajib Bayar" => "Jika Jumlah Harta Anda Kurang dari Rp. 91,205,000 (Pertahun) atau Rp. 7,600,416 (Perbulan) maka Tidak Wajib Bayar",
                    "Ucapan Terimakasih" => "Terima kasih atas sumbangan Zakat Penghasilan Anda.",
                ];
                break;

            case "tabungan":
                $jumlahSumbangan = (int) hapusKarakterNonDigit($_POST["savings-amount"]) * 0.025;
                $result = [
                    "Jenis Zakat" => "Tabungan",
                    "Jumlah Harta" => $jumlahHarta,
                    "Jumlah Sumbangan" => $jumlahSumbangan,
                    "Wajib Bayar" => "Jika Jumlah Harta Anda Kurang dari Rp. 91,205,000 maka Tidak Wajib Bayar",
                    "Ucapan Terimakasih" => "Terima kasih atas sumbangan Zakat Tabungan Anda.",
                ];
                break;

            case "dagangan":
                $modalAwal = (int) hapusKarakterNonDigit($_POST["initial-capital"]);
                $keuntunganSetahun = (int) hapusKarakterNonDigit($_POST["annual-profit"]);
                $jumlahHarta = $keuntunganSetahun - $modalAwal;
                $jumlahSumbangan = $jumlahHarta * 0.025;
                $result = [
                    "Jenis Zakat" => "Dagangan",
                    "Modal Awal" => $modalAwal,
                    "Jumlah Harta" => $jumlahHarta,
                    "Jumlah Sumbangan" => $jumlahSumbangan,
                    "Wajib Bayar" => "Jika Jumlah Harta Anda Kurang dari Rp. 91,205,000 maka Tidak Wajib Bayar",
                    "Ucapan Terimakasih" => "Terima kasih atas sumbangan Zakat Dagangan Anda.",
                ];
                break;

            case "emas":
                $jumlahHarta = (int) hapusKarakterNonDigit($_POST["gold-amount"]);
                $jumlahSumbangan = $jumlahHarta * 0.025;
                $jumlahSumbanganRp = $jumlahSumbangan * 1104000;
                $result = [
                    "Jenis Zakat" => "Emas",
                    "Jumlah Harta" => $jumlahHarta . " gram",
                    "Jumlah Sumbangan (gr)" => $jumlahSumbangan,
                    "Jumlah Sumbangan (Rp.)" => $jumlahSumbanganRp,
                    "Wajib Bayar" => "Jika Jumlah Emas Anda Kurang dari 85 gram maka Tidak Wajib Bayar",
                    "Ucapan Terimakasih" => "Terima kasih atas sumbangan Zakat Emas Anda.",
                ];
                break;
        }

        return $result;
    }
}