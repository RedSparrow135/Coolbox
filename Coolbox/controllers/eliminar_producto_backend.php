<?php
// eliminar_producto_backend.php - Lógica para eliminar un producto y registrar movimiento

// Incluir la conexión a la base de datos
include('../config/db_connection.php');

// Iniciar la sesión
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    // Si no está logueado, redirigir al login
    header("Location: login.php");
    exit();
}

// Verificar si el ID del producto está presente
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Obtener los detalles del producto antes de eliminarlo
    $query_producto = "SELECT nombre, cantidad FROM productos WHERE id = $id";
    $result_producto = $conn->query($query_producto);
    $producto = $result_producto->fetch_assoc();

    if (!$producto) {
        // Si no se encuentra el producto
        echo "Producto no encontrado.";
        exit();
    }

    // Registrar movimiento de salida antes de eliminar el producto
    $tipo_movimiento = "salida";
    $cantidad = $producto['cantidad'];
    $descripcion = "Producto eliminado del inventario";

    // Obtener el usuario logueado
    $usuario_id = $_SESSION['usuario_id'];

    // Verificar si el usuario_id es válido
    $query_usuario = "SELECT id FROM usuarios WHERE id = $usuario_id";
    $result_usuario = $conn->query($query_usuario);

    if ($result_usuario->num_rows == 0) {
        // Si no existe el usuario en la base de datos
        echo "Usuario no encontrado.";
        exit();
    }

    // Insertar el movimiento de salida en la tabla movimientos_inventario
    $sql_insert_movimiento = "INSERT INTO movimientos_inventario (producto_id, tipo_movimiento, cantidad, descripcion, usuario_id)
                              VALUES ('$id', '$tipo_movimiento', '$cantidad', '$descripcion', '$usuario_id')";
    if ($conn->query($sql_insert_movimiento) === TRUE) {
        // Eliminar los movimientos relacionados con el producto
        $sql_delete_movimientos = "DELETE FROM movimientos_inventario WHERE producto_id = $id";
        if ($conn->query($sql_delete_movimientos) === TRUE) {
            // Eliminar el producto
            $sql_delete_producto = "DELETE FROM productos WHERE id = $id";

            if ($conn->query($sql_delete_producto) === TRUE) {
                // Redirigir a la página de productos
                header("Location: ../pages/productos.php");
                exit();
            } else {
                echo "Error al eliminar el producto: " . $conn->error;
            }
        } else {
            echo "Error al eliminar los movimientos: " . $conn->error;
        }
    } else {
        echo "Error al registrar el movimiento: " . $conn->error;
    }
} else {
    echo "No se proporcionó un ID de producto válido.";
}

// Cerrar la conexión
$conn->close();
?>
