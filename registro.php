<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="sesionStyle.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h2>Pase de acceso total</h2>
            <p>Esto es todo: millones de eventos en vivo, alertas actualizadas de tus artistas y equipos favoritos y, por supuesto, emisión de boletos siempre segura.</p>
        </div>
        <div class="form-panel">
            <h2>Registrarse</h2>
            <form action="InsertUser.php" method="POST">
                <div class="form-group">
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
                <div class="form-footer">
                    <p>Al continuar, aceptas los <a href="#">términos</a> y la <a href="#">Política de Privacidad</a>.</p>
                    <p>¿Ya tienes cuenta? <a href="#">Inicia sesión</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
