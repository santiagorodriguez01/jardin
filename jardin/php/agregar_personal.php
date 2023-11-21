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
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $certificaciones = $_POST['certificaciones'];
    $capacitaciones = $_POST['capacitaciones'];
    $salario_fijo = $_POST['salario_fijo'];
    $horas_extras = $_POST['horas_extras'];
    $suplencia = $_POST['suplencia'];

    $sql_insert = "INSERT INTO legajo_personal (nombre, apellido, dni, certificaciones, capacitaciones, salario_fijo, horas_extras, suplencia) 
                   VALUES ('$nombre', '$apellido', '$dni', '$certificaciones', '$capacitaciones', '$salario_fijo', '$horas_extras', '$suplencia')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>Personal agregado exitosamente.</p>";

        header("Location: ../html/legajo_personal.php");
        exit();
    } else {
        echo "<p>Error al agregar personal: " . $conn->error . "</p>";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/legajo-personal.css">
    <title>Agregar Personal - Sensaciones Jardín Maternal</title>
</head>

<body>
    <header>
        <h1><a href="../html/legajo_personal.php" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>
    <section class="content">
        <h2>Agregar Personal</h2>
        <form method="post" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" required>

            <label for="dni">DNI:</label>
            <input type="text" name="dni" required>

            <label for="certificaciones">Certificaciones:</label>
            <input type="text" name="certificaciones" required>

            <label for="capacitaciones">Capacitaciones:</label>
            <input type="text" name="capacitaciones" required>

            <label for="salario_fijo">Salario Fijo:</label>
            <input type="text" name="salario_fijo" required>

            <label for="horas_extras">Horas Extras:</label>
            <input type="text" name="horas_extras" required>

            <label for="suplencia">Suplencia:</label>
            <input type="text" name="suplencia" required>

            <button type="submit">Agregar Personal</button>
        </form>

        <a href="../html/legajo_personal.php" class="back-button">Volver al Listado</a>
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