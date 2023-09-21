<?php
include_once '../conn.php';
$conn = getconn();
include_once '../vendor/autoload.php';

$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();
$query = "SELECT id, title,`text`,pic,createDate FROM `post`";
$stmt = $conn->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$table = $section->addTable();
$table->addRow();
$table->addCell(2000)->addText('ID');
$table->addCell(2000)->addText('Title');
$table->addCell(2000)->addText('Text');
$table->addCell(2000)->addText('Pic');
$table->addCell(2000)->addText('Create ate');

foreach ($data as $row) {
    $table->addRow();
    $table->addCell(2000)->addText($row['id']);
    $table->addCell(2000)->addText($row['title']);
    $table->addCell(2000)->addText($row['text']);
    $table->addCell(2000)->addText($row['pic']);
    $table->addCell(2000)->addText($row['createDate']);
}

$filename = 'database_data.docx';
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

// Устанавливаем заголовки для скачивания файла
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="' . $filename . '"'); // Здесь задается имя генерируемого файла
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');

// Отправляем содержимое файла
$objWriter->save("php://output");

// Завершаем выполнение скрипта
exit;
?>
