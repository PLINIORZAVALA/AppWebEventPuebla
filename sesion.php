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
                    header("Location: indexAdm.php");
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
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
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
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #0056b3;
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
    </style>
</head>
<body>
    <div class="container">
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
            <div class="form-footer">
                <button class="submit-btn" type="submit">Iniciar sesión</button>
                <p>¿Nuevo en el sistema? <a href="registro.php">Crea una cuenta</a></p>
            </div>
        </form>
    </div>
</body>
</html>
