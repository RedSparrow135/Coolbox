<?php
// agregar_proveedor_backend.php - Lógica para agregar un proveedor

include('../config/db_connection.php');

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $direccion = mysqli_real_escape_string($conn, $_POST['direccion']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);

    // Insertar el proveedor en la base de datos
    $sql_insert_proveedor = "INSERT INTO proveedores (nombre, direccion, telefono, correo)
                             VALUES ('$nombre', '$direccion', '$telefono', '$correo')";

    if ($conn->query($sql_insert_proveedor) === TRUE) {
        // Redirigir a la página de proveedores
        header("Location: ../pages/proveedores.php");
        exit();
    } else {
        echo "Error al agregar el proveedor: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
