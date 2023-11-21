<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Docentes</title>
    <link rel="stylesheet" href="../css/ver-docentes.css">
</head>
<body>

<div class="container">
    <h2>Registros de Docentes</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "jardin";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM registro_ingreso_egreso_docentes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID Registro</th><th>DNI del Docente</th><th>Tipo de Registro</th><th>Fecha y Hora</th><th>Observaciones</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id_registro"]."</td><td>".$row["dni_docente"]."</td><td>".$row["tipo_registro"]."</td><td>".$row["fecha_hora_registro"]."</td><td>".$row["observaciones"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay registros.";
    }

    $conn->close();
    ?>

    <a href="../html/registro_docentes.html" class="back-button">Atrás</a>
</div>

<script src="../js/script.js"></script> 
</body>
</html>
