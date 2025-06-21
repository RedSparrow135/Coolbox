<?php
// editar_producto_backend.php - Lógica para actualizar un producto

// Incluir la conexión a la base de datos
include('../config/db_connection.php');

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conn, $_POST['precio']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad']);
    $imagen = $_FILES['imagen']['name'];

    // Verificar si se subió una nueva imagen
    if ($imagen) {
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $ruta_imagen = "../assets/img/" . basename($imagen);
        move_uploaded_file($imagen_tmp, $ruta_imagen);
    } else {
        // Mantener la imagen actual si no se sube una nueva
        $sql = "SELECT imagen FROM productos WHERE id = $id";
        $result = $conn->query($sql);
        $producto = $result->fetch_assoc();
        $imagen = $producto['imagen'];
    }

    // Actualizar los datos del producto en la base de datos
    $sql_update = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', 
                  cantidad='$cantidad', imagen='$imagen' WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        // Redirigir al inventario después de la actualización
        header("Location: ../pages/productos.php");
        exit();
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
