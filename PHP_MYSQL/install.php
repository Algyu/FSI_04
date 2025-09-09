<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$port = 8889; 
$user = "root";
$password = "root";

// Conexión
$conn = new mysqli($host, $user, $password, "", $port);
if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}

// Crear base de datos
if ($conn->query("CREATE DATABASE IF NOT EXISTS mi_base") === TRUE) {
    echo "✅ Base de datos 'mi_base' creada o ya existe.<br>";
}

$conn->select_db("mi_base");

// Crear tabla usuarios
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    documento VARCHAR(20) NOT NULL UNIQUE,
    ciudad VARCHAR(50) NOT NULL,
    pais VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    fecha_nacimiento DATE NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "✅ Tabla 'usuarios' lista con todos los campos.<br>";
} else {
    echo "❌ Error al crear tabla: " . $conn->error . "<br>";
}

$conn->close();
?>
