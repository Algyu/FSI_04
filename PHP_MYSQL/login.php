<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
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

        /* Fondo animado con estrellas */
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

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
            text-align: left;
        }

        input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
            background: #fff;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #81d4fa;
            background: #f0f8ff;
            outline: none;
            box-shadow: 0 0 6px rgba(129, 212, 250, 0.5);
        }

        button {
            background: linear-gradient(135deg, #fff9c4, #ffd59e, #ffffff, #b3e5fc, #81d4fa);
            color: #111;
            font-size: 16px;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(255, 249, 196, 0.6),
                        0 0 25px rgba(255, 213, 158, 0.6),
                        0 0 35px rgba(179, 229, 252, 0.6),
                        0 0 45px rgba(129, 212, 250, 0.6);
        }

        .message {
            margin-top: 15px;
            font-weight: bold;
            color: green;
            font-size: 18px;
        }

    </style>
</head>
<body>
    <div class="decor"></div>
    <div class="decor2"></div>
    <div class="container">
        <h2>Bienvenid@</h2>
        <form action="validar_login.php" method="post">
            <div>
                <label for="email">Correo:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="clave">Contraseña:</label>
                <input type="password" id="clave" name="clave" required>
            </div>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
