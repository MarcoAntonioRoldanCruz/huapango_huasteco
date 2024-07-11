<?php
require 'library/phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "huapango_bd";

$pdo = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($pdo->connect_error) {
    die("Connection failed: " . $pdo->connect_error);
}

// var_dump($_POST);

// Procesar formulario cuando se presiona el botón "Confirmar"

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_registro = (isset($_POST['id_registro'])) ? $_POST['id_registro'] : "0";

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
    $nombre_completo_tutor = $_POST["nombre_completo_tutor"];
    $telefono_tutor = $_POST["telefono_tutor"];
    $categoria = $_POST["categoria"];
    $estilo = $_POST["estilo"];
    $numero_pareja = $_POST["numero_pareja"];

    if ($id_registro == 0) {
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
            numero_pareja,
            estatus_valido
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
            '$numero_pareja',
            '1'
        )";
    } else {
        $sql = "UPDATE concursantes SET
        nombre_completo_participante = '$nombre_completo_participante',
        fecha_nacimiento_participante = '$fecha_nacimiento_participante',
        nombre_completo_pareja = '$nombre_completo_pareja',
        fecha_nacimiento_pareja = '$fecha_nacimiento_pareja',
        telefono_contacto = '$telefono_contacto',
        representacion = '$representacion',
        curp_participante = '$curp_participante',
        acta_nac_participante = '$acta_nac_participante',
        ine_participante = '$ine_participante',
        fotografia_participante = '$fotografia_participante',
        curp_pareja = '$curp_pareja',
        acta_nac_pareja = '$acta_nac_pareja',
        ine_pareja = '$ine_pareja',
        fotografia_pareja = '$fotografia_pareja',
        nombre_completo_tutor = '$nombre_completo_tutor',
        telefono_tutor = '$telefono_tutor',
        categoria = '$categoria',
        estilo = '$estilo',
        numero_pareja = '$numero_pareja'
        estatus_valido = '1'
    WHERE id_registro = '$id_registro'";
    }

    // echo $sql;
    // die;
    // return;
    if ($pdo->query($sql) === TRUE) {
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
        if ($curp_participante == "1") {
            $documentos_concursante .= "CURP ";
        }
        if ($acta_nac_participante == "1") {
            $documentos_concursante .= "A.N. ";
        }
        if ($ine_participante == "1") {
            $documentos_concursante .= "INE ";
        }
        if ($fotografia_participante == "1") {
            $documentos_concursante .= "Foto ";
        }
        $sheet->setCellValue('E18', $documentos_concursante);

        $documentos_pareja = "";
        if ($curp_pareja == "1") {
            $documentos_pareja .= "CURP ";
        }
        if ($acta_nac_pareja == "1") {
            $documentos_pareja .= "A.N. ";
        }
        if ($ine_pareja == "1") {
            $documentos_pareja .= "INE ";
        }
        if ($fotografia_pareja == "1") {
            $documentos_pareja .= "Foto ";
        }
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
        // */
    } else {
        // echo "Error: ";
        echo "Error: " . $sql . "<br>" . $pdo->error;
    }
}

// $pdo->close();
//*/
