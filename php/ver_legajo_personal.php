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
    $nombre_docente = $_POST['nombre_docente'];
    $apellido_docente = $_POST['apellido_docente'];

    $sql = "INSERT INTO legajo_personal (nombre_docente, apellido_docente, fecha_nacimiento, direccion, telefono, email)
            VALUES ('$nombre_docente', '$apellido_docente', '2000-01-01', 'Dirección de prueba', '123456789', 'docente@example.com')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Información del personal docente guardada exitosamente.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$sql = "SELECT * FROM legajo_personal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Información del Personal Docente</h2>";
    echo "<table border='1'><tr><th>ID Docente</th><th>Nombre</th><th>Apellido</th><th>Fecha de Nacimiento</th><th>Dirección</th><th>Teléfono</th><th>Email</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id_docente"]."</td><td>".$row["nombre_docente"]."</td><td>".$row["apellido_docente"]."</td><td>".$row["fecha_nacimiento"]."</td><td>".$row["direccion"]."</td><td>".$row["telefono"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay información del personal docente registrada.</p>";
}

$conn->close();
?>
