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
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $enfermedades = $_POST['enfermedades'];
    $autorizacion_retiro = $_POST['autorizacion_retiro'];
    $actividades_extracurriculares = $_POST['actividades_extracurriculares'];
    $sala = $_POST['sala'];
    $turno = $_POST['turno'];
    $jornada = $_POST['jornada'];

    $sql = "INSERT INTO legajo_alumno 
            (nombre, apellido, dni, fecha_nacimiento, direccion, telefono, enfermedades, autorizacion_retiro, actividades_extracurriculares, sala, turno, jornada)
            VALUES ('$nombre', '$apellido', '$dni', '$fecha_nacimiento', '$direccion', '$telefono', '$enfermedades', '$autorizacion_retiro', '$actividades_extracurriculares', '$sala', '$turno', '$jornada')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Alumno agregado exitosamente.');</script>";
        header("Location: ../html/legajo_alumno.php");
        exit(); 
    } else {
        echo "<script>alert('Error al agregar el alumno: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>
