<?php
// Detecta el archivo actual cargado en la URL para resaltar la pestaña activa
$pagina_actual = basename($_SERVER['PHP_SELF']);
?>
<nav class="border-top pt-2">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-dark <?= ($pagina_actual == 'index.php') ? 'fw-bold border-bottom border-primary border-2' : ''; ?>" href="index.php">Catálogo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark <?= ($pagina_actual == 'cronologias.php') ? 'fw-bold border-bottom border-primary border-2' : ''; ?>" href="cronologias.php">Cronologías</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark <?= ($pagina_actual == 'personajes.php' || $pagina_actual == 'detalle-personaje.php') ? 'fw-bold border-bottom border-primary border-2' : ''; ?>" href="personajes.php">Personajes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark <?= ($pagina_actual == 'foro.php' || $pagina_actual == 'detalle-hilo.php') ? 'fw-bold border-bottom border-primary border-2' : ''; ?>" href="foro.php">Foro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark <?= ($pagina_actual == 'acerca-de.php') ? 'fw-bold border-bottom border-primary border-2' : ''; ?>" href="acerca-de.php">Acerca de</a>
        </li>
    </ul>
</nav>