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
    $personal_id = $_GET['id'];

    $sql = "SELECT * FROM legajo_personal WHERE id_personal = $personal_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $personal = $result->fetch_assoc();
    } else {
        echo "<p>No se encontró el personal.</p>";
        $conn->close();
        exit();
    }
}

$conn->close();
?>