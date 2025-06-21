<?php
// Iniciar la sesión
session_start();

// Incluir la conexión a la base de datos
include('../config/db_connection.php');


// Verificar si los datos fueron enviados desde el formulario
if (isset($_POST['correo']) && isset($_POST['clave'])) {
    // Sanitizar las entradas del usuario para prevenir inyecciones SQL
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $clave = $_POST['clave'];

    // Consulta SQL para obtener los datos del usuario por correo
    $query = "SELECT * FROM usuarios WHERE correo = '$correo' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Obtener los datos del usuario
        $usuario = mysqli_fetch_assoc($result);

        // Verificar si la contraseña ingresada coincide con la contraseña almacenada
        if (password_verify($clave, $usuario['contrasena'])) {
            // Si la contraseña es correcta, crear variables de sesión
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_rol'] = $usuario['rol'];  // Agregar el rol del usuario

            // Redirigir al inventario o dashboard
            header("Location: ../pages/inventario.php");
            exit();
        } else {
            // Si la contraseña no es correcta
            echo "Contraseña incorrecta.";
        }
    } else {
        // Si el correo no está registrado
        echo "Usuario no encontrado.";
    }
} else {
    echo "Por favor ingrese su correo y contraseña.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
