<?php
// Configuración de conexión a MySQL
$servername = "localhost";
$username = "root";   // Usuario predeterminado en XAMPP
$password = "";       // Contraseña vacía en XAMPP

// Crear la conexión
$conn = new mysqli($servername, $username, $password);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
//echo "Conexión exitosa a MySQL.<br>";

// Verificar y crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS coolbox_database";
if ($conn->query($sql) === TRUE) {
    //echo "Base de datos 'coolbox_database' verificada o creada exitosamente.<br>";
} else {
//    echo "Error al verificar o crear la base de datos: " . $conn->error . "<br>";
}

// Seleccionar la base de datos
$conn->select_db('coolbox_database');

// Verificar si la tabla 'usuarios' existe
$sql_check_table = "SHOW TABLES LIKE 'usuarios'";
$result = $conn->query($sql_check_table);

if ($result->num_rows == 0) {
    // Si la tabla 'usuarios' no existe, crearla
  //  echo "La tabla 'usuarios' no existe. Creándola...<br>";
    $sql_create_table = "
    CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(255) NOT NULL,
        correo VARCHAR(255) UNIQUE NOT NULL,
        contrasena VARCHAR(255) NOT NULL,
        rol ENUM('admin', 'empleado', 'gerente') DEFAULT 'empleado',
        fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql_create_table) === TRUE) {
    //    echo "Tabla 'usuarios' creada con éxito.<br>";
        
        // Cifrar la contraseña por defecto "123456789"
        $default_password = password_hash('123456789', PASSWORD_DEFAULT);
        
        // Insertar el usuario admin
        $sql_insert_admin = "INSERT INTO usuarios (nombre, correo, contrasena, rol) 
                             VALUES ('admin', 'admin@coolbox.com', '$default_password', 'admin')";
                             
        if ($conn->query($sql_insert_admin) === TRUE) {
      //      echo "Usuario admin creado con éxito.<br>";
        } else {
        //    echo "Error al crear el usuario admin: " . $conn->error . "<br>";
        }
    } else {
        //echo "Error al crear la tabla 'usuarios': " . $conn->error . "<br>";
    }
} else {
   // echo "La tabla 'usuarios' ya existe.<br>";
}

// Establecer el conjunto de caracteres UTF-8 para la conexión
$conn->set_charset("utf8");
?>
