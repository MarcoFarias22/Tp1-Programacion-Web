<?php
// includes/auth_guard.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Verificar si hay sesión activa (OWASP / TP8)
if (!isset($_SESSION['usuario_id'])) {
    header("Location: /COMIC-HUB/login.php?error=acceso_denegado");
    exit();
}

// 2. Control de Acceso por Roles (ej. 'admin' vs 'usuario')
function requerir_rol($rol_requerido) {
    if (!isset($_SESSION['rol']) || strtolower($_SESSION['rol']) !== strtolower($rol_requerido)) {
        header("Location: /COMIC-HUB/index.php?error=sin_permisos");
        exit();
    }
}
?>