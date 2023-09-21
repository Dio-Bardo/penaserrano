<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);// Datos de conexión a la base de datos
$host = "192.168.1.16"; // Cambia esto si tu servidor de MySQL no está en local>
$usuario = "papu"; // Cambia esto al nombre de usuario de tu base de datos
$contrasena = "4ntil0p3"; // Cambia esto a tu contraseña de la base de datos
$base_de_datos = "nombre_de_la_base_de_datos"; // Cambia esto al nombre de tu b>

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verifica la conexión
if ($conexion->connect_error) {
    die("La conexión a la base de datos falló: " . $conexion->connect_error);
}

// Obtiene los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Hash de la contraseña (debes mejorar esto con medidas de seguridad adecuadas)
$hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

// Inserta los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$hashed_password')";

if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso. <a href='login.html'>Iniciar sesión</a>";
} else {
    echo "Error al registrar: " . $conexion->error;
}

// Cierra la conexión
$conexion->close();
?>
