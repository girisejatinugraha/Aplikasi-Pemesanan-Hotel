<?php

require_once "config/config.php"; 
require_once "vendor/autoload.php"; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];

    $query = $conn->prepare("SELECT * FROM transaksi WHERE id_transaksi = :id_transaksi");
    $query->bindParam(":id_transaksi", $id_transaksi);
    $query->execute();

    $item = $query->fetch(PDO::FETCH_OBJ);

    if ($item) {
        $sqlKamar = sprintf("SELECT * FROM kamar WHERE kamar = '%s'", $item->kamar);
        $queryKamar = $conn->prepare($sqlKamar);
        $queryKamar->execute();
        $itemKamar = $queryKamar->fetch(PDO::FETCH_OBJ);

        $harga = $itemKamar->harga;
        $subtotal = $harga * $item->lama_inap;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Kamar');
        $sheet->setCellValue('B1', 'Nama Pelanggan');
        $sheet->setCellValue('C1', 'Lama Inap');
        $sheet->setCellValue('D1', 'Harga');
        $sheet->setCellValue('E1', 'Total Bayar');
        $sheet->setCellValue('F1', 'Tanggal Transaksi');

        $sheet->setCellValue('A2', $item->kamar);
        $sheet->setCellValue('B2', $item->nm_user);
        $sheet->setCellValue('C2', $item->lama_inap);
        $sheet->setCellValue('D2', $harga);
        $sheet->setCellValue('E2', $subtotal);
        $sheet->setCellValue('F2', $item->tgl_transaksi);

        $filename = 'laporan_transaksi_' . $id_transaksi . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}

header('Location: laporan.php');
exit();

?>
