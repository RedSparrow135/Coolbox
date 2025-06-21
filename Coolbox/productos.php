<?php
// productos.php - Listado de productos con filtros para Coolbox
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Productos | Coolbox</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
  <?php require_once 'components/header.php'; ?>

  <!-- Buscador con filtros -->
  <section class="container my-5" aria-label="Buscador de productos">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-4 d-flex align-items-center">
        <p class="mb-0">Encuentra tus gadgets favoritos: por nombre, categoría o marca.</p>
      </div>
      <div class="col-md-8">
        <form action="productos.php" method="GET">
          <div class="row g-2">
            <div class="col-md-5">
              <input type="text" name="buscar" class="form-control" placeholder="Buscar en Coolbox..." aria-label="Buscar productos">
            </div>
            <div class="col-md-3">
              <select name="categoria" class="form-select">
                <option value="">Todas las categorías</option>
                <option value="audio">Audio</option>
                <option value="celulares">Celulares</option>
                <option value="hogar">Electrohogar</option>
                <option value="gaming">Gaming</option>
                <option value="accesorios">Accesorios</option>
              </select>
            </div>
            <div class="col-md-3">
              <select name="marca" class="form-select">
                <option value="">Todas las marcas</option>
                <option value="xiaomi">Xiaomi</option>
                <option value="sony">Sony</option>
                <option value="samsung">Samsung</option>
                <option value="philips">Philips</option>
                <option value="jbl">JBL</option>
              </select>
            </div>
            <div class="col-md-1 d-grid">
              <button class="btn btn-danger" type="submit" aria-label="Buscar">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Listado -->
  <section class="container mb-5">
    <div class="row">
      <!-- Filtros -->
      <aside class="col-md-3 mb-4">
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-danger text-white">
            <h5 class="mb-0"><i class="bi bi-list-ul"></i> Categorías</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="#" class="text-decoration-none">Audio</a></li>
            <li class="list-group-item"><a href="#" class="text-decoration-none">Celulares</a></li>
            <li class="list-group-item"><a href="#" class="text-decoration-none">Electrohogar</a></li>
            <li class="list-group-item"><a href="#" class="text-decoration-none">Gaming</a></li>
            <li class="list-group-item"><a href="#" class="text-decoration-none">Accesorios</a></li>
          </ul>
        </div>

        <div class="card shadow-sm">
          <div class="card-header bg-dark text-white">
            <h5 class="mb-0"><i class="bi bi-tags-fill"></i> Marcas</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="#" class="text-decoration-none">Xiaomi</a></li>
            <li class="list-group-item"><a href="#" class="text-decoration-none">Sony</a></li>
            <li class="list-group-item"><a href="#" class="text-decoration-none">Samsung</a></li>
            <li class="list-group-item"><a href="#" class="text-decoration-none">Philips</a></li>
            <li class="list-group-item"><a href="#" class="text-decoration-none">JBL</a></li>
          </ul>
        </div>
      </aside>

      <!-- Productos -->
      <div class="col-md-9">
        <h2 class="mb-4 text-danger">Catálogo Coolbox</h2>

        <!-- Producto de ejemplo -->
        <div class="card mb-4 shadow-sm">
          <div class="row g-0">
            <div class="col-md-3 text-center">
              <img src="assets/img/audifonos_jbl.png" class="img-fluid p-3" alt="Audífonos JBL Tune 510BT">
            </div>
            <div class="col-md-9">
              <div class="card-body">
                <h5 class="card-title">Audífonos JBL Tune 510BT</h5>
                <p class="card-text">Bluetooth, batería de 40h, sonido JBL Pure Bass.</p>
                <p class="card-text"><strong>S/ 199.00</strong></p>
                <a href="producto.php?id=101" class="btn btn-outline-danger">
                  <i class="bi bi-box-arrow-in-right"></i> Ver más
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Puedes duplicar esto para más productos -->
      </div>
    </div>
  </section>

  <?php require_once 'components/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>
