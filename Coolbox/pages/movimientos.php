    <?php
    // movimientos.php - Página de movimientos de inventario (solo visualización)

    include('../config/db_connection.php');

    // Obtener los movimientos desde la base de datos
    $query = "SELECT m.id, p.nombre as producto, m.tipo_movimiento, m.cantidad, m.fecha_movimiento, u.nombre as usuario
            FROM movimientos_inventario m
            JOIN productos p ON m.producto_id = p.id
            JOIN usuarios u ON m.usuario_id = u.id";
    $result = $conn->query($query);
    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Movimientos de Inventario | Coolbox</title>
        
        <!-- Bootstrap y estilos -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/estilos.css" />
        <style>
            .table-container {
                margin-top: 30px;
            }

            .btn-custom {
                background-color: #e60012;
                color: white;
                font-weight: bold;
                padding: 15px 30px;
                text-align: center;
                font-size: 1.2rem;
                margin-bottom: 20px;
            }

            .btn-custom:hover {
                background-color: #c4000f;
            }
        </style>
    </head>

    <body>
        <?php require_once('../components/header.php'); ?>

        <!-- Sección de Movimientos -->
        <section class="container my-5">
            <h2 class="text-center mb-4">Movimientos de Inventario</h2>

            <!-- Tabla de movimientos -->
            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Tipo de Movimiento</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($movimiento = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $movimiento['producto']; ?></td>
                                    <td><?= $movimiento['tipo_movimiento']; ?></td>
                                    <td><?= $movimiento['cantidad']; ?></td>
                                    <td><?= $movimiento['fecha_movimiento']; ?></td>
                                    <td><?= $movimiento['usuario']; ?></td>
                                </tr>
                            <?php } ?>
                        <?php else: ?>
                            <!-- Mostrar una fila vacía cuando no haya movimientos -->
                            <tr>
                                <td colspan="5" class="text-center">No hay movimientos registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Mensaje de advertencia cuando no hay productos -->
            <?php if ($result->num_rows == 0): ?>
                <div class="alert alert-warning text-center" role="alert">
                    Actualmente no hay movimientos registrados en el inventario. ¡Vuelve pronto!
                </div>
            <?php endif; ?>
        </section>

        <?php require_once('../components/footer.php'); ?>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

    <?php
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
