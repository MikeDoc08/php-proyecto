<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./source/style/login.css">
</head>
<body>
    <form action="index.php" method="post">
        <label for="email">Correo del usuario:</label>
        <input type="text" id="email" name="email" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>

<?php
// Inicia una sesión para permitir el uso de variables de sesión
session_start();

// Establece la conexión con la base de datos MySQL utilizando la clase mysqli
$mysqli = new mysqli("localhost", "root", "dnkm<UqR", "proyecto-php");

// Verifica si la conexión a la base de datos fue exitosa
if($mysqli === false){
    // Si no se pudo establecer la conexión, muestra un mensaje de error y termina el script
    die("ERROR: No se pudo conectar. " . $mysqli->connect_error);
}

// Verifica si la solicitud HTTP es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el nombre de usuario (email) y la contraseña del formulario de inicio de sesión
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Prepara la consulta SQL para seleccionar el ID, nombre y apellido del usuario basado en el email y contraseña proporcionados
    $sql = "SELECT id, name, lastname FROM usuarios WHERE email = ? AND password = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        // Vincula los parámetros de la consulta SQL con las variables de PHP
        $stmt->bind_param("ss", $username, $password);
        // Ejecuta la consulta SQL
        if ($stmt->execute()) {
            // Almacena los resultados de la consulta en memoria
            $stmt->store_result();
            // Verifica si se encontró exactamente un registro que coincida con el email y contraseña proporcionados
            if ($stmt->num_rows == 1) {
                // Vincula los resultados de la consulta a variables PHP
                $stmt->bind_result($id, $nombre_usuario, $apellido_usuario);
                // Obtiene los valores de las variables vinculadas
                if ($stmt->fetch()) {
                    // Establece las variables de sesión con el ID, nombre y apellido del usuario
                    $_SESSION['id'] = $id;
                    $_SESSION['name'] = $nombre_usuario;
                    $_SESSION['last-name'] = $apellido_usuario;
                    // Redirige al usuario a la página principal después de iniciar sesión
                    header("location: ../index.php");
                }
            } else {
                // Si no se encontró ningún registro que coincida con el email y contraseña, muestra un mensaje de error
                echo "El nombre de usuario o la contraseña son incorrectos.";
            }
        } else {
            // Si ocurre algún error durante la ejecución de la consulta, muestra un mensaje de error
            echo "Oops! Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
        }
        // Cierra la consulta preparada
        $stmt->close();
    }
    // Cierra la conexión a la base de datos
    $mysqli->close();
}
?>
