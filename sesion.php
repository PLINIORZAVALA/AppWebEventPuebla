<?php

session_start();

// Inicializar la variable de advertencia
$warning_message = null;

// Comprobar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        $warning_message = "El formato del correo electrónico es inválido.";
    } else {
        // Consulta preparada para prevenir inyección SQL
        $stmt = mysqli_prepare($link, 'SELECT id_usuario, nombre, contrasena, tipo_usuario FROM usuarios WHERE email = ?');
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Verificar si se encontraron resultados
        if ($row = mysqli_fetch_array($result)) {
            // Verificar si la contraseña es correcta
            if (password_verify($password, $row["contrasena"])) {
                $_SESSION["id_usuario"] = $row['id_usuario'];
                $_SESSION["k_username"] = $row['nombre'];
                $_SESSION["tipo_usuario"] = $row['tipo_usuario'];

                // Redirigir según el tipo de usuario
                if ($row["tipo_usuario"] == "administrador") {
                    header("Location: elimEventoAB.php");
                } else {
                    header("Location: indexCliente.php");
                }
                exit;
            } else {
                $warning_message = "Credenciales inválidas. Por favor, inténtalo de nuevo.";
            }
        } else {
            $warning_message = "Credenciales inválidas. Por favor, inténtalo de nuevo.";
        }

        // Cerrar la conexión
        mysqli_close($link);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80%;
            max-width: 1000px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .left-panel {
            flex: 1;
            padding: 40px;
            background-color: #2980b9;
            color: white;
            border-radius: 10px 0 0 10px;
            text-align: center;
        }

        .left-panel h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .form-panel {
            flex: 1.5;
            padding: 40px;
        }

        .form-panel h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #2980b9;
        }

        .warning-message {
            background-color: #fff3cd; /* Fondo amarillo claro */
            color: #856404; /* Texto marrón oscuro */
            border: 1px solid #ffeeba; /* Borde amarillo suave */
            padding: 15px; /* Espaciado interno */
            margin: 15px 0; /* Separación externa */
            border-radius: 5px; /* Bordes redondeados */
            font-size: 14px; /* Tamaño del texto */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1rem;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-top: 5px;
        }

        .form-group input:focus {
            border-color: #2980b9;
            outline: none;
            background-color: #fff;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #2980b9;
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #3498db;
        }

        .form-footer {
            margin-top: 20px;
            text-align: center;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .regresar-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 15px;
            background-color: #f39c12;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .regresar-btn:hover {
            background-color: #e67e22;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Panel izquierdo con texto promocional -->
        <div class="left-panel">
            <h2>Inicia sesión</h2>
            <p>Accede a tu cuenta y disfruta de los mejores eventos en Puebla.</p>
        </div>

        <!-- Panel de formulario -->
        <div class="form-panel">
            <h2>Iniciar Sesión</h2>

            <!-- Mostrar el mensaje de advertencia si existe -->
            <?php if (!empty($warning_message)): ?>
                <div class="warning-message">
                    ⚠ <?php echo $warning_message; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required placeholder="ejemplo@correo.com">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required placeholder="Introduce tu contraseña">
                </div>
                <button class="submit-btn" type="submit">Iniciar sesión</button>
                <div class="form-footer">
                    <p>¿Nuevo en el sistema? <a href="registro.php">Crea una cuenta</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Botón de regresar -->
    <button class="regresar-btn" onclick="window.history.back();">Regresar</button>

</body>
</html>
