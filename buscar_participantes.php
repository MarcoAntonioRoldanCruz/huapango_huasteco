<?php
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

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

switch ($accion) {
    case 'listar_participantes':
        $nombre_completo_participante = (isset($_POST['nombre_completo_participante'])) ? $_POST['nombre_completo_participante'] : "";

        $sql = "SELECT * FROM concursantes WHERE nombre_completo_participante LIKE '{$nombre_completo_participante}%' OR nombre_completo_pareja LIKE '{$nombre_completo_participante}%'";
        $participante_st = $pdo->query($sql);

        echo json_encode(array("st" => "ok", "items" => $participante_st->fetch_all(MYSQLI_ASSOC)));

        break;

    case 'buscar_participante':
        $id_registro = (isset($_POST['id_registro'])) ? $_POST['id_registro'] : "";
        $sql = "SELECT * FROM concursantes WHERE id_registro = '{$id_registro} LIMIT 1'";

        $participante_st = $pdo->query($sql);
        echo json_encode(array("st" => "ok", "item" => $participante_st->fetch_assoc()));
        break;
    default:
        echo "Acción no encontrada";
        break;
}
