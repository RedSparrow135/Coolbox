<?php
// producto.php - Detalle de producto para Coolbox sin sección de reseñas
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Audífonos JBL Tune 510BT | Coolbox</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/estilos.css" />
</head>
<body>
  <?php require_once 'components/header.php'; ?>

  <main class="container py-5">
    <div class="row g-5">
      <!-- IMAGEN Y MINIATURAS -->
      <div class="col-lg-5">
        <div class="bg-light p-3 rounded shadow-sm text-center">
          <img id="imagen-principal" src="assets/img/audifonos_jbl.png" alt="Audífonos JBL Tune 510BT" class="img-fluid rounded" />
        </div>

        <div class="d-flex flex-lg-column flex-row justify-content-center align-items-center gap-2 mt-3">
          <img src="assets/img/audifonos_jbl.png" alt="Vista frontal" class="img-thumbnail" style="width: 80px; cursor:pointer;" onclick="cambiarImagen(this.src)">
          <img src="assets/img/audifonos_jbl_2.png" alt="Vista lateral" class="img-thumbnail" style="width: 80px; cursor:pointer;" onclick="cambiarImagen(this.src)">
          <img src="assets/img/audifonos_jbl_3.png" alt="Vista superior" class="img-thumbnail" style="width: 80px; cursor:pointer;" onclick="cambiarImagen(this.src)">
        </div>
      </div>

      <!-- INFORMACIÓN Y COMPRA -->
      <div class="col-lg-7">
        <h1 class="fw-bold mb-3">Audífonos JBL Tune 510BT</h1>
        <div class="d-flex align-items-center mb-2">
          <span class="text-warning fs-5 me-2">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
          </span>
          <span class="text-muted">(89 opiniones)</span>
        </div>

        <h2 class="text-danger fw-bold mb-4">S/ 199.00</h2>

        <p class="lead mb-3">Sonido JBL Pure Bass | Batería 40h | Bluetooth 5.0 | Diseño plegable</p>

        <ul class="list-group list-group-flush border rounded mb-4">
          <li class="list-group-item"><strong>Conectividad:</strong> Bluetooth 5.0</li>
          <li class="list-group-item"><strong>Autonomía:</strong> Hasta 40 horas</li>
          <li class="list-group-item"><strong>Compatibilidad:</strong> Android / iOS</li>
          <li class="list-group-item"><strong>Micrófono:</strong> Integrado, con manos libres</li>
          <li class="list-group-item"><strong>Garantía:</strong> 12 meses</li>
        </ul>

        <div class="mb-4 d-flex align-items-center gap-3">
          <label for="cantidad" class="form-label m-0">Cantidad:</label>
          <input type="number" id="cantidad" name="cantidad" class="form-control w-auto" value="1" min="1" max="10" />
        </div>

        <div class="d-flex flex-wrap gap-3">
          <button class="btn btn-danger btn-lg">
            <i class="bi bi-cart-plus"></i> Agregar al carrito
          </button>
          <a href="productos.php" class="btn btn-outline-dark btn-lg">
            <i class="bi bi-arrow-left"></i> Volver a productos
          </a>
        </div>

        <!-- INFO EXTRA -->
        <div class="mt-5">
          <h4 class="fw-semibold">Detalles adicionales</h4>
          <p><strong>Stock:</strong> Disponible</p>
          <p><strong>Envío:</strong> Gratis a todo el Perú</p>
          <p><strong>Promoción:</strong> 15% de descuento pagando con Yape o Plin</p>
        </div>

        <section class="mt-4">
          <h4 class="fw-semibold">Descripción completa</h4>
          <p>Los JBL Tune 510BT ofrecen el característico sonido JBL Pure Bass con una autonomía de hasta 40 horas. Gracias a su tecnología Bluetooth 5.0, tendrás conexión estable y rápida con tus dispositivos móviles.</p>
          <p>El diseño plegable y liviano los hace ideales para llevar a cualquier parte, mientras que su carga rápida te ofrece hasta 2 horas de música con solo 5 minutos de carga.</p>
        </section>
      </div>
    </div>
  </main>

  <?php require_once 'components/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function cambiarImagen(src) {
      document.getElementById('imagen-principal').src = src;
    }
  </script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>
