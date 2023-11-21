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

    // Obtén el ID de sala de la URL
    $id_sala = $_GET["id"];

    // Actualiza la sala en la base de datos
    $sql_update = "UPDATE sala SET nombre = '$nombre', capacidad = '$capacidad' WHERE id_sala = $id_sala";

    if ($conn->query($sql_update) === TRUE) {
        // Redirige a la página de gestión de salas después de actualizar
        header("Location: ../html/gestion_salas.php");
        exit();
    } else {
        echo "<p>Error al actualizar la sala: " . $conn->error . "</p>";
    }
}

$id_sala = $_GET["id"];
$sql_select = "SELECT * FROM sala WHERE id_sala = $id_sala";
$result = $conn->query($sql_select);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/legajo-alumno.css">
    <title>Editar Sala - Sensaciones Jardín Maternal</title>
</head>

<body>
    <header>
        <h1><a href="../html/gestion_salas.php" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>

    <section class="content">
        <h2>Editar Sala</h2>

        <?php
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>
            <form method="post" action="">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>

                <label for="capacidad">Capacidad:</label>
                <input type="number" name="capacidad" value="<?php echo $row['capacidad']; ?>" required>

                <button type="submit">Actualizar Sala</button>
            </form>
        <?php
        } else {
            echo "<p>No se encontró la sala.</p>";
        }

        $conn->close();
        ?>

        <a href="../html/gestion_salas.php" class="back-button">Volver al Listado</a>
    </section>

    <footer>
        <p>© 2023 Sensaciones Jardín Maternal</p>
    </footer>
</body>

</html>
