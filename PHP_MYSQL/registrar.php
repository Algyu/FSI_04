<?php
$host = "localhost";
$port = 8889; 
$user = "root";
$password = "root";
$database = "mi_base";

$conn = new mysqli($host, $user, $password, $database, $port);
if ($conn->connect_error) {
    die("❌ Error: " . $conn->connect_error);
}

// Captura de datos
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$documento = $_POST['documento'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$email = $_POST['email'];
$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
$fecha_nacimiento = $_POST['fecha_nacimiento'];

// Insertar en la tabla
$sql = "INSERT INTO usuarios (nombres, apellidos, documento, ciudad, pais, email, clave, fecha_nacimiento)
        VALUES ('$nombres', '$apellidos', '$documento', '$ciudad', '$pais', '$email', '$clave', '$fecha_nacimiento')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Usuario registrado con éxito.<br>";
    echo "<a href='login.php'>Ir al login</a>";
} else {
    echo "❌ Error al registrar: " . $conn->error;
}

$conn->close();
?>
