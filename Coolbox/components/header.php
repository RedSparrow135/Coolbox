<?php
// Inicia la sesión para acceder a las variables de sesión
//session_start();
?>
<!-- components/header.php -->
<style>
  /* Barra de navegación personalizada */
  .navbar-coolbox {
    background: linear-gradient(135deg, #1a1a1a, #333333);
    padding-top: 1rem;
    padding-bottom: 1rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease;
  }

  /* Logo con animación */
  .navbar-coolbox .navbar-brand {
    font-weight: 700;
    font-size: 1.8rem;
    color: #ff3c00 !important;
    letter-spacing: 1px;
    text-transform: uppercase;
    display: flex;
    align-items: center;
  }

  .navbar-coolbox .navbar-brand i {
    margin-right: 8px;
    color: #ffffff;
    animation: bounce 1s ease-in-out infinite;
  }

  @keyframes bounce {
    0% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0); }
  }

  /* Estilo de los enlaces */
  .navbar-coolbox .nav-link {
    color: #eeeeee !important;
    font-weight: 500;
    margin-left: 1.5rem;
    font-size: 1rem;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    transition: color 0.3s ease, transform 0.3s ease;
    position: relative;
  }

  /* Efectos al pasar el cursor sobre los enlaces */
  .navbar-coolbox .nav-link:hover {
    color: #ff3c00 !important;
    transform: scale(1.1);
    letter-spacing: 2px;
  }

  /* Menú desplegable animado */
  .navbar-coolbox .navbar-nav .nav-item {
    position: relative;
  }

  /* Línea de subrayado animada */
  .navbar-coolbox .navbar-nav .nav-item::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #ff3c00;
    transition: width 0.3s ease;
  }

  .navbar-coolbox .navbar-nav .nav-item:hover::after {
    width: 100%;
  }

  /* Estilo de la barra de navegación en móviles */
  .navbar-toggler-icon {
    background-color: #ff3c00;
  }

  /* Animación de la barra de navegación */
  @keyframes navbarAnimation {
    0% {
      opacity: 0;
      transform: translateY(-50px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .navbar-coolbox {
    animation: navbarAnimation 0.5s ease-out;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-coolbox">
  <div class="container">
    <a class="navbar-brand" href="inventario.php">
      <img src="../assets/img/logo.png" alt="Coolbox Inventario" height="45" />
      <i class="bi bi-lightning-fill"></i> 
    </a>

    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-dark"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="inventario.php"><i class="bi bi-house-door-fill"></i> Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productos.php"><i class="bi bi-boxes"></i> Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="movimientos.php"><i class="bi bi-arrow-left-right"></i> Movimientos</a> <!-- Cambié el ícono -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="proveedores.php"><i class="bi bi-person-circle"></i> Proveedores</a>
        </li>
        <!-- Aquí mostramos el enlace de login o logout según el estado de la sesión -->
        <?php if (isset($_SESSION['usuario_id'])): ?>
          <!-- Si el usuario está logueado, mostramos "Cerrar sesión" -->
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a>
          </li>
        <?php else: ?>
          <!-- Si el usuario NO está logueado, mostramos "Iniciar sesión" -->
          <li class="nav-item">
            <a class="nav-link" href="login.php"><i class="bi bi-person-fill-lock"></i> Iniciar Sesión</a>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
