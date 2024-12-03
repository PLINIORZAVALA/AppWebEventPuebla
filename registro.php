<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="sesionStyle.css">
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
            <h2>Los mejores Eventos en Puebla</h2>
            <p>¡Únete a nuestra plataforma y disfruta de eventos increíbles en Puebla!</p>
        </div>

        <!-- Panel de formulario -->
        <div class="form-panel">
            <h2>Registrarse</h2>
            <form action="InsertUser.php" method="POST">
                <div class="form-group">
                <br>
                <br>
                <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <label for="register-email">Correo Electrónico</label>
                    <input type="email" id="register-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="register-password">Contraseña</label>
                    <input type="password" id="register-password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="first-name">Nombre</label>
                    <input type="text" id="first-name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Apellido</label>
                    <input type="text" id="last-name" name="last_name" required>
                </div>
                <button class="submit-btn" type="submit">Siguiente</button>
            </form>
        </div>
    </div>

    <!-- Botón de regresar -->
    <button class="regresar-btn" onclick="window.history.back();">Regresar</button>

</body>
</html>
