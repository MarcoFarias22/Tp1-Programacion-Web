## 🔄 Evolución del Proyecto (Diferencias entre TP1 / TP2 / TP3 / TP4 / TP5)

## 🎨 Diseño y Prototipado (TP1)

- **Prototipo Interactivo en Figma:** [Ver prototipo en Figma](https://www.figma.com/design/5BKQgl8KkOb1KteYsUIHvK/Comic-Hub?node-id=0-1&p=f&t=dIOoDC4gvRuB2X9w-0)
- **Bocetos e Historias de Usuario:** Disponibles en la documentación del repositorio.

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

## 🔒 Entrega Clase 5 / TP N.º 5: Procesamiento de Formularios y Seguridad Web (PHP & OWASP Top 10)

Todo el desarrollo correspondiente a esta entrega se encuentra en la carpeta obligatoria `/clase5/`.

### 🛠️ Funcionalidades e Implementaciones
1. **Envío por POST (`acerca-de.php`):**
   - Formulario de contacto y sugerencias.
   - Validación en servidor (`empty()`, formato de email con `validar_email()`).
   - Mantenimiento de la persistencia de datos en inputs tras fallos de validación.
   - Mensajes visuales de retroalimentación (alertas Bootstrap de éxito/error).

2. **Envío por GET (`busqueda-avanzada.php`):**
   - Módulo de filtro y búsqueda dinámica por título, editorial y año.
   - Captura y rendering sanitizado de parámetros recibidos vía URL (`$_GET`).

3. **Seguridad Web & Sanitización OWASP (XSS):**
   - Helper centralizado en `includes/functions.php`.
   - Limpieza de entradas `$_POST` y `$_GET` utilizando `htmlspecialchars()`, `trim()` y `stripslashes()`.
   
---

### 🗄️ TP6: Diseño y Normalización del Esquema Relacional en MySQL
- **Normalización Aplicada (1FN, 2FN y 3FN):** Descomposición de la tabla inicial no normalizada para eliminar redundancias y dependencias transitivas (documentado en `tp6/NORMALIZACION.md`).
- **Script DDL (`tp6/schema.sql`):** Creación de la base de datos `comic_hub_db` en MySQL con claves primarias autoincrementales (`PK`), restricciones de integridad referencial (`FK`) e índices explícitos de optimización (`CREATE INDEX`).
- **Script DML (`tp6/consultas.sql`):** Definición de consultas de prueba CRUD e inserciones relacionales utilizando `INNER JOIN`.

---

### 🔒 TP7: Persistencia y Conexión Segura PHP-MySQL (PDO)
- **Conexión Segura (`config/conexion.php`):** Instancia de **PDO** configurada con manejo de excepciones `try-catch`, modo de errores estricto y juego de caracteres `utf8mb4`.
- **Módulo CRUD Completo (`admin/`):**
  - **Create (`crear.php`):** Alta de cómics asociando claves foráneas dinámicas (editoriales).
  - **Read (`index.php`):** Lectura del catálogo persistido mediante consultas SQL con `JOIN`.
  - **Update (`editar.php`):** Edición de registros existentes recuperando parámetros de la BD.
  - **Delete (`eliminar.php`):** Eliminación de registros de prueba con confirmación de usuario.
- **Seguridad Estricta:**
  - **Anti-SQL Injection:** Uso exclusivo de **Consultas Preparadas** (`PDO::prepare`) con marcadores de parámetros.
  - **Anti-XSS:** Sanitización previa a la renderización en las tablas HTML.