## 🔄 Evolución del Proyecto (Diferencias entre TP2 / TP3 / TP4 / TP5)

### 📌 TP2 / TP3 (Maquetación Estática & Git Workflow)
- **Tecnologías:** HTML5 estático, CSS3 y Bootstrap 5.
- **Estructura:** 10 vistas individuales `.html` independientes.
- **Navegación:** Código de menú (`<header>`) y pie de página (`<footer>`) duplicado manualmente en cada archivo HTML.
- **Auditoría:** Reporte de Lighthouse para accesibilidad (A11y), SEO y semántica HTML5.

---

### 📌 TP4 (Migración a PHP & SSI - Server Side Includes)
- **Tecnologías:** PHP (Lado Servidor), XAMPP / Laragon (Apache).
- **Modularización (SSI):** Extraídos componentes reutilizables a la carpeta `/includes/`:
  - `header.php`: Apertura de `<html>`, `<head>`, carga de Bootstrap/CSS y cabecera global.
  - `nav.php`: Menú de navegación dinámico que detecta automáticamente la página activa (`PHP_SELF`) para resaltarla.
  - `footer.php`: Pie de página unificado con copyright y año generado dinámicamente (`<?= date('Y') ?>`).
- **Renderizado Dinámico (SSR Básico):** Manejo de la variable `$titulo_pagina` en cada vista para cambiar dinámicamente la etiqueta `<title>` en el navegador.
- **Formato:** Migración completa de extensiones `.html` a `.php` y eliminación de código redundante.

---

### 📌 TP5 (Procesamiento de Formularios & Seguridad OWASP)
- **Funcionalidad GET:** Implementación del formulario de búsqueda dinámica en `busqueda-avanzada.php` sanitizando parámetros `$_GET`.
- **Funcionalidad POST:** Procesamiento del formulario de contacto en `acerca-de.php` capturando entradas mediante `$_POST`.
- **Seguridad Web (OWASP Top 10 - XSS):** 
  - Creación de helper de sanitización en `includes/functions.php`.
  - Limpieza estricta de entradas con `htmlspecialchars()`, `trim()` y `stripslashes()`.
  - Validación de email con `filter_var(..., FILTER_VALIDATE_EMAIL)`.
- **Persistencia & UX:** Mantenimiento de valores en campos de formulario tras envíos fallidos y alertas dinámicas de éxito o error con Bootstrap.