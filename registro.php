<?php 
session_start();
include('functions.php');

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el correo ya existe
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $alerta = "Este correo ya está registrado.";
        $tipo_alerta = "danger"; // Error
    } else {
        // Crear el nuevo usuario
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            $alerta = "Cuenta creada con éxito. Ahora puedes <a href='login.php'>iniciar sesión</a>.";
            $tipo_alerta = "success"; // Éxito
        } else {
            $alerta = "Error al crear la cuenta: " . $conn->error;
            $tipo_alerta = "danger"; // Error
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Empresa</title>
    <link rel="stylesheet" href="style.css">
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

        p {
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

        input[type="text"],
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

        button:hover {
            background-color: #45a049;
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

    <!-- Formulario de Registro -->
    <section>
        <div class="container">
            <h2>Crear cuenta</h2>

            <!-- Mostrar alerta con mensaje de éxito o error -->
            <?php if (isset($alerta)): ?>
                <div class="alert alert-<?php echo $tipo_alerta; ?> alert-dismissible fade show" role="alert">
                    <?php echo $alerta; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
                
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required>
                
                <button type="submit">Crear cuenta</button>
            </form>

            <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
        </div>
    </section>

    <!-- Scripts de Bootstrap (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
