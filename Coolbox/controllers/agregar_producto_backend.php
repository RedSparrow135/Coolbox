<?php
// agregar_producto_backend.php - Lógica para agregar un producto y registrar movimiento

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

// Obtener el ID del usuario desde la sesión
$usuario_id = $_SESSION['usuario_id'];

// Verificar que el usuario existe en la base de datos
$query_usuario = "SELECT id FROM usuarios WHERE id = '$usuario_id'";
$result_usuario = $conn->query($query_usuario);

if ($result_usuario->num_rows == 0) {
    // Si el usuario no existe en la base de datos
    echo "Usuario no encontrado.";
    exit();
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conn, $_POST['precio']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad']);
    $categoria_id = mysqli_real_escape_string($conn, $_POST['categoria_id']);
    $imagen = $_FILES['imagen']['name'];

    // Subir la imagen del producto
    $target_dir = "../assets/img/";
    $target_file = $target_dir . basename($imagen);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);

    // Insertar el nuevo producto
    $sql_insert_producto = "INSERT INTO productos (nombre, descripcion, precio, cantidad, categoria_id, imagen)
                            VALUES ('$nombre', '$descripcion', '$precio', '$cantidad', '$categoria_id', '$imagen')";

    if ($conn->query($sql_insert_producto) === TRUE) {
        // Obtener el ID del producto insertado
        $producto_id = $conn->insert_id;

        // Registrar un movimiento de entrada
        $tipo_movimiento = "entrada";
        $descripcion_movimiento = "Producto agregado al inventario";

        // Insertar el movimiento de entrada en la tabla movimientos_inventario
        $sql_insert_movimiento = "INSERT INTO movimientos_inventario (producto_id, tipo_movimiento, cantidad, descripcion, usuario_id)
                                  VALUES ('$producto_id', '$tipo_movimiento', '$cantidad', '$descripcion_movimiento', '$usuario_id')";

        if ($conn->query($sql_insert_movimiento) === TRUE) {
            // Redirigir a la página de productos
            header("Location: ../pages/productos.php");
            exit();
        } else {
            echo "Error al registrar el movimiento: " . $conn->error;
        }
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
