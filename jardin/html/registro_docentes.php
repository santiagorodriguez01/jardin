<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/registro.css">
    <title>Registro Personal - Sensaciones Jardín Maternal</title>
</head>

<body>
    <header>
        <h1><a href="index.html" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>

    <section class="content">
        <h2>Registro de Personal</h2>
        <form action="" method="post"> 
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "12345";
            $dbname = "jardin";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql_docentes = "SELECT id_personal, CONCAT(apellido, ', ', nombre, ' - ', dni) AS nombre_completo FROM legajo_personal";
            $result_docentes = $conn->query($sql_docentes);

            if ($result_docentes->num_rows > 0) {
                echo "<label for='docente'>Seleccionar Docente:</label>";
                echo "<select name='docente' required>";
                while ($row = $result_docentes->fetch_assoc()) {
                    echo "<option value='{$row['id_personal']}'>{$row['nombre_completo']}</option>";
                }
                echo "</select>";
            } else {
                echo "<p>No hay docentes registrados.</p>";
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
            <label for="hora_egreso">Hora de Egreso:</label>
            <input type="time" name="hora_egreso" id="hora_egreso" required>
            <br>
            <input type="submit" value="Registrar Ingreso/Egreso">
        </form>
        <a href="index.html" class="back-button">Volver al Inicio</a>
    </section>
    <footer>
        <p>© 2023 Sensaciones Jardín Maternal</p>
    </footer>

    <script src="../js/registro.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>