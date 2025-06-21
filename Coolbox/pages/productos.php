<?php
// productos.php - Página de productos de Coolbox

// Incluir la conexión a la base de datos
include('../config/db_connection.php');

// Obtener los productos desde la base de datos
$query = "SELECT * FROM productos";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Productos | Coolbox</title>
    
    <!-- Bootstrap y estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos.css" />
</head>

<body>
    <?php require_once('../components/header.php'); ?>

    <!-- Sección de Productos -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Productos</h2>
        
        <!-- Tabla de productos -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($producto = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><img src="../assets/img/<?= $producto['imagen']; ?>" alt="<?= $producto['nombre']; ?>" class="img-thumbnail" width="100" /></td>
                            <td><?= $producto['nombre']; ?></td>
                            <td><?= $producto['descripcion']; ?></td>
                            <td><?= $producto['cantidad']; ?></td>
                            <td><?= "S/ " . number_format($producto['precio'], 2); ?></td>
                            <td>
                                <!-- Botones de acciones -->
                                <a href="../controllers/eliminar_producto_backend.php?id=<?= $producto['id']; ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Eliminar
                                </a>
                                <!-- Botón "Editar" -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarProductoModal" 
                                        data-id="<?= $producto['id']; ?>" data-nombre="<?= $producto['nombre']; ?>" 
                                        data-descripcion="<?= $producto['descripcion']; ?>" data-precio="<?= $producto['precio']; ?>" 
                                        data-cantidad="<?= $producto['cantidad']; ?>" data-imagen="<?= $producto['imagen']; ?>" >
                                    <i class="bi bi-pencil-square"></i> Editar
                                </button>
                                <!-- Botón "Ver Más" -->
                                <a href="producto_detalles.php?id=<?= $producto['id']; ?>" class="btn btn-info btn-sm">
                                    <i class="bi bi-info-circle"></i> Ver Más
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php else: ?>
                    <!-- Mostrar una fila vacía cuando no haya productos -->
                    <tr>
                        <td colspan="6" class="text-center">No hay productos disponibles en el inventario.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Mensaje de advertencia cuando no hay productos -->
        <?php if ($result->num_rows == 0): ?>
            <div class="alert alert-warning text-center" role="alert">
                Actualmente no hay productos disponibles en el inventario. ¡Vuelve pronto!
            </div>
        <?php endif; ?>

        <!-- Botón para abrir el modal de agregar producto -->
        <div class="text-start">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarProductoModal">
                <i class="bi bi-plus-circle"></i> Agregar Producto
            </button>
        </div>
    </section>

    <!-- Modal para agregar producto -->
    <div class="modal fade" id="agregarProductoModal" tabindex="-1" aria-labelledby="agregarProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarProductoModalLabel">Agregar Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/agregar_producto_backend.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad en Stock</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                        </div>

                        <div class="mb-3">
                            <label for="categoria_id" class="form-label">Categoría</label>
                            <select class="form-control" id="categoria_id" name="categoria_id" required>
                                <option value="1">Electrónica</option>
                                <option value="2">Accesorios</option>
                                <option value="3">Gaming</option>
                            </select>
                        </div>

                        <!-- Campo para seleccionar la imagen -->
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen del Producto</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Agregar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para editar producto -->
    <div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/editar_producto_backend.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="producto-id">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="producto-nombre" name="nombre" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="producto-descripcion" name="descripcion" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="producto-precio" name="precio" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad en Stock</label>
                            <input type="number" class="form-control" id="producto-cantidad" name="cantidad" required>
                        </div>


                        <div class="mb-3">
                            <label for="categoria_id" class="form-label">Categoría</label>
                            <select class="form-control" id="categoria_id" name="categoria_id" required>
                                <option value="1">Electrónica</option>
                                <option value="2">Accesorios</option>
                                <option value="3">Gaming</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen del Producto</label>
                            <input type="file" class="form-control" id="producto-imagen" name="imagen">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Actualizar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('../components/footer.php'); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script para cargar los datos del producto en el modal
        const editarProductoModal = document.getElementById('editarProductoModal');
        editarProductoModal.addEventListener('show.bs.modal', (event) => {
            const button = event.relatedTarget; // Botón que abrió el modal
            const id = button.getAttribute('data-id');
            const nombre = button.getAttribute('data-nombre');
            const descripcion = button.getAttribute('data-descripcion');
            const precio = button.getAttribute('data-precio');
            const cantidad = button.getAttribute('data-cantidad');
            const categoriaId = button.getAttribute('data-categoria-id');
            const imagen = button.getAttribute('data-imagen');

            const modal = editarProductoModal.querySelector('form');
            modal.querySelector('#producto-id').value = id;
            modal.querySelector('#producto-nombre').value = nombre;
            modal.querySelector('#producto-descripcion').value = descripcion;
            modal.querySelector('#producto-precio').value = precio;
            modal.querySelector('#producto-cantidad').value = cantidad;
            modal.querySelector('#categoria_id').value = categoriaId;
            modal.querySelector('#producto-imagen').value = imagen;
        });
    </script>
</body>

</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
