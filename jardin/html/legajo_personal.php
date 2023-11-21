<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/legajo-personal.css">
    <title>Legajo del Personal - Sensaciones Jardín Maternal</title>
</head>

<body>
    <header>
        <h1><a href="index.html" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>
    <section class="content">
        <h2>Legajo del Personal</h2>
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
            $personal_id = $_GET['id'];

            if (isset($_GET['action']) && $_GET['action'] === 'eliminar') {
                $sql_delete = "DELETE FROM legajo_personal WHERE id_personal = $personal_id";
                if ($conn->query($sql_delete) === TRUE) {
                    echo "<script>alert('Personal eliminado exitosamente.');</script>";
                } else {
                    echo "<script>alert('Error al eliminar personal: " . $conn->error . "');</script>";
                }
            }
        }

        $sql_select = "SELECT * FROM legajo_personal";
        $result = $conn->query($sql_select);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['nombre']} {$row['apellido']} - DNI: {$row['dni']} 
                      <a href='editar_personal.php?id={$row['id_personal']}'>Editar</a> | 
                      <a href='legajo_personal.php?id={$row['id_personal']}&action=eliminar' 
                         onclick='return confirm(\"¿Estás seguro de que quieres eliminar este personal?\")'>Eliminar</a>
                      </li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No hay personal registrado.</p>";
        }

        $conn->close();
        ?>
        <a href="../php/agregar_personal.php" class="add-button">Agregar Nuevo Personal</a>
    </section>
    <footer>
        <p>© 2023 Sensaciones Jardín Maternal</p>
    </footer>

    <script src="../js/legajo-personal.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
