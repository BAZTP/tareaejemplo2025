<?php
include('db.php');
// Crear Producto 
function crearProducto($nombre, $descripcion, $precio) {
    global $conn;
    $sql = "INSERT INTO productos (nombre, descripcion, precio) VALUES ('$nombre', '$descripcion', '$precio')";
    return $conn->query($sql);
}

// Leer Productos
function obtenerProductos() {
    global $conn;
    $sql = "SELECT * FROM productos";
    return $conn->query($sql);
}

// Actualizar Producto 
function actualizarProducto($id, $nombre, $descripcion, $precio) {
    global $conn;
    $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id='$id'";
    return $conn->query($sql);
}

// Eliminar Producto
function eliminarProducto($id) {
    global $conn;
    $sql = "DELETE FROM productos WHERE id='$id'";
    return $conn->query($sql);
}

// Validación de Usuario (Login)
function validarUsuario($email, $password) {
    global $conn;
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    return $conn->query($sql);
}
?>
