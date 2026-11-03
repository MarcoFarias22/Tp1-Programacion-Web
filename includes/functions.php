<?php
/**
 * Helper de Sanitización y Seguridad Web - TP5
 * Prevención de Cross-Site Scripting (XSS) - OWASP Top 10
 */

// Sanitiza cadenas de texto previniendo inyección de scripts maliciosos (XSS)
function sanitizar_texto($data) {
    if (is_null($data)) return '';
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// Valida formato de correo electrónico en el servidor
function validar_email($email) {
    return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
}
?>