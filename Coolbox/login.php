<?php
// login.php - Formulario de inicio de sesión adaptado para Coolbox
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Iniciar Sesión | Coolbox</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/estilos.css" />
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      max-width: 420px;
      margin-top: 100px;
      margin-bottom: 100px;
    }
    .card {
      border-radius: 1rem;
      border: none;
    }
    .btn-primary {
      background-color: #e60012;
      border-color: #e60012;
    }
    .btn-primary:hover {
      background-color: #c4000f;
      border-color: #c4000f;
    }
  </style>
</head>
<body>
  <?php require_once 'components/header.php'; ?>

  <main class="d-flex justify-content-center align-items-center">
    <div class="login-container w-100">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h3 class="text-center mb-4">
            <i class="bi bi-person-circle"></i> Iniciar Sesión
          </h3>

          <form action="validar_login.php" method="POST" novalidate>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
            </div>
            <div class="mb-3">
              <label for="clave" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="clave" name="clave" placeholder="********" required>
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="recordar" name="recordar">
              <label class="form-check-label" for="recordar">Recordarme</label>
            </div>
            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-box-arrow-in-right"></i> Ingresar
              </button>
            </div>
          </form>

          <hr>
          <p class="text-center mb-0">
            ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
          </p>
        </div>
      </div>
    </div>
  </main>

  <?php require_once 'components/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>
