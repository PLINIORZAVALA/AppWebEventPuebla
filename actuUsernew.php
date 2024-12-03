<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicación de eventos Puebla</title>
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

        #wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80%;
            max-width: 1000px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        #content {
            padding: 40px;
            width: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 1rem;
            color: #333;
        }

        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        input[type="text"]:focus, input[type="password"]:focus, select:focus {
            border-color: #2980b9;
            outline: none;
            background-color: #fff;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #2980b9;
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3498db;
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

<div id="wrap">
    <div id="container">
        <div id="content">

            <?php
                // Conexión a la base de datos
                $link = mysqli_connect("localhost", "root", "", "event");

                if (!$link) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                // Obteniendo el ID de usuario desde la URL de forma segura
                $id = isset($_GET['id_usuario']) ? (int) $_GET['id_usuario'] : 0;

                // Preparar y ejecutar consulta segura
                $stmt = mysqli_prepare($link, "SELECT nombre, email, contrasena, tipo_usuario FROM usuarios WHERE id_usuario = ?");
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                // Verificar si se obtuvo un resultado
                if ($ren = mysqli_fetch_assoc($result)) {
                    echo '<form method="POST" action="actuUser2.php">';
                    echo "<label for='nombre'>Nombre:</label><input type='text' name='nombre' value='" . htmlspecialchars($ren['nombre']) . "' required><br>";
                    echo "<label for='email'>Email:</label><input type='text' name='email' value='" . htmlspecialchars($ren['email']) . "' required><br>";
                    echo "<label for='contrasena'>Contraseña:</label><input type='password' name='contrasena' value='" . htmlspecialchars($ren['contrasena']) . "' required><br>";
                    
                    // Campo para seleccionar el tipo de usuario
                    echo "<label for='tipo_usuario'>Tipo de usuario:</label>
                          <select name='tipo_usuario' required>
                            <option value='visitante'" . ($ren['tipo_usuario'] == 'visitante' ? ' selected' : '') . ">Visitante</option>
                            <option value='organizador'" . ($ren['tipo_usuario'] == 'organizador' ? ' selected' : '') . ">Organizador</option>
                            <option value='administrador'" . ($ren['tipo_usuario'] == 'administrador' ? ' selected' : '') . ">Administrador</option>
                          </select><br>";

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
</div>

<button class="regresar-btn" onclick="window.history.back();">Regresar</button>

</body>
</html>
