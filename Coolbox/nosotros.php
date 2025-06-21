<?php
// nosotros.php - Página sobre Coolbox
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nosotros | Coolbox</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link rel="stylesheet" href="assets/css/estilos.css"/>
</head>
<body>
  <?php require_once 'components/header.php'; ?>

  <main class="container my-5">
    <div class="row">
      <div class="col-12 text-center mb-4">
        <h1>Sobre Coolbox</h1>
        <p class="lead">Innovación, tecnología y experiencia al alcance de todos</p>
      </div>
    </div>

    <div class="row align-items-center mb-5">
      <div class="col-md-6">
        <img src="assets/img/nosotros_equipo.jpg" alt="Equipo Coolbox" class="img-fluid rounded shadow-sm"/>
      </div>
      <div class="col-md-6">
        <h3>Misión</h3>
        <p>Acercar la mejor tecnología a cada hogar y estilo de vida, ofreciendo productos innovadores, accesibles y con garantía, acompañados de una atención experta y cercana.</p>

        <h3>Visión</h3>
        <p>Ser el referente número uno en retail tecnológico en Perú y Latinoamérica, destacando por nuestra oferta vanguardista, agilidad de servicio y compromiso con el cliente.</p>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-md-6">
        <h3>¿Por qué elegir Coolbox?</h3>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success"></i> Tecnología original y con garantía oficial</li>
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success"></i> Entrega rápida y seguimiento en tiempo real</li>
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success"></i> Asesoría personalizada en cada compra</li>
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success"></i> Ofertas semanales y beneficios exclusivos</li>
        </ul>
      </div>
      <div class="col-md-6">
        <img src="assets/img/entrega_domicilio.png" alt="Entrega a domicilio" class="img-fluid rounded shadow-sm"/>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-12">
        <h3>Nuestra historia</h3>
        <p>Coolbox inició su camino en el mundo tecnológico en 2008, con el objetivo de transformar la experiencia de compra en Perú. Desde entonces, hemos crecido con tiendas físicas, una potente tienda online y una comunidad apasionada por la tecnología.</p>
      </div>
    </div>
  </main>

  <?php require_once 'components/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>
