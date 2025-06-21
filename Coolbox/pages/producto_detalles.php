<?php
// producto_detalles.php - Página de detalles de producto de Coolbox

// Incluir la conexión a la base de datos
include('../config/db_connection.php');

// Obtener el ID del producto desde la URL
$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Obtener los detalles del producto desde la base de datos
$query = "SELECT * FROM productos WHERE id = $product_id";
$result = $conn->query($query);
$producto = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detalles del Producto | Coolbox</title>
    
    <!-- Bootstrap y estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos.css" />
    <style>
        .product-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin: 30px 0;
        }

        .product-image {
            max-width: 400px;
            margin-right: 40px;
        }

        .product-details {
            max-width: 500px;
        }

        .product-title {
            font-size: 2rem;
            font-weight: bold;
        }

        .product-description {
            margin-top: 20px;
            font-size: 1rem;
        }

        .product-price {
            font-size: 1.5rem;
            color: #e60012;
            font-weight: bold;
            margin-top: 20px;
        }

        .product-action {
            margin-top: 30px;
        }

        .btn-custom {
            background-color: #e60012;
            color: white;
            font-weight: bold;
            padding: 15px 30px;
            text-align: center;
            font-size: 1.2rem;
        }

        .btn-custom:hover {
            background-color: #c4000f;
        }

        .reviews-section {
            margin-top: 50px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }

        .reviews-section h4 {
            margin-bottom: 20px;
        }

        .review {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .review img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .review-text {
            font-size: 1rem;
            color: #333;
        }

        .specifications-table {
            margin-top: 40px;
        }

        .specifications-table th {
            background-color: #e60012;
            color: white;
            padding: 10px;
        }

        .specifications-table td {
            padding: 10px;
        }

        .related-products {
            margin-top: 50px;
        }

        .related-products h4 {
            margin-bottom: 20px;
        }

        .related-product-card {
            margin: 10px;
            width: 200px;
        }
    </style>
</head>

<body>
    <?php require_once('../components/header.php'); ?>

    <div class="container product-container">
        <!-- Imagen del producto -->
        <div class="product-image">
            <img src="../assets/img/<?= $producto['imagen']; ?>" alt="<?= $producto['nombre']; ?>" class="img-fluid">
        </div>

        <!-- Detalles del producto -->
        <div class="product-details">
            <h2 class="product-title"><?= $producto['nombre']; ?></h2>
            <p class="product-description"><?= $producto['descripcion']; ?></p>
            <p class="product-price"><?= "S/ " . number_format($producto['precio'], 2); ?></p>

            <div class="product-action">
                <a href="#" class="btn btn-custom">
                    <i class="bi bi-cart-plus"></i> Agregar al carrito
                </a>
            </div>
        </div>
    </div>

    <!-- Sección de Reseñas -->
    <div class="container reviews-section">
        <h4>Reseñas de Clientes</h4>
        <div class="review">
            <img src="../assets/img/gente/Sakurai.jpg" alt="Avatar">
            <div class="review-text">
                "Este producto es excelente, superó mis expectativas en cuanto a calidad y funcionalidad."
            </div>
        </div>
        <div class="review">
            <img src="../assets/img/gente/Shigeru_Miyamoto_20150610_(cropped).jpg" alt="Avatar">
            <div class="review-text">
                "Lo recomiendo ampliamente. Ideal para mi estudio de grabación."
            </div>
        </div>
        <div class="review">
            <img src="../assets/img/gente/pepe-el-mago-2.jpg" alt="Avatar">
            <div class="review-text">
                "Cumple con lo que promete, aunque podría tener más características."
            </div>
        </div>
    </div>

    <!-- Especificaciones del producto -->
    <div class="container specifications-table">
        <h4>Especificaciones</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Especificación</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Conectividad</td>
                    <td>USB 3.0</td>
                </tr>
                <tr>
                    <td>Compatibilidad</td>
                    <td>Windows, MacOS</td>
                </tr>
                <tr>
                    <td>Garantía</td>
                    <td>1 Año</td>
                </tr>
                <tr>
                    <td>Dimensiones</td>
                    <td>12 x 6 x 2 cm</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Productos Relacionados -->
    <div class="container related-products">
        <h4>Productos Relacionados</h4>
        <div class="d-flex">
            <div class="card related-product-card">
                <img src="../assets/img/producto1.jpg" class="card-img-top" alt="Producto Relacionado">
                <div class="card-body">
                    <h5 class="card-title">Producto Relacionado 1</h5>
                    <p class="card-text">S/ 599.00</p>
                    <a href="#" class="btn btn-primary w-100">Ver Más</a>
                </div>
            </div>
            <div class="card related-product-card">
                <img src="../assets/img/producto2.jpg" class="card-img-top" alt="Producto Relacionado">
                <div class="card-body">
                    <h5 class="card-title">Producto Relacionado 2</h5>
                    <p class="card-text">S/ 399.00</p>
                    <a href="#" class="btn btn-primary w-100">Ver Más</a>
                </div>
            </div>
            <div class="card related-product-card">
                <img src="../assets/img/producto3.jpg" class="card-img-top" alt="Producto Relacionado">
                <div class="card-body">
                    <h5 class="card-title">Producto Relacionado 3</h5>
                    <p class="card-text">S/ 799.00</p>
                    <a href="#" class="btn btn-primary w-100">Ver Más</a>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('../components/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
