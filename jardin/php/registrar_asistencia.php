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
    $id_alumno = $_POST['alumno'];
    $fecha = $_POST['fecha'];
    $hora_ingreso = $_POST['hora_ingreso'];
    $hora_salida = $_POST['hora_salida'];

    $sql = "INSERT INTO registro_asistencias (id_alumno, fecha, hora_ingreso, hora_salida)
            VALUES ('$id_alumno', '$fecha', '$hora_ingreso', '$hora_salida')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Asistencia registrada exitosamente.');</script>";
    } else {
        echo "<script>alert('Error al registrar la asistencia: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>
