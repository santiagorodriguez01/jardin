<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alumno</title>
    <link rel="stylesheet" href="../css/legajo-alumno.css">
</head>
<body>
    <header>
        <h1><a href="index.html">Sensaciones Jardín Maternal</a></h1>
    </header>

    <section class="content">
        <h2>Agregar Alumno</h2>
        <form action="../php/agregar_alumno.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <br>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" required>
            <br>
            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni" required>
            <br>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
            <br>
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" required>
            <br>
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" required>
            <br>
            <label for="enfermedades">Enfermedades:</label>
            <input type="text" name="enfermedades" id="enfermedades" required>
            <br>
            <label for="autorizacion_retiro">Autorización de Retiro:</label>
            <input type="text" name="autorizacion_retiro" id="autorizacion_retiro" required>
            <br>
            <label for="actividades_extracurriculares">Actividades Extracurriculares:</label>
            <input type="text" name="actividades_extracurriculares" id="actividades_extracurriculares" required>
            <br>
            <label for="sala">Sala:</label>
            <select name="sala" id="sala" required>
                <option value="1">Sala 1</option>
                <option value="2">Sala 2</option>
                <option value="3">Sala 3</option>
                <option value="4">Sala 4</option>
            </select>
            <br>
            <label for="turno">Turno:</label>
            <select name="turno" id="turno" required>
                <option value="manana">Mañana</option>
                <option value="tarde">Tarde</option>
            </select>
            <br>
            <label for="jornada">Jornada:</label>
            <select name="jornada" id="jornada" required>
                <option value="simple">Simple</option>
                <option value="extendida">Extendida</option>
                <option value="completa">Completa</option>
            </select>
            <br>
            <input type="submit" value="Agregar Alumno">
        </form>
        <a href="legajo_alumno.php" class="back-button">Volver al Legajo del Alumno</a>
    </section>
    <footer>
        <p>&copy; 2023 Sensaciones Jardín Maternal</p>
    </footer>
</body>
</html>
