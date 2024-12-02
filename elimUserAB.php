<!DOCTYPE html>
<html lang="es">
<head>
    <title>Aplicación de eventos Puebla</title>
    <link href="style1.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    

    <script language="JavaScript">
    function confirmSubmit() {
      var eli=confirm("Est� seguro de eliminar este registro?");
      if (eli) return true ;
      else return false ;
    }
    </script>
</head>
<body>



<div id="wrap">
  <div id="masthead"> <h1> Bienvenido administrador</h1> </div>
   
  <div id="menucontainer">
    <div id="menunav">
      <ul>
        <li><a href="elimEventoAB.php" class="current"><span>Eventos</span></a></li>
        <li><a href="elimUserAB.php"><span>Usuarios</span></a></li>
      </ul>
    </div>
  </div>
  <div id="container">
    <div id="content">
      <h3>Administracion de todos los eventos</h3>

      <?php
        $link = mysqli_connect("localhost", "root", "", "event");

        if (!$link) {
            die('Error de conexión: ' . mysqli_connect_error());
        }

        $resultado = mysqli_query($link, "SELECT id_usuario, nombre, email, contrasena, tipo_usuario FROM usuarios");

        if (!$resultado) {
            die('Error en la consulta: ' . mysqli_error($link));
        }

        echo "<h2>Lista de Usuarios</h2>";

        echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Tipo de Usuario</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
              </tr>";

        while ($ren = mysqli_fetch_array($resultado)) {
            $id_usuario = $ren['id_usuario'];
            $nombre = $ren['nombre'];
            $email = $ren['email'];
            $contrasena = $ren['contrasena'];
            $tipo_usuario = $ren['tipo_usuario'];

            echo "<tr>
                    <td>$id_usuario</td>
                    <td>$nombre</td>
                    <td>$email</td>
                    <td>$contrasena</td>
                    <td>$tipo_usuario</td>
                    <td><center>
                        <a onclick=\"return confirm('¿Estás seguro de eliminar este usuario?')\" href=\"elimUserAB2.php?id_usuario=$id_usuario\"><img src='eliminar.bmp' width='14' height='14' border='0'></a>
                        </center>
                    </td>
                    <td><center>
                        <a href=\"actuUsernew.php?id_usuario=$id_usuario\"><img src='actualiza.jpg' width='25' height='25' border='0'></a>
                        </center>
                    </td>
                  </tr>";
        }

        echo "</table>";

        mysqli_free_result($resultado); 
        mysqli_close($link);  
      ?>


    </div>
  </div>
  <div id="footer"> 
    <a href="index.php">Cerrar Sesión</a> 
  </div>
</div>
</body>
</html>
