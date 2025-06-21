<?php
// eliminar_proveedor_backend.php - Lógica para eliminar un proveedor

include('../config/db_connection.php');

// Verificar si el ID del proveedor está presente
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Eliminar el proveedor de la base de datos
    $sql_delete_proveedor = "DELETE FROM proveedores WHERE id = $id";

    if ($conn->query($sql_delete_proveedor) === TRUE) {
        // Redirigir a la página de proveedores
        header("Location: ../pages/proveedores.php");
        exit();
    } else {
        echo "Error al eliminar el proveedor: " . $conn->error;
    }
} else {
    echo "No se proporcionó un ID de proveedor válido.";
}

// Cerrar la conexión
$conn->close();
?>
