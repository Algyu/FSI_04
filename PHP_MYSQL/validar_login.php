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

$email = $_POST['email'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
$result = $conn->query($sql);

$mensaje = "";
$color = "green"; // color del mensaje

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    if (password_verify($clave, $usuario['clave'])) {
        $mensaje = "✅ Bienvenid@ " . $usuario['nombres'];
    } else {
        $mensaje = "❌ Clave incorrecta.";
        $color = "red";
    }
} else {
    $mensaje = "❌ Usuario no encontrado.";
    $color = "red";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #a6e3e9;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: radial-gradient(circle, #fff 1px, transparent 1px) repeat;
            background-size: 20px 20px;
            animation: starMove 20s linear infinite;
            z-index: -2;
        }

        @keyframes starMove {
            0% {background-position: 0 0;}
            100% {background-position: 1000px 1000px;}
        }

        .decor {
            position: absolute;
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, #fff9c4, #ffd59e, #b3e5fc);
            border-radius: 50%;
            top: -50px;
            left: -50px;
            opacity: 0.3;
            z-index: -1;
            animation: float 15s ease-in-out infinite alternate;
        }

        .decor2 {
            position: absolute;
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #b3e5fc, #81d4fa, #ffffff);
            border-radius: 50%;
            bottom: -40px;
            right: -40px;
            opacity: 0.3;
            z-index: -1;
            animation: float 12s ease-in-out infinite alternate-reverse;
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg);}
            100% { transform: translateY(-20px) rotate(15deg);}
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px 35px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 420px;
            text-align: center;
            position: relative;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 26px;
            color: #111;
        }

        .message {
            font-size: 18px;
            font-weight: bold;
            color: <?php echo $color; ?>;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #111;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 10px;
            background: linear-gradient(135deg, #fff9c4, #ffd59e, #b3e5fc, #81d4fa);
        }

        a:hover {
            box-shadow: 0 0 10px rgba(255, 249, 196, 0.5),
                        0 0 20px rgba(255, 213, 158, 0.5),
                        0 0 30px rgba(179, 229, 252, 0.5),
                        0 0 40px rgba(129, 212, 250, 0.5);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="decor"></div>
    <div class="decor2"></div>
    <div class="container">
        <h2>Bienvenid@</h2>
        <div class="message"><?php echo $mensaje; ?></div>
        <a href="login.php">Volver al login</a>
    </div>
</body>
</html>
