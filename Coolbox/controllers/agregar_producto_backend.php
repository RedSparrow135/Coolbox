<?php
// agregar_producto_backend.php - Lógica para agregar un nuevo producto

// Incluir la conexión a la base de datos
include('../config/db_connection.php');

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recoger los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conn, $_POST['precio']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad']);
    $categoria_id = mysqli_real_escape_string($conn, $_POST['categoria_id']);
    
    // Verificar si se subió una imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
        // Obtener los datos de la imagen
        $imagen = $_FILES['imagen']['name'];  // Nombre del archivo
        $imagen_tmp = $_FILES['imagen']['tmp_name'];  // Ruta temporal del archivo
        $ruta_imagen = "../assets/img/" . basename($imagen);
        
        // Subir la imagen al directorio
        if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
            echo "La imagen se subió correctamente.<br>";
        } else {
            echo "Error al subir la imagen.<br>";
        }
    } else {
        // Si no se sube una imagen, se asigna una imagen por defecto
        $imagen = 'default.jpg';
    }
    
    // Insertar el producto en la base de datos
    $sql = "INSERT INTO productos (nombre, descripcion, precio, cantidad, imagen, categoria_id) 
            VALUES ('$nombre', '$descripcion', '$precio', '$cantidad', '$imagen', '$categoria_id')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirigir al inventario después de agregar el producto
        header("Location: ../pages/productos.php");
        exit();
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
