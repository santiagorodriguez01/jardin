<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "jardin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_alumno = $_GET['id'];

    $sql = "DELETE FROM legajo_alumno WHERE id_alumno = $id_alumno";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Alumno eliminado exitosamente.');</script>";
        header("Location: ../html/legajo_alumno.php");
        exit(); 
    } else {
        echo "<script>alert('Error al eliminar el alumno: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>
