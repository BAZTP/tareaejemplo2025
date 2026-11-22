<?php 
session_start();
include('functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = validarUsuario($email, $password);
    
    if ($result->num_rows > 0) {
        $_SESSION['user'] = $email;
        header('Location: dashboard.php');
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Empresa</title>
    <link rel="stylesheet" href="style.css">
    <!-- Enlace a Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS para centrar el contenido */
        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            
          
            background-color: #f4f4f4;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; /* Ancho máximo del formulario */
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
            font-weight: bold;
            color: #555;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

     

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Barra de navegación superior -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Empresa Tecnológica</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Formulario de Login -->
    <section>
        <div class="container">
            <h2>Iniciar sesión</h2>
            <form method="POST">
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required>
                
                <button type="submit">Entrar</button>
            </form>

            <!-- Botón para redirigir a la página de registro -->
            <p>Aún no tienes cuenta? <a href="registro.php"><button type="button" class="btn btn-success mt-3">Crear cuenta</button></a></p>
        </div>
    </section>

    <!-- Scripts de Bootstrap (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
