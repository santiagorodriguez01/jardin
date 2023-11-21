<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/legajo-alumno.css">
    <title>Gestión de Salas - Sensaciones Jardín Maternal</title>
</head>

<body>
    <header>
        <h1><a href="index.html" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>
    <section class="content">
        <h2>Gestión de Salas</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "12345";
        $dbname = "jardin";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
            $sala_id = $_GET['id'];

            if (isset($_GET['action']) && $_GET['action'] === 'eliminar') {
                $sql_delete = "DELETE FROM sala WHERE id_sala = $sala_id";
                if ($conn->query($sql_delete) === TRUE) {
                    echo "<script>alert('Sala eliminada exitosamente.');</script>";
                } else {
                    echo "<script>alert('Error al eliminar sala: " . $conn->error . "');</script>";
                }
            }
        }

        $sql_select = "SELECT * FROM sala";
        $result = $conn->query($sql_select);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['nombre']} - Capacidad: {$row['capacidad']} 
                      <a href='editar_sala.php?id={$row['id_sala']}'>Editar</a> | 
                      <a href='gestion_salas.php?id={$row['id_sala']}&action=eliminar' 
                         onclick='return confirm(\"¿Estás seguro de que quieres eliminar esta sala?\")'>Eliminar</a>
                      </li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No hay salas registradas.</p>";
        }

        $conn->close();
        ?>
        <a href="agregar_sala.php" class="add-button">Agregar Nueva Sala</a>
    </section>
    <footer>
        <p>© 2023 Sensaciones Jardín Maternal</p>
    </footer>
</body>

</html>