<?php
require 'library/phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "huapango_bd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// var_dump($_POST);

// Procesar formulario cuando se presiona el botón "Confirmar"

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_completo_participante = $_POST["nombre_completo_participante"];
    $fecha_nacimiento_participante = $_POST["fecha_nac_participante"];
    $nombre_completo_pareja = $_POST["nombre_completo_pareja"];
    $fecha_nacimiento_pareja = $_POST["fecha_nac_pareja"];
    $telefono_contacto = $_POST["telefono_contacto"];
    $representacion = $_POST["grupo_pareja"];
    $curp_participante = $_POST["curp_participante"] ? 1 : 0;
    $acta_nac_participante = $_POST["acta_participante"] ? 1 : 0;
    $ine_participante = $_POST["ine_participante"] ? 1 : 0;
    $fotografia_participante = $_POST["fotografias_participante"] ? 1 : 0;
    $curp_pareja = $_POST["curp_pareja"] ? 1 : 0;
    $acta_nac_pareja = $_POST["acta_pareja"] ? 1 : 0;
    $ine_pareja = $_POST["ine_pareja"] ? 1 : 0;
    $fotografia_pareja = $_POST["fotografias_pareja"] ? 1 : 0;
    $nombre_completo_tutor = $_POST["nombre_tutor"];
    $telefono_tutor = $_POST["telefono_tutor"];
    $categoria = $_POST["categoria"];
    $estilo = $_POST["estilo"];
    $numero_pareja = $_POST["numero_pareja"];

    $sql = "INSERT INTO concursantes (
        nombre_completo_participante,
        fecha_nacimiento_participante,
        nombre_completo_pareja,
        fecha_nacimiento_pareja,
        telefono_contacto,
        representacion,
        curp_participante,
        acta_nac_participante,
        ine_participante,
        fotografia_participante,
        curp_pareja,
        acta_nac_pareja,
        ine_pareja,
        fotografia_pareja,
        nombre_completo_tutor,
        telefono_tutor,
        categoria,
        estilo,
        numero_pareja
    ) VALUES (
        '$nombre_completo_participante',
        '$fecha_nacimiento_participante',
        '$nombre_completo_pareja',
        '$fecha_nacimiento_pareja',
        '$telefono_contacto',
        '$representacion',
        '$curp_participante',
        '$acta_nac_participante',
        '$ine_participante',
        '$fotografia_participante',
        '$curp_pareja',
        '$acta_nac_pareja',
        '$ine_pareja',
        '$fotografia_pareja',
        '$nombre_completo_tutor',
        '$telefono_tutor',
        '$categoria',
        '$estilo',
        '$numero_pareja'
    )";

    if ($conn->query($sql) === TRUE) {
        echo "OK";

        
        // Ruta a la plantilla de Excel
        $templatePath = 'registro_template.xlsx';

        // Cargar la plantilla de Excel
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($templatePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Escribir los datos en las celdas correspondientes
        $sheet->setCellValue('E14', $nombre_completo_participante);
        $sheet->setCellValue('J14', $fecha_nacimiento_participante);
        $sheet->setCellValue('E15', $nombre_completo_pareja);
        $sheet->setCellValue('J15', $fecha_nacimiento_pareja);
        $sheet->setCellValue('E16', $telefono_contacto);
        $sheet->setCellValue('E17', $representacion);

        $documentos_concursante = "";
        ($curp_participante == "1") ? $documentos_concursante ."CURP " : $documentos_concursante . " ";
        ($acta_nac_participante == "1") ? $documentos_concursante ."A.N. " : $documentos_concursante . " ";
        ($ine_participante == "1") ? $documentos_concursante ."INE " : $documentos_concursante . " ";
        $sheet->setCellValue('E18', $documentos_concursante);

        $documentos_pareja = "";
        ($curp_pareja == "1") ? $documentos_pareja ."CURP " : $documentos_pareja . " ";
        ($acta_nac_pareja == "1") ? $documentos_pareja ."A.N. " : $documentos_pareja . " ";
        ($ine_pareja == "1") ? $documentos_pareja ."INE " : $documentos_pareja . " ";

        $sheet->setCellValue('E19', $documentos_pareja);
        $sheet->setCellValue('E23', $nombre_completo_tutor);
        $sheet->setCellValue('E24', $telefono_tutor);
        $sheet->setCellValue('E27', $categoria);
        $sheet->setCellValue('E28', $estilo);

        $sheet->setCellValue('D30', $numero_pareja);

        // Guardar el archivo Excel con los datos ingresados
        $outputPath = 'registro.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($outputPath);


        // Abrir el archivo Excel resultante en el navegador
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="registro.xlsx"');
        // readfile($outputPath);
        //*/

    } else {
        // echo "Error: ";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
//*/
