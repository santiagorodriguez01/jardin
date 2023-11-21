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
    $id_docente = $_POST['docente'];
    $fecha = $_POST['fecha'];
    $hora_ingreso = $_POST['hora_ingreso'];
    $hora_egreso = $_POST['hora_egreso'];

    $sql = "INSERT INTO registro_ingreso_egreso_docentes (id_docente, fecha, hora_ingreso, hora_egreso)
            VALUES ('$id_docente', '$fecha', '$hora_ingreso', '$hora_egreso')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registro de docente exitoso.');</script>";
    } else {
        echo "<script>alert('Error al registrar el docente: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>
