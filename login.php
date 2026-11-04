<?php
$titulo_pagina = "Iniciar Sesión - CÓMIC HUB";
require_once __DIR__ . '/config/conexion.php';
require_once __DIR__ . '/includes/functions.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirigir al inicio si ya hay una sesión activa
if (isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if ($email && !empty($password)) {
        // Consulta uniendo usuarios con roles[cite: 1, 3]
        $stmt = $pdo->prepare("SELECT u.id_usuario, u.nombre, u.email, u.password, r.nombre AS rol 
                               FROM usuarios u 
                               INNER JOIN roles r ON u.id_rol = r.id_rol 
                               WHERE u.email = :email");
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();

        // Comparación con password_verify()[cite: 1]
        if ($usuario && password_verify($password, $usuario['password'])) {
            // Protección contra Session Fixation[cite: 1]
            session_regenerate_id(true);

            // Almacenar datos del usuario en la superglobal $_SESSION[cite: 1]
            $_SESSION['usuario_id']     = $usuario['id_usuario'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['rol']            = strtolower($usuario['rol']);

            // Redirección condicionada por rol[cite: 1]
            if ($_SESSION['rol'] === 'administrador' || $_SESSION['rol'] === 'admin') {
                header("Location: admin/index.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $error = "Credenciales incorrectas. Verificá el correo y la contraseña.";
        }
    } else {
        $error = "Por favor, completá todos los campos correctamente.";
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<main class="container my-5 flex-grow-1">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 p-4">
                <h2 class="h4 fw-bold text-center mb-4">Iniciar Sesión</h2>

                <?php if (isset($_GET['error']) && $_GET['error'] === 'acceso_denegado'): ?>
                    <div class="alert alert-warning">Debés iniciar sesión para acceder a esa sección.</div>
                <?php endif; ?>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= sanitizar_texto($error); ?></div>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>