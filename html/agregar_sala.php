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
    $nombre = $_POST["nombre"];
    $capacidad = $_POST["capacidad"];

    $sql_insert = "INSERT INTO sala (nombre, capacidad) VALUES ('$nombre', '$capacidad')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>Sala agregada exitosamente.</p>";

        header("Location: ../html/gestion_salas.php");
        exit();  
    } else {
        echo "<p>Error al agregar sala: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/gestion-salas.css">
    <title>Agregar Sala - Sensaciones Jardín Maternal</title>
</head>

<body>
    <header>
        <h1><a href="index.html" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>
    <section class="content">
        <h2>Agregar Sala</h2>

        <form method="post" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="capacidad">Capacidad:</label>
            <input type="number" name="capacidad" required>

            <button type="submit">Agregar Sala</button>
        </form>

        <a href="../html/gestion_salas.php" class="back-button">Volver al Listado</a>
    </section>
    <footer>
        <p>© 2023 Sensaciones Jardín Maternal</p>
    </footer>
</body>

</html>
