<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coolbox</title>
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

</head>
<body>
<?php
include('components/header.php');

?>

<main class="container my-5">
    <div class="row mb-5">
      <div class="col-12 text-center">
        <h1>Contáctanos</h1>
        <p class="lead">¿Tienes alguna pregunta o requieres asistencia? ¡Estamos aquí para ayudarte!</p>
      </div>
    </div>

<div class ="row">
    <div class="col-md-7">
        <h4>Envíanos un mensaje</h4>
        <form action="enviar_contacto.php" method="POST" class="row g-3">
          <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="col-md-6">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
          </div>
          <div class="col-12">
            <label for="asunto" class="form-label">Problema</label>
            <input type="text" class="form-control" id="asunto" name="asunto" required>
          </div>
          <div class="col-12">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary" style="background-color:rgb(248, 1, 1); border: rgb(248, 1, 1);">
              <i class="bi bi-send"></i> Enviar Mensaje
            </button>
          </div>
        </form>
    </div>
    <div class="col-md-5">
        <h4>Información de contacto</h4>
        <ul class="list-unstyled">
          <li class="mb-2">
            <i class="bi bi-envelope-fill"></i> contacto@Coolbox.com
          </li>
          <li class="mb-2">
            <i class="bi bi-phone-fill"></i> +51 999 999 999
          </li>
          <li class="mb-2">
            <i class="bi bi-geo-alt-fill"></i> Av. Central 123, Lima, Perú
          </li>
        </ul>

        <h4 class="mt-4">Horario de atención</h4>
        <p>Lunes a viernes: 9:00 a.m. – 6:00 p.m.<br>Sábados: 9:00 a.m. – 1:00 p.m.</p>

        <h4 class="mt-4">Síguenos</h4>
        <a href="#" class="me-3 text-primary"><i class="bi bi-facebook fs-4"></i></a>
        <a href="#" class="me-3 text-danger"><i class="bi bi-instagram fs-4"></i></a>
        <a href="#" class="text-danger"><i class="bi bi-youtube fs-4"></i></a>
      </div>
    </div>

</div>
</main>
<?php require_once 'components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>

</html>