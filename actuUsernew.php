<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicación de eventos Puebla</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>


<h2>Actualizar un registro</h2> 

<div id="wrap">
    <div id="masthead"></div>
    <div id="menucontainer">
        <div id="menunav">
            <ul>
            <li><a href="elimEventoAB.php" class="current"><span>Eventos</span></a></li>
            <li><a href="#"><span>Permiso Eventos</span></a></li>
            <li><a href="elimUserAB.php"><span>Usuarios</span></a></li>
            </ul>
        </div>
    </div>
    <div id="container">
        <div id="content">
            <h3>Conciertos</h3>

            <?php
                // Conexión a la base de datos
                $link = mysqli_connect("localhost", "root", "", "event");

                if (!$link) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                // Obteniendo el ID de usuario desde la URL de forma segura
                $id = isset($_GET['id_usuario']) ? (int) $_GET['id_usuario'] : 0;

                // Preparar y ejecutar consulta segura
                $stmt = mysqli_prepare($link, "SELECT nombre, email, contrasena FROM usuarios WHERE id_usuario = ?");
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                // Verificar si se obtuvo un resultado
                if ($ren = mysqli_fetch_assoc($result)) {
                    echo '<form method="POST" action="actuUser2.php">';
                    echo "Nombre: <input type='text' name='nombre' value='" . htmlspecialchars($ren['nombre']) . "' size='50'><br>";
                    echo "Email: <input type='text' name='email' value='" . htmlspecialchars($ren['email']) . "' size='50'><br>";
                    echo "Contraseña: <input type='password' name='contrasena' value='" . htmlspecialchars($ren['contrasena']) . "' size='50'><br>";
                    echo "<input type='hidden' name='id_usuario' value='$id'>";
                    echo "<input type='submit' value='Actualizar'>";
                    echo '</form>';
                } else {
                    echo "No se encontró el usuario.";
                }

                // Cerrar la conexión
                mysqli_stmt_close($stmt);
                mysqli_close($link);
            ?>

        </div>
    </div>
    <div id="footer">
        <a href="#">Registrarse</a> |
        <a href="mailto:denise@mitchinson.net">Iniciar Sesión</a> |
        <a href="http://validator.w3.org/check?uri=referer">HTML</a> |
        <a href="http://jigsaw.w3.org/css-validator">CSS</a> |
        &copy; 2007 Anyone | Design by <a href="http://www.mitchinson.net">www.mitchinson.net</a>
    </div>
</div>

</body>
</html>