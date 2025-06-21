<?php
// editar_proveedor_backend.php - Lógica para editar un proveedor

include('../config/db_connection.php');

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $direccion = mysqli_real_escape_string($conn, $_POST['direccion']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);

    // Actualizar el proveedor en la base de datos
    $sql_update_proveedor = "UPDATE proveedores SET nombre = '$nombre', direccion = '$direccion', telefono = '$telefono', correo = '$correo' 
                             WHERE id = '$id'";

    if ($conn->query($sql_update_proveedor) === TRUE) {
        // Redirigir a la página de proveedores
        header("Location: ../pages/proveedores.php");
        exit();
    } else {
        echo "Error al editar el proveedor: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
