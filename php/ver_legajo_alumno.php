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
    $nombre_alumno = $_POST['nombre_alumno'];
    $apellido_alumno = $_POST['apellido_alumno'];

    $sql = "INSERT INTO legajo_alumno (nombre_alumno, apellido_alumno, fecha_nacimiento, direccion, telefono, email)
            VALUES ('$nombre_alumno', '$apellido_alumno', '2000-01-01', 'Dirección de prueba', '123456789', 'alumno@example.com')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Información del alumno guardada exitosamente.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$sql = "SELECT * FROM legajo_alumno";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Información del Alumno</h2>";
    echo "<table border='1'><tr><th>ID Alumno</th><th>Nombre</th><th>Apellido</th><th>Fecha de Nacimiento</th><th>Dirección</th><th>Teléfono</th><th>Email</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id_alumno"]."</td><td>".$row["nombre_alumno"]."</td><td>".$row["apellido_alumno"]."</td><td>".$row["fecha_nacimiento"]."</td><td>".$row["direccion"]."</td><td>".$row["telefono"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay información del alumno registrada.</p>";
}

$conn->close();
?>
