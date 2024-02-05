<?php
session_start();
require '../vendor/autoload.php'; // Asegúrate de que la ruta sea correcta si estás usando Composer
include '../clases/class.conexion.php';
include '../clases/class.vacantes.php';
include '../clases/class.ofertalaboral.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_FILES['archivo']['error'] == UPLOAD_ERR_OK && $_FILES['archivo']['name']) {
    $nombreArchivo = $_FILES['archivo']['name'];
    $rutaTemporal = $_FILES['archivo']['tmp_name'];

    $inputFileType = IOFactory::identify($rutaTemporal);
    $reader = IOFactory::createReader($inputFileType);

    $spreadsheet = $reader->load($rutaTemporal);
    $sheet = $spreadsheet->getActiveSheet();

    $data = array();

    $st = 0;
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

        $st++;
    }

    //ya recopilamos el archivo en un arreglo, ahora lo iteraremos para trabajarlo como matriz
    //cada $i es una fila mientras que el numero siguiente será su posicion, de forma que lo trabajemos como coordenadas, nos saltamos los primeros 3 ya que son encabezados
    for ($i = 3; $i <= count($data); $i++) {
        print_r($data[$i]);
        //Asignamos cada campo a una variable para trabajarla 
        $titulo = $data[$i][0];
        $titreporta = $data[$i][1];
        $planta = $data[$i][2];
        $localidad = $data[$i][3];
        $entidad = $data[$i][4];
        $departamento = $data[$i][5];
        if (isset($data[$i][6]) && $data[$i][6]) {
            if ($excelTimestamp !== null) {
                // Convertir el valor de Excel a una fecha de PHP
                $fechaExpiracion = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($excelTimestamp)->format('Y-m-d');
            } else {
                // Si el valor es nulo, establecer la fechaExpiracion como nulo o como lo necesites
                $fechaExpiracion = null; // o date('Y-m-d') según tu lógica
            }
        }
        //Lo convertí a formato de fecha de php, si lo rellenaron vea, obviamente

        $objet = $data[$i][7];
        $contactos = $data[$i][8];
        $problems = $data[$i][9];
        $salario = $data[$i][10];
        $benefits = $data[$i][11];
        if (isset($date[$i][12])) {
            $expiracion = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($data[$i][12])->format('Y-m-d');
        }

        $contrato = $data[$i][13];
        $alc1 = $data[$i][14];
        $alc2 = $data[$i][15];
        $alc3 = $data[$i][16];
        $alc4 = $data[$i][17];
        $tecnica = $data[$i][18];
        $trunca = $data[$i][19];
        $pasante = $data[$i][20];
        $profesional = $data[$i][21];
        $posgrado = $data[$i][22];
        $idioma1 = $data[$i][23] . ', ' . $data[$i][24] . '%, ' . $data[$i][25] . '%, ' . $data[$i][26];
        $idioma2 = $data[$i][27] . ', ' . $data[$i][28] . '%, ' . $data[$i][29] . '%, ' . $data[$i][30];
        $idioma3 = $data[$i][31] . ', ' . $data[$i][32] . '%, ' . $data[$i][34] . '%, ' . $data[$i][35];
        $habilidades = $data[$i][36];
        $exp1 = $data[$i][37] . ', ' . $data[$i][38];
        if (isset($data[$i][39])) {
            $exp2 = $data[$i][39] . ', ' . $data[$i][40];
        }
        if (isset($data[$i][41])) {
            $exp3 = $data[$i][41] . ', ' . $data[$i][42];
        }

        $descripcion = $objet . ' ' . $alc1 . ' ' . $alc2;

        //Filtramos grado de estudios necesario para colocarlos en los requisitos
        if ($tecnica != 'NO' && $tecnica != 'no' && $tecnica != 'No' && $tecnica != '') {
            $requisitos = 'Carrera técnica '.$tecnica;
            $estudios = $tecnica;
        } else if ($trunca != 'NO' && $trunca != 'no' && $trunca != 'No' && $trunca != '') {
            $requisitos = $trunca;
            $estudios = $trunca;
        } else if ($pasante != 'NO' && $pasante != 'no' && $pasante != 'No' && $pasante != '') {
            $requisitos = $pasante;
            $estudios =  $pasante;
        } else if ($profesional != 'NO' && $tecnica != 'no' && $tecnica != 'No' && $tecnica != '') {
            $requisitos = $profesional;
            $estudios = $profesional;
        } else if ($posgrado != 'NO' && $posgrado != 'no' && $posgrado != 'No' && $posgrado != '') {
            $requisitos = $posgrado;
            $estudios = $posgrado;
        } else {
            $requisitos = '';
            $estudios = "NO";
        }

        $requisitos .= '<br>' . $habilidades;
        if ($idioma1 != '') {
            $requisitos .= '<br>' . $idioma1 . '(leer, escribir, hablar)';
        }
        $oferta = new OfertaLaboral(null, $titulo, $descripcion, $entidad . ', ' . $localidad, $salario, $requisitos, date('Y-m-d'), $expiracion, $_SESSION['ID'], $contrato, $data[$i][38], $benefits);
        $id = $oferta->create();

        $vacante = new vacantes($id, $titreporta, $planta, $departamento, $contactos, $problems, $estudios, $estudios, $exp1 . '|' . $exp2 . '|' . $exp3 . '|', $alc1 . '|' . $alc2 . '|' . $alc3 . '|' . $alc4, $idioma1 . '|' . $idioma2 . '|' . $idioma3, $habilidades);
        $vacante->create();
    }
    // $data ahora contiene todos los datos del archivo Excel

} else {
    echo "Hubo un error al subir el archivo. " . $_FILES['archivo']['error'];
}
