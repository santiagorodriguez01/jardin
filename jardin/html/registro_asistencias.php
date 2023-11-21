<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/registro-asistencias.css">
    <title>Registro de Asistencias de Alumnos - Sensaciones Jardín Maternal</title>
</head>

<body>
    <header>
        <h1><a href="index.html" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>

    <section id="registro-asistencias">
        <div class="header-section">
            <h2>Registro de Asistencias de Alumnos</h2>
            <a href="index.html" class="back-link">Volver al Inicio</a>
        </div>

        <form action="../php/registrar_asistencia_alumnos.php" method="post">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "12345";
            $dbname = "jardin";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql_alumnos = "SELECT id_alumno, CONCAT(apellido, ', ', nombre, ' - ', dni) AS nombre_completo FROM legajo_alumno";
            $result_alumnos = $conn->query($sql_alumnos);

            if ($result_alumnos->num_rows > 0) {
                echo "<label for='alumno'>Seleccionar Alumno:</label>";
                echo "<select name='alumno' required>";
                while ($row = $result_alumnos->fetch_assoc()) {
                    echo "<option value='{$row['id_alumno']}'>{$row['nombre_completo']}</option>";
                }
                echo "</select>";
            } else {
                echo "<p>No hay alumnos registrados.</p>";
            }

            $conn->close();
            ?>

            <br>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required>
            <br>
            <label for="hora_ingreso">Hora de Ingreso:</label>
            <input type="time" name="hora_ingreso" id="hora_ingreso" required>
            <br>
            <label for="hora_salida">Hora de Salida:</label>
            <input type="time" name="hora_salida" id="hora_salida" required>
            <br>
            <input type="submit" value="Registrar Asistencia">
        </form>
    </section>

    <footer>
        <p>© 2023 Sensaciones Jardín Maternal</p>
    </footer>

    <script src="../js/registro-asistencias.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>