<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "jardin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_personal'])) {
    $personal_id = $_POST['id_personal'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $certificaciones = $_POST['certificaciones'];
    $capacitaciones = $_POST['capacitaciones'];
    $salario_fijo = $_POST['salario_fijo'];
    $horas_extras = $_POST['horas_extras'];
    $suplencia = $_POST['suplencia'];

    $sql_update = "UPDATE legajo_personal 
                   SET nombre='$nombre', apellido='$apellido', dni='$dni', certificaciones='$certificaciones',
                       capacitaciones='$capacitaciones', salario_fijo='$salario_fijo', horas_extras='$horas_extras',
                       suplencia='$suplencia'
                   WHERE id_personal=$personal_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "<p>Personal actualizado exitosamente.</p>";

        
        header("Location: ../html/legajo_personal.php");
        exit();  
    } else {
        echo "<p>Error al actualizar personal: " . $conn->error . "</p>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $personal_id = $_GET['id'];
    $sql_select = "SELECT * FROM legajo_personal WHERE id_personal = $personal_id";
    $result = $conn->query($sql_select);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $dni = $row['dni'];
        $certificaciones = $row['certificaciones'];
        $capacitaciones = $row['capacitaciones'];
        $salario_fijo = $row['salario_fijo'];
        $horas_extras = $row['horas_extras'];
        $suplencia = $row['suplencia'];
    } else {
        echo "<p>No se encontró el personal.</p>";
        exit();
    }
} else {
    echo "<p>ID de personal no válido.</p>";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/legajo-personal.css">
    <title>Editar Personal - Sensaciones Jardín Maternal</title>
</head>

<body>
    <header>
        <h1><a href="../html/legajo_personal.php" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>
    <section class="content">
        <h2>Editar Personal</h2>
        <form method="post" action="">
            <input type="hidden" name="id_personal" value="<?php echo $personal_id; ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" value="<?php echo $apellido; ?>" required>

            <label for="dni">DNI:</label>
            <input type="text" name="dni" value="<?php echo $dni; ?>" required>

            <label for="certificaciones">Certificaciones:</label>
            <input type="text" name="certificaciones" value="<?php echo $certificaciones; ?>" required>

            <label for="capacitaciones">Capacitaciones:</label>
            <input type="text" name="capacitaciones" value="<?php echo $capacitaciones; ?>" required>

            <label for="salario_fijo">Salario Fijo:</label>
            <input type="text" name="salario_fijo" value="<?php echo $salario_fijo; ?>" required>

            <label for="horas_extras">Horas Extras:</label>
            <input type="text" name="horas_extras" value="<?php echo $horas_extras; ?>" required>

            <label for="suplencia">Suplencia:</label>
            <input type="text" name="suplencia" value="<?php echo $suplencia; ?>" required>

            <button type="submit">Guardar Cambios</button>
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

