<style>
  footer {
    background: linear-gradient(90deg, #0d0d0d, #1a1a1a);
    color: #e0e0e0;
    font-size: 0.95rem;
  }

  footer h5 {
    color: #ff3c00;
    font-weight: 600;
    margin-bottom: 1rem;
  }

  footer a {
    color: #ccc;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  footer a:hover {
    color: #ff3c00;
    text-decoration: underline;
  }

  .social-icons a {
    font-size: 1.4rem;
    margin-right: 1rem;
    display: inline-block;
    color: #ccc;
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .social-icons a:hover {
    transform: scale(1.2);
    color: #ff3c00;
  }

  footer hr {
    border-color: #333;
  }

  .footer-bottom {
    color: #888;
    font-size: 0.85rem;
  }

  @media (max-width: 576px) {
    footer {
      text-align: center;
    }

    .social-icons a {
      margin: 0 0.5rem;
    }
  }
</style>

<footer class="mt-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-4 mb-4">
        <h5><i class="bi bi-lightning-fill"></i> Coolbox</h5>
        <p><strong>Coolbox</strong> es tu destino tecnológico. Encontrarás lo último en electrodomésticos, audio, gaming y más. Innovación y estilo al alcance de todos.</p>
      </div>

      <div class="col-md-4 mb-4">
        <h5><i class="bi bi-headset"></i> Atención al Cliente</h5>
        <ul class="list-unstyled">
          <li><i class="bi bi-envelope-fill"></i> soporte@coolbox.pe</li>
          <li><i class="bi bi-phone-fill"></i> +51 800 00 1234</li>
          <li><i class="bi bi-clock-fill"></i> Lunes a Sábado: 9am - 8pm</li>
          <li><i class="bi bi-geo-alt-fill"></i> Av. Tecnología 456, Lima, Perú</li>
        </ul>
      </div>

      <div class="col-md-4 mb-4">
        <h5><i class="bi bi-share-fill"></i> Síguenos</h5>
        <div class="social-icons">
          <a href="https://www.facebook.com/CoolboxPE" target="_blank" rel="noopener"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/coolbox_pe" target="_blank" rel="noopener"><i class="bi bi-instagram"></i></a>
          <a href="https://www.youtube.com/@coolboxpe" target="_blank" rel="noopener"><i class="bi bi-youtube"></i></a>
          <a href="https://www.tiktok.com/@coolboxpe" target="_blank" rel="noopener"><i class="bi bi-tiktok"></i></a>
        </div>
        <p class="mt-2 fst-italic">#TodoMásCool</p>
      </div>
    </div>

    <hr class="my-4" />

    <div class="text-center footer-bottom">
      &copy; <?php echo date('Y'); ?> Coolbox. Tecnología que se vive.
    </div>
  </div>
</footer>
