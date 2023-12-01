<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mlijo";
$koneksi = mysqli_connect($server, $username, $password, $db);

// memanggil library FPDF
require('../vendor/fpdf/fpdf.php');

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(200, 10, 'DATA PENJUALAN', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(50, 7, 'NAMA', 1, 0, 'C');
$pdf->Cell(75, 7, 'TANGGAL', 1, 0, 'C');
$pdf->Cell(55, 7, 'JUMLAH', 1, 0, 'C');


$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$no = 1;

$query = "SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan";
$query1 = "SELECT SUM(total_pembelian) as totalPembelian FROM pembelian";
$result = mysqli_query($koneksi, $query);
$result1 = mysqli_query($koneksi, $query1);

foreach ($result as $key => $data) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(50, 6, $data['nama_pelanggan'], 1, 0);
    $pdf->Cell(75, 6, $data['tanggal_pembelian'], 1, 0);
    $pdf->Cell(55, 6, number_format($data['total_pembelian']), 1, 1);
}

foreach ($result1 as $key => $data) {
    $pdf->Cell(135, 6, 'TOTAL', 1, 0, );
    $pdf->Cell(55, 6, number_format($data['totalPembelian']), 1, 1, );
}
// $data = mysqli_query($koneksi, "SELECT  * FROM tbl_karyawan");
// while ($d = mysqli_fetch_array($data)) {
//     $pdf->Cell(10, 6, $no++, 1, 0, 'C');
//     $pdf->Cell(50, 6, $d['karyawan_nama'], 1, 0);
//     $pdf->Cell(75, 6, $d['karyawan_alamat'], 1, 0);
//     $pdf->Cell(55, 6, $d['karyawan_email'], 1, 1);
// }

$pdf->Output();

?>