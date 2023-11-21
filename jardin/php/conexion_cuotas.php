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
    $tipo_jornada = $_POST['tipo_jornada'];
    $arancel = $_POST['arancel'];

    $sql = "INSERT INTO control_cuotas (tipo_jornada, arancel, fecha_vencimiento, descripcion, monto)
            VALUES ('$tipo_jornada', $arancel, NOW(), 'Descripción de la cuota', 0)";

    if ($conn->query($sql) === TRUE) {
        echo "Carga de cuota exitosa.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM control_cuotas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Cuotas Existentes</h2>";
    echo "<table border='1'><tr><th>ID Cuota</th><th>Tipo de Jornada</th><th>Arancel</th><th>Fecha Vencimiento</th><th>Descripción</th><th>Monto</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id_cuota"]."</td><td>".$row["tipo_jornada"]."</td><td>".$row["arancel"]."</td><td>".$row["fecha_vencimiento"]."</td><td>".$row["descripcion"]."</td><td>".$row["monto"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay cuotas registradas.";
}

$conn->close();
?>
