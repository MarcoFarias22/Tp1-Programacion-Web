<?php
$titulo_pagina = "Registro - CÓMIC HUB";
require_once __DIR__ . '/config/conexion.php';
require_once __DIR__ . '/includes/functions.php';

$errores = [];
$exito = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = sanitizar_texto($_POST['nombre'] ?? '');
    $email    = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';
    $id_rol   = 2; // Rol por defecto: 'Lector' / 'usuario'[cite: 1, 3]

    if (empty($nombre)) $errores[] = "El nombre es obligatorio.";
    if (!$email) $errores[] = "Ingresá un correo electrónico válido.";
    if (strlen($password) < 6) $errores[] = "La contraseña debe tener al menos 6 caracteres.";

    if (empty($errores)) {
        // Verificación de email existente en MySQL
        $stmt_check = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
        $stmt_check->execute([':email' => $email]);
        
        if ($stmt_check->fetch()) {
            $errores[] = "El correo electrónico ya se encuentra registrado.";
        } else {
            // Hashing seguro de la contraseña según OWASP
            $pass_hash = password_hash($password, PASSWORD_BCRYPT);

            // Consulta preparada PDO para la inserción segura
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password, id_rol) VALUES (:nombre, :email, :pass, :rol)");
            if ($stmt->execute([':nombre' => $nombre, ':email' => $email, ':pass' => $pass_hash, ':rol' => $id_rol])) {
                $exito = true;
            } else {
                $errores[] = "Ocurrió un error al crear la cuenta.";
            }
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<main class="container my-5 flex-grow-1">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0 p-4">
                <h2 class="h4 fw-bold text-center mb-4">Crear Cuenta en CÓMIC HUB</h2>

                <?php if ($exito): ?>
                    <div class="alert alert-success">
                        ¡Registro exitoso! Ya podés <a href="login.php" class="alert-link">Iniciar Sesión</a>.
                    </div>
                <?php endif; ?>

                <?php if (!empty($errores)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0 ps-3">
                            <?php foreach ($errores as $err): ?>
                                <li><?= sanitizar_texto($err); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="registro.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">Nombre Completo</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?= sanitizar_texto($_POST['nombre'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= sanitizar_texto($_POST['email'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>