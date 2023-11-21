<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/legajo-alumno.css">
    <title>Legajo del Alumno - Sensaciones Jardín Maternal</title>
</head>

<body>
    <header>
        <h1><a href="index.html" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>
    <section class="content">
        <h2>Legajo del Alumno</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "12345";
        $dbname = "jardin";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM legajo_alumno";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['nombre']} {$row['apellido']} - DNI: {$row['dni']} <a href='editar_alumno.php?id={$row['id_alumno']}'>Editar</a> | <a href='../php/eliminar_alumno.php?id={$row['id_alumno']}'>Eliminar</a></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No hay alumnos registrados.</p>";
        }

        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['nombre']} {$row['apellido']} - DNI: {$row['dni']} 
                  <a href='editar_alumno.php?id={$row['id_alumno']}'>Editar</a> | 
                  <a href='eliminar_alumno.php?id={$row['id_alumno']}' 
                     onclick='return confirm(\"¿Estás seguro de que quieres eliminar este alumno?\")'>Eliminar</a>
                  </li>";
        }

        $conn->close();
        ?>
        <a href="agregar_alumno.php" class="back-button">Agregar Nuevo Alumno</a>
    </section>
    <footer>
        <p>© 2023 Sensaciones Jardín Maternal</p>
    </footer>

    <script src="../js/legajo-alumno.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>