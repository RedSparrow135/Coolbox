<?php
// editar_producto_backend.php - Lógica para editar un producto y registrar movimiento

include('../config/db_connection.php');

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conn, $_POST['precio']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad']);
    $categoria_id = mysqli_real_escape_string($conn, $_POST['categoria_id']);
    $imagen = $_FILES['imagen']['name'];

    // Subir la nueva imagen del producto (si se ha subido una)
    if ($imagen != '') {
        $target_dir = "../assets/img/";
        $target_file = $target_dir . basename($imagen);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);
        $sql_update_imagen = ", imagen = '$imagen'"; // Solo si la imagen es cambiada
    } else {
        $sql_update_imagen = "";
    }

    // Obtener el producto original
    $query_original = "SELECT cantidad FROM productos WHERE id = $id";
    $result_original = $conn->query($query_original);
    $producto_original = $result_original->fetch_assoc();
    $cantidad_original = $producto_original['cantidad'];

    // Actualizar el producto
    $sql_update_producto = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', 
                            cantidad = '$cantidad', categoria_id = '$categoria_id' $sql_update_imagen
                            WHERE id = $id";

    if ($conn->query($sql_update_producto) === TRUE) {
        // Determinar el tipo de movimiento
        $usuario_id = $_SESSION['usuario_id'];  // Asumimos que el usuario está logueado
        if ($cantidad > $cantidad_original) {
            // Movimiento de entrada
            $tipo_movimiento = "entrada";
            $descripcion_movimiento = "Entrada de producto (ajuste)";
        } else {
            // Movimiento de salida
            $tipo_movimiento = "salida";
            $descripcion_movimiento = "Salida de producto (ajuste)";
        }

        // Registrar el movimiento en la tabla movimientos_inventario
        $sql_insert_movimiento = "INSERT INTO movimientos_inventario (producto_id, tipo_movimiento, cantidad, descripcion, usuario_id)
                                  VALUES ('$id', '$tipo_movimiento', ABS($cantidad - $cantidad_original), '$descripcion_movimiento', '$usuario_id')";

        if ($conn->query($sql_insert_movimiento) === TRUE) {
            // Redirigir a la página de productos
            header("Location: ../pages/productos.php");
            exit();
        } else {
            echo "Error al registrar el movimiento: " . $conn->error;
        }
    } else {
        echo "Error al editar el producto: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
