<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "jardin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_sala = $_POST['nombre_sala'];
    $capacidad = $_POST['capacidad'];

    $sql = "INSERT INTO sala (nombre, capacidad)
            VALUES ('$nombre_sala', '$capacidad')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sala agregada exitosamente.');</script>";
    } else {
        echo "<script>alert('Error al agregar la sala: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>
