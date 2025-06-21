<?php
// utils/helpers.php

// Función para limpiar los inputs del usuario y prevenir inyecciones de código
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Función para validar un correo electrónico
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
?>
