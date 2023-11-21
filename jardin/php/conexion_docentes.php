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
    $dni_docente = $_POST['dni_docente'];
    $tipo_registro = $_POST['tipo_registro'];

    $sql = "INSERT INTO registro_ingreso_egreso_docentes (dni_docente, tipo_registro, fecha_hora_registro, observaciones)
            VALUES ('$dni_docente', '$tipo_registro', NOW(), 'Observaciones adicionales')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM registro_ingreso_egreso_docentes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Registros Existentes</h2>";
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
