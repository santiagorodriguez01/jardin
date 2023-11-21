<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "jardin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $alumno_id = $_GET['id'];

    $sql = "DELETE FROM legajo_alumno WHERE id_alumno = $alumno_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Alumno eliminado exitosamente.');</script>";
    } else {
        echo "<script>alert('Error al eliminar el alumno: " . $conn->error . "');</script>";
    }
}

$conn->close();

header("Location: ../html/legajo_alumno.php");
exit(); 
?>
