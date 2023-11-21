<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/control-cuotas.css">
    <title>Control de Cuotas - Sensaciones Jardín Maternal</title>
</head>
<body>
    <header>
        <h1><a href="index.html" style="text-decoration: none; color: inherit;">Sensaciones Jardín Maternal</a></h1>
        <p>Comprometidos con una educación de alta calidad</p>
    </header>

    <section id="control-cuotas">
        <a href="../html/index.html" class="back-button">Volver al Inicio</a>
        <div class="header-section">
            <h1>Control de Cuotas</h1>


            <form action="../php/conexion_cuotas.php" method="post">
                <label for="tipo_jornada">Tipo de Jornada:</label>
                <select name="tipo_jornada" required>
                    <option value="simple">Simple</option>
                    <option value="extendida">Extendida</option>
                    <option value="completa">Completa</option>
                </select>
        
                <label for="arancel">Arancel:</label>
                <input type="number" name="arancel" required>
        
        
                <button type="submit">Cargar Cuota</button>
            </form>
        
          
            <?php include '../php/conexion_cuotas.php';?>
        
            <script src="js/script.js"></script> 
        
    </section>

    <footer>
        <p>© 2023 Sensaciones Jardín Maternal</p>
    </footer>

    <script src="../js/control-cuotas.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
