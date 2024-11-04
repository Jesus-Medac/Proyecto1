<?php
// Verificamos si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos y limpiamos los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $edad = isset($_POST['edad']) ? (int)$_POST['edad'] : 0;
    $genero = isset($_POST['genero']) ? htmlspecialchars(trim($_POST['genero'])) : 'No especificado';
    
    $email = htmlspecialchars(trim($_POST['email']));
    $codigo_postal = htmlspecialchars(trim($_POST['codigo_postal']));
    $direccion = htmlspecialchars(trim($_POST['direccion']));
    $ciudad = htmlspecialchars(trim($_POST['ciudad']));
    $contrasena = htmlspecialchars(trim($_POST['contrasena']));

    $estado_civil = isset($_POST['estado_civil']) ? htmlspecialchars(trim($_POST['estado_civil'])) : 'No especificado';
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
    $comentarios = htmlspecialchars(trim($_POST['comentarios']));

    // Validación básica de la edad
    if ($edad <= 0) {
        die("La edad debe ser un número positivo.");
    }

    // Validación del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El correo electrónico no es válido.");
    }

    // Mostrar los datos recibidos
    echo "<h1>Datos recibidos</h1>";
    echo "<p><strong>Nombre:</strong> $nombre $apellido</p>";
    echo "<p><strong>Edad:</strong> $edad</p>";
    echo "<p><strong>Género:</strong> $genero</p>";
    
    echo "<h2>Contacto</h2>";
    echo "<p><strong>Correo Electrónico:</strong> $email</p>";
    echo "<p><strong>Código Postal:</strong> $codigo_postal</p>";
    echo "<p><strong>Dirección:</strong> $direccion</p>";
    echo "<p><strong>Ciudad:</strong> $ciudad</p>";
    echo "<p><strong>Contraseña:</strong> ********</p>"; // Mostramos asteriscos por seguridad
    
    echo "<h2>Datos de Interés</h2>";
    echo "<p><strong>Estado Civil:</strong> $estado_civil</p>";
    echo "<p><strong>Hobbies:</strong> " . implode(", ", $hobbies) . "</p>";
    echo "<p><strong>Comentarios:</strong> $comentarios</p>";

    // Almacenamiento seguro de la contraseña (en un entorno real)
    $hashed_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    // Aquí podrías almacenar $hashed_contrasena en tu base de datos

} else {
    // Si no se han enviado datos, redirigir al formulario
    header("Location: index.html");
    exit();
}
?>

