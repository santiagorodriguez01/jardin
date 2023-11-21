<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/control-gastos.css">
    <title>Control de Gastos - Sensaciones Jardín Maternal</title>
</head>
<body>
    <header>
        <h1><a href="index.html" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>

    <section id="control-gastos">
        <div class="header-section">
            <h2>Control de Gastos</h2>
            <a href="index.html" class="back-link">Volver al Inicio</a>
        </div>

        <form action="../php/conexion_gastos.php" method="post">
            <label for="tipo_gasto">Tipo de Gasto:</label>
            <input type="text" name="tipo_gasto" required>
            
            <label for="monto">Monto:</label>
            <input type="number" name="monto" required>


            <button type="submit">Cargar Gasto</button>
        </form>

        <?php include '../php/ver_gastos.php'; ?>

    </section>

    <footer>
        <p>© 2023 Sensaciones Jardín Maternal</p>
    </footer>

    <script src="../js/control-gastos.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
