<?php
include_once('config.php');

// Memastikan form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil nilai dari formulir
    $jenisZakat = $_POST['jenis_zakat'];
    $jumlahHarta = $_POST['jumlah_harta'];
    $wajibBayar = $_POST['wajib_bayar'];
    
    // Memasukkan data ke dalam database
    $sql = "INSERT INTO transactions (user_id, jenis_zakat, jumlah_harta, wajib_bayar) VALUES ($user_id, '$jenisZakat', $jumlahHarta, '$wajibBayar')";

    if ($conn->query($sql) === TRUE) {
        echo "Nota Zakat berhasil dibuat. Terima kasih!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
