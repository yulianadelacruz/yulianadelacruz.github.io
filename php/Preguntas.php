<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/preguntas.css">
    <title>Preguntas</title>
</head>

<body>
    <header class="header">
        <div>
            <ul class="menu">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="los_caballos.php">Los caballos</a></li>
                <li><a href="Alimentacion.php">Alimentación</a></li>
                <li><a href="Cuidados_de_los_caballos.php">Cuidados</a></li>
                <li><a href="Precauciones_al_tener_encuenta.php">Precauciones</a></li>
                <li><a href="Preguntas.php">Preguntas</a></li>
                <li><a href="Contacto.php">Contacto</a></li>
            </ul>
        </div>
    </header>
    <div class="content">

        <h2>Formulario de contacto</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label>Sexo:</label>
            <input type="radio" id="hombre" name="sexo" value="Hombre" required>
            <label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="Mujer" required>
            <label for="mujer">Mujer</label>

            <label for="contacto">Correo/Teléfono:</label>
            <input type="text" id="contacto" name="contacto" required>

            <label for="horario">¿En qué horario te podemos contactar?</label>
            <select id="horario" name="horario">
                <option value="mañana">Mañana</option>
                <option value="tarde">Tarde</option>
                <option value="noche">Noche</option>
            </select>

            <label for="comentario">Comentarios:</label>
            <textarea id="comentario" name="comentario"></textarea>

            <button type="submit" id="submit-btn">Enviar</button>

        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $sexo = $_POST["sexo"];
            $contacto = $_POST["contacto"];
            $horario = $_POST["horario"];
            $comentario = $_POST["comentario"];

            // Configuración de la conexión a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "yuliana";

            // Crear la conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar si la conexión es exitosa
            if ($conn->connect_error) {
                die("Error al conectar a la base de datos: " . $conn->connect_error);
            }

            // Crear la consulta SQL para insertar los datos en la tabla
            $sql = "INSERT INTO formulario (nombre, apellido, sexo, contacto, horario, comentario)
            VALUES ('$nombre', '$apellido', '$sexo', '$contacto', '$horario', '$comentario')";

            // Ejecutar la consulta
            if ($conn->query($sql) === TRUE) {
                echo "<p class='success-message'>¡Gracias por enviar el formulario!</p>";
            } else {
                echo "<p class='error-message'>Error al enviar el formulario: " . $conn->error . "</p>";
            }

            // Cerrar la conexión
            $conn->close();
        }
        ?>


    </div>
</body>

</html>