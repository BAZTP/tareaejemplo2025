<?php
session_start();
include('functions.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Cerrar sesión si se recibe la petición "logout"
if (isset($_GET['logout'])) {
    session_destroy(); // Destruir la sesión
    header('Location: login.php'); // Redirigir a login
    exit();
}

// Variables para manejar alertas
$alerta = '';
$tipo_alerta = '';

// Procesar el formulario cuando se envía (Crear, Actualizar, Eliminar)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['crear'])) {
        // Crear Producto
        if (crearProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'])) {
            $alerta = 'Producto creado con éxito.';
            $tipo_alerta = 'success';
        } else {
            $alerta = 'Error al crear el producto.';
            $tipo_alerta = 'danger';
        }
    } elseif (isset($_POST['actualizar'])) {
        // Actualizar Producto
        if (actualizarProducto($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'])) {
            $alerta = 'Producto actualizado con éxito.';
            $tipo_alerta = 'success';
        } else {
            $alerta = 'Error al actualizar el producto.';
            $tipo_alerta = 'danger';
        }
    } elseif (isset($_POST['eliminar'])) {
        // Eliminar Producto
        if (eliminarProducto($_POST['id'])) {
            $alerta = 'Producto eliminado con éxito.';
            $tipo_alerta = 'success';
        } else {
            $alerta = 'Error al eliminar el producto.';
            $tipo_alerta = 'danger';
        }
    }
}

// Obtener productos
$productos = obtenerProductos();

// Si se va a editar un producto, obtenemos los datos
$productoParaEditar = null;
if (isset($_GET['editar_id'])) {
    $idProducto = $_GET['editar_id'];
    $productoParaEditar = $conn->query("SELECT * FROM productos WHERE id = $idProducto")->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Empresa</title>
    <!-- Enlace a Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" >
    <style>
        /* Estilo personalizado para mover el botón de cerrar sesión */
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido al Dashboard</h2>
        <h3>Administrar Productos</h3>

        <!-- Botón de Cerrar Sesión -->
        <a href="dashboard.php?logout=true" class="btn btn-danger mb-4 logout-btn">Cerrar Sesión</a>

        <!-- Mostrar alerta con mensaje de éxito o error -->
        <?php if ($alerta != ''): ?>
            <div class="alert alert-<?php echo $tipo_alerta; ?> alert-dismissible fade show" role="alert" id="alerta">
                <?php echo $alerta; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Formulario para Crear Producto -->
        <form method="POST" class="mb-4">
            <h4>Crear Producto</h4>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" name="descripcion" required></textarea>
            </div>
            
            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" class="form-control" name="precio" step="0.01" required>
            </div>
            
            <button type="submit" name="crear" class="btn btn-primary">Crear Producto</button>
        </form>

        <!-- Lista de Productos -->
        <h4>Lista de Productos</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($producto = $productos->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td>
                        <!-- Botón de editar -->
                        <a href="#editarModal" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal<?php echo $producto['id']; ?>">Editar</a>
                        <!-- Formulario de eliminación -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <button type="submit" name="eliminar" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal de edición -->
                <div class="modal fade" id="editarModal<?php echo $producto['id']; ?>" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarModalLabel">Actualizar Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción:</label>
                                        <textarea class="form-control" name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="precio" class="form-label">Precio:</label>
                                        <input type="number" class="form-control" name="precio" value="<?php echo $producto['precio']; ?>" step="0.01" required>
                                    </div>
                                    <button type="submit" name="actualizar" class="btn btn-warning">Actualizar Producto</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts de Bootstrap (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para cerrar las alertas después de 5 segundos -->
    <script>
        // Verificar si hay una alerta en la página
        const alerta = document.getElementById('alerta');
        if (alerta) {
            // Cerrar la alerta después de 5 segundos
            setTimeout(function() {
                alerta.classList.remove('show');
            }, 5000); // 5000 ms = 5 segundos
        }
    </script>
</body>
</html>
