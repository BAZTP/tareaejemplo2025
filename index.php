<?php
session_start();
include('functions.php');

// Consultar productos desde la base de datos
$sql = "SELECT nombre, descripcion, precio FROM productos";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa Tecnológica</title>
    <!-- Enlace a Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <style>
        /* Estilo adicional para mejorar el carrusel */
        .carousel-item img {
            width: 100%;
            height: 300px; /* Ajusta el tamaño del carrusel */
            object-fit: cover;
        }

        .carousel-container {
            margin-bottom: 30px;
        }

        /* Estilo para los apartados de productos */
        .product-section {
            text-align: center;
            margin-top: 40px;
        }

        .product-section .col-md-2 {
            margin-bottom: 20px;
        }

        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Estilo para la tabla de cotización */
        table {
            margin-top: 30px;
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

    <!-- Carrusel -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-container" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagen.webp" class="d-block w-100" alt="Producto 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Cloud Computing</h5>       
                </div>
            </div>
            <div class="carousel-item">
                <img src="imagen2.jpg" class="d-block w-100" alt="Producto 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Gestión de TI</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="imagen3.jpg" class="d-block w-100" alt="Producto 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Data Center</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="imagen4.jpg" class="d-block w-100" alt="Producto 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Seguridad informática</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="imagen5.jpg" class="d-block w-100" alt="Producto 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Aplicaciones Empresariales</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="imagen.jpg" class="d-block w-100" alt="Producto 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Infraestructura TI</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="imagen9.webp" class="d-block w-100" alt="Producto 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Redes empresariales</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Sección de Productos -->
    <section class="container my-5 product-section">
        <h2>Nuestros Productos</h2>
        <p>Conoce nuestros productos y servicios.</p>

        <!-- Apartados de productos -->
        <div class="row">
            <div class="col-md-2">
                <div class="card product-card">
                    <img src="imagen.webp" class="card-img-top" alt="Producto 1">
                    <div class="card-body">
                        <h5 class="card-title">Cloud Computing</h5>
                        <p class="card-text">
                        Las Soluciones de Nube están enfocadas a que nuestros clientes accedan a herramientas tecnológicas de primer nivel y clase mundial, beneficiándose a su vez de un ahorro significativo de tiempo y costos.</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card product-card">
                    <img src="imagen2.jpg" class="card-img-top" alt="Producto 2">
                    <div class="card-body">
                        <h5 class="card-title">Gestión de TI</h5>
                        
                        <p class="card-text">Consultoría e implementación de procesos y prácticas ITIL, CoBIT, ISO20000 para la implementación de soluciones de mesas de ayuda, gestión de monitoreo y gestión de activos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card product-card">
                    <img src="imagen3.jpg" class="card-img-top" alt="Producto 3">
                    <div class="card-body">
                        <h5 class="card-title">Data Center</h5>
                        <p class="card-text">Nuestra propuesta incluye 
                            el análisis de sus necesidades, el diseño y la Implementación de la infraestructura para que su Data Center alcance el nivel de certificación TIER que cubra las necesidades de su negocio.</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card product-card">
                    <img src="imagen4.jpg" class="card-img-top" alt="Producto 4">
                    <div class="card-body">
                        <h5 class="card-title">Seguridad informática</h5>
                        <p class="card-text">
                        Implementación de soluciones empresariales de seguridad de DataCenter y usuario final.</p>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card product-card">
                    <img src="imagen5.jpg" class="card-img-top" alt="Producto 5">
                    <div class="card-body">
                        <h5 class="card-title">Aplicaciones Empresariales</h5>
                        <p class="card-text">Las soluciones analíticas ayudan a los usuarios de negocio a descubrir y entender patrones significativos de datos, además aplicar las herramientas analíticas a los datos de negocio para describir, proyectar 
                            y mejorar el rendimiento de negocio, recomendar acciones y guiar la toma de decisiones.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card product-card">
                    <img src="imagen.jpg" class="card-img-top" alt="Producto 6">
                    <div class="card-body">
                        <h5 class="card-title">Infraestuctura TI</h5>
                        <p class="card-text">Obtenga una infraestructura 
                            de procesamiento, adaptable a las cargas de trabajo, escalable y rentable que garanticen la disponibilidad de sus aplicaciones y la entrega más rápida de servicios, alineándose a los objetivos empresariales.</p>
                        
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Tabla de cotización -->
        <h3 class="my-5">Cotización</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $result->data_seek(0); // Reseteamos el puntero del resultado
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['nombre']}</td>
                            <td>{$row['descripcion']}</td>
                            <td>\${$row['precio']}</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Scripts de Bootstrap (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
