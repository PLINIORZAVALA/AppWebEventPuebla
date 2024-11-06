<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="sesionStyle.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h2>Pase de acceso total</h2>
            <p>Esto es todo: millones de eventos en vivo, alertas actualizadas de tus artistas y equipos favoritos y, por supuesto, emisión de boletos siempre segura.</p>
        </div>
        <div class="form-panel">
            <h2>Iniciar Sesión</h2>
            <form action="validarUsuario.php" method="POST">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="remember-me" name="remember">
                    <label for="remember-me">Recuérdame</label>
                </div>
                <button class="submit-btn" type="submit">Iniciar sesión</button>
                <div class="form-footer">
                    <p>¿Nuevo en Ticketmaster? <a href="#">Crea una cuenta</a></p>
                    <p><a href="#">Olvidé mi contraseña</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
