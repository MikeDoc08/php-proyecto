<?php
// Inicia una sesión para permitir el uso de variables de sesión
session_start();

// Verifica si la variable de sesión "id" no está establecida o está vacía
if(!isset($_SESSION["id"]) || empty($_SESSION["id"])){
    // Si no hay una sesión activa o la variable "id" está vacía,
    // redirige al usuario a la página de inicio de sesión
    header("location: ./login/index.php");
    // Detiene la ejecución del script para evitar que se ejecute más código después de la redirección
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <!-- Este fragmento de código PHP imprime el nombre y el apellido del usuario utilizando las variables de sesión "name" y "last-name", respectivamente. Estas variables de sesión deberían haber sido previamente almacenadas durante el proceso de inicio de sesión y contener los valores correspondientes al nombre y apellido del usuario. -->
    <h1>Bienvenido, <?php echo $_SESSION['name']; ?> <?php echo $_SESSION['last-name'];?>!</h1>
    <a href="off-session.php">Cerrar sesión</a>
</body>
</html>