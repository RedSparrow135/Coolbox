<?php 
// carrito.php - Página del carrito de compras para Coolbox
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Carrito de Compras | Coolbox</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/estilos.css" />
</head>
<body>
  <?php require_once 'components/header.php'; ?>

  <main class="container my-5">
    <h1 class="mb-4 text-center">Carrito de Compras</h1>

    <!-- Lista de productos en el carrito -->
    <div class="table-responsive">
      <table class="table table-bordered align-middle text-center">
        <thead class="table-primary">
          <tr>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Precio Unitario</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="assets/img/audifonos_sony.png" alt="Audífonos" class="img-thumbnail" width="80"></td>
            <td>Audífonos Sony WH-1000XM4 con cancelación de ruido</td>
            <td>S/ 899.00</td>
            <td><input type="number" class="form-control w-50 mx-auto" value="1" min="1"></td>
            <td>S/ 899.00</td>
            <td><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></td>
          </tr>
          <tr>
            <td><img src="assets/img/smartwatch_samsung.png" alt="Smartwatch" class="img-thumbnail" width="80"></td>
            <td>Samsung Galaxy Watch 6</td>
            <td>S/ 1099.00</td>
            <td><input type="number" class="form-control w-50 mx-auto" value="1" min="1"></td>
            <td>S/ 1099.00</td>
            <td><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></td>
          </tr>
          <tr>
            <td><img src="assets/img/laptop_lenovo.png" alt="Laptop" class="img-thumbnail" width="80"></td>
            <td>Laptop Lenovo IdeaPad 15.6” Ryzen 5 - 8GB RAM</td>
            <td>S/ 2199.00</td>
            <td><input type="number" class="form-control w-50 mx-auto" value="1" min="1"></td>
            <td>S/ 2199.00</td>
            <td><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></td>
          </tr>
          <tr>
            <td><img src="assets/img/parlante_jbl.png" alt="Parlante" class="img-thumbnail" width="80"></td>
            <td>Parlante JBL Charge 5 Bluetooth</td>
            <td>S/ 499.00</td>
            <td><input type="number" class="form-control w-50 mx-auto" value="1" min="1"></td>
            <td>S/ 499.00</td>
            <td><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></td>
          </tr>
          <tr>
            <td><img src="assets/img/teclado_gamer.png" alt="Teclado Gamer" class="img-thumbnail" width="80"></td>
            <td>Teclado Gamer Redragon K552 RGB</td>
            <td>S/ 179.00</td>
            <td><input type="number" class="form-control w-50 mx-auto" value="1" min="1"></td>
            <td>S/ 179.00</td>
            <td><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Total -->
    <div class="text-end mb-4">
      <h4>Total: <span class="text-success">S/ 4,875.00</span></h4>
    </div>

    <!-- Botones de acción -->
    <div class="d-flex justify-content-between">
      <a href="productos.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Seguir comprando</a>
      <a href="checkout.php" class="btn btn-success"><i class="bi bi-cash-stack"></i> Proceder al pago</a>
    </div>

    <!-- Paginación visual (no funcional) -->
    <nav aria-label="Paginación de carrito" class="mt-5">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Anterior</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Siguiente</a>
        </li>
      </ul>
    </nav>
  </main>

  <?php require_once 'components/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>
