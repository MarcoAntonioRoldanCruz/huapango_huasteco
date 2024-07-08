<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "huapango_bd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
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
    $curp_participante = $_POST["curp_participante"]? 1 : 0;
    $acta_nac_participante = $_POST["acta_participante"]? 1 : 0;
    $ine_participante = $_POST["ine_participante"]? 1 : 0;
    $fotografia_participante = $_POST["fotografias_participante"]? 1 : 0;
    $curp_pareja = $_POST["curp_pareja"]? 1 : 0;
    $acta_nac_pareja = $_POST["acta_pareja"]? 1 : 0;
    $ine_pareja = $_POST["ine_pareja"]? 1 : 0;
    $fotografia_pareja = $_POST["fotografias_pareja"]? 1 : 0;
    $nombre_completo_tutor = $_POST["nombre_tutor"];
    $telefono_tutor = $_POST["telefono_contacto"];
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
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }
}

$conn->close();
//*/
?>