<?php 
session_start();
include('db.php');

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Insertar los datos del formulario en la tabla de contactos
    $sql = "INSERT INTO contactos (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";
    if ($conn->query($sql) === TRUE) {
        $alerta = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      Gracias por contactarnos, $nombre. Te responderemos pronto.
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
    } else {
        $alerta = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      Error al enviar el mensaje. Por favor, inténtalo nuevamente.
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
    }
}

// Obtener los mensajes de la tabla de contactos
$sql_contactos = "SELECT * FROM contactos";
$resultado_contactos = $conn->query($sql_contactos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Empresa Tecnológica</title>
    <!-- Enlace a Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <!-- Sección de Contacto -->
    <section class="container my-5">
        <h2 class="text-center">Envíanos un mensaje</h2>

        <!-- Mostrar alerta de éxito o error -->
        <?php if (isset($alerta)) { echo $alerta; } ?>

        <form id="contactForm" method="POST" class="row g-3">
            <!-- Nombre -->
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <!-- Correo Electrónico -->
            <div class="col-md-6">
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- Mensaje -->
            <div class="col-12">
                <label for="mensaje" class="form-label">Mensaje:</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>

            <!-- Botón de Enviar -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </section>

    <!-- Mostrar los mensajes de contacto en una tabla -->
    <section class="container my-5">
        <h3 class="text-center">Mensajes Recibidos</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($contacto = $resultado_contactos->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $contacto['nombre']; ?></td>
                    <td><?php echo $contacto['email']; ?></td>
                    <td><?php echo $contacto['mensaje']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <!-- Pie de página -->
    <footer class="text-center py-3 bg-light">
        <p>&copy; 2025 Empresa Tecnológica - Todos los derechos reservados.</p>
    </footer>

    <!-- Scripts de Bootstrap (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
