<?php
// proveedores.php - Página de proveedores de Coolbox

// Incluir la conexión a la base de datos
include('../config/db_connection.php');

// Obtener los proveedores desde la base de datos
$query = "SELECT * FROM proveedores";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Proveedores | Coolbox</title>
    
    <!-- Bootstrap y estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos.css" />
</head>

<body>
    <?php require_once('../components/header.php'); ?>

    <!-- Sección de Proveedores -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Proveedores</h2>
        
        <!-- Tabla de proveedores -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($proveedor = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $proveedor['nombre']; ?></td>
                            <td><?= $proveedor['direccion']; ?></td>
                            <td><?= $proveedor['telefono']; ?></td>
                            <td><?= $proveedor['correo']; ?></td>
                            <td><?= $proveedor['fecha_registro']; ?></td>
                            <td>
                                <!-- Botones de acciones -->
                               <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarProveedorModal" 
                                        data-id="<?= $proveedor['id']; ?>"
                                        data-nombre="<?= $proveedor['nombre']; ?>"
                                        data-direccion="<?= $proveedor['direccion']; ?>"
                                        data-telefono="<?= $proveedor['telefono']; ?>"
                                        data-correo="<?= $proveedor['correo']; ?>">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </button>
                                <!-- Botón de eliminar proveedor -->
                                <a href="../controllers/eliminar_proveedor_backend.php?id=<?= $proveedor['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este proveedor?');">
                                    <i class="bi bi-trash"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php else: ?>
                    <!-- Mostrar una fila vacía cuando no haya proveedores -->
                    <tr>
                        <td colspan="6" class="text-center">No hay proveedores registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Mensaje de advertencia cuando no hay proveedores -->
        <?php if ($result->num_rows == 0): ?>
            <div class="alert alert-warning text-center" role="alert">
                Actualmente no hay proveedores registrados. ¡Vuelve pronto!
            </div>
        <?php endif; ?>

        <!-- Botón para abrir el modal de agregar proveedor -->
        <div class="text-start">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarProveedorModal">
                <i class="bi bi-plus-circle"></i> Agregar Proveedor
            </button>
        </div>
    </section>

    <!-- Modal para agregar proveedor -->
    <div class="modal fade" id="agregarProveedorModal" tabindex="-1" aria-labelledby="agregarProveedorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarProveedorModalLabel">Agregar Nuevo Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/agregar_proveedor_backend.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Proveedor</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Agregar Proveedor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    
    <!-- Modal para editar proveedor -->
    <div class="modal fade" id="editarProveedorModal" tabindex="-1" aria-labelledby="editarProveedorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarProveedorModalLabel">Editar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/editar_proveedor_backend.php" method="POST">
                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Proveedor</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Actualizar Proveedor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('../components/footer.php'); ?>

    <!-- Scripts -->
  
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Llenar los campos del modal con la información del proveedor
        var editarModal = document.getElementById('editarProveedorModal')
        editarModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Botón que abrió el modal
            var id = button.getAttribute('data-id');
            var nombre = button.getAttribute('data-nombre');
            var direccion = button.getAttribute('data-direccion');
            var telefono = button.getAttribute('data-telefono');
            var correo = button.getAttribute('data-correo');

            // Establecer los valores de los campos en el modal
            var modalId = editarModal.querySelector('#id');
            var modalNombre = editarModal.querySelector('#nombre');
            var modalDireccion = editarModal.querySelector('#direccion');
            var modalTelefono = editarModal.querySelector('#telefono');
            var modalCorreo = editarModal.querySelector('#correo');

            modalId.value = id;
            modalNombre.value = nombre;
            modalDireccion.value = direccion;
            modalTelefono.value = telefono;
            modalCorreo.value = correo;
        })
    </script>         


</body>

</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
