<?php
require '../vendor/autoload.php'; // Asegúrate de que la ruta sea correcta si estás usando Composer

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_FILES['archivo']['error'] == UPLOAD_ERR_OK && $_FILES['archivo']['name']) {
    $nombreArchivo = $_FILES['archivo']['name'];
    $rutaTemporal = $_FILES['archivo']['tmp_name'];

    $inputFileType = IOFactory::identify($rutaTemporal);
    $reader = IOFactory::createReader($inputFileType);

    $spreadsheet = $reader->load($rutaTemporal);
    $sheet = $spreadsheet->getActiveSheet();

    $data = array();

    // Iterar sobre las filas y columnas
    foreach ($sheet->getRowIterator() as $row) {
        $rowData = array();
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);

        // Iterar sobre las celdas en la fila
        foreach ($cellIterator as $cell) {
            // Agregar el valor de la celda al subarreglo de datos
            $rowData[] = $cell->getValue();
        }

        // Agregar el subarreglo al arreglo principal de datos
        $data[] = $rowData;
        print_r($data);
    }

    // $data ahora contiene todos los datos del archivo Excel
    print_r($data);
} else {
    echo "Hubo un error al subir el archivo. " . $_FILES['archivo']['error'];
}
?>
