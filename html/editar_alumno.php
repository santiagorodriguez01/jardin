<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="../css/legajo-alumno.css">
</head>

<body>
    <header>
        <h1><a href="index.html">Sensaciones Jardín Maternal</a></h1>
    </header>

    <section class="content">
        <h2>Editar Alumno</h2>
        <?php
        $alumno_id = $_GET['id'];
        $servername = "localhost";
        $username = "root";
        $password = "12345";
        $dbname = "jardin";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM legajo_alumno WHERE id_alumno = $alumno_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $alumno = $result->fetch_assoc();
        ?>
            <form action="../php/editar_alumno.php" method="post">
                <input type="hidden" name="id_alumno" value="<?php echo $alumno['id_alumno']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $alumno['nombre']; ?>" required>
                <br>
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" value="<?php echo $alumno['apellido']; ?>" required>
                <br>
                <label for="dni">DNI:</label>
                <input type="text" name="dni" value="<?php echo $alumno['dni']; ?>" required>
                <br>
                <input type="submit" value="Guardar Cambios">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" value="<?php echo $alumno['direccion']; ?>" required>
                <br>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" value="<?php echo $alumno['telefono']; ?>" required>
                <br>
                <label for="enfermedades">Enfermedades:</label>
                <input type="text" name="enfermedades" id="enfermedades" value="<?php echo $alumno['enfermedades']; ?>" required>
                <br>
                <label for="autorizacion_retiro">Autorización de Retiro:</label>
                <input type="text" name="autorizacion_retiro" id="autorizacion_retiro" value="<?php echo $alumno['autorizacion_retiro']; ?>" required>
                <br>
                <label for="actividades_extracurriculares">Actividades Extracurriculares:</label>
                <input type="text" name="actividades_extracurriculares" id="actividades_extracurriculares" value="<?php echo $alumno['actividades_extracurriculares']; ?>" required>
                <br>
                <label for="sala">Sala:</label>
                <select name="sala" id="sala" required>
                    <option value="1" <?php echo ($alumno['sala'] == 1) ? 'selected' : ''; ?>>Sala 1</option>
                    <option value="2" <?php echo ($alumno['sala'] == 2) ? 'selected' : ''; ?>>Sala 2</option>
                    <option value="3" <?php echo ($alumno['sala'] == 3) ? 'selected' : ''; ?>>Sala 3</option>
                    <option value="4" <?php echo ($alumno['sala'] == 4) ? 'selected' : ''; ?>>Sala 4</option>
                </select>
                <br>
                <label for="turno">Turno:</label>
                <select name="turno" id="turno" required>
                    <option value="manana" <?php echo ($alumno['turno'] == 'manana') ? 'selected' : ''; ?>>Mañana</option>
                    <option value="tarde" <?php echo ($alumno['turno'] == 'tarde') ? 'selected' : ''; ?>>Tarde</option>
                </select>
                <br>
                <label for="jornada">Jornada:</label>
                <select name="jornada" id="jornada" required>
                    <option value="simple" <?php echo ($alumno['jornada'] == 'simple') ? 'selected' : ''; ?>>Simple</option>
                    <option value="extendida" <?php echo ($alumno['jornada'] == 'extendida') ? 'selected' : ''; ?>>Extendida</option>
                    <option value="completa" <?php echo ($alumno['jornada'] == 'completa') ? 'selected' : ''; ?>>Completa</option>
                </select>
                <br>
                <input type="submit" value="Guardar Cambios">
            </form>
        <?php
        } else {
            echo "No se encontró ningún alumno con ID $alumno_id";
        }

        $conn->close();
        ?>
        <a href="legajo_alumno.php" class="back-button">Volver al Legajo del Alumno</a>
    </section>
    <footer>
        <p>&copy; 2023 Sensaciones Jardín Maternal</p>
    </footer>
</body>

</html>