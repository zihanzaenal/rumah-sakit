<?php
require 'excel/vendor/autoload.php';
include('koneksi.php');   

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
$spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(true);
$spreadsheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(20, 'pt');
$spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(15, 'cm');
$sheet = $spreadsheet->getActiveSheet();

// sheet peratama
$sheet->setTitle('Sheet 1');
$sheet->setCellValue('A1', 'No ID');
$sheet->setCellValue('B1', 'Nama Pasien');
$sheet->setCellValue('C1', 'Nama Dokter');
$sheet->setCellValue('D1', 'Nama Penyakit');
$sheet->setCellValue('E1', 'Keterangan');

// membaca data dari mysql
$result = mysqli_query($koneksi, "select * from pasien") or die(mysqli_error($koneksi));
$row = 2;
while($record = mysqli_fetch_array($result))
{
    $sheet->setCellValue('A'.$row, $record['no_id']);
    $sheet->setCellValue('B'.$row, $record['nama_pasien']);
    $sheet->setCellValue('C'.$row, $record['nama_dokter']);
    $sheet->setCellValue('D'.$row, $record['nama_penyakit']);
    $sheet->setCellValue('E'.$row, $record['keterangan']);
    $row++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="data-rs.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>