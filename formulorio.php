<?php
$conexion = new mysqli("localhost", "root", "", "jdh_transportes");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$empresa = $_POST['empresa'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$servicio = $_POST['servicio'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO cotizaciones (nombre_completo, empresa, telefono, email, servicio, origen, destino, mensaje)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssssss", $nombre, $empresa, $telefono, $email, $servicio, $origen, $destino, $mensaje);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conexion->close();
?>
