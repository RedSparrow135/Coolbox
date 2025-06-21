<?php
// login.php - Página de inicio de sesión

// Inicia la sesión (si aún no lo ha hecho)
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Iniciar Sesión | Inventario Coolbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/estilos.css" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 420px;
            margin-top: 100px;
            margin-bottom: 100px;
            padding: 0 15px;
        }

        .card {
            border-radius: 1rem;
            border: none;
            background-color: #ffffff;
        }

        h3 {
            color: #333333;
            font-weight: bold;
            font-size: 1.8rem;
        }

        .form-control {
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            color: #333;
            padding: 12px;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #e60012;
            box-shadow: 0 0 5px rgba(230, 0, 18, 0.3);
        }

        .btn-primary {
            background-color: #e60012;
            border-color: #e60012;
            font-size: 1.1rem;
            padding: 14px;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #c4000f;
            border-color: #c4000f;
        }

        .forgot-password a {
            color: #e60012;
            font-weight: bold;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* Responsividad */
        @media (max-width: 576px) {
            .login-container {
                margin-top: 50px;
            }

            .card {
                padding: 2rem;
            }

            .btn-primary {
                font-size: 1rem;
                padding: 12px;
            }
        }
    </style>
</head>

<body>
    <main class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="login-container w-100">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">
                        <i class="bi bi-person-fill-lock"></i> Iniciar Sesión
                    </h3>

                    <!-- Formulario de inicio de sesión -->
                    <form action="../controllers/login_backend.php" method="POST">
                        <div class="mb-4">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo@correo.com"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="clave" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="********" required>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="recordar" name="recordar">
                            <label class="form-check-label" for="recordar">Recordarme</label>
                        </div>
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary w-100">
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

    <!-- Incluir el pie de página -->
    <?php include('../components/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
