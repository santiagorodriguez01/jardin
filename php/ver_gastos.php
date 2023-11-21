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
    $tipo_gasto = $_POST['tipo_gasto'];
    $monto = $_POST['monto'];

    $sql = "INSERT INTO control_gastos (tipo_gasto, monto, fecha_hora, descripcion)
            VALUES ('$tipo_gasto', $monto, NOW(), 'Descripción del gasto')";

    if ($conn->query($sql) === TRUE) {
        echo "Carga de gasto exitosa.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM control_gastos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Gastos Existentes</h2>";
    echo "<table border='1'><tr><th>ID Gasto</th><th>Tipo de Gasto</th><th>Monto</th><th>Fecha y Hora</th><th>Descripción</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id_gasto"]."</td><td>".$row["tipo_gasto"]."</td><td>".$row["monto"]."</td><td>".$row["fecha_hora"]."</td><td>".$row["descripcion"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay gastos registrados.";
}

$conn->close();
?>
