<!-- components/footer.php -->
<style>
  footer {
    background: #0d0d0d;
    color: #e0e0e0;
    font-size: 0.95rem;
    position: relative;
    overflow: hidden;
  }

  /* Título principal con animación */
  footer h5 {
    color: #ff3c00;
    font-weight: 600;
    margin-bottom: 1rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    animation: fadeInUp 1s ease-out;
  }

  @keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
  }

  footer p {
    font-size: 0.9rem;
  }

  footer a {
    color: #ccc;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  footer a:hover {
    color: #ff3c00;
    text-decoration: underline;
    transform: scale(1.1);
  }

  .social-icons a {
    font-size: 2rem;
    margin-right: 1.5rem;
    color: #ccc;
    display: inline-block;
    transition: transform 0.4s ease, color 0.4s ease;
  }

  .social-icons a:hover {
    transform: scale(1.3) rotate(360deg);
    color: #ff3c00;
  }

  footer hr {
    border-color: #333;
    margin-top: 2rem;
  }

  .footer-bottom {
    color: #888;
    font-size: 0.85rem;
    font-style: italic;
  }

  .footer-bottom span {
    color: #ff3c00;
  }

  @media (max-width: 576px) {
    footer {
      text-align: center;
    }

    .social-icons a {
      margin: 0 0.5rem;
    }
  }
  
  /* Estilo de la capa de partículas */
  .footer-particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
  }

</style>

<footer class="mt-5">
  <!-- Background particles effect -->
  <div class="footer-particles" id="particles-js"></div>

  <div class="container py-5" style="position: relative; z-index: 2;">
    <div class="row">
      <div class="col-md-4 mb-4">
        <h5><i class="bi bi-lightning-fill"></i> Coolbox</h5>
        <p><strong>Coolbox</strong> es tu destino tecnológico. Encuentra lo último en electrodomésticos, audio, gaming y más. Innovación y estilo al alcance de todos. 🚀</p>
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
      &copy; <span><?php echo date('Y'); ?></span> Coolbox. Tecnología que se vive. 🌟
    </div>
  </div>
</footer>

<!-- particles.js script -->
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
<script>
  particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 80,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#ff3c00"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        }
      },
      "opacity": {
        "value": 0.5,
        "random": true,
        "anim": {
          "enable": true,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": {
          "enable": true,
          "speed": 2,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#ff3c00",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 4,
        "direction": "none",
        "random": true,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": true,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "window",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "repulse"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      }
    },
    "retina_detect": true
  });
</script>
