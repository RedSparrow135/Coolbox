<?php
// Incluir la conexión a la base de datos
include('../config/db_connection.php'); // Ruta correcta al archivo de conexión

// Crear las tablas necesarias si no existen

// 1. Crear tabla de usuarios
$sql_create_users_table = "
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo VARCHAR(255) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    rol ENUM('admin', 'empleado', 'gerente') DEFAULT 'empleado',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql_create_users_table) === TRUE) {
    echo "Tabla 'usuarios' verificada o creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'usuarios': " . $conn->error . "<br>";
}

// 2. Crear tabla de categorías
$sql_create_categories_table = "
CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT
)";
if ($conn->query($sql_create_categories_table) === TRUE) {
    echo "Tabla 'categorias' verificada o creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'categorias': " . $conn->error . "<br>";
}

// Verificar si las categorías ya existen, si no agregarlas
$sql_check_categorias = "SELECT COUNT(*) AS total FROM categorias WHERE nombre IN ('Electrónica', 'Accesorios', 'Gaming')";
$result = $conn->query($sql_check_categorias);
$row = $result->fetch_assoc();

if ($row['total'] == 0) {
    // Insertar las categorías si no existen
    $sql_insert_categorias = "
        INSERT INTO categorias (nombre, descripcion) VALUES
        ('Electrónica', 'Productos electrónicos como teléfonos, computadoras, etc.'),
        ('Accesorios', 'Accesorios para dispositivos electrónicos.'),
        ('Gaming', 'Productos relacionados con juegos y consolas.')";

    if ($conn->query($sql_insert_categorias) === TRUE) {
        echo "Categorías de productos insertadas con éxito.<br>";
    } else {
        echo "Error al insertar las categorías: " . $conn->error . "<br>";
    }
} else {
    echo "Las categorías ya están presentes en la base de datos.<br>";
}




// 3. Crear tabla de productos
$sql_create_products_table = "
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2),
    cantidad INT DEFAULT 0,
    imagen VARCHAR(255),
    categoria_id INT,
    fecha_agregado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)";
if ($conn->query($sql_create_products_table) === TRUE) {
    echo "Tabla 'productos' verificada o creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'productos': " . $conn->error . "<br>";
}

// 4. Crear tabla de movimientos de inventario
$sql_create_inventory_movements_table = "
CREATE TABLE IF NOT EXISTS movimientos_inventario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT,
    tipo_movimiento ENUM('entrada', 'salida') NOT NULL,
    cantidad INT NOT NULL,
    usuario_id INT,
    fecha_movimiento TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    descripcion TEXT,
    FOREIGN KEY (producto_id) REFERENCES productos(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
)";
if ($conn->query($sql_create_inventory_movements_table) === TRUE) {
    echo "Tabla 'movimientos_inventario' verificada o creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'movimientos_inventario': " . $conn->error . "<br>";
}

// 5. Crear tabla de proveedores
$sql_create_suppliers_table = "
CREATE TABLE IF NOT EXISTS proveedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(15),
    correo VARCHAR(255),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql_create_suppliers_table) === TRUE) {
    echo "Tabla 'proveedores' verificada o creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'proveedores': " . $conn->error . "<br>";
}

// 6. Relación de productos con proveedores
$sql_create_product_supplier_table = "
CREATE TABLE IF NOT EXISTS productos_proveedores (
    producto_id INT,
    proveedor_id INT,
    cantidad INT,
    precio_compra DECIMAL(10, 2),
    fecha_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (producto_id, proveedor_id),
    FOREIGN KEY (producto_id) REFERENCES productos(id),
    FOREIGN KEY (proveedor_id) REFERENCES proveedores(id)
)";
if ($conn->query($sql_create_product_supplier_table) === TRUE) {
    echo "Tabla 'productos_proveedores' verificada o creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'productos_proveedores': " . $conn->error . "<br>";
}

// 7. Crear tabla de auditoría
$sql_create_audit_table = "
CREATE TABLE IF NOT EXISTS auditoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    accion ENUM('crear', 'actualizar', 'eliminar', 'login', 'logout') NOT NULL,
    descripcion TEXT,
    usuario_id INT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
)";
if ($conn->query($sql_create_audit_table) === TRUE) {
    echo "Tabla 'auditoria' verificada o creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'auditoria': " . $conn->error . "<br>";
}

// 8. Crear tabla de historial de precios
$sql_create_price_history_table = "
CREATE TABLE IF NOT EXISTS historial_precios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT,
    precio_anterior DECIMAL(10, 2),
    precio_nuevo DECIMAL(10, 2),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
)";
if ($conn->query($sql_create_price_history_table) === TRUE) {
    echo "Tabla 'historial_precios' verificada o creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'historial_precios': " . $conn->error . "<br>";
}

// Cerrar la conexión
$conn->close();
?>
