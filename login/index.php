<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login JyC</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<h1><i>Iniciar sesión</i></h1>

<form action="procesar_login.php" method="post">

    <div class="form-group">
         <label for="nombre">Nombre completo:</label>
         <input type="text" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono" required>
    </div>
    <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
    </div>
    <button type="submit">Iniciar sesión</button>
</form>
</body>
</html>
