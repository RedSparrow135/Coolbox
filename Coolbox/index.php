<?php
// index.php - Página principal Coolbox
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
  <link rel="stylesheet" href="assets/css/estilos.css" />
</head>
<body>
  <?php require_once 'components/header.php'; ?>

  <!-- HERO / CAROUSEL -->
  <section id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/banner1.jpg" class="d-block w-100" alt="Bienvenido a Coolbox" />
      </div>
      <div class="carousel-item">
        <img src="assets/img/banner2.jpg" class="d-block w-100" alt="Tecnología sin límites" />
      </div>
      <div class="carousel-item">
        <img src="assets/img/banner3.jpg" class="d-block w-100" alt="Descuentos de otro planeta" />
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
    <div class="row">
      <?php
      // Simulación de productos destacados
      $productos = [
        ['id' => 101, 'nombre' => 'Audífonos Gaming RGB', 'precio' => 'S/ 129.00', 'imagen' => 'audifonos_rgb.png'],
        ['id' => 102, 'nombre' => 'Laptop Gamer Lenovo i5', 'precio' => 'S/ 2,799.00', 'imagen' => 'laptop_lenovo.png'],
        ['id' => 103, 'nombre' => 'Teclado Mecánico Retroiluminado', 'precio' => 'S/ 189.00', 'imagen' => 'teclado_mecanico.png']
      ];

      foreach ($productos as $p): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100 text-center">
            <img src="assets/img/<?= $p['imagen']; ?>" class="card-img-top" alt="<?= $p['nombre']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $p['nombre']; ?></h5>
              <p class="card-text"><strong><?= $p['precio']; ?></strong></p>
              <a href="producto.php?id=<?= $p['id']; ?>" class="btn btn-primary w-100">
                <i class="bi bi-box-arrow-in-right"></i> Ver más
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <?php require_once 'components/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
