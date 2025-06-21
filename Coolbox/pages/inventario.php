<?php
// index.php - Página principal Coolbox

// Incluir la conexión a la base de datos
include('../config/db_connection.php');

// Obtener los productos desde la base de datos
$query = "SELECT * FROM productos LIMIT 6"; // Mostrar 6 productos destacados
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coolbox Perú | Tecnología sin límites</title>
    
    <!-- Bootstrap y estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos.css" />
</head>

<body>
    <?php require_once('../components/header.php'); ?>

    <!-- HERO / CAROUSEL -->
    <section id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/img/banner1.jpg" class="d-block w-100" alt="Bienvenido a Coolbox" />
            </div>
            <div class="carousel-item">
                <img src="../assets/img/banner2.jpg" class="d-block w-100" alt="Tecnología sin límites" />
            </div>
            <div class="carousel-item">
                <img src="../assets/img/banner3.jpg" class="d-block w-100" alt="Descuentos de otro planeta" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </section>

    <!-- BUSCADOR -->
    <section class="container my-5" aria-label="Buscador de productos">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="productos.php" method="GET" class="input-group">
                    <input type="text" name="buscar" class="form-control" placeholder="Busca por marca, categoría o modelo..." />
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- PRODUCTOS DESTACADOS -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Productos Destacados</h2>
        
        <!-- Verificar si hay productos -->
        <?php if ($result->num_rows > 0): ?>
            <div class="row">
                <?php while ($producto = $result->fetch_assoc()) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 text-center">
                            <img src="../assets/img/<?= $producto['imagen']; ?>" class="card-img-top" alt="<?= $producto['nombre']; ?>" />
                            <div class="card-body">
                                <h5 class="card-title"><?= $producto['nombre']; ?></h5>
                                <p class="card-text"><strong><?= "S/ " . number_format($producto['precio'], 2); ?></strong></p>
                                <a href="producto.php?id=<?= $producto['id']; ?>" class="btn btn-primary w-100">
                                    <i class="bi bi-box-arrow-in-right"></i> Ver más
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php else: ?>
            <!-- Mensaje cuando no hay productos -->
            <div class="alert alert-warning text-center" role="alert">
                Actualmente no hay productos disponibles en el inventario. ¡Vuelve pronto!
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
