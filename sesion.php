<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="sesionStyle.css">
</head>
<style>
        .regresar-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 15px;
            background-color: #add8e6; /* Color azul claro */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
<body>
    <div class="container">
        <div class="left-panel">
            <h2>Pase de acceso total</h2>
            <p>Esto es todo: millones de eventos en vivo, alertas actualizadas de tus artistas y equipos favoritos y, por supuesto, emisión de boletos siempre segura.</p>
        </div>
        <div class="form-panel">
            <h2>Iniciar Sesión</h2>
            <form action="" method="POST" novalidate>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required placeholder="ejemplo@correo.com">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required placeholder="Introduce tu contraseña">
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="remember-me" name="remember">
                    <label for="remember-me">Recuérdame</label>
                </div>
                <button class="submit-btn" type="submit">Iniciar sesión</button>
                <div class="form-footer">
                    <p>¿Nuevo en Ticketmaster? <a href="registro.php">Crea una cuenta</a></p>
                    <p><a href="#">Olvidé mi contraseña</a></p>
                </div>
            </form>
        </div>
    </div>
    <button class="regresar-btn" onclick="window.history.back();">Regresar</button>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();

        // Conexión a la base de datos
        $link = mysqli_connect("localhost", "root", "", "event");

        if (!$link) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Obtener los datos del formulario
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validar correo electrónico
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Correo o Contraseña incorrectos.</p>";
            exit;
        }

        // Consulta preparada para prevenir inyección SQL
        $stmt = mysqli_prepare($link, 'SELECT id_usuario, nombre, contrasena, tipo_usuario FROM usuarios WHERE email = ?');
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Verificar si se encontraron resultados
        if ($row = mysqli_fetch_array($result)) {
            // Verificar si la contraseña es correcta (texto plano)
            if ($row["contrasena"] === $password) {
                $_SESSION["id_usuario"] = $row['id_usuario'];
                $_SESSION["k_username"] = $row['nombre']; 
                $_SESSION["tipo_usuario"] = $row['tipo_usuario'];

                // Redirigir según el tipo de usuario
                if ($row["tipo_usuario"] == "administrador") {
                    header("Location: indexAdm.php");
                } else {
                    header("Location: indexCliente.php");
                }
                exit;
            } else {
                echo "<p>Credenciales inválidas.</p>";
                echo '<br><a href="index.php">Regresar</a>';
            }
        } else {
            echo "<p>Credenciales inválidas.</p>";
            echo '<br><a href="index.php">Regresar</a>';
        }

        // Cerrar la conexión
        mysqli_close($link);
    }
    ?>
</body>
</html>


