<!-- components/header.php -->
<style>
  .navbar-coolbox {
    background: linear-gradient(90deg, #000000, #1a1a1a);
    padding-top: 1rem;
    padding-bottom: 1rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
    transition: all 0.3s ease;
  }

  .navbar-coolbox .navbar-brand {
    font-weight: 700;
    font-size: 1.5rem;
    color: #ff3c00 !important;
    letter-spacing: 1px;
  }

  .navbar-coolbox .navbar-brand i {
    margin-right: 8px;
    color: #ffffff;
    animation: flash 1.5s infinite;
  }

  .navbar-coolbox .nav-link {
    color: #eeeeee !important;
    font-weight: 500;
    margin-left: 1rem;
    transition: color 0.3s ease, transform 0.3s ease;
  }

  .navbar-coolbox .nav-link:hover {
    color: #ff3c00 !important;
    transform: scale(1.05);
  }

  @keyframes flash {
    0% { opacity: 1; }
    50% { opacity: 0.3; }
    100% { opacity: 1; }
  }
</style>

<nav class="navbar navbar-expand-lg navbar-coolbox">
  <div class="container">
 <a class="navbar-brand" href="index.php">
      <img src="assets/img/logo.png" alt="Coolbox" height="40" />
    </a>

    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-dark"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="productos.php"><i class="bi bi-box-seam-fill"></i> Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carrito.php"><i class="bi bi-cart-fill"></i> Carrito</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="nosotros.php"><i class="bi bi-rocket-fill"></i> Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacto.php"><i class="bi bi-chat-left-dots-fill"></i> Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="bi bi-person-fill-lock"></i> Iniciar Sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
